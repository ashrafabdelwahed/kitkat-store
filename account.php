<?php
    $active = 'my_account';
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
                            <li class="breadcrumb-item active" aria-current="page">Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<!-- End breadcrumb -->


<!-- Start account -->

    <div class="content-account my-5 text-center">
        <div class="container">
            
            <h2 class="text-capitalize">feel free to register with us</h2>

            <p class="text-muted">Join Kitkat today.</p>
            <div class="row">
                <div class="col-12 mb-3">
                    <a class="btn btn-primary" href="customer_register.php" role="button">Register</a>
                </div>
                <div class="col-12">
                    <a class="btn btn-outline-primary" href="checkout.php" role="button">Log in</a>
                </div>
            </div>
        </div>
    </div>

<!-- End account -->


<!-- Start Footer -->
    <?php 
        
        include("includes/footer.php");

    ?>
<!-- End Footer -->