<?php
    $pdo = pdo_connect_mysql();

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("Location: ./index.php");
    }

    else {
        $username = xss_cleaner($_POST['username']);
        $email = xss_cleaner(htmlspecialchars($_POST['email']));
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $fname = xss_cleaner($_POST['fname']);
        $lname = xss_cleaner($_POST['lname']);
        $phone = xss_cleaner($_POST['phoneNumber']);
        $address = xss_cleaner($_POST['address']);
        $postalCode = $_POST['postalCode'];
        $city = xss_cleaner($_POST['city']);
        $country = $_POST['country'];
        $city_id=null;
        $regex = '/^[[:alnum:][:punct:]]+$/';

        if(!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password) && !empty($fname) && !empty($lname) && !empty($address) && !empty($postalCode) && !empty($city) && !empty($country)) {

            $stmt = $pdo->prepare("SELECT * FROM account WHERE username = ?");
            $row = $stmt->execute([$username]);
            $num = $stmt->rowCount();

            if(strlen($username) < 4 || $num>=1){
                header("Location: ./index.php?page=register&status=uname");
                exit;
            } else {

                $stmt = $pdo->prepare("SELECT * FROM account WHERE email = ?");
                $row = $stmt->execute([$email]);
                $num = $stmt->rowCount();

                if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $num >= 1){
                    header("Location: ./index.php?page=register&status=email");
                    exit;
                } else {

                    if(strlen($password) < 8 || !preg_match($regex, $password)){
                        header("Location: ./index.php?page=register&status=pass");
                        exit;
                    } else {

                        if($password != $confirm_password){
                            header("Location: ./index.php?page=register&status=conf-pass");
                            exit;
                        } else {
                            $password = password_hash($password, PASSWORD_DEFAULT);
                            /*$stmt = get_city($pdo, $city, $postalCode, $country);
                            $count = $stmt->rowCount();

                            if($count < 1) {
                                $query = "INSERT INTO city(city, postalCode, country_id) VALUES(?,?,?)";
                                $pdo->prepare($query)->execute([$city, $postalCode, $country]);
                                $city_id = $pdo->lastInsertId();
                            } elseif($count == 1) {
                                $city_id = $stmt->fetch(PDO::FETCH_COLUMN);
                                echo $city_id;
                            } else {
                                header("Location: ./index.php?page=register&status=city");
                                exit;
                            }*/

                            echo "So far so good! ";
                            echo $email . " ";
                            echo $password . " ";
                            
                        }

                    }
                }
            }

        } else {
            header("Location: ./index.php?page=register&status=empty");
            exit;
        }


    }

/*
    if(isset($_POST['Submit'])){
        $username = $_SESSION['username'];
        $email = htmlspecialchars($_SESSION['email']);
        $password = $_SESSION['password'];
        $confirm_password = $_SESSION['confirm_password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $postalCode = $_POST['postalCode'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $city_id=null;

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
                    echo $city_id;
                }
                else{
                    echo "Napaka pri vnosov podatkov!";
                    header("refresh:5; url=../index.php?page=register-user");
                    exit();
                }
                                
                $query = "INSERT INTO account(username, password, firstName, lastName, email, phoneNumber, address, city_id) 
                        VALUES(?,?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$username, $password, $fname, $lname, $email, $phone, $address, $city_id]);

                unset($_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $_SESSION['confirm_password']);                
                header('Location: ./index.php?page=login');
                exit();

            }
            else {
                header('Location: ./index.php?page=register-personal');
                exit();
            }

        }
        else {
            header('Location: ./index.php?page=register-user');
            exit();
        }

    }

    else{
        header('Location: ./index.php?page=register-user');
        exit();
    }
    */
?>