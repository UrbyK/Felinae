<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" content="text/html"/>
        <meta name="viewport" content="width=device-width, intital-scale=1.0"/>

        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <!-- Boostrap -->
            <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
            
            <!-- JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
             integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>

        <!-- FONTAWESOME -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
         crossorigin="anonymous">

         <script src="./js/active-menu.js" crossorigin="anonymous"></script>

         <!--CUSTOM CSS-->
         <link rel="stylesheet" href="./css/style.css">

        <title>Felinae</title>
    </head>
    
    <body>

        <header>
            <div class="banner"><img src="https://via.placeholder.com/1900x250" alt="banner"></div>
        </header>
        
       <!-- <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light ">-->
        <nav class="navbar sticky-top navbar-expand-lg">
            <a class="navbar-brand" href="#">Felinae</a>
            <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php"><i class="fa fa-home" aria-hidden="true"></i> Domov <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=home">Link</a>
                    </li>
                    <li class="nav-item dropdown" >
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=profile">Profil</a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=register-user">Registracija</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=login">Prijava</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=logout">Odjava</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=products">Izdelki</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=product-add">Dodaj</a>
                    </li>

                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                <?php $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;?>
                <div class="link-icons">
                    <a href="index.php?page=cart">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?=$num_items_in_cart?></span>
                    </a>
                </div>
                
            </div>
        </nav>

    <div class="container-fluid">

    <?php
        $items = $_SESSION['cart'];
        $num_of_items = 0;
        $neki = array_sum($_SESSION['cart']);
        echo($items['quantity']);
        print_r($_SESSION[0]);
        foreach($items as $item){
            echo $item['quantity'];
            $num_of_items += (int)$item;
        }
        echo $num_items_in_cart;
        return $num_of_items;

    ?>