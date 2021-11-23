<?php

if(!isset($_SESSION['admin_email'])){

    echo"<script>window.open('login.php','_self')</script>";

}else {

?>
    <?php
        if(isset($_GET['edit_product'])) {

            $edit_id = $_GET['edit_product'];

            $get_pro = "SELECT * FROM products where product_id = '$edit_id' ";

            $stmt = $con->query($get_pro);

            $run_product = $stmt->fetchAll(PDO::FETCH_CLASS);

            foreach($run_product as $run_pro) {
                $p_id           = $run_pro->product_id;
                $p_title        = $run_pro->product_title;
                $p_cat          = $run_pro->p_cat_id;
                $cat            = $run_pro->cat_id;
                $p_image1       = $run_pro->product_img1;
                $p_image2       = $run_pro->product_img2;
                $p_image3       = $run_pro->product_img3;
                $p_price        = $run_pro->product_price;
                $p_keywords     = $run_pro->product_keywords;
                $p_desc         = $run_pro->product_desc;
            }

            $get_p_cat = "SELECT * FROM product_categories  WHERE p_cat_id='$p_cat' ";

            
            $stmt = $con->query($get_p_cat);

            $run_p_cat = $stmt->fetchAll(PDO::FETCH_CLASS);

            foreach($run_p_cat as $p_cat) {
                $p_cat_title = $p_cat->p_cat_title;
                $p_cat_id = $p_cat->p_cat_id;
            }



            $get_cat = "SELECT * FROM categories  WHERE cat_id ='$cat' ";

            
            $stmt = $con->query($get_cat);

            $run_cat = $stmt->fetchAll(PDO::FETCH_CLASS);

            foreach($run_cat as $cat) {
                $cat_title = $cat->cat_title;
                $cat_id = $cat->cat_id;
            }



        }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Area</title>
</head>
<body>


<!-- Start Content --> 

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"> <i></i> Edit Product</h5>
            </div>
            <div class="card-body mb-5">
                <form method="POST">

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Title</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="product_title" value="<?php echo $p_title ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Category</label>
                        <div class="col-md-4">
                            
                            <select name="product_cat" class="form-control">
                                <option value="<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title ?> </option>

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
                                <option value="<?php echo $cat_id ?>"> <?php echo $cat_title ?> </option>

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
                            <input type="file" class="custom-file-input" name="product_img1" value="<?php echo $p_image1?>">
                            <label class="custom-file-label mx-3"></label>
                        </div>

                        <div class="float-right">
                                <img src="./product_images/<?php echo $p_image1?>" alt="product" style='width:70px'>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Image 2 </label>
                        <div class="col-md-4 custom-file">
                            <input type="file" class="custom-file-input" name="product_img2" value="<?php echo $p_image2 ?>">
                            <label class="custom-file-label mx-3"></label>
                        </div>

                        <div class="float-right">
                                <img src="./product_images/<?php echo $p_image2?>" alt="product" style='width:70px'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Image 3 </label>
                        <div class="col-md-4 custom-file">
                            <input type="file" class="custom-file-input" name="product_img3"  value="<?php echo $p_image3 ?>">
                            <label class="custom-file-label mx-3"></label>
                        </div>
                        <div class='float-right'>
                            <?php
                                if($p_image3) {
                                    echo "
                                            <img src='./product_images/$p_image3' alt='product' style='width:70px'>

                                        ";
                                }
                            ?>
                        </div>
                        </div>




                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Price</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="product_price" value="<?php echo $p_price ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Keywords</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="product_keywords" value="<?php echo $p_keywords ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Desc</label>
                        <div class="col-md-4">
                            <textarea type="text" class="form-control" cols="19" rows="6" name="product_desc">
                                <?php echo $p_desc?>
                            </textarea>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-danger" name="update" value="Edit Product">
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

        if(isset($_POST['update'])) {

            $product_title          = filter_input(INPUT_POST,'product_title', FILTER_SANITIZE_STRING);
            $product_keywords       = filter_input(INPUT_POST,'product_keywords', FILTER_SANITIZE_STRING);
            $product_desc           = filter_input(INPUT_POST, 'product_desc', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES );
            
            $product_cat            = filter_input(INPUT_POST, 'product_cat', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);
            $cat                    = filter_input(INPUT_POST, 'cat', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);
            $product_price          = filter_input(INPUT_POST, 'product_price', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);

            if($_POST['product_img1'] == '') {
                $product_img1 = $p_image1;
            }else {
                $product_img1           = filter_input(INPUT_POST, 'product_img1', FILTER_SANITIZE_STRING);
            }

            if($_POST['product_img2'] == '') {
                $product_img2 = $p_image2;
            }else {
                $product_img2           = filter_input(INPUT_POST, 'product_img2', FILTER_SANITIZE_STRING);
            }


            if($_POST['product_img3'] == '') {
                $product_img3 = $p_image3;
            }else {
                $product_img3           = filter_input(INPUT_POST, 'product_img3', FILTER_SANITIZE_STRING);
            }





            $update_product = "UPDATE products SET 
            p_cat_id = '$product_cat',
            cat_id = '$cat',
            date = NOW(),
            product_title= '$product_title',
            product_img1= '$product_img1',
            product_img2= '$product_img2',
            product_img3= '$product_img3',
            product_price= '$product_price',
            product_keywords= '$product_keywords',
            product_desc= '$product_desc'

            where product_id = '$p_id' 
            ";

            $con->exec($update_product);


            if($con) {
                echo "<script>alert('Your Product has been Updated Successfully')</script>";
                echo "<script>window.open('index.php?view_products','_self')</script>";
            }


        }

?>


<?php
    }
?>


