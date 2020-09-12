<?php

        $search = $_GET['search'];
        echo $search;

     /*  $num_of_product_per_page = 36;
       // URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2 ...
       $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
       // select products by latest
       $stmt = $pdo->prepare("SELECT * FROM product WHERE title LIKE '%".$search."%' ORDER BY publishedAt DESC LIMIT ?,?");
       // bindValue allows us to use integer in SQL, need it for LIMIT
       $stmt->bindValue(1, $search, PDO::PARAM_STR);
       $stmt->bindValue(2, ($current_page - 1) * $num_of_product_per_page, PDO::PARAM_INT);
       $stmt->bindValue(3, $num_of_product_per_page, PDO::PARAM_INT);
       $stmt->execute();
       // fetch and return products as ARRAY
       $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
       // total amount of products
       $total_products = $pdo->query("SELECT * FROM product WHERE title LIKE '%".$search."%'")->rowCount();

       print_r($products);*/
       $pdo = pdo_connect_mysql();
       $search_item = "";
       if(!empty($_GET['search']) && isset($_GET['search_btn'])){
   
           $search_item = $_GET['search'];
   
           $stmt = $pdo->prepare("SELECT * FROM products p INNER JOIN products_image pim 
           ON p.idproducts = pim.products_idproducts WHERE name LIKE '%".$search_item."%'");
           $stmt->execute([$search_item]);
   
           $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
       
    }

    require_once './products-form.php';
?>




