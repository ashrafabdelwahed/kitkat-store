<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>

    <?php
    
        if(isset($_GET['delete_slide'])) {

            $delete_id = $_GET['delete_slide'];


            $delete_slide = "DELETE FROM slider where slide_id = '$delete_id' ";
            $con->exec($delete_slide);

            if($con) {
                echo "<script>alert('One of Your Slide Has Been Deleted Successfully')</script>";
                echo "<script>window.open('index.php?view_slides','_self')</script>";
            }

        }
    
    ?>

<?php

    }

?>