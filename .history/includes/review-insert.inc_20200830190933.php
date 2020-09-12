<?php

    if(isset($_POST['Submit'])) {
    
        $product_id = $_POST['product_id'];
        $rating = $_POST['star'];
        $comment = $_POST['comment'];
        $acount_id = $_POST['account_id'];

        if(!user_login_status()) {
            
            header("Location: ./index.php?page=product&id=$product_id");
        }




    }
?>