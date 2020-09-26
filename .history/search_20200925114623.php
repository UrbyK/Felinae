<?php

    include_once('./functions.php');
    $pdo = pdo_connect_mysql();
    $search_item = "";
    if(!empty($_GET['search']) && isset($_GET['search_btn'])){

        $search_item = $_GET['search'];

        /*$stmt = $pdo->prepare("SELECT * FROM product p WHERE title LIKE '%".$search_item."%' ORDER BY publishedAt DESC");
        $stmt->execute([$search_item]);

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/

        // number of displayed products per page
        $num_of_product_per_page = 12;
        // URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2 ...
        $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
        // select products by latest
        $stmt = $pdo->prepare("SELECT * FROM product WHERE title LIKE %?% ORDER BY publishedAt DESC LIMIT ?,?");
        // bindValue allows us to use integer in SQL, need it for LIMIT
        $stmt->bindValue(1, $search_item, PDO::PARAM_STR);
        $stmt->bindValue(2, ($current_page - 1) * $num_of_product_per_page, PDO::PARAM_INT);
        $stmt->bindValue(3, $num_of_product_per_page, PDO::PARAM_INT);
        $stmt->execute();
        // fetch and return products as ARRAY
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // total amount of products
        $total_products = $pdo->query("SELECT * FROM product WHERE title LIKE '%".$search_item."%'")->rowCount();

        #$starts_from = ($current_page-1)*$num_of_product_per_page;

        $total_pages = ceil($total_products/$num_of_product_per_page);


    }
    else{
        header("Location: ./#");
        exit();
    }


        template_header("Search");
        template_products($products);

        template_footer();
?>
