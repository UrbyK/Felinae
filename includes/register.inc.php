<?php
    $pdo = pdo_connect_mysql();

    if(isset($_POST['Submit'])){
        $username = $_SESSION['username'];
        $email = htmlspecialchars($_SESSION['email']);
        $password = $_SESSION['password'];
        $confirm_password = $_SESSION['confirm_password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone_number'];
        $address = $_POST['address'];
        $postalCode = $_POST['postal_code'];
        $city = $_POST['city'];
        $country = $_POST['country'];

        if(!empty($username) && !empty($email) && !empty($password) && 
        (strlen($password)>=8) && ($password==$confirm_password)){
            $password = password_hash($password, PASSWORD_DEFAULT);

            if(!empty($fname) && !empty($lname) && !empty($address) && 
            !empty($postalCode) && !empty($city) && !empty($country)){

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
                    header("refresh:5; url=../index.php?page=register-user");
                    exit();
                }
                                
                $query = "INSERT INTO account(username, email, password, firstName, lastName, phoneNumber, address, city_id) 
                        VALUES('?','?','?','?','?','?','?','?')";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$username, $email, $password, $fname, $lname, $phone, $address, $city_id]);

                unset($_SESSION['username', 'email', 'password', 'confirm_password']);
                

            }
            else {
                header('../index.php?page=register-personal');
                exit();
            }

        }
        else {
            header('../index.php?page=register-user');
            exit();
        }

    }

    else{
        header('../index.php?page=register-user');
        exit();
    }
    
?>