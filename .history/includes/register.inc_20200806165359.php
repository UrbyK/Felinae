<?php
    $pdo = pdo_connect_mysql();

    if(isset($_POST['reg_btn'])){
        $username = $_SESSION['username'];
        $email = htmlspecialchars($_SESSION['email']);
        $password = $_SESSION['password'];
        $confirm_password = $_SESSION['confirm_password'];
        $fname = $_PoST['fname'];
        $lname = $_POST['lname'];
        $phone = $_poST['phone_number'];
        $address = $_POST['address'];
        $postalCode = $_POST['postal_code'];
        $city = $_POST['city'];
        $country = $_POST['country'];

        print_r($_SESSION);

    }
?>