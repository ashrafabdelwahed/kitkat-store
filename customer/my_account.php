<?php

        session_start();

        if(!isset($_SESSION['customer_email'])) {
            echo "<script>window.open('../checkout.php','_self')</script>";
        }else{
            

        include("./includes/db.php");
        include("../functions/functions.php");
    ?>

    

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">

    <!-- Lib & styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.min.css">

    <title>KITKAT STORE</title>
</head>
<body>

<!-- Start Navbar -->
    <nav class="navbar navbar-change navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php">KITKAT</a>
            
            <span class="mt-2 cart-sm d-block d-lg-none">
                <a class="nav-link" href="#">
                    <span class="C-Product">0</span>
                    <i class="fas fa-shopping-cart fa-lg"></i>
                </a>
            </span>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item ">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="../shop.php">Shop</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="my_account.php">My Account</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../cart.php">shopping cart</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../contact.php">contact us</a>
                    </li>

                </ul>

                <div class="d-lg-none d-block position-relative">
                        <form action="get" action="results.php">
                            <input type="search" name="user-query" class="form-control form-control-lg " placeholder="Search Here..">
                            <button type="submit" class="btn-search-sm btn">
                                <i class="fas fa-search fa-lg"></i>
                            </button>
                        </form>
                </div>

                <ul class="navbar-nav ml-auto navbar-social">
                    <li class="nav-item shopping-icon d-none d-lg-block">
                        <a class="nav-link" href="../cart.php">
                            <span class="C-Product">0</span>
                            <i class="fas fa-shopping-cart fa-lg"></i>
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link open-search">
                            <i class="fas fa-search fa-lg"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  data-toggle="modal" data-target="#myaccount">
                        My Account    <i class="far fa-user-circle fa-lg"></i>
                        </a>
                    </li>


                    <?php
                    
                        if(!isset($_SESSION['customer_email'])) {
                            echo " 
                                    <li class='nav-item'>
                                        <a class='nav-link' href='account.php'>
                                        Sign Up <i class='fas fa-sign-in-alt fa-lg '></i>
                                        </a>
                                    </li>
                                ";
                        }
                    
                    ?>


                </ul>
            </div>
        </div>
    </nav>

    <div class="d-none nav-search ">
        <div class="search-form container-fluid">
            <form action="get" action="results.php">
                <input type="search" name="user-query" class="form-control form-control-lg" placeholder="Search Here..">
                <button type="submit" class="btn-search">
                    <i class="fas fa-search fa-lg"></i>
                </button>
            </form>
            <div class="search-close d-none d-lg-block">
                <i class="fas fa-times fa-lg"></i>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <a href="customer/my_account.php">My Account</a> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                
                    if(isset($_SESSION['customer_email'])) {
                        $customer_email = $_SESSION['customer_email'];
                        $customer_name  = $_SESSION['customer_name'];
                        $customer_img   = $_SESSION['customer_img'];

                        echo "
                            <div class='customer-data'>
                            
                                <div class='info'>
                                
                                    <h6 class='text-capitalize mb-3'> <a href='customer/my_account.php'> <b>Name</b> : $customer_name </a> </h6>
                                    <h6 class='text-capitalize mb-3'> <b>Email</b> : $customer_email </h6> 

                                </div>";


                                
                            if(isset($_SESSION['customer_img'])) {
                                echo "
                                        <div class='img'>
                                            <img class='rounded-circle' src='../customer/customer_images/$customer_img'>
                                        </div>
                                        </div>
                                    ";
                            }else {
                                echo "</div>";
                            }

                    echo "
                        <div class='modal-footer d-flex justify-content-around' style='padding-bottom:0'>
                            <h6> <a class='btn btn-outline-dark' href='customer/my_account.php'>  <i class='fas fa-cog'></i> Settings </a> </h6>
                            <h6> <a class='btn btn-outline-dark' href='logout.php'>  <i class='fas fa-sign-out-alt'></i> Log out</a></h6>
                        </div>
                    ";

                    }else {
                        echo " 
                        <h4 class='text-center'>You are not <a href='../customer_register.php'>registered</a></h4>

                            <div class='modal-footer d-flex justify-content-around' style='padding-bottom:0'>
                                <h6> <a class='btn btn-outline-dark' href='../customer_register.php'>  <i class='fas fa-registered'></i> Register </a> </h6>
                                <h6> <a class='btn btn-outline-dark' href='../checkout.php'>  <i class='fas fa-sign-out-alt'></i> Login </a></h6>
                            </div>
                        ";                    }

                ?>
            </div>
            </div>
        </div>
    </div>
<!-- End Navbar -->


<!-- Strat breadcrumb -->
    <div class="breadcrumb-content mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<!-- End breadcrumb -->

<!--Start Content -->
    <div id="content" class="content my-5">
        <div class="container">
            <div class="row">
            <!--Start sidebar -->
                <div class="col-md-3 mb-5">
                    <?php
                        include "includes/sidebar.php";
                    ?>
                </div>
            <!--End Category -->

            <!--Start Box -->

                <div class="col-md-9">
                    <div class="box">
                        
                        <?php 
                        
                            if(isset($_GET["my_orders"])) {

                                include("my_orders.php");

                            }
                        
                        
                            if(isset($_GET["pay_offline"])) {

                                include("pay_offline.php");

                            }
                    

                        
                            if(isset($_GET["edit_account"])) {

                                include("edit_account.php");

                            }
                    

                            if(isset($_GET["change_pass"])) {

                                include("change_pass.php");

                            }

                            if(isset($_GET["delete_account"])) {
                                include("delete_account.php");
                            }
                    
                        ?>



                    </div>
                </div>

            <!--End Box -->

            </div>
        </div>
    </div>
<!--End Content  -->


<!-- Start Footer -->
    <?php 
        
        include("includes/footer.php");

    ?>
<!-- End Footer -->

<?php
    }
?>