<div class="header navbar bg-dark">
    <i class="fas fa-exchange-alt fa-lg toggle-sidebar"></i>
    <ul class="list-unstyled m-0 mr-5">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $admin_name ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" >
                <li class='dropdown-item'>
                    <a href="index.php?user_profile=<?php echo $admin_id ?>">
                        <i class="fa fa-fw fa-user"></i> Profile
                    </a>
                </li>
                <li class='dropdown-item'>
                    <a href="index.php?view_products">
                        <i class="fa fa-fw fa-envelope"></i> Products
                        <span class="badge"> <?php echo $num_products ?> </span>
                    </a>
                </li>
                <li class='dropdown-item'>
                    <a href="index.php?view_customers">
                        <i class="fa fa-fw fa-users"></i> Customeres
                        <span class="badge"><?php echo $num_customers ?></span>
                    </a>
                </li>
                <li class='dropdown-item'>
                    <a href="index.php?view_cats">
                        <i class="fas fa-cog"></i> Product Categories
                        <span class="badge"><?php echo $num_p_categories ?></span>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <li class='dropdown-item'>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>