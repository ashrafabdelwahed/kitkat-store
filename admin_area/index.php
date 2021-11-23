<?php
        session_Start();
        include("./includes/db.php");

        if(!isset($_SESSION['admin_email'])){
            echo"<script>window.open('login.php','_self')</script>";
        }else {
            
            $admin_session = $_SESSION['admin_email'];


            // Get Admin

            $get_admin = "SELECT * FROM admins where admin_email = '$admin_session' ";

            $stmt = $con->query($get_admin);

            $run_admin = $stmt->fetchAll(PDO::FETCH_CLASS);

            foreach($run_admin as $admin) {

                $admin_id       = $admin->admin_id;
                $admin_name     = $admin->admin_name;
                
                $admin_email    = $admin->admin_email;
                $admin_image    = $admin->admin_image;
                $admin_country  = $admin->admin_country;
                $admin_about    = $admin->admin_about;
                $admin_contact  = $admin->admin_contact;
                $admin_job      = $admin->admin_job;
            
            }



            // Get products

            $get_products = "SELECT * FROM products";

            $stmt = $con->query($get_products); 

            $num_products = $stmt->rowCount();



            // Get Customer

            $get_customers = "SELECT * FROM customers";

            $stmt = $con->query($get_customers); 

            $num_customers = $stmt->rowCount();


            // Get product categories

            $get_p_categories = "SELECT * FROM product_categories";

            $stmt = $con->query($get_p_categories); 

            $num_p_categories = $stmt->rowCount();

            // Get Orders

            $get_orders_num = "SELECT * FROM padding_orders";

            $stmt = $con->query($get_orders_num); 

            $num_orders = $stmt->rowCount();


        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">

    <!-- Lib & styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Area</title>

</head>



<body>
    

        <div class="page home-page">
            <!-- Start sidebar -->
            <?php
                include('./includes/sidebar.php');
            ?>
            <!-- End sidebar -->


            <div class="content-area">

                <?php
                    include('./includes/nav.php');
                ?>


            <div class="content mt-5">
                
                <div class="container-fluid">

                <?php

                    //  Dashboard
                        if(isset($_GET['dashboard'])) {
                            include('dashboard.php');
                        }

                    // Dashboard
                    
                    // Start Products

                        if(isset($_GET['insert_product'])) {
                            include('insert_product.php');
                        }

                        if(isset($_GET['view_products'])) {
                            include('view_products.php');
                        }

                        if(isset($_GET['delete_product'])) {
                            include("delete_product.php");
                        }

                        if(isset($_GET['edit_product'])) {
                            include('edit_product.php');
                        }

                    // end Products


                    // Start Product Categories

                        if(isset($_GET['insert_p_cat'])) {
                            include('insert_p_cat.php');
                        }

                        if(isset($_GET['view_p_cats'])) {
                            include('view_p_cats.php');
                        }

                        if(isset($_GET['delete_p_cat'])) {
                            include('delete_p_cat.php');
                        }

                        if(isset($_GET['edit_p_cat'])) {
                            include('edit_p_cat.php');
                        }

                    // End Product Categories


                    // Start Categories


                        if(isset($_GET['insert_cat'])) {
                            include('insert_cat.php');
                        }

                        if(isset($_GET['view_cats'])) {
                            include('view_cats.php');
                        }

                        if(isset($_GET['edit_cat'])) {
                            include('edit_cat.php');
                        }

                        if(isset($_GET['delete_cat'])) {
                            include('delete_cat.php');
                        }

                    // End Categories

                    // Start Slider

                        if(isset($_GET['insert_slide'])) {
                            include('insert_slide.php');
                        }

                        if(isset($_GET['view_slides'])) {
                            include('view_slides.php');
                        }
                        
                        if(isset($_GET['delete_slide'])) {
                            include('delete_slide.php');
                        }

                        if(isset($_GET['edit_slide'])) {
                            include('edit_slide.php');
                        }

                    // End Slider


                    // Start Customers

                        if(isset($_GET['view_customers'])) {
                            include('view_customers.php');
                        }

                        if(isset($_GET['delete_customer'])) {
                            include('delete_customer.php');
                        }
                    // End Customers


                    // Start orders

                        if(isset($_GET['view_orders'])){
                            include('view_orders.php');
                        }

                        if(isset($_GET['delete_order'])) {
                            include('delete_order.php');
                        }

                    // End orders

                    
                    // Start Payments
                        if(isset($_GET['view_payments'])) {
                            include('view_payments.php');
                        }

                        if(isset($_GET['delete_payment'])) {
                            include('delete_payment.php');
                        }
                    // End Payments

                    // Start Users

                        if(isset($_GET['view_users'])) {
                            include('view_users.php');
                        }

                        if(isset($_GET['delete_user'])) {
                            include('delete_user.php');
                        }

                        if(isset($_GET['insert_user'])) {
                            include('insert_user.php');
                        }

                        if(isset($_GET['user_profile'])) {
                            include('user_profile.php');
                        }

                    // End Users


                ?>

                </div>
            </div>



            </div>

        </div>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="/js/lightbox.min.js"></script>
    <script src="js/mian.js"></script>
</body>
</html>


<?php
    }
?>