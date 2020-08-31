<?php
    $qun_sum = 0;
    // If the user clicked the add to cart button on the product page we can check for the form data
    if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
        // Set the post variables so we easily identify them, also make sure they are integer
        $product_id = (int)$_POST['product_id'];
        $quantity = (int)$_POST['quantity'];
        // Prepare the SQL statement, we basically are checking if the product exists in our databaser
        $stmt = $pdo->prepare('SELECT * FROM products WHERE idproducts = ?');
        $stmt->execute([$_POST['product_id']]);
        // Fetch the product from the database and return the result as an Array
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        // Check if the product exists (array is not empty)
        if ($product && $quantity > 0) {
            // Product exists in database, now we can create/update the session variable for the cart
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    // Product exists in cart so just update the quanity
                    $_SESSION['cart'][$product_id] += $quantity;
                } else {
                    // Product is not in cart so add it
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } else {
                // There are no products in cart, this will add the first product to cart
                $_SESSION['cart'] = array($product_id => $quantity);
            }
        }
        // Prevent form resubmission...
        header('Location: ./index.php?page=cart');
        exit();
    }

    // remove products from cart, checks for URL param "remove", which is the product id
    if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
        // Remove the product from the shopping cart
        unset($_SESSION['cart'][$_GET['remove']]);
    }

    // update quantities in cart when user click the "Update" button
    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
        // loops through post data, so that we can update cart quantities
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                // check and validation
                if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                    // update quantity
                    $_SESSION['cart'][$id] = $quantity;
                }
            }

        }
        // prevent resubmission
        header('location: ./index.php?page=cart');
        exit();
    }

    /*// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
    if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        header('Location: ./index.php?page=placeorder');
        exit();
    }
*/
    // check session variables for products in cart
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart']: array();
    $products = array();
    $subtotal = 0.00;
    // if there are products in cart
    if ($products_in_cart) {
        // there are priducts in the cart, we need to select those products from the DBh
        // products in the cart array to question mark string array, we need the SQL statement to inculed in (?,?,?,...)
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $pdo->prepare('SELECT * FROM products p INNER JOIN products_image pim 
        ON p.idproducts = pim.products_idproducts WHERE idproducts IN ('. $array_to_question_marks .')');
        // we only need array keys, keys are id's of the products
        $stmt->execute(array_keys($products_in_cart));
        // fetch products from DB, return results as an ARRAY
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // calculate subtotal
        foreach ($products as $product) {
            $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['idproducts']];
        }
    }

?>
