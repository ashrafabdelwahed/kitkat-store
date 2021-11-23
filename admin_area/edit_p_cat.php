<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>


<?php

    if(isset($_GET['edit_p_cat'])) {
        $edit_id = $_GET['edit_p_cat'];

        $get_p_cat = "SELECT * FROM product_categories where p_cat_id = '$edit_id' ";

        $stmt = $con->query($get_p_cat);

        $run_p_cat = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($run_p_cat as $p_cat) {
            $p_cats_title = $p_cat->p_cat_title ;
            $p_cats_desc  = $p_cat->p_cat_desc ;
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
    <title>KITKAT STORE</title>
</head>
<body>


<!-- Start Content --> 

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"> <i></i> Edit  Product Category </h5>
            </div>
            <div class="card-body mb-5">
                <form action="" method="post">

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Category Title </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="p_cat_title" value="<?php echo $p_cats_title ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Product Category Desc </label>
                        <div class="col-md-4">
                            <textarea type="text" class="form-control" name="p_cat_desc"  rows="5" required> <?php echo $p_cats_desc?> </textarea>
                        </div>
                    </div>


                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-danger" name="update_p_cat" value="Insert">
                    </div>
                    

                </form>
            </div>
        </div>
    </div>
    

<!-- End Content -->
    <script src="js/mian.js"></script>
</body>
</html>

<?php


        if(isset($_POST['update_p_cat'])) {

            $p_cat_title      = filter_input(INPUT_POST,'p_cat_title', FILTER_SANITIZE_STRING);
            $p_cat_desc       = filter_input(INPUT_POST,'p_cat_desc', FILTER_SANITIZE_STRING);


            $product = "UPDATE  product_categories SET p_cat_title = '$p_cat_title', p_cat_desc = '$p_cat_desc' where p_cat_id = '$edit_id' ";
            $con->exec($product);

            if($product) {

                echo "<script> alert(' Your Category Product has been Updated Successfully' ) </script>";
                echo "<script> window.open('index.php?view_p_cats', '_self') </script>";

            }

        }

    
?>

<?php
    }
?>



