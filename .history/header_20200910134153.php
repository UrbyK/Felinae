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
                        <a class="nav-link" href="./index.php?page=products">Izdelki</a>
                    </li>

                    <li class="nav-item dropdown user-dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Uporabnik</a>
                        <div class="dropdown-menu">
                            
                            <?php if(empty($_SESSION['logged_in'])): ?>
                                <a class="dropdown-item" href="./index.php?page=login" title="Login"><i class="fa fa-sign-in"></i> Prijava</a>
                                <a class="dropdown-item" href="./index.php?page=register-user" title="Register">Registracija</a>
                            <?php endif; ?>

                            <?php if(user_login_status()): ?>
                                <a class="dropdown-item" href="./index.php?page=logout"><i class="fa fa-sign-out"></i> Oddjava</a>
                                <a class="dropdown-item" href="./index.php?page=profile" title="Profile">Profil</a>
                            <?php endif; ?>

                        </div>
                    </li>
<!--
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
                            -->
                            
                    <?php if(is_admin()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=product-add">Dodaj</a>
                    </li>

                    <?php endif; ?>

                </ul>

                <form method="GET" class="form-inline my-2 my-lg-0 search-area" action="./search.php">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Iskanje..">
                    <button class="btn btn-outline-success my-2 my-sm-0" name="search_btn" type="submit">Išči</button>
                </form>

                <?php $num_items_in_cart = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;?>
                <div class="link-icons">
                    <a href="index.php?page=cart">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?=$num_items_in_cart?></span>
                    </a>
                </div>
                
            </div>
        </nav>

    <div class="container-fluid">
