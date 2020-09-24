<?php 
    if(user_login_status()){
        header('Location: ./index.php?page=login');
        exit;
    }
    
    if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['token']) && !empty($_GET['token'])){
        $email = $_GET['email'];
        $token = $_GET['token'];
    }
?>

<?=template_header("Verify")?>

<div>
    <?=$email?>
    <br/>
    <?=$token?>
    
</div>