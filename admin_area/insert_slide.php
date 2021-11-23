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
                <h5 class="card-title"> <i></i> Insert Slide </h5>
            </div>
            <div class="card-body mb-5">
                <form method="post">


                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Slide Image </label>
                        <div class="col-md-4 custom-file">
                            <input type="file" class="custom-file-input" name="slide_img">
                            <label class="custom-file-label mx-3"></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Slide Name </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="slide_name"  rows="5" required>
                        </div>
                    </div>


                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-danger" name="Insert_slide" value="Insert">
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


        if(isset($_POST['Insert_slide'])) {

            $slide_img       = filter_input(INPUT_POST,'slide_img', FILTER_SANITIZE_STRING);
            $slide_name      = filter_input(INPUT_POST,'slide_name', FILTER_SANITIZE_STRING);


            $insert_slider = "INSERT INTO slider (slide_image, slide_name) values ('$slide_img','$slide_name') ";
            $con->exec($insert_slider);

            if($insert_slider) {

                echo "<script> alert(' Your New Slide Image Has Been Inserted Successfully' ) </script>";
                echo "<script> window.open('index.php?view_slides', '_self') </script>";

            }

        }

    
?>

<?php
    }
?>


