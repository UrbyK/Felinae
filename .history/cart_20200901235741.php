<?php
    include './includes/cart.inc.php';
?>

<?=template_header('Cart')?>
<div class="container">
<div class="cart content-wrapper">
    <h1>Voziček</h1>
    <form action="./index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Izdelek</td>
                    <td>Cena</td>
                    <td>Količina</td>
                    <td>Skupaj</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td class="cart-empty" colspan="5" style="text-align: center;">Ni izdelkov v košarici.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img"> 	

                        <a href="./index.php?page=product&id=<?=$product['id']?>">
                        <?php $images = get_image($product['id']);
                            if($images): ?>
                                <img src="<?=$images[0]['image']?>" alt="<?=$images[0]['caption']?>"
                                    class="card-img-top hvrbox-layer_bottom img-thumbnail">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/210x190" alt="placeholder-image"
                                    class="card-img-top hvrbox-layer_bottom img-thumbnail">
                            <?php endif; ?>
                        </a>
                    </td>
                    <td>
                        <a href="./index.php?page=product&id=<?=$product['id']?>"><?=$product['title']?></a>
                        <br>
                        <a href="./index.php?page=cart&remove=<?=$product['id']?>" class="remove">Odstrani</a>
                    </td>
                    <td class="price"><?=retail_price($product['id'])?> &euro;</td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price"><?=$product['price'] * $products_in_cart[$product['id']]?> &euro;</td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Skupna cena:</span>
            <span class="price"><?=$subtotal?> &euro;</span>
        </div>
        <div class="buttons">
            <input type="submit" value="Posodobi" name="update">
            <input type="submit" value="naroči" name="placeorder">
        </div>
    </form>
</div>
</div>
<?=template_footer()?>