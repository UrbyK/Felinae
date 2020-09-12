<?php

    if(isset($_POST['Submit'])) {
    
        if(!user_login_status()) {
            $id = $_POST['product_id'];
            header("Location: ./index.php?page=product&id=<?=$id?>");
        }

    }
?>