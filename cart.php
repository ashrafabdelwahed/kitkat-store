<?php
    $active = "cart";
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
                        <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<!-- End breadcrumb -->

<!-- Start Contnet -->

    <div class="content-shop my-4" id="content-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <form class="form-shop" action="cart.php" method="post" enctype="multipart/form-data">
                        <h1>Shopping Cart</h1>


                        <?php
                        
                            $ip_add = getRealIpUser();

                            $stmt = $con->query(" SELECT * FROM  cart  where ip_add = '$ip_add' ");
                            $products_cart = $stmt->fetchAll(PDO::FETCH_CLASS);
                            $total_records = $stmt->rowCount();



                        ?>


                        <p class="text-muted">You currently have <?php echo $total_records ?> item(s) in your cart</p>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Delete</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>




                                <?php   
                                
                                    $total = 0;

                                    foreach($products_cart as $pro_cart) {

                                        $pro_id = $pro_cart->p_id;
                                        $pro_size = $pro_cart->size;
                                        $pro_qty = $pro_cart->qty;

                                        $get_product = "SELECT * FROM products where product_id = '$pro_id' ";

                                        $stmt = $con->query($get_product);
    
                                        $product = $stmt->fetchAll(PDO::FETCH_CLASS);
                                        
                                                    
                                        foreach($product as $pro) {
    
                                        $product_id     = $pro->product_id;
                                        $product_img    = $pro->product_img1;
                                        $product_title  = $pro->product_title;
                                        $product_price  = $pro->product_price;
                                        $sub_total    = $product_price *  $pro_qty;  
                                        $total += $sub_total; 
                                        echo "
                                        <tbody>

                                            <tr>

                                                <td>
                                                    <img src='./admin_area/product_images/$product_img'>
                                                </td>

                                                <td>
                                                    <a href='details.php?pro_id=$pro_id'> $product_title </a>
                                                </td>

                                                <td>
                                                $pro_qty
                                                </td>
                                                
                                                <td>
                                                    $product_price
                                                </td>

                                                <td>
                                                $pro_qty
                                                </td>

                                                <td>
                                                    <input type='checkbox' name='remove[]' value='$pro_id'>
                                                </td>

                                                <td>
                                                    $sub_total
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    
                                        ";
                                        
                                        }
                                    }
                                ?>


                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="font-weight-bolder">Total</td>
                                        <td colspan="2" class="font-weight-bolder"> <?php echo  '$' . $total ?> </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="box-footer">
                            <div class="float-left mb-2">
                                <a href="index.php" class="btn btn-dark">
                                    <i class="fa fa-chevron-left"></i> Contiune Shopping
                                </a>
                            </div>

                            <div class="float-right">
                                <button type="submit" name="update" value="Update Cart" class="btn btn-dark">
                                    <i class="fas fa-sync"></i> Update Cart
                                </button>

                                <a href="checkout.php" class="btn btn-danger">
                                    Proceed Checkout <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>

                    </form>
                </div>

                <?php
                
                    function update_cart() {

                        global $con;

                        if(isset($_POST['update'])) {

                            if(isset($_POST['remove'])) {

                                foreach($_POST['remove'] as $remove_id) {

                                    $delete_product = "DELETE FROM cart WHERE p_id = '$remove_id' ";

                                    $con->exec($delete_product);

                                    if($con) {

                                        echo "<script>window.open('cart.php', '_self') </script>";

                                    }

                                }
                            }
                        }
                    }

                    echo $up_cart = update_cart();
                
                ?>

                <div class="col-md-3">
                    <div id="order-summary">
                        <div class="box-header">
                            <h3>Order Summary</h3>
                            <p class="text-muted">
                                Shopping and additional costs are calculated based on value you have entered
                            </p>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-dark">
                                    <tbody>

                                        <tr>
                                            <td>order Subtotal</td>
                                            <th> <?php echo  '$' . $total ?></th>
                                        </tr>

                                        <tr>
                                            <td>Shopping & Handling</td>
                                            <th>0</th>
                                        </tr>

                                        <tr>
                                            <td>Tax</td>
                                            <th>0</th>
                                        </tr>

                                        <tr>
                                            <td>Total</td>
                                            <th><?php echo  '$' . $total ?></th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- End Content -->

<!-- Start Footer -->
    <?php 
        
        include("includes/footer.php");

    ?>
<!-- End Footer -->

