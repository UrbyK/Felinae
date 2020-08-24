<?php

    $pdo = pdo_connect_mysql();
    if(isset($_POST['Submit'])){
        $title = $_POST['title'];
        $summary = $_POST['summary'];
        $description = $_POST['description'];
        
        $weight = $_POST['weight'];
        $length = $_POST['length'];
        $width = $_POST['width'];
        $depth = $_POST['depth'];
        
        $sku = $_POST['sku'];
        $quantity = $_POST['quantity'];

        $price = $_POST['price'];
        $price = $_POST['discount'];
        
        if(empty($_POST['quantity']) && !isset($_POST['quantity'])){
            $quantity = $sku;
        }

        $publishedAt = date('Y-m-d H:i.s', strtotime($_POST['publishedAtDate'] $_POST['publishedAtTime']));

        echo $publishedAt;

        


    }

?>
