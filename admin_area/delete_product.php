<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>

    <?php
    
        if(isset($_GET['delete_product'])) {

            $delete_id = $_GET['delete_product'];


            $delete_pro = "DELETE FROM products where product_id = '$delete_id' ";
            $con->exec($delete_pro);

            if($con) {
                echo "<script>alert('One of Your Product has been Deleted')</script>";
                echo "<script>window.open('index.php?view_products','_self')</script>";
            }

        }
    
    ?>

<?php

    }

?>