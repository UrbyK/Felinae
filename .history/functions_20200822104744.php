<?php
    include './includes/dbh.inc.php';

    include_once('./includes/search-functions.php');

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

?>