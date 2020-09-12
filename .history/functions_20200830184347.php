<?php
    include './includes/dbh.inc.php';

    include_once('./includes/search-functions.php');
    include_once('./includes/picture-upload.inc.php');

    function template_header($title){
        include_once('./header.php');
    }

    function template_footer(){
        include_once('./footer.php');
    }

    function user_login_status(){
        if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']) 
                && isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    function is_admin(){
        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
            return true;
        }
    }

    function countries(){
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare("SELECT * FROM country");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function slugify($string){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }

    function get_image($product_id){
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare("SELECT * FROM product_image WHERE product_id = ?");
        $stmt->execute([$product_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function retail_price($product_id){
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

    function get_review_by_procuct($product_id){
        $pdo = pdo_connect_mysql();
        $query = "SELECT * FROM review WHERE product_id = ? ORDER BY desc";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$product_id]);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reviews;
    }

    function get_username($account_id){
        $pdo = pdo_connect_mysql();
        $query = "SELECT username FROM account WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$account_id]);
        $user = $stmt->fetch();
        return $user;
    }

?>