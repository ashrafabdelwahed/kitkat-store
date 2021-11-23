<?php


if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {
?>

<div class="row"> 

    <div class=" col-lg-3 col-sm-12 col-md-6">
        <div class="card mb-4 border-0 card-product card-dashboard">

            <div class="card-header text-white" >
                <div class="row">
                    <div class="col-3">
                        <i class="fas fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-9 text-right">
                        <div class="huge"> <?php echo $num_products ?> </div>
                        <div>Products</div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0 " >
                <a href="index.php?view_products" class='d-block p-4 pb-5'>
                    <span class='float-left'>View Details</span>
                    <span class='float-right'>
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            </div>

        </div>
    </div>



    <div class="col-lg-3 col-sm-12 col-md-6">
        <div class="card mb-4 border-0 card-customer card-dashboard">

            <div class="card-header  text-white">
                <div class="row">
                    <div class="col-3">
                        <i class="fas fa-users fa-5x"></i>
                    </div>
                    <div class="col-9 text-right">
                        <div class="huge"><?php echo $num_customers ?></div>
                        <div>Customers</div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <a href="index.php?view_customers" class='d-block p-4 pb-5'>
                    <span class='float-left'>View Details</span>
                    <span class='float-right'>
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            </div>

        </div>
    </div>


    <div class=" col-lg-3 col-sm-12 col-md-6">
        <div class="card mb-4 border-0 card-p-cats card-dashboard">

            <div class="card-header  text-white">
                <div class="row">
                    <div class="col-3">
                        <i class="fas fa-tags fa-5x"></i>
                    </div>
                    <div class="col-9 text-right">
                        <div class="huge"> <?php echo $num_p_categories ?> </div>
                        <div>Products Categories</div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <a href="index.php?view_p_cats" class='d-block p-4 pb-5'>
                    <span class='float-left'>View Details</span>
                    <span class='float-right'>
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            </div>

        </div>
    </div>

    <div class=" col-lg-3 col-sm-12 col-md-6">
        <div class="card mb-4 border-0 card-orders card-dashboard">

            <div class="card-header  text-white">
                <div class="row">
                    <div class="col-3">
                        <i class="fas fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-9 text-right">
                        <div class="huge"><?php echo $num_orders ?></div>
                        <div>Orders</div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <a href="index.php?view_orders" class='d-block p-4 pb-5'>
                    <span class='float-left'>View Details</span>
                    <span class='float-right'>
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            </div>

        </div>
    </div>

    

</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header pb-0 table-card-header" >
                <h3 class='card-title'>
                    <i class="fas fa-money-bill-wave"></i>
                    New Orders
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th scope="col">Order no: </th>
                                <th scope="col">Customer Email: </th>
                                <th scope="col">Invoice No: </th>
                                <th scope="col">Product ID: </th>
                                <th scope="col">Product Qty: </th>
                                <th scope="col">Product Size no: </th>
                                <th scope="col"> Status: </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            
                                $get_orders = "SELECT * FROM padding_orders order by 1 DESC LIMIT 0,4";

                                $stmt = $con->query($get_orders);

                                $run_orders = $stmt->fetchAll(PDO::FETCH_CLASS);

                                foreach ($run_orders as $orders) {
                                    $order_id       = $orders->order_id;
                                    $c_id           = $orders->customer_id;
                                    $invoice_on     = $orders->invoice_no;
                                    $product_id	    = $orders->product_id;
                                    $qty            = $orders->qty;
                                    $size           = $orders->size;
                                    $order_status   = $orders->order_status;

                                    $get_email_customer = "SELECT customer_email FROM customers where customer_id='$c_id'";
                                    
                                    $stmt = $con->query($get_email_customer);

                                    $customers_email = $stmt->fetch();

                                    $c_email = $customers_email['customer_email'];

                                    echo "
                                        <tr>
                                            <td> $order_id </td>
                                            <td> $c_email </td>
                                            <td> $invoice_on </td>
                                            <td> $product_id </td>
                                            <td> $qty </td>
                                            <td> $size </td>
                                            <td> $order_status</td>


                                        </tr>
                                    ";
                                }
                            
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-right">
                    <a href="index.php?view_orders" class='btn btn-info font-weight-bold'>
                        View All Orders <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <img class='img-fluid' src="./admin_images/<?php echo $admin_image; ?>" alt="admin">

                <div class="thumb-info-title">
                    <span class="thumb-info-inner"><b> <?php echo $admin_name ?> </b></span>
                    <span class="thumb-info-type"><?php echo $admin_job ?></span>
                </div>

                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fas fa-user"></i> <span>Email: </span> <?php echo $admin_email ?> <br>
                        <i class="fas fa-flag"></i> <span>Countery: </span> <?php echo $admin_country ?> <br>
                        <i class="fas fa-envelope"></i> <span>Phone: </span> <?php echo $admin_contact ?> <br>
                    </div>
                    <hr class='dotted'>
                    <h5 class="text-muted">About Me</h5>
                    <p>This Application Created By, if You willing to contact me , please click this link <br>
                        <a href="https://www.facebook.com/ashrafabdelwahed72"><b> <?php echo $admin_name ?> </b></a>
                        <?php
                            echo $admin_about;
                        ?>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>


<?php
    }
?>