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
                            <li class="breadcrumb-item active" aria-current="page">Log in</li>
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
                <?php

                    if(!isset($_SESSION['customer_email'])) {
                        include("customer/customer_login.php");
                    }else {
                        include("payment_options.php");
                    }
                
                ?>
        </div>
    </div>

<!-- End Content -->

<!-- Start Footer -->
    <?php 
        
        include("includes/footer.php");

    ?>
<!-- End Footer -->
