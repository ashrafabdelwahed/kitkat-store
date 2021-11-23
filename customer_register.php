<?php

    $active = "home";
    include("./includes/db.php");
    include("./includes/header.php");
?>


<!-- Strat breadcrumb -->
    <div class="breadcrumb-content mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<!-- End breadcrumb -->

<!-- Start Content -->

    <div class="content-contact-us py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="text-capitalize">Register a New accent</h1>
            </div>
            <form action="customer_register.php" method="POST" enctype="multipart/form-data">
                
                <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
                    <label>Your Name</label>
                    <input type="text" name="c_name" class="form-control" required>
                </div>

                <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
                    <label>Your Email</label>
                    <input type="email" name="c_email" class="form-control" required aria-describedby="emailHelp">
                </div>

                <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
                    <label>Your Password</label>
                    <input type="password" name="c_pass" class="form-control" required>
                </div>


                <div class="col-12">
                    <div class="row">
                        <div class="form-group  col-md-3 offset-md-3">
                            <label>Your Country</label>
                            <input type="text" name="c_country" class="form-control" required>
                        </div>

                        <div class="form-group  col-md-3">
                            <label>Your City</label>
                            <input type="text" name="c_city" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        <div class="form-group  col-md-3 offset-md-3">
                            <label>Your Contact</label>
                            <input type="text" name="c_contact" class="form-control" required>
                        </div>

                        <div class="form-group  col-md-3">
                            <label>Your Address </label>
                            <input type="text" name="c_address" class="form-control" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
                    <label>Your Profile Picture </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="c_image">
                        <label class="custom-file-label "></label>
                    </div>
                </div>


                <div class="text-center">
                    <button type="submit" name="register" class="btn btn-danger">Register</button>
                </div>

            </form>
        </div>
    </div>

<!-- End Content -->

<!-- Start Footer -->
    <?php 
        
        include("includes/footer.php");

    ?>
<!-- End Footer -->


<?php

    if(isset($_POST['register'])) {

        $c_name     =  filter_input(INPUT_POST,'c_name', FILTER_SANITIZE_STRING);
        $c_email    =  filter_input(INPUT_POST,'c_email', FILTER_SANITIZE_STRING);
        $c_pass     =  filter_input(INPUT_POST,'c_pass', FILTER_SANITIZE_STRING);
        $c_country  =  filter_input(INPUT_POST,'c_country', FILTER_SANITIZE_STRING);
        $c_city     =  filter_input(INPUT_POST,'c_city', FILTER_SANITIZE_STRING);
        $c_contact  =  filter_input(INPUT_POST,'c_contact', FILTER_SANITIZE_STRING);
        $c_address  =  filter_input(INPUT_POST,'c_address', FILTER_SANITIZE_STRING);
        $c_image    =  $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        move_uploaded_file($c_image_tmp, 'customer/customer_images/$c_image');
        $c_ip       =  getRealIpUser();
        
        $insert_customer = " INSERT INTO customers(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) 
        VALUES ('$c_name', '$c_email', '$c_pass', '$c_country', '$c_city', '$c_contact' ,'$c_address', '$c_image', '$c_ip')";
        $con->exec($insert_customer);


        $sel_cart = "SELECT * FROM cart where ip_add = '$c_ip'";

        $stmt = $con->query($sel_cart);

        $result = $stmt->fetch();

        $num_row = $stmt->rowCount();


        if($num_row > 0) {

            // If register have items in cart


            $_SESSION['customer_email'] = $c_email;
            $_SESSION['customer_name'] = $c_name;
            $_SESSION['customer_img'] = $c_image;


            echo "<script>alert(' You have been Registered Sucessfully')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";

        }else {

            // If register without items in cart

            $_SESSION['customer_email'] = $c_email;
            $_SESSION['customer_name'] = $c_name;
            $_SESSION['customer_img'] = $c_image;




            echo "<script>alert(' You have been Registered Sucessfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }

    }

?>






