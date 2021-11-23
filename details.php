<?php
    $active = "shop";
    include("./includes/header.php");
?>


<?php

    if(isset($_GET['pro_id'])) {

        $product_id = $_GET['pro_id'];

        $get_product = "SELECT * FROM products where product_id = '$product_id' ";
    
        $stmt = $con->query($get_product);

        $products = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($products as $product) {

            $product_id        = $product->product_id;
            $product_p_cat_id  = $product->p_cat_id;
            $product_img       = $product->product_img1;
            $product_img2      = $product->product_img2;
            $product_img3      = $product->product_img3;
            $product_title     = $product->product_title;
            $product_price     = $product->product_price;
            $product_desc      = $product->product_desc;



        }


        $get_p_cat = "SELECT * FROM  product_categories where p_cat_id = '$product_p_cat_id'";

        $stmt = $con->query($get_p_cat);

        $products_cat = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach ($products_cat as $product_cat) {

            $pro_cat = $product_cat->p_cat_title;

        }

    
    }

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
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="shop.php?p_cat=<?php echo $product_p_cat_id ?>">
                                    <?php
                                    
                                    echo $pro_cat;

                                    ?>
                                </a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">
                                    <?php
                                    
                                    echo $product_title;

                                    ?>
                            </li>

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
            <!-- Start Product img -->
                <div class="col-md-6">

                    <div class="product-img">
                        <a class="example-image-link img-fluid" href="./admin_area/product_images/<?php echo $product_img?>" data-lightbox="product-imgs"><img class="example-image  img-fluid" src="./admin_area/product_images/<?php echo $product_img ?>" alt=""/></a>
                    </div>

                    <div class="product-imgs mt-3">

                    <a class="mr-2 float-left float-sm-none" href="./admin_area/product_images/<?php echo $product_img2?>" data-lightbox="product-imgs" ><img style="width:9rem" src="./admin_area/product_images/<?php echo $product_img2?>" alt=""/></a>
                        <?php
                            if($product_img3) {
                                

                                echo "
                                
                                    <a class='float-right float-sm-none' href='./admin_area/product_images/$product_img3' data-lightbox='product-imgs' ><img style='width:9rem' src='./admin_area/product_images/$product_img3' alt='img product3'/></a>

                                
                                ";

                            }
                        ?>
                    </div>
                </div>
            <!-- End Product img -->

            <!-- Start Product info -->
                <div class="col-md-6">
                    <div class="product-info">

                        <h2 class="product-title font-weight-bold my-4"> <?php echo $product_title?> </h2>
                        <hr>

                        <div class="product-price my-4">
                            <h3>$<?php echo $product_price?> </h3>
                        </div>
                        <hr>

                        <p><?php echo $product_desc;?></p>


                        <?php add_cart(); ?>


                        <form class="cart mt-4" action="details.php?add_cart=<?php echo $product_id;?>" method="POST">
                            <div class="quantity float-left row">
                                <span class="col quantity-icon arrow-down">
                                    <i class="fas fa-arrow-down"></i>                                
                                </span>

                                <input name="product_qty" type="number" class="quantity-num form-control col" value="1" min="1">

                                <span class="col quantity-icon arrow-up ">
                                    <i class="fas fa-arrow-up"></i>
                                </span>
                            </div>

                            <div class="row">
                                <select name="size" class=" mx-md-3 mx-4 my-2 form-control select-size" required 
                                oninvalid="setCustomValidity('Must pick 1 size for the product')"> 


                                    <option disabled selected>Select a Size</option>
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>


                                </select>
                            </div>

                            <div class="d-flex justify-content-center mt-3">
                                <button class="add-to-cart btn btn-primary"> <i class="fas fa-shopping-cart fa-lg"></i> Add To Cart</button>
                            </div>

                        </form>





                    </div>
                </div>
            <!-- End Product info -->

            </div>
        </div>
    </div>
<!--End Content  -->

<!-- Start Related products -->

    <div class="related-products content">
        <div class="container">
            <h3 class="font-weight-bold mb-4">Related products</h3>


            <div class="row">
                <!--Start Box -->
                    <div class="col-md-9">
                        <div class="row">
                            

                            <?php
                            
                                $getP_related = "SELECT * FROM products where p_cat_id = '$product_p_cat_id' and product_id != '$product_id' LIMIT 4  ";

                                $stmt = $con->query($getP_related);

                                $products_related = $stmt->fetchAll(PDO::FETCH_CLASS);

                                foreach($products_related as $pro_re) {
                                    $product_id        = $pro_re->product_id;
                                    $product_img       = $pro_re->product_img1;
                                    $product_title     = $pro_re->product_title;
                                    $product_price     = $pro_re->product_price;

                                    echo "
                                    
                                    <div class='col-sm-6 col-lg-3'>
                                        <div class='card mb-5'>
                                            <a href='details.php?pro_id=$product_id'>
                                                <img class='card-img-top' src='./admin_area/product_images/$product_img' alt='product'>
                                            </a>
                                            <a href='details.php?pro_id=$product_id'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>$product_title</h5>
                                                    <p class='card-text product-price'>$ $product_price</p>
                                                </div>
                                            </a>
                                            <a href='details.php?pro_id=$product_id' class='p-3 add-cart'>add to cart  <i class='fas fa-shopping-cart' ml-2></i></a>
                                        </div>
                                    </div>

                                    
                                    ";
                                }
                            
                            ?>

                        </div>
                    </div>
                <!--End Box -->
            </div>

        </div>
    </div>

<!-- End Related products -->

<!-- Start Footer -->
    <?php 
        
        include("includes/footer.php");

    ?>
<!-- End Footer -->


