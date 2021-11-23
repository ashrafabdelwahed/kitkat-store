<div class="text-center">
    <h1>Do You Realy Want To Delete Your Account ?</h1>

    <form method="post" class="mt-4">
        <input type="submit" name="yes" value="Yes, I Want To Delete" class="btn btn-danger mr-5">
        <input type="submit" name="no" value="No, I Dont Want To Delete" class="btn btn-info">
    </form>
</div>

<?php

    $c_email = $_SESSION['customer_email'];

    if(isset($_POST['yes'])) {
        $delete_customer = "DELETE FROM customers where customer_email = '$c_email' ";
        $con->exec($delete_customer);

        if($con) {
            session_destroy();
            echo "<script>alert('Successfully Delete Your Account,  Feel sorry  About This. Good Bye')</script>";
            echo "<script>window.open('../index.php','_self')</script>";

        }

    }

    if(isset($_POST['no'])) {
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    }

?>