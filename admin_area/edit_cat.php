<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>


<?php

    if(isset($_GET['edit_cat'])) {
        $edit_id = $_GET['edit_cat'];

        $get_cat = "SELECT * FROM categories where cat_id = '$edit_id' ";

        $stmt = $con->query($get_cat);

        $run_cat = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($run_cat as $cat) {
            $cats_title = $cat->cat_title ;
            $cats_desc  = $cat->cat_desc ;
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
                <h5 class="card-title"> <i></i> Edit Category </h5>
            </div>
            <div class="card-body mb-5">
                <form action="" method="post">

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2"> Category Title </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="cat_title" value="<?php echo $cats_title ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2"> Category Desc </label>
                        <div class="col-md-4">
                            <textarea  class="form-control" name="cat_desc"  rows="5" required> <?php echo $cats_desc?> </textarea>
                        </div>
                    </div>


                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-danger" name="update_cat" value="Insert">
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


        if(isset($_POST['update_cat'])) {

            $cat_title      = filter_input(INPUT_POST,'cat_title', FILTER_SANITIZE_STRING);
            $cat_desc       = filter_input(INPUT_POST,'cat_desc', FILTER_SANITIZE_STRING);


            $product = "UPDATE  categories SET cat_title = '$cat_title', cat_desc = '$cat_desc' where cat_id = '$edit_id' ";
            $con->exec($product);

            if($product) {

                echo "<script> alert(' Your Category has been Updated Successfully' ) </script>";
                echo "<script> window.open('index.php?view_cats', '_self') </script>";

            }

        }

    
?>

<?php
    }
?>



