<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {

    
?>
    <?php
    
        if(isset($_GET['user_profile'])) {
            $edit_id = $_GET['user_profile'];

            $get_users = "SELECT * FROM admins where admin_id = '$edit_id' ";

            $stmt = $con->query($get_users);

            $run_users = $stmt->fetchAll(PDO::FETCH_CLASS);

            foreach($run_users as $user) {
                $admin_id         = $user->admin_id;
                $admin_name       = $user->admin_name;
                $admin_image	  = $user->admin_image;
                $admin_email      = $user->admin_email;
                $admin_country    = $user->admin_country;
                $admin_contact	  = $user->admin_contact;
                $admin_job	      = $user->admin_job;
                $admin_about      = $user->admin_about;
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
                <h5 class="card-title"> <i></i> Edit User</h5>
            </div>
            <div class="card-body mb-5">
                <form action="" method="post">

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Username</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="admin_name" value="<?php echo $admin_name ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">E-mail</label>
                        <div class="col-md-4">
                            <input type="email" class="form-control" name="admin_email" value="<?php echo $admin_email ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Country</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="admin_country" value="<?php echo $admin_country ?>" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Phone</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="admin_contact" value="<?php echo $admin_contact ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Job</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="admin_job" value="<?php echo $admin_job ?>" required>
                        </div>
                    </div>

                
                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2"> Image </label>
                        <div class="col-md-4 custom-file">
                            <input type="file" class="custom-file-input" name="admin_image">
                            <label class="custom-file-label mx-3" for="inputGroupFile01"> <?php echo $admin_image ?> </label>
                        </div>
                        <div class="float-left">
                            <img width="70px" src="./admin_images/<?php echo $admin_image ?>" alt="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">About</label>
                        <div class="col-md-4">
                            <textarea type="text" class="form-control" cols="19" rows="6" name="admin_about"> <?php echo $admin_about ?> </textarea>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-danger" name="update_user" value="Edit User">
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


        if(isset($_POST['update_user'])) {

            $admin_name     = filter_input(INPUT_POST,'admin_name', FILTER_SANITIZE_STRING);
            $admin_email    = filter_input(INPUT_POST,'admin_email', FILTER_SANITIZE_EMAIL);
            $admin_pass     = filter_input(INPUT_POST,'admin_pass', FILTER_SANITIZE_STRING);
            $admin_country  = filter_input(INPUT_POST,'admin_country', FILTER_SANITIZE_STRING);
            $admin_contact  = filter_input(INPUT_POST,'admin_contact', FILTER_SANITIZE_STRING);
            $admin_job      = filter_input(INPUT_POST,'admin_job', FILTER_SANITIZE_STRING);
            $admin_about    = filter_input(INPUT_POST,'admin_about', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES );

            if($_POST['admin_image'] == '') {
                $admin_img = $admin_image;
            }else {
                $admin_img    = filter_input(INPUT_POST,'admin_image', FILTER_SANITIZE_STRING);
            }

            $update_user = "UPDATE admins SET 
            admin_name    = '$admin_name',
            admin_email   = '$admin_email',
            admin_country = '$admin_country',    
            admin_contact = '$admin_contact',    
            admin_job     = '$admin_job',
            admin_image   = '$admin_img',
            admin_about   = '$admin_about'
            
            where admin_id = '$admin_id'
            
            ";
            $con->exec($update_user);

            if($update_user) {

                echo "<script> alert( 'User Has Been Updated Successfully' ) </script>";
                echo "<script> window.open('index.php?view_users', '_self') </script>";

            }

        }

    
?>

<?php
    }
?>


