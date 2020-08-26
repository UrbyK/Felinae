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

?>