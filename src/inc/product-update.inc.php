<?php
   

    $pdo = pdo_connect_mysql();
    if(isset($_POST['update'])){
        $id = $_POST['id'];
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
        
        
        if(empty($_POST['quantity']) || !isset($_POST['quantity'])){
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
            
        $data = [$title, $slug, $summary, $content, $sku, $quantity, $price, $discount, $weight, $length, $width, $depth, $publishedAt, $startsAt, $endsAt, $id];

        // print_r($data);

        // echo "<br/>";

        $dat = $_FILES;
        // print_r($dat);

        $query = "UPDATE product 
            SET title=?, slug=?, summary=?, content=?, sku=?, quantity=?, price=?, discount=?, weight=?, length=?, width=?, depth=?, publishedAt=?, startsAt=?, endsAt=? WHERE id=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute($data);

        $temp_file = $_FILES['image']['tmp_name'];
        // print_r($temp_file);
        // echo count($temp_file, COUNT_RECURSIVE);
        // echo empty($_FILES);
        if($temp_file[0] != "" && is_array($_FILES)){
            $stmt = $pdo->prepare("DELETE FROM product_image WHERE product_id = ?");
            $stmt->execute([$id]);

            $dat = $_FILES;
            $numOfimages = count($dat['image']['name']);

            for($i = 0; $i < $numOfimages; $i++){
                #echo $_FILES["image"]["tmp_name"][$i];
                $url = $_FILES['image']['name'][$i];
                $caption = slugify($title)."-".($i+1);
                image_upload($id, $url, $caption, $i);
            }
            header("Location: ./index.php?page=product-update&pid=$id&status=success");
            exit();
        }
        header("Location: ./index.php?page=product-update&pid=$id&status=success");
        exit();    
    } else {
        header("Location: ./index.php?page=product-update&pid=$id&status=err");
        exit;
    }
    // header("Location: ./index.php?page=product-update&pid=$id");
    // exit();    

?>
