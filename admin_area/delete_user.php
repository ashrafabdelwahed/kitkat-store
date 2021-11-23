<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>

    <?php
    
        if(isset($_GET['delete_user'])) {

            $delete_id = $_GET['delete_user'];


            $delete_user = "DELETE FROM admins where admin_id = '$delete_id' ";
            $con->exec($delete_user);

            if($con) {
                echo "<script>alert('One of Admins User Has Been Deleted Successfully')</script>";
                echo "<script>window.open('index.php?view_users','_self')</script>";
            }

        }
    
    ?>

<?php

    }

?>