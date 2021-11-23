<?php
            
    $customer_session = $_SESSION['customer_email'];
    
    $get_customer = "SELECT  * FROM customers WHERE customer_email= '$customer_session' ";

    $stmt = $con->query($get_customer);

    $row_customer = $stmt->rowCount();

    $customer = $stmt->fetchAll(PDO::FETCH_CLASS);

    foreach($customer as $cust) {

        $customer_img = $cust->customer_image;
        $customer_name = $cust->customer_name;

    }

?>



<div class="card">
    <div class="card-header text-center">

        <?php

            if(!isset($_SESSION['customer_email'])){

            }else {
                echo "
                        <img src='./customer_images/$customer_img' class='img-fluid' alt='image $customer_name'>
                        <h3 class='card-title h5 mt-3 text-capitalize'>$customer_name </h3>
                    ";
            }
        
        ?>
    

    </div>

    <div class="card-body">
        <ul class="list-group list-group-flush">

            <li class="list-group-item list-group-item-action <?php if(isset($_GET['my_orders'])){echo "active";} ?>">
                <a href="my_account.php?my_orders">
                    <i class="fa fa-list mr-2"></i> My Orders
                </a>
            </li>

            <li class="list-group-item list-group-item-action <?php if(isset($_GET['pay_offline'])){echo "active";} ?>">
                <a href="my_account.php?pay_offline">
                    <i class="fa fa-bolt mr-2"></i> Pay Offline
                </a>
            </li>

            <li class="list-group-item list-group-item-action <?php if(isset($_GET['edit_account'])){echo "active";} ?>">
                <a href="my_account.php?edit_account">
                    <i class="fas fa-pencil-alt mr-2"></i> Edit Account
                </a>
            </li>

            <li class="list-group-item list-group-item-action <?php if(isset($_GET['change_pass'])){echo "active";} ?>">
                <a href="my_account.php?change_pass">
                    <i class="fas fa-user-shield mr-2"></i> Change Passowrd
                </a>
            </li>

            <li class="list-group-item list-group-item-action <?php if(isset($_GET['delete_account'])){echo "active";} ?>">
                <a href="my_account.php?delete_account">
                    <i class="fas fa-trash mr-2"></i> Delete Account
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                </a>
            </li>


        </ul>
    </div>

</div>