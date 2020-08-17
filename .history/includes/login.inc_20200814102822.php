<?php
    
    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
        header("location: ./index.php");
        exit();
    }

    $user = $_POST['username'];
    $pass = $_POST['password'];

    if(isset($_POST['Submit'])){
        if(!empty($user) && !empty($pass)){
            $sql = "SELECT * FROM account WHERE username = ? OR email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user, $user]);
            
            if($stmt->rowCount() == 1){
                $acc = $stmt->fetch();
                if(password_verify($pass, $acc['password'])){
                    $_SESSION['user_id'] = $acc['id'];
                    $_SESSION['logged_in'] = true;
                    if($acc['admin'] == 1){
                        $_SESSION['admin'] = true;
                    }

                    $loginDateTime = date('y-m-d h:i:s', time());
                    $query = "UPDATE account SET lastLogin = ? WHERE id = ?";
                    $pdo->prepare($query)->execute([$loginDateTime, $acc['id']]);

                    header("Location: ./index.php");
                    die();
                }

            }

            header('Location: ./index.php?page=login');
            exit();
        }
    }

?>