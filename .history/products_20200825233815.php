<?php 
    // number of displayed products per page
    $num_of_product_per_page = 2;
    // URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2 ...
    $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
    // select products by latest
    $stmt = $pdo->prepare('SELECT * FROM product ORDER BY id DESC LIMIT ?,?');
    // bindValue allows us to use integer in SQL, need it for LIMIT
    $stmt->bindValue(1, ($current_page - 1) * $num_of_product_per_page, PDO::PARAM_INT);
    $stmt->bindValue(2, $num_of_product_per_page, PDO::PARAM_INT);
    $stmt->execute();
    // fetch and return products as ARRAY
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // total amount of products
    $total_products = $pdo->query('SELECT * FROM product')->rowCount();

?>

<?=template_header('Products')?>

<div class="container">
    <div class="row">

    <?php foreach($products as $product): ?>
    
        <div class="card col-12 col-sm-7 col-md-4 col-lg-3 col-xl-2">
            <div class="hvrbox">
                <?php 
                $images = get_image($product['id']);
                 if($images): ?>
                    <img src="<?=$images['image'][0]?>" alt="<?=$images['caption'][0]?>" class="img-preview">
                 <?php else: ?>
                    <img src="https://via.placeholder.com/175x200" alt="">
            </div>
        </div>
    </div>

</div>

<?=template_footer()?>