<?php

include_once('./functions.php');
$pdo = pdo_connect_mysql();
$search_item = "";
if(!empty($_GET['search']) && isset($_GET['search_btn'])){

    $search_item = $_GET['search'];

    $stmt = $pdo->prepare("SELECT * FROM product p WHERE title LIKE '%".$search_item."%' ORDER BY publishedAt DESC");
    $stmt->execute([$search_item]);

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*
    foreach($products as $product){
        echo $product['name']."<br />\n";
    }*/

}
else{
    #header("Location: ./#");
    #exit();
}



    template_header("Search");
    template_products($products)
?>






