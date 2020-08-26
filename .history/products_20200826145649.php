<?php 
    // number of displayed products per page
    $num_of_product_per_page = 8;
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
<div class="row">
    <?php foreach($products as $product): ?>
    
        <div class="card col-12 col-sm-7 col-md-4 col-lg-3 col-xl-2"> 
            <div class="hvrbox">
                <a href="./index.php?page=product&id=<?=$product['id']?>">
                    <?php $images = get_image($product['id']);
                    if($images): ?>
                        <img src="<?=$images[0]['image']?>" alt="<?=$images[0]['caption']?>"
                            class="card-img-top hvrbox-layer_bottom img-thumbnail">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/210x275" alt="placeholder-image"
                            class="card-img-top hvrbox-layer_bottom img-thumbnail">
                    <?php endif; ?>
                    <div class="hvrbox-layer_top hvrbox-layer_slideup">
                        <p class="hvrbox-text"><?php substr($product['summary'], 0, 80) . '...';?></p>
                    </div>
                </a>
            </div>
            
            <div class="card-body">
                <ul>
                    <li><a href="./index.php?page=product&id=<?=$product['id']?>"><span class="product-name"><?=$product['title']?></span></a></li>
                    <li><span class="price"><?=$product['price']?>&euro;</span></li>
                </ul>
            </div>

            <div class="card-btn">  
                <form action="./index.php?page=cart" method="post">
                    <input type="number" name="quantity" vakue="1" min="1" max="<?=$product['quanity']?>" placeholder="Količina" required>
                    <input type="hidden" name="idProduct" value="<?=$product['id']?>">
                    <input type="submit" value="Dodaj v košarico">
                </form>

            </div>

        </div>

    <?php endforeach; ?>
</div>

<?=template_footer()?>