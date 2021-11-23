<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {

?>


<div class="sidebar">
    <ul class="links-area list-unstyled">

        <div class="logo-area text-center"> <a href="index.php?dashboard">KITKAT</a> </div>


        <li>
            <a href="index.php?dashboard"> <i class="fas fa-tachometer-alt mr-2"></i>Dashboard </a>
        </li>

        <li>
            <a class="toggle-submenu">
                <i class="fas fa-tags mr-2"></i> 
                Products
                <i class="fa fa-angle-right"></i>
            </a>
            <ul class="child-links list-unstyled">
                <li><a href="index.php?insert_product"> Insert Product </a></li>
                <li><a href="index.php?view_products"> View Products </a></li>
            </ul>
        </li>

        <li>
            <a class="toggle-submenu">
                <i class="fas fa-edit mr-2"></i> 
                Products Categories
                <i class="fa fa-angle-right"></i>
            </a>
            <ul class="child-links list-unstyled">
                <li>
                    <a href="index.php?insert_p_cat"> Insert Product Category </a>
                </li>
                <li>
                    <a href="index.php?view_p_cats"> View Products Categories </a>
                </li>
            </ul>
        </li>


        <li>
            <a class="toggle-submenu">
                <i class="fas fa-book mr-2"></i>
                Categories
                <i class="fa fa-angle-right"></i>
            </a>
            <ul class="child-links list-unstyled">
                <li>
                    <a href="index.php?insert_cat"> Insert Category </a>
                </li>
                <li>
                    <a href="index.php?view_cats"> View Categories </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="toggle-submenu">
                <i class="fas fa-cog mr-2"></i>
                Slides
                <i class="fa fa-angle-right"></i>
            </a>
            <ul class="child-links list-unstyled">
                <li>
                    <a href="index.php?insert_slide"> Insert Slide </a>
                </li>
                <li>
                    <a href="index.php?view_slides"> View Slides </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="index.php?view_customers">
                <i class="fas fa-users mr-2"></i>
                View Customers
            </a>
        </li> 
        
        <li>
            <a href="index.php?view_orders">
                <i class="fas fa-book mr-2"></i>
                View Orders
            </a>
        </li>
        
        <li>
            <a href="index.php?view_payments">
                <i class="fas fa-money-bill-wave mr-2"></i>
                View Payments
            </a>
        </li>

        <li><a class="toggle-submenu">
            <i class="fas fa-users mr-2"></i>
            Users
            <i class="fa fa-angle-right"></i></a>
            <ul class="child-links list-unstyled">
                <li>
                    <a href="index.php?insert_user"> Insert User </a>
                </li>
                <li>
                    <a href="index.php?view_users"> View Users </a>
                </li>
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id ?>"> Edit User Profile </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="logout.php">
                <i class="fa fa-fw fa-power-off mr-2"></i> Log Out
            </a>
        </li>

    </ul>
</div>


<?php
}
?>