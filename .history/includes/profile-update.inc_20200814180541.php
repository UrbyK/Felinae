<?php 
    session_start();
    include_once('./dbh.inc.php');
    include_once('./search-functions.php');

    try{
        $pdo = pdo_connect_mysql();

        $idaccounts = (int)$_SESSION['user_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $postalCode = $_POST['postalCode'];
        $city = $_POST['city'];
        $country = $_POST['country'];

        $stmt = get_city($pdo, $city, $postalCode, $country);
            $count = $stmt->rowCount();
            if($count < 1){
                $query = "INSERT INTO city(city, postalCode, country_id) VALUES(?,?,?)";
                $pdo->prepare($query)->execute([$city, $postalCode, $country]);
                $city_id = $pdo->lastInsertId();
            }
            elseif($count == 1){
                $city_id = $stmt->fetch(PDO::FETCH_COLUMN);
            }
            else{
                echo "Napaka pri vnosov podatkov!";
            }

        $query = "UPDATE account SET firstName = ?, lastName = ?, phonenNumber = ?, address = ?, city_id = ?
            WHERE id = ?";
        $pdo->prepare($query)->execute([$fname, $lname, $phoneNumber, $address, $city_id, $idaccounts]);

    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
    


?>