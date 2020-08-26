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
                 if($images): print_r($images);?>
                    <img src="" alt="<?=$images[0]['caption']?>" class="img-preview">
                 <?php else: ?>
                    <img src="https://via.placeholder.com/180x200" alt="placeholder-image" class="img-preview">
                 <?php endif; ?>
            </div>
        </div>

    <?php endforeach; ?>
    </div>

</div>

<div class="btn-container">

    <?php if ($current_page > 2): ?>
    <div class="nav-btn btn">
        <a href="./index.php?page=products&p=<?=1?>"><i class="fa fa-angle-double-left fa-2x"></i></a>
    </div>
    <?php endif; ?>

    <?php if ($current_page > 1): ?>
    <div class="nav-btn btn">
        <a href="./index.php?page=products&p=<?=$current_page-1?>"><i class="fa fa-chevron-circle-left fa-2x"></i></a>
    </div>
    <?php endif; ?>

    <?php if ($total_products > ($current_page * $num_of_product_per_page) - $num_of_product_per_page + count($products)): ?>
    <div class="nav-btn btn">
        <a href="./index.php?page=products&p=<?=$current_page+1?>"><i class="fa fa-chevron-circle-right fa-2x"></i></a>
    </div>
    <?php endif; ?>
    
    <?php if ($total_products > ($current_page * $num_of_product_per_page) - $num_of_product_per_page + count($products) && $current_page < (ceil($total_products / $num_of_product_per_page)-1) ): ?>
    <div class="nav-btn btn">
        <a href="./index.php?page=products&p=<?=ceil($total_products / $num_of_product_per_page)?>"><i class="fa fa-angle-double-right fa-2x"></i></a>
    </div>
    <?php endif; ?>

</div> <!-- btn-container -->

<?=template_footer()?>