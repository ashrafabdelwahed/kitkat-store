<?php


    session_Start();
    include("./includes/db.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">

    <!-- Lib & styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Area</title>

</head>

<body>

    <div class="login-page">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 offset-md-3">
                    <form method='POST'>
                        <h2 class="text-center mb-5">Admin Login</h2>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <input type="text" class="form-control" name="admin_email" placeholder="Email">
                            </div>

                            <div class="col-md-8 offset-md-2 my-3">
                                <input type="password" class="form-control" name="admin_pass" placeholder="Password">
                            </div>

                            <div class="col-md-8 offset-md-2  text-center">
                                <button type="submit" name='admin_login' class="btn btn-info">Login</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>
</html>

<?php

    if(isset($_POST['admin_login'])) {
        $admin_email = $_POST['admin_email'];
        $admin_pass = $_POST['admin_pass'];

        $admin_login = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_pass='$admin_pass' ";

        $stmt = $con->query($admin_login);

        $run_admin = $stmt->rowCount();

        if($run_admin == 1 ) {

            $_SESSION['admin_email'] = $admin_email;
            echo"<script>alert('Logged in, Welcome Back')</script>";
            echo"<script>window.open('index.php?dashboard','_self')</script>";
            
            
        }else {
            echo"<script>alert('Email or Password is wrong')</script>";
        }

    }

?>