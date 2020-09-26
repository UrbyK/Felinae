<?php 
    // number of displayed products per page
    $num_of_product_per_page = 12;
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

    #$starts_from = ($current_page-1)*$num_of_product_per_page;

    $total_pages = ceil($total_products/$num_of_product_per_page);
?>

<?=template_header('Products')?>
<?=template_products($products)?>

<div class="container">
    <div class="row">
        <div class="col-12" style="text-align:center; display:flex; justify-content:center;">
            <nav aria-label="navigation">
                <ul class="pagination">
                    
                <?php if($total_pages>=1 && $current_page <= $total_pages):

                    if($current_page>=2):?>
                        <li class="page-item"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=$current_page-1?>"> Nazaj </a></li>
                    <?php endif;

                    if($current_page == 1): ?>
                        <li class="page-item active"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=1?>"> 1 </a></li>
                    <?php else: ?>
                        <li class="page-item"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=1?>"> 1 </a></li>
                    <?php endif;

                    $i = max(2, $current_page-2);
                    if($i > 2): ?>
                        <li class="page-item disabled"><a class="page-link" href="#"> ... </a></li>
                    <?php endif;

                    for(; $i<min($current_page+3, $total_pages); $i++): 
                        if($i == $current_page): ?>
                            <li class="page-item active"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=$i?>"><?=$i?></a></li>
                        <?php else: ?>
                            <li class="page-item"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=$i?>"><?=$i?></a></li>
                        <?php endif; 
                    endfor;

                    if($i != $total_pages): ?>
                        <li class="page-item disabled"><a class="page-link" href="#"> ... </a></li>
                    <?php endif;

                    if($current_page == $total_pages): ?>
                        <li class="page-item active"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=$total_pages?>"><?=$total_pages?></a></li>
                    <?php else: ?>
                        <li class="page-item"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=$total_pages?>"><?=$total_pages?></a></li>
                    <?php endif;
                    
                    if($current_page < $total_pages): ?>
                        <li class="page-item"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=$current_page+1?>"> Naprej </a></li>
                    <?php endif; ?>
                 <?php endif; ?>   
                </ul><!-- pagination -->
            </nav><!-- navigation -->
        </div> <!-- col-12 pagnation -->
    </div><!-- row -->
</div><!-- container -->

<?=template_footer()?>