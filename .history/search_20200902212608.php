<?php

include_once('./functions.php');
$pdo = pdo_connect_mysql();
$search_item = "";
if(!empty($_GET['search']) && isset($_GET['search_btn'])){

    $search_item = $_GET['search'];

    $stmt = $pdo->prepare("SELECT * FROM product p WHERE name LIKE '%".$search_item."%'");
    $stmt->execute([$search_item]);

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*
    foreach($products as $product){
        echo $product['name']."<br />\n";
    }*/

}
else{
    header("Location: ./#");
    exit();
}


    require_once './products-form.php';
?>




