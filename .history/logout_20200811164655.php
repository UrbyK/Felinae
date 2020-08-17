<?php 

    unset($_SESSION['user_id'], $_SESSION['admin'], $_SESSION['loggedin']);
    session_destroy();
    echo"Uspešno izpisani!";    
    header("Location: ./index.php");

    exit();
?>