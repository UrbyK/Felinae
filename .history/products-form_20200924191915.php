 <?php function template_products($products){ ?>
    <div class="row">
        <?php foreach($products as $product):
            $retail_price = retail_price($product['id']); 
            if($product['publishedAt'] <= date('Y-m-d H:i:s')): ?>
        
            <div class="card products-preview col-12 col-sm-7 col-md-4 col-lg-3 col-xl-2"> 
                <div class="col-12">
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
                            </div><!-- hvrbox-layer_top hvrbox-layer_slideup -->
                        </a>
                    </div><!-- hvrbox -->
                    
                    <div class="card-body products-preview-body">
                        <ul>
                        <?php for($i=0; $i<5; $i++):
                            if($i<average_rating($product['id'])): ?>
                                <span class="fa fa-star checked"></span>
                            <?php else: ?>
                                <span class="fa fa-star"></span>
                            <?php endif;
                        endfor; ?>
                    
                            <li><a href="./index.php?page=product&id=<?=$product['id']?>"><span class="product-name"><?=$product['title']?></span></a></li><br>
                                
                            <?php if($product['startsAt'] <= date('Y-m-d H:i:s') && date('Y-m-d H:i:s') <= $product['endsAt']): ?>
                                <li>

                                    <del class="price old-price"><?=$product['price']?>&euro;</del>
                                    <span class="discount">-<?=$product['discount']?>%</span><br/>
                                    <span class="retail-price price"><?=$retail_price?>&euro;</span>
                                </li>
                                <li class="sales-date"><?=date('j.n', strtotime($product['startsAt']))?> - <?=date('j.n', strtotime($product['endsAt']))?></li>
                            <?php else: ?>
                                <li><span class="price"><?=$retail_price?>&euro;</span></li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- card-body products-preview-body -->

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
                    </div><!-- card-btn -->
                </div><!-- col-12 -->
            </div><!-- card products-preview col-12 col-sm-7 col-md-4 col-lg-3 col-xl-2 -->

            <?php endif;
        endforeach; ?>
    </div><!-- row -->

<?php } ?>