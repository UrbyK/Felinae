<?php 
    if(user_login_status()) {
        header('Location: ./index.php?page=index');
        exit;
    } else {
        if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['token']) && !empty($_GET['token'])) {
            $email = $_GET['email'];
            $token = $_GET['token'];

            $query ="SELECT * FROM account WHERE email = ? AND token = ?";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $token);
            $stmt->execute();

            $num_rows = $stmt->rowCount();

            if($num_rows == 0){
                header('Location: ./index.php?page=login&status=not_exist');
                exit;
            } elseif ($num_rows > 1){
                header('Location: ./index.php?page=login&status=err')
            } else {
                $account = $stmt->fetch(PDO::FETCH_ASSOC);
                $query = "UPDATE account SET active = 1 WHERE id=?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$account['id']]);
            }


        } else{
            header("Refresh: 15; url=./index.php?page=login");
            exit;
        }
        
    }
?>

<?=template_header("Verify")?>

<div>
    <?=$email?>
    <br/>
    <?=$token?>
    
</div>