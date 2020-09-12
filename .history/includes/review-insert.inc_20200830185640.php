<?php

    if(isset($_POST['Submit'])) {
    
        if(!user_login_status()) {
            header("Location: /index.php?page=product&id=<?=$_POST['product_id']?>");
        }

    }
?>