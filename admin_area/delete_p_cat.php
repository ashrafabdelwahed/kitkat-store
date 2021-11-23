<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>

    <?php
    
        if(isset($_GET['delete_p_cat'])) {

            $delete_id = $_GET['delete_p_cat'];


            $delete_p_cat = "DELETE FROM product_categories where p_cat_id = '$delete_id' ";
            $con->exec($delete_p_cat);

            if($con) {
                echo "<script>alert('One of Your Product Category Has Been Deleted Successfully')</script>";
                echo "<script>window.open('index.php?view_p_cats','_self')</script>";
            }

        }
    
    ?>

<?php

    }

?>