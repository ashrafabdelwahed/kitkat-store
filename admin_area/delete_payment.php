<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>

    <?php
    
        if(isset($_GET['delete_payment'])) {

            $delete_id = $_GET['delete_payment'];


            $delete_payment = "DELETE FROM payments where payment_id = '$delete_id' ";
            $con->exec($delete_payment);

            if($con) {
                echo "<script>alert('One of Your Payment Has Been Deleted Successfully')</script>";
                echo "<script>window.open('index.php?view_payments','_self')</script>";
            }

        }
    
    ?>

<?php

    }

?>