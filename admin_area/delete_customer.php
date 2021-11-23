<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>

    <?php
    
        if(isset($_GET['delete_customer'])) {

            $delete_id = $_GET['delete_customer'];


            $delete_customer = "DELETE FROM customers where customer_id = '$delete_id' ";
            $con->exec($delete_customer);

            if($con) {
                echo "<script>alert('One of Your Customer Has Been Deleted Successfully')</script>";
                echo "<script>window.open('index.php?view_customers','_self')</script>";
            }

        }
    
    ?>

<?php

    }

?>