
<h1 class="text-center mb-5"> Change Password </h1>

<form method="POST">

    <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
        <label class="font-weight-bold">Old Password :</label>
        <input type="password" name="old_pass" class="form-control" required>
    </div>

    <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
        <label class="font-weight-bold">New Password :</label>
        <input type="password" name="new_pass" class="form-control" required>
    </div>


    <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
        <label class="font-weight-bold">Confirm New Password :</label>
        <input type="password" name="new_pass_again" class="form-control" required>
    </div>

    <div class="text-center">
        <button type="submit" name="submit" class="btn btn-danger">Update Now</button>
    </div>

</form>


<?php

if(isset($_POST['submit'])) {
    $c_email            = $_SESSION['customer_email'];
    $c_old_pass         = $_POST['old_pass'];
    $c_new_pass         = $_POST['new_pass'];
    $c_new_pass_again   = $_POST['new_pass_again'];

    $select_old_pass = "SELECT * FROM customers where customer_pass	= '$c_old_pass' AND customer_email = '$c_email' ";

    $stmt = $con->query($select_old_pass);

    $run_pass = $stmt->rowCount();

    if($run_pass) {

        if($c_new_pass == $c_new_pass_again) {
            $update_pass = "UPDATE customers SET customer_pass='$c_new_pass' ";
            $con->exec($update_pass);
            echo "<script>alert('Your Password has been Updated')</script>";
            echo "<script>window.open('my_account.php?my_orders','_self')</script>";

        }else {
            echo "<script>alert('Your password and confirmation password do not match.')</script>";
        }

    }else {
        echo "<script>alert('Old Password is Wrong')</script>";
    }

}


?>