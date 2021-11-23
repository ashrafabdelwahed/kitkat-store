    <?php
        $active = "shop";
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
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<!-- End breadcrumb -->


<!--Start Content -->
    <div id="content" class="content mt-5">
        <div class="container">
            <div class="row">
            <!--Start Category -->
                <div class="col-md-3">
                    <?php
                        include "includes/sidebar.php";
                    ?>
                </div>
            <!--End Category -->

            <!--Start Box -->

                <div class="col-md-9">
                    <div class="row">

                        <?php

                            if(!isset($_GET['p_cat'])) {
                                if(!isset($_GET['cat'])) {

                                $per_page = 6;

                                if(isset($_GET['page'])) {

                                    $page = $_GET['page'];

                                }else {

                                        $page = 1;
                                }
                                    $start_from = ($page-1) * $per_page; 

                                    $get_product  = "SELECT *  FROM products order by 1 DESC LIMIT $start_from, $per_page";
                                    
                                    $stmt = $con->query($get_product);
                                    $products = $stmt->fetchAll(PDO::FETCH_CLASS);

                                    foreach($products as $product) {

                                        $product_id     = $product->product_id;
                                        $product_img    = $product->product_img1;
                                        $product_title  = $product->product_title;
                                        $product_price  = $product->product_price;

                                        echo"<div class='col-sm-6  col-md-4'>
                                            <div class='card mb-5'>
                                                <a href='details.php?pro_id=$product_id'>
                                                    <img class='card-img-top img-fluid' src='./admin_area/product_images/$product_img' alt='product'>
                                                </a>
                                                <a href='details.php?pro_id=$product_id'>
                                                    <div class='card-body'>
                                                        <h5 class='card-title text-capitalize'>$product_title</h5>
                                                        <p class='card-text product-price'>\$$product_price</p>
                                                    </div>
                                                </a>
                                                <a href='details.php?pro_id=$product_id' class='p-3 add-cart'>add to cart  <i class='fas fa-shopping-cart' ml-2></i></a>
                                            </div>
                                        </div>";

                                }
                            

                        ?>



                    </div>
                </div>

            <!--End Box -->

            <!-- Start Pagination -->

                <div class="col-md-12">
            
                <div aria-label="Page navigation">
                    <ul class="pagination d-flex justify-content-center">
                        <?php

                            $stmt = $con->prepare(" SELECT * FROM products");
                            $stmt->execute();
                            $row = $stmt->fetch();
                            $total_records = $stmt->rowCount();
                            
                            $total_page = ceil($total_records /  $per_page);


                            echo "
                            
                            <li class='page-item'>
                            
                                <a class='page-link'href='shop.php?page=1'> First Page </a> 
                            
                            </li>

                            
                            ";

                            for ($i=1; $i<= $total_page; $i++) { 
                                
                                echo "
                                
                                <li class='page-item'>
                                
                                    <a class='page-link'href='shop.php?page=". $i ."'> " . $i . " </a>
                                
                                </li>

                                
                                ";

                            }

                            echo "
                            
                            <li class='page-item'>
                            
                                <a class='page-link'href='shop.php?page=$total_page'> Last Page </a> 
                            
                            </li>

                            
                            ";
                            
                            

                            }
                        }
                        ?>
                </ul>

                        
                        <?php
                        
                        getpcatpro();
                        getcatpro();

                        
                        ?>
                        

                </div>
                </div>

            <!-- End Pagination -->

            </div>
        </div>
    </div>
<!--End Content  -->






<!-- Start Footer -->
    <?php 
        
        include("includes/footer.php");

    ?>
<!-- End Footer -->

