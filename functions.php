<?php
    include './src/inc/dbh.inc.php';

    include_once('./src/inc/search-functions.php');
    include_once('./src/inc/picture-upload.inc.php');
    require('./src/inc/xss_cleaner.inc.php');
    
    require_once('./products-form.php');
    require_once('./send-mail.php');
    include_once('./pagination.php');

    /*function template_products($products) {
        require_once('./products-form.php');
    }*/

    /*Template for header*/
    function template_header($title) {
        include_once('./header.php');
    }
    /*Teamplate for footer*/
    function template_footer() {
        include_once './footer.php';
    }
    
    /* If user is logged in */
    function user_login_status() {
        if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) 
                && isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }
        /* Check if user is admin */
    function is_admin() {
        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
            return true;
        }
    }

    /* Returns all countries */
    function countries() {
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare("SELECT * FROM country");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /* Converts a string to slug */
    function slugify($string) {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }

    /* Get all images based on product id */
    function get_image($product_id) {
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare("SELECT * FROM product_image WHERE product_id = ?");
        $stmt->execute([$product_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /* Gets retail price depending if the selected item is on sale or not */
    function retail_price($product_id) {
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare("SELECT * FROM product WHERE ID = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch();

        if($product['startsAt'] <= date('Y-m-d H:i:s') && date('Y-m-d H:i:s') <= $product['endsAt']){
            $retail_price = round($product['price']-($product['price']*($product['discount']/100)), 2);
        }
        else{
            $retail_price = $product['price'];
        }

        return $retail_price;

    }

    /* Get all product reviews/comments. Newest to oldest */
    function get_review_by_procuct($product_id) {
        $pdo = pdo_connect_mysql();
        $query = "SELECT * FROM review WHERE product_id = ? ORDER BY id DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$product_id]);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reviews;
    }

    /* Get username based on account ID */
    function get_username($account_id) {
        $pdo = pdo_connect_mysql();
        $query = "SELECT username FROM account WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$account_id]);
        $user = $stmt->fetch();
        return $user;
    }

    /* Returns count of number of items in the cart from Session['CART]*/
    function items_in_cart() {
        $items = $_SESSION['cart'];
        $num_of_items = 0;
        foreach($items as $item) {
            $num_of_items += $item[1];
        }
        return $num_of_items;
    }

    /* Returns average rating for an item */
    function average_rating($product_id) {
        $pdo = pdo_connect_mysql();
        $query  = "SELECT rating FROM review WHERE product_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$product_id]);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $i=0;
        $sum = 0;
        $average = 0;
        foreach($items as $item) {
            if($item['rating'] > 0){
                
                $i++;
                $sum += $item['rating'];
            }        
        }
        if($i!=0) $average = $sum / $i;
        return $average;
    }

    /*
    function all_products(){
        $pdo = pdo_connect_mysql();
        $query = "SELECT * FROM product WHERE title LIKE '%?%'";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['test']);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }   
    */
    /* Returns the latest 6 prododucts */
    function new_products() {
        $pdo = pdo_connect_mysql();
        $query ="SELECT * FROM product ORDER BY publishedAt DESC LIMIT 6";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /* Return the 6 best rated products  */
    function best_rated() {
        $pdo = pdo_connect_mysql();
        $query ="SELECT avg(rating), product_id FROM review GROUP BY product_id ORDER BY avg(rating) DESC LIMIT 6";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /* Return data for a specific product */
    function get_product($id) {
        $pdo = pdo_connect_mysql();
        $query ="SELECT * FROM product WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /* Check if the item i */
    function on_sale() {
        $pdo = pdo_connect_mysql();
        $query ="SELECT * FROM product WHERE ? BETWEEN startsAt AND endsAt;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([date('Y-m-d H:i:s')]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    /* Returns all catagories */
    function all_catagory() {
        $pdo = pdo_connect_mysql();
        $query = "SELECT * FROM category
                    ORDER BY CASE WHEN parent_id = 0 THEN id ELSE parent_id END ASC,
                    CASE WHEN parent_id = 0 THEN 0 ELSE id END ASC;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $cat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cat;
    }

    function discountPrice($price, $discount) {
        return ($price - ($price * ($discount/100)));
    }

    function get_time($myvalue) {
        $datetime = new DateTime($myvalue);
        $time = $datetime->format('H:i');
        return $time;
    }

    function get_date($myvalue) {
        $datetime = new DateTime($myvalue);
        $date = $datetime->format('Y-m-d');
        return $date;
    }
?>