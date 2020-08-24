<?php

    include_once('./picture-upload-inc.php');

    $pdo = pdo_connect_mysql();
    if(isset($_POST['Submit'])){
        $title = $_POST['title'];
        $summary = $_POST['summary'];
        $content = $_POST['description'];
        
        $slug = slugify($title);

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
            
        $startsAt=null;
        $endsAt=null;
        if(!empty($_POST['saleStartsAtDate']) && isset($_POST['saleStartsAtDate']) || !empty($_POST['saleStartsAtTime']) && isset($_POST['saleStartsAtTime'])){
            $startsAt = date('Y-m-d H:i:s', strtotime($_POST['saleStartsAtDate'].' '.$_POST['saleStartsAtTime']));
        }

        if(!empty($_POST['saleEndsAtDate']) && isset($_POST['saleEndsAtDate']) || !empty($_POST['saleEndsAtTime']) && isset($_POST['saleEndsAtTime'])){
            $endsAt = date('Y-m-d H:i:s', strtotime($_POST['saleEndsAtDate'].' '.$_POST['saleEndsAtTime']));
        }
            
        $data = [$title, $slug, $summary, $content, $sku, $quantity, $price, $discount, $weight, $length, $width, $depth, $publishedAt, $startsAt, $endsAt];

       /* $query = "INSERT INTO product(title, slug, summary, content, sku, quantity, price, discount, weight, length, width, depth, publishedAt, startsAt, endsAt)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute($data);*/
        if(is_array($_FILES)){
            #$last_id = $pdo->la$dat = $_FILES;
            echo "neki\n\r";
            $dat = $_FILES;

            $numOfimages = count($dat['image']['name']);

            echo $numOfimages;
            for($i = 0; $i < $numOfimages; $i++){
                $caption = slugify($title)."-".($i+1);
                image_upload()
            }
                
        }    
        #header('Location: ./index.php?page=product-add');
        #exit();
    }

?>
