<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>

    <?php
    
        if(isset($_GET['delete_order'])) {

            $delete_id = $_GET['delete_order'];


            $delete_order = "DELETE FROM padding_orders where order_id = '$delete_id' ";
            $con->exec($delete_order);

            if($con) {
                echo "<script>alert('One of Your Order Has Been Deleted Successfully')</script>";
                echo "<script>window.open('index.php?view_orders','_self')</script>";
            }

        }
    
    ?>

<?php

    }

?>