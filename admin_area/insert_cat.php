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
                <h5 class="card-title"> <i></i> Insert Category </h5>
            </div>
            <div class="card-body mb-5">
                <form action="" method="post">

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Category Title </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="cat_title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Category Desc </label>
                        <div class="col-md-4">
                            <textarea  class="form-control" name="cat_desc"  rows="5" required></textarea>
                        </div>
                    </div>


                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-danger" name="Insert_p_cat" value="Insert">
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


        if(isset($_POST['Insert_p_cat'])) {

            $cat_title          = filter_input(INPUT_POST,'cat_title', FILTER_SANITIZE_STRING);
            $cat_desc       = filter_input(INPUT_POST,'cat_desc', FILTER_SANITIZE_STRING);


            $insert_cat = "INSERT INTO categories (cat_title, cat_desc) values ('$cat_title','$cat_desc') ";
            $con->exec($insert_cat);

            if($insert_cat) {

                echo "<script> alert(' Your New Category Has Been Inserted Successfully' ) </script>";
                echo "<script> window.open('index.php?view_cats', '_self') </script>";

            }

        }

    
?>

<?php
    }
?>


