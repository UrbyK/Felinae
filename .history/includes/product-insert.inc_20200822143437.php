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
        $discount = $_POST['discount'];
        
        if(empty($_POST['quantity']) && !isset($_POST['quantity'])){
            $quantity = $sku;
        }

        $publishedAt = date('Y-m-d H:i:s', strtotime($_POST['publishedAtDate'].' '.$_POST['publishedAtTime']));

        if(!empty($_POST['saleStartsAtDate']) && isset($_POST['saleStartsAtDate']) || !empty($_POST['saleStartsAtTime']) && isset($_POST['saleStartsAtTime'])){
            $startsAt = date('Y-m-d H:i:s', strtotime($_POST['saleStartsAtDate'].' '.$_POST['saleStartsAtTime']));
        }

        if(!empty($_POST['saleEndsAtDate']) && isset($_POST['saleEndsAtDate']) || !empty($_POST['saleEndsAtTime']) && isset($_POST['saleEndsAtTime'])){
            $endsAt = date('Y-m-d H:i:s', strtotime($_POST['saleEndsAtDate'].' '.$_POST['saleEndsAtTime']));
        }

        echo $title ."\r\n". $summary."\n".$description."\n".$weight."\n".$length."\n".$width."\n".$depth."\n".$sku."\n".$quantity."\n".$price."\n".$discount;

    }

?>
