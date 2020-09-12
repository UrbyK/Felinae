<?php 
    // number of displayed products per page
    $num_of_product_per_page = 100;
    // URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2 ...
    $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
    // select products by latest
    $stmt = $pdo->prepare('SELECT * FROM product ORDER BY publishedAt DESC LIMIT ?,?');
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
    <?php foreach($products as $product):
        $retail_price = retail_price($product['id']); 
        if($product['publishedAt'] <= date('Y-m-d H:i:s')):
        ?>
    
        <div class="card products-preview col-12 col-sm-7 col-md-4 col-lg-3 col-xl-2"> 
            <div class="hvrbox">
                <a href="./index.php?page=product&id=<?=$product['id']?>">
                    <?php $images = get_image($product['id']);
                    if($images): ?>
                        <img src="<?=$images[0]['image']?>" alt="<?=$images[0]['caption']?>"
                            class="card-img-top hvrbox-layer_bottom img-thumbnail">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/210x190" alt="placeholder-image"
                            class="card-img-top hvrbox-layer_bottom img-thumbnail">
                    <?php endif; ?>
                    <div class="hvrbox-layer_top hvrbox-layer_slideup">
                        <p class="hvrbox-text"><?php 
                                if(strlen($product['summary']) > 80){ 
                                    echo substr($product['summary'], 0, 80) . '...';
                                } else{
                                    echo $product['summary'];
                                }
                                ?>
                        </p>
                    </div>
                </a>
            </div>
            
            <div class="card-body products-preview-body">
                <ul>
                    <li><a href="./index.php?page=product&id=<?=$product['id']?>"><span class="product-name"><?=$product['title']?></span></a></li><br>
                        
                    <?php if($product['startsAt'] <= date('Y-m-d H:i:s') && date('Y-m-d H:i:s') <= $product['endsAt']): ?>
                        <li>

                            <del class="price old-price"><?=$product['price']?>&euro;</del>
                            <span class="discount">-<?=$product['discount']?>%</span><br/>
                            <span class="retail-price price"><?=$retail_price?>&euro;</span>
                        </li>
                        <li><?=date('j.n', strtotime($product['startsAt']))?> - <?=date('j.n', strtotime($product['endsAt']))?></li>
                    <?php else: ?>
                        <li><span class="price"><?=$retail_price?>&euro;</span></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="card-btn">  
                <?php if($product['quantity'] == 0): ?>
                    <span class="quantity-limit text-center text-danger">Zmanjkalo zalog!</span>
                <?php else: ?>
                    <span class="quantity-limit text-right"><?=$product['quantity']?>/<?=$product['sku']?></span>
                <?php endif; ?>
                <form action="./index.php?page=cart" method="post">
                    <input type="number" name="quantity" value="0" min="1" max="<?=$product['quantity']?>" placeholder="Količina" required>
                    <input type="hidden" name="product_id" value="<?=$product['id']?>">
                    <input type="submit" class="insert-cart" value="Dodaj v košarico" <?php if($product['quantity'] == 0){?> disabled <?php }?>>
                </form>

            </div>

        </div>

        <?php endif;
    endforeach; ?>
</div>

<?=template_footer()?>
