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
                <h5 class="card-title"> <i></i> Insert User</h5>
            </div>
            <div class="card-body mb-5">
                <form action="" method="post">

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Username</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="admin_name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">E-mail</label>
                        <div class="col-md-4">
                            <input type="email" class="form-control" name="admin_email" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Password</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="admin_pass" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Country</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="admin_country" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Phone</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="admin_contact" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">Job</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="admin_job" required>
                        </div>
                    </div>

                
                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2"> Image </label>
                        <div class="col-md-4 custom-file">
                            <input type="file" class="custom-file-input" name="admin_image" required>
                            <label class="custom-file-label mx-3" for="inputGroupFile01"></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 offset-md-2">About</label>
                        <div class="col-md-4">
                            <textarea type="text" class="form-control" cols="19" rows="6" name="admin_about"></textarea>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-danger" name="insert" value="Insert User">
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


        if(isset($_POST['insert'])) {

            $admin_name     = filter_input(INPUT_POST,'admin_name', FILTER_SANITIZE_STRING);
            $admin_email    = filter_input(INPUT_POST,'admin_email', FILTER_SANITIZE_EMAIL);
            $admin_pass     = filter_input(INPUT_POST,'admin_pass', FILTER_SANITIZE_STRING);
            $admin_country  = filter_input(INPUT_POST,'admin_country', FILTER_SANITIZE_STRING);
            $admin_contact  = filter_input(INPUT_POST,'admin_contact', FILTER_SANITIZE_STRING);
            $admin_job      = filter_input(INPUT_POST,'admin_job', FILTER_SANITIZE_STRING);
            $admin_image    = filter_input(INPUT_POST,'admin_image', FILTER_SANITIZE_STRING);
            $admin_about    = filter_input(INPUT_POST,'admin_about', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES );

            $insert_user = "INSERT INTO admins 
            (   admin_name,
                admin_email,
                admin_pass,
                admin_country,
                admin_contact,
                admin_job,
                admin_image,
                admin_about
            ) VALUES 
            (  '$admin_name',
                '$admin_email',
                '$admin_pass',
                '$admin_country',
                '$admin_contact',
                '$admin_job',
                '$admin_image',
                '$admin_about')
                            ";
            $con->exec($insert_user);

            if($insert_user) {

                echo "<script> alert( 'User Has Been Inserted Successfully' ) </script>";
                echo "<script> window.open('index.php?view_users', '_self') </script>";

            }

        }

    
?>

<?php
    }
?>


