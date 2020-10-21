<?php 
    // check to make sure the id parameter is specified in the URL
    if (isset($_GET['id'])){
        $pid=$_GET['id'];
        // prepare statement and execute, prevents SQL injection
        $stmt = $pdo->prepare('SELECT * FROM product WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        // fetch from database, return as an array
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        // check if product exist (array not empty)
        $retail_price = retail_price($_GET['id']);
        $images = get_image($_GET['id']);
        if (!$product){
            // Simple error ro display id the id doen't exist/ is empty

            die('Izdelek ne obstaja!');
        }

    } else {
        // simple error if ID wasn't specified
        die('ID izdelka ni bil definiran');
    }

?>

<?=template_header('Product')?>
<?php if(user_login_status() && is_admin()): ?>
<div clas="row">
    <a href="./index.php?page=product-update&pid=<?=$pid?>" class="btn btn-primary float-right" role="button">Uredi</a>
    
    <!--<form method="GET" action="./index.php?page=product-update&pid=<?=$pid?>">
        <input type="submit" value="Uredi" class="btn btn-secondary" >
    </form>-->
</div>
<?php endif;?>

<div class="row"> 
    <div class="col-12 col-sm-5 col-md-6 col-lg-5 col-xl-4">
        <div class="col-12">
            <div class="image-top">
                <div class=" product-picture">
                    <ol class="carousel-indicators">
                        <?php for($i = 0; $i < count($images); $i++): 
                            if($i == 0): ?>
                                <li data-target="#carouselIndicators" data-slide-to="<?=$i?>" class="active"></li>
                            <?php else: ?>
                                <li data-target="#carouselIndicators" data-slide-to="<?=$i?>"></li>
                        <?php endif;
                        endfor; ?>
                    </ol>
                    
                    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php if($images):
                                foreach($images as $key => $image): 
                                    if($key === array_key_first($images)):?>
                                    <div class="carousel-item active img-magnifier-container">
                                    <?php else: ?>
                                    <div class="carousel-item">
                                    <?php endif; ?>
                                        <img id="image-<?=$image['id']?>" class="d-block w-100 h-100" src="<?=$image['image']?>" alt="<?=$image['caption']?>">
                                    </div><!-- carousel-item -->
                                <?php endforeach;
                                else: ?>
                                <img src="https://via.placeholder.com/450x500" alt="placeholder-image"
                                        class="d-block w-100">
                                <?php endif; ?>
                        </div> <!-- carousel-inner -->
                        
                    </div><!-- carousel slide -->
                    <a class="carousel-control-prev carousel-control" href="#carouselIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next carousel-control" href="#carouselIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div><!-- product-picture -->
            </div><!-- image-top -->
        </div><!-- col-12 -->
    </div><!-- col-12 col-sm-5 col-md-6 col-lg-5 col-xl-4 -->

    <div class="col-12 col-sm-7 col-md-6 col-lg-7 col-xl-8 product-info">
        <div class="col-12">
            <h1><?=$product['title']?></h1><br/>
            <div class="product-price">
                <?php if($product['startsAt'] <= date('Y-m-d H:i:s') && date('Y-m-d H:i:s') <= $product['endsAt']): ?>
                    
                <ul>
                    <li class="sales-date"><?=date('j.n', strtotime($product['startsAt']))?> - <?=date('j.n', strtotime($product['endsAt']))?></li>
                    <li></li>

                    <li class="price"><span class="old-price"><?=$product['price']?>&euro;</span>
                        <span class="discount">-<?=$product['discount']?>%</span>
                    </li>
                    <li class="retail-price price"><?=$retail_price?>&euro;</li>
                </ul>
                <?php else: ?>
                <span class="price"><?=$retail_price?>&euro;</span>
                <?php endif; ?>
            </div><!-- product-price -->
            <!-- Form for adding product to cart -->
            <div class="card-btn">
                <form action="./index.php?page=cart" method="post">
                <?php if($product['quantity'] == 0): ?>
                    <span class="quantity-limit text-danger">Zmanjkalo zalog!</span>
                <?php else: ?>
                    <span class="quantity-limit "><?=$product['quantity']?>/<?=$product['sku']?></span>
                <?php endif; ?>
                    <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Količina" required>
                    <input type="hidden" name="product_id" value="<?=$product['id']?>">
                    <input type="submit" class="insert-cart" value="Dodaj v košarico" <?php if($product['quantity'] == 0){?> disabled <?php }?>>
                </form>
            </div><!-- card-btn -->

            <!-- Description of product -->
            <div class="container">
                <h2 class="segmant-name">Povzetek</h2>
                <hr class="devider">
                <div class="summary whitespace"><?=$product['summary']?></div><!-- summary -->
                    <p>                
                        <ul class="measurements">
                            <?php if(!empty($product['weight'])): ?><li>Teža: <?=$product['weight']?>kg</li><?php endif; ?>
                            <?php if(!empty($product['length'])): ?><li>Dolžina: <?=$product['length']?>cm</li><?php endif; ?>
                            <?php if(!empty($product['width'])): ?><li>Širina: <?=$product['width']?>cm</li><?php endif; ?>
                            <?php if(!empty($product['depth'])): ?><li>Višina: <?=$product['depth']?>cm</li><?php endif; ?>
                        </ul>
                    </p>
            </div><!-- container -->
            
            <br>

            <div class="container">
                <h2 class="segmant-name">Opis</h2>
                <hr class="devider">
                <div class="description whitespace"><?=$product['content']?></div>
            </div><!-- container -->
        </div><!-- col-12 -->
    </div><!-- col-12 col-sm-7 col-md-6 col-lg-7 col-xl-8 product-info-->

</div><!-- row -->


<h1>Komentarji</h1>
<hr class="page-division"/>
<div class="row">
    <?php if(user_login_status()): ?>
    <div class="col-12">
        <div class="form-group shadow-textarea">
            <form method="post" action="./index.php?page=src/inc/review-insert.inc">
                <input type="hidden" name="product_id" id="product_id" value="<?=$_GET['id']?>">
                <input type="hidden" name="user_id" id="user_id" value="<?=$_SESSION['user_id']?>">
                <div class="rating">
                    <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                    <label for="star5">☆</label>
                    <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
                    <label for="star4">☆</label>
                    <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
                    <label for="star3">☆</label>
                    <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
                    <label for="star2">☆</label>
                    <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
                    <label for="star1">☆</label>
                    <div class="clear"></div>
                </div><!-- rating -->
                <div class="form-group basic-textarea rounded-corners">
                    <textarea class="form-control" name="comment" id="exampleFormControlTextarea345" rows="3" placeholder="Napišite komentar..." maxlength="255" onkeyup="countChar(this)" required></textarea>
                    <span id="charNum" class="text-right">Na voljo je še: 255 znakov.</span>
                    <div class="col-md-3 offset-md-2 float-right float-sm-right form-group">
                        <button type="submit" name="Submit" class="btn btn-primary btn-submit" id="comment_ins">Dodaj</button>
                    </div><!-- col-md-3 offset-md-2 float-right float-sm-right form-group -->
                </div><!-- form-group basic-textarea rounded-corners -->

            </form>
        </div><!-- form-group shadow-textarea -->
    </div><!-- col-12 -->
    <?php else: ?>
    <div class="col-12 col-sm-6 card">
        <div class="card-body">
            Za možnost komentiranja se prosim vpišite v svoj račun.
        </div>
    </div>
    <?php endif; ?>
</div><!-- row -->

<div class="row">

    <?php $product_id = $_GET['id'];
    $comments = get_review_by_procuct($product_id);
    foreach($comments as $comment): ?>
    <div class="col-12 col-md-6 card">
        <div class="card-body">
            <div class="review-meta">
                <?=get_username($comment['account_id'])[0]?> @ <?=$comment['createdAt']?>   
                <div class="comment-meta">
                    <?php for($i=0; $i<5; $i++):
                        if($i<$comment['rating']): ?>
                            <span class="fa fa-star checked"></span>
                        <?php else: ?>
                            <span class="fa fa-star"></span>
                        <?php endif;
                     endfor; ?>
                </div><!-- comment-meta -->
                <hr>
            </div><!-- review-meta -->
            <div class="review-content"><?=$comment['comment']?></div>
        </div><!-- card-body -->
    </div><!-- col-12 col-md-6 card -->
    <?php endforeach; ?>
</div><!-- row -->

<?=template_footer()?>

<script>
    function countChar(val) {
        var len = val.value.length;
        if (len >= 256) {
            val.value = val.value.substring(0, 255);
        } else {
            $('#charNum').text('Na voljo je še: ' + (255 - len) + ' znakov.');
        }
    };
</script>

<script>
    function magnify(imgID, zoom) {
    var img, glass, w, h, bw;
    img = document.getElementById(imgID);
    console.log(img);
    /* Create magnifier glass: */
    glass = document.createElement("DIV");
    glass.setAttribute("class", "img-magnifier-glass");
  
    /* Insert magnifier glass: */
    img.parentElement.insertBefore(glass, img);
  
    /* Set background properties for the magnifier glass: */
    glass.style.backgroundImage = "url('" + img.src + "')";
    glass.style.backgroundRepeat = "no-repeat";
    glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
    bw = 3;
    w = glass.offsetWidth / 2;
    h = glass.offsetHeight / 2;
  
    /* Execute a function when someone moves the magnifier glass over the image: */
    glass.addEventListener("mousemove", moveMagnifier);
    img.addEventListener("mousemove", moveMagnifier);
  
    /*and also for touch screens:*/
    glass.addEventListener("touchmove", moveMagnifier);
    img.addEventListener("touchmove", moveMagnifier);
    function moveMagnifier(e) {
      var pos, x, y;
      /* Prevent any other actions that may occur when moving over the image */
      e.preventDefault();
      /* Get the cursor's x and y positions: */
      pos = getCursorPos(e);
      x = pos.x;
      y = pos.y;
      /* Prevent the magnifier glass from being positioned outside the image: */
      if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
      if (x < w / zoom) {x = w / zoom;}
      if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
      if (y < h / zoom) {y = h / zoom;}
      /* Set the position of the magnifier glass: */
      glass.style.left = (x - w) + "px";
      glass.style.top = (y - h) + "px";
      /* Display what the magnifier glass "sees": */
      glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
    }
  
    function getCursorPos(e) {
      var a, x = 0, y = 0;
      e = e || window.event;
      /* Get the x and y positions of the image: */
      a = img.getBoundingClientRect();
      /* Calculate the cursor's x and y coordinates, relative to the image: */
      x = e.pageX - a.left;
      y = e.pageY - a.top;
      /* Consider any page scrolling: */
      x = x - window.pageXOffset;
      y = y - window.pageYOffset;
      return {x : x, y : y};
    }
  }

</script>
<script>
  $('#carouselIndicators').on('slid.bs.carousel', function () {
    var activeEle = document.querySelector('.carousel-item.active img');
        console.log(activeEle.getAttribute('id'));
        magnify(activeEle, 2);
    })
    var activeEle = document.querySelector('.carousel-item.active img');
        console.log(activeEle.getAttribute('id'));

        magnify(activeEle,3);

</script>