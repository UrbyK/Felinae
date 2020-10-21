
<?=template_header('Home')?>
<div class="wrapper">
<h1>Novi izdelki</h1>
<hr class="wrapper-devider">
    <div class="wrapper-inner">
        <?=template_products(new_products())?>
    </div>
</div>

<?php if(on_sale()): ?>
<div class="wrapper">
<h1>Razprodaja</h1>
<hr class="wrapper-devider">
    <div class="wrapper-inner">
        <?=template_products(on_sale())?>
    </div>
</div>
<?php endif;?>


<div class="wrapper">
<h1>Najbolj ocenjeni izdelki</h1>
<hr class="wrapper-devider">
    <div class="wrapper-inner">
        <?php 
            $products_array = array();
            foreach(best_rated() as $item): 
                $products_array = array_merge($products_array, get_product($item['product_id']));
            endforeach; 
            template_products($products_array);
        ?>
    </div>
</div>

<?=template_footer()?>