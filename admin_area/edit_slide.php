<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {

?>
    
    <?php

    if(isset($_GET['edit_slide'])) {
        $edit_id = $_GET['edit_slide'];

        $get_slide = "SELECT * FROM slider where slide_id = '$edit_id' ";

        $stmt = $con->query($get_slide);

        $run_slide = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($run_slide as $slide) {
            $slide_name = $slide->slide_name ;
            $slide_image  = $slide->slide_image;
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
                <h5 class="card-title"> <i></i> Edit Slide </h5>
            </div>
            <div class="card-body mb-5">
                <form method="post">


                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Slide Image </label>
                        <div class="col-md-4 custom-file">
                            <input type="file" class="custom-file-input" name="slide_img">
                            <label class="custom-file-label mx-3"><?php echo $slide_image ?></label>
                        </div>
                        <div class="float-right">
                            <img  src="./slides_images/<?php echo $slide_image ?>" alt="<?php echo $slide_name ?>" style='width:100px'>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Slide Name </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="slide_name"  rows="5" value="<?php echo $slide_name ?>" required>
                        </div>
                    </div>


                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-danger" name="update_slide" value="Update">
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


        if(isset($_POST['update_slide'])) {

            $slide_img       = filter_input(INPUT_POST,'slide_img', FILTER_SANITIZE_STRING);
            $slide_name      = filter_input(INPUT_POST,'slide_name', FILTER_SANITIZE_STRING);


            $update_slider = "UPDATE slider SET slide_image = '$slide_img' , slide_name ='$slide_name' where slide_id = '$edit_id'  ";
            $con->exec($update_slider);

            if($update_slider) {

                echo "<script> alert(' Your Slide Image Has Been Updated Successfully' ) </script>";
                echo "<script> window.open('index.php?view_slides', '_self') </script>";

            }

        }

    
?>

<?php
    }
?>


