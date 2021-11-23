<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KITKAT STORE</title>
</head>
<body>


<!-- Start Content --> 

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"> <i></i> Insert Product</h5>
            </div>
            <div class="card-body mb-5">
                <form action="" method="post">

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Title</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="product_title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Category</label>
                        <div class="col-md-4">
                            
                            <select name="product_cat" class="form-control">
                                <option> Select a Category Product </option>

                                <?php

                                $stmt = $con->query("select * from product_categories");
                                $result = $stmt->fetchAll(PDO::FETCH_CLASS);

                                    foreach($result as $p_cat) {

                                        echo "
                                        
                                            <option value=' $p_cat->p_cat_id'> $p_cat->p_cat_title </option>

                                        ";

                                    }

                                ?> 
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Category</label>
                        <div class="col-md-4">
                            
                            <select name="cat" class="form-control">
                                <option> Select a Category </option>

                                <?php

                                $stmt = $con->query("select * from categories");
                                $result = $stmt->fetchAll(PDO::FETCH_CLASS);

                                    foreach($result as $cate) {

                                        echo "
                                        
                                            <option value=' $cate->cat_id'> $cate->cat_title </option>

                                        ";

                                    }

                                ?> 
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Image 1 </label>
                        <div class="col-md-4 custom-file">
                            <input type="file" class="custom-file-input" name="product_img1" required>
                            <label class="custom-file-label mx-3" for="inputGroupFile01"></label>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Image 2 </label>
                        <div class="col-md-4 custom-file">
                            <input type="file" class="custom-file-input" name="product_img2" >
                            <label class="custom-file-label mx-3" for="inputGroupFile01"></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Image 3 </label>
                        <div class="col-md-4 custom-file">
                            <input type="file" class="custom-file-input" name="product_img3"  >
                            <label class="custom-file-label mx-3" for="inputGroupFile01"></label>
                        </div>
                    </div>




                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Price</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="product_price" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Keywords</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="product_keywords" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Desc</label>
                        <div class="col-md-4">
                            <textarea type="text" class="form-control" cols="19" rows="6" name="product_desc"></textarea>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-danger" name="submit" value="Insert Product">
                    </div>
                    

                </form>
            </div>
        </div>
    </div>
    

<!-- End Content -->
    <script src="./js/tinymce.min.js"></script>
    <script>tinyMCE.init({selector : "textarea"});</script>
    <script src="js/mian.js"></script>
</body>
</html>

<?php


        if(isset($_POST['submit'])) {

            $product_title          = filter_input(INPUT_POST,'product_title', FILTER_SANITIZE_STRING);
            $product_keywords       = filter_input(INPUT_POST,'product_keywords', FILTER_SANITIZE_STRING);
            $product_desc           = filter_input(INPUT_POST, 'product_desc', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES );
            
            $product_cat            = filter_input(INPUT_POST, 'product_cat', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);
            $cat                    = filter_input(INPUT_POST, 'cat', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);
            $product_price          = filter_input(INPUT_POST, 'product_price', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);


            $product_img1           = filter_input(INPUT_POST, 'product_img1', FILTER_SANITIZE_STRING);
            $product_img2           = filter_input(INPUT_POST, 'product_img2', FILTER_SANITIZE_STRING);
            $product_img3           = filter_input(INPUT_POST, 'product_img3', FILTER_SANITIZE_STRING);


            $product = "INSERT INTO products
            (p_cat_id, cat_id,date, product_title,product_img1,product_img2,product_img3,product_price,product_keywords,product_desc)
            VALUES ('$product_cat','$cat', NOW() ,'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_keywords','$product_desc')";
            $con->exec($product);

            if($product) {

                echo "<script> alert( 'Product Has Been Inserted Successfully' ) </script>";
                echo "<script> window.open('index.php?view_products', '_self') </script>";

            }

        }

    
?>

<?php
    }
?>


