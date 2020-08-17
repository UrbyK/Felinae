<?php
    function get_city($pdo, $city, $postalCode, $country_id){

        $query = "SELECT * FROM city WHERE country_id = ? AND lower(city) LIKE lower(?) AND postalCode = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$country_id, $city, $postalCode]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
?>