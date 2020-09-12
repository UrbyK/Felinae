<?php
    $stmt = $pdo->prepare('SELECT * FROM product ORDER BY publishedAt DESC LIMIT ?,?');
    // bindValue allows us to use integer in SQL, need it for LIMIT
    $stmt->execute();
    // fetch and return products as ARRAY
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?=template_header("Search")?>

<?=products_form($products)?>

