<?php
    function pagination($current_page, $total_pages){ ?>
        <div class="container">
            <div class="row">
                <div class="col-12" style="text-align:center; display:flex; justify-content:center;">
                    <nav aria-label="navigation">
                        <ul class="pagination">
                            <?php if($current_page>=2):?>
                                <li class="page-item"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=$current_page-1?>"> Nazaj </a></li>

                            <?php endif;
                            for($i=1; $i<=$total_pages; $i++):
                                if($i == $current_page): ?>
                                    <li class="page-item active"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=$i?>"><?=$i?></a></li>
                                <?php else: ?>
                                    <li class="page-item"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=$i?>"><?=$i?></a></li>
                                <?php endif; 
                            endfor; 
                            
                            if($current_page < $total_pages): ?>
                                <li class="page-item"><a class="page-link" href="./index.php?page=<?=$page?>&p=<?=$current_page+1?>"> Naprej </a></li>
                            <?php endif; ?>
                        </ul><!-- pagination -->
                    </nav><!-- navigation -->
                </div> <!-- col-12 pagnation -->
            </div><!-- row -->
        </div><!-- container -->
    
<?php } ?>