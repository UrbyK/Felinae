<?php
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
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
                    $_SESSION['loggedin'] = true;
                    if($acc['admin'] == 1){
                        $_SESSION['admin'] = true;
                    }

                    

                    header("Location: ./index.php");
                    die();
                }

            }

            header('Location: ./index.php?page=login');
            exit();
        }
    }

?>