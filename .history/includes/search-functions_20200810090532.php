<?php
    include_once("./dbh.inc.php");
    $pdo = pdo_connect_mysql();

    function get_city($city, $postalCode, $country_id){
        $query = "SELECT * FROM city WHERE country_id = ? AND lower(city) LIKE lower(?) AND postalCode = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$country_id, $city, $postalCode]);
    }
?>