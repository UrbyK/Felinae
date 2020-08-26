<?php 
    // check to make sure the id parameter is specified in the URL
    if (isset($_GET['id'])){
        // prepare statement and execute, prevents SQL injection
        $stmt = $pdo->prepare('SELECT * FROM products p INNER JOIN products_image pim 
        ON p.idproducts = pim.products_idproducts WHERE p.idproducts = ?');
        $stmt->execute([$_GET['id']]);
        // fetch from database, return as an array
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        // check if product exist (array not empty)
        if (!$product){
            // Simple error ro display id the id doen't exist/ is empty
            die('Product does not exist!');
        }

    } else {
        // simple error if ID wasn't specified
        die('Product ID was not specified!');
    }

?>

<?=template_header('Product')?>

<div class="row">
    <div class="col-12 col-sm-7 col-md-6 col-lg-4 col-xl-5 product">
        <img src="./<?=$product['image']?>" alt="<?=$product['name']?>">
    </div>
    <div class="col-12 col-sm-5 col-md-6 col-lg-8 col-xl-7 product-info">
        <h1><?=$product['name']?></h1>
        <span class="price">
            <?=$product['price']?> &euro;
        </span>

        <!-- Form for adding product to cart -->
        <form action="./index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['currentstock']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['idproducts']?>">
            <input type="submit" value="Dodaj v košarico">
        </form>
        
        <!-- Description of product -->
        <div class="description">
            <?=$product['description']?>
        </div>
    </div>

</div>


<?=template_footer()?>