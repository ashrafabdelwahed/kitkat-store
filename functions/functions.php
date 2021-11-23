<?php

    $dns        = 'mysql:host=kitkat.test;dbname=kitkat_store';
    $user       = 'root';
    $pass       = '';
    $options    = array (
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
        $con = new PDO($dns, $user, $pass, $options);
    } catch (PDOException $e) {
        echo 'failed To connect ' . $e->getMessage();
    }   



// Start  Function Get real ip user 

    function getRealIpUser() {


        switch (true) {
            case(!empty($_SERVER['HTTP_X_REAL_IP']))        : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_REAL_IP']))   : return $_SERVER['HTTP_CLIENT_REAL_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED']))      : return $_SERVER['HTTP_X_FORWARDED'];

            default : return $_SERVER['REMOTE_ADDR'];
        }

    }


    function add_cart() {

        global $con;

        if(isset($_GET['add_cart'])) {

            $ip_add = getRealIpUser() ;

            $p_id = $_GET['add_cart'];

            $product_qty = $_POST['product_qty'];

            $product_size = $_POST['size'];

            $stmt = $con->prepare(" SELECT * FROM cart where ip_add = '$ip_add' AND p_id = '$p_id' ");
            $stmt->execute();
            $row = $stmt->fetch();
            $count = $stmt->rowCount();



                if($count > 0) {
                    echo "<script> alert('This product has already added in cart') </script>";
                    echo "<script> window.open('details.php?pro_id=$p_id', '_self')</script>";
                    echo "<script> window.open('details.php?pro_id=$p_id', '_self')</script>";
                }
                
                else {


                    $product = "INSERT INTO cart (p_id,ip_add,qty,size) VALUES  ('$p_id','$ip_add','$product_qty', '$product_size')";
                    $con->exec($product);

                    echo "<script> window.open('details.php?pro_id=$p_id', '_self')</script>";



                }

        }


    }

// End  Function   Get real ip user


// Start Function  getPro

    function getPro() {

        global $con;

        $get_product = 'SELECT * FROM products order by 1 DESC LIMIT 0,8';
        $stmt = $con->query($get_product);
        $products = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($products as $product)  {
            
            $product_id     = $product->product_id;
            $product_img    = $product->product_img1;
            $product_title  = $product->product_title;
            $product_price  = $product->product_price;

            echo "
            
            <div class='col-sm-6  col-md-3'>
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
            </div>
            
            ";

        }   

    }

// End Function  getPro




// Start Function  getPCats


    function getPCats() {

        global $con;


        $get_p_cats = "SELECT * FROM product_categories";
        $stmt = $con->query($get_p_cats);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($result as $p_cat) {

            $product_cat    = $p_cat->p_cat_id;
            $product_title  = $p_cat->p_cat_title;

            echo "
                    <li><a href='shop.php?p_cat=$product_cat'> $product_title  </a></li>

                ";
        }   
    }

// End Function  getPCats


// Start Function getCats

    function getCats() {

        global $con;

        $get_cats = "SELECT * FROM categories";
        $stmt = $con->query($get_cats);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($result as $cats) {

            $cat_id = $cats->cat_id;
            $cat_title = $cats->cat_title;

            echo "
                    <li> <a href='shop.php?cat=$cat_id'> $cat_title </a> </li>
                ";
        }

    }

// End Function getCats


// Start Function getpcatpro

    function getpcatpro() {

        global $con;

        if(isset($_GET['p_cat'])) {

            $p_cat_id = $_GET['p_cat'];

            $get_p_cat = "SELECT * FROM products where p_cat_id = '$p_cat_id' LIMIT 0,6";

            $stmt = $con->query($get_p_cat);

            $result = $stmt->fetchAll(PDO::FETCH_CLASS);

            foreach($result as $product) {

                $product_id     = $product->product_id;
                $product_img    = $product->product_img1;
                $product_title  = $product->product_title;
                $product_price  = $product->product_price;


                echo"
                        <div class='col-sm-6  col-md-4'>
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
                        </div>
                    ";

            }


        }

    }

// End Function getpcatpro


// Start Function getcatpro

    function getcatpro() {

        global $con;


        if(isset($_GET['cat'])) {


            $cat_id = $_GET['cat'];

            $get_cat = "SELECT * FROM products where cat_id = '$cat_id'";
        
            $stmt = $con->query($get_cat);
        
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);

            foreach($result as $product) {

                $product_id     = $product->product_id;
                $product_img    = $product->product_img1;
                $product_title  = $product->product_title;
                $product_price  = $product->product_price;


                echo"
                        <div class='col-sm-6  col-md-4'>
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
                        </div>
                    ";

            }


        }



    }

// End Function   getcatpro

// Start Function counter products 

    function counter_products() {

        global $con;

        $counter = "SELECT * FROM cart";

        $stmt = $con->query($counter);

        $countOfPro = $stmt->fetchAll(PDO::FETCH_CLASS);

        $sum_pro = 0;

        foreach($countOfPro as $count) {
            $sum_pro += $count->qty;
        }

        echo $sum_pro;


    }

// End Function  counter products




?>