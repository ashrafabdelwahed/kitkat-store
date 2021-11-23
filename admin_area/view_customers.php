<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>


    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Customers</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered ">
                        <thead class='table-dark'>
                            <tr class='text-center'>
                                <th>ID</th>
                                <th class='text-center'>Name</th>
                                <th>Image</th>
                                <th>E-Mail</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                                $get_customers = "SELECT * FROM customers";

                                $stmt = $con->query($get_customers);

                                $customers = $stmt->fetchAll(PDO::FETCH_CLASS);

                                foreach($customers as $customer) {
                                    $customer_id            = $customer->customer_id;
                                    $customer_name          = $customer->customer_name;
                                    $customer_email         = $customer->customer_email;
                                    $customer_country       = $customer->customer_country;
                                    $customer_city          = $customer->customer_city;
                                    $customer_contact	    = $customer->customer_contact;
                                    $customer_address	    = $customer->customer_address;
                                    $customer_image	        = $customer->customer_image;
                                    

                                    echo "
                                            <tr class='text-center'>
                                                <td>$customer_id</td>
                                                <td>$customer_name</td>
                                                <td> <img src='../customer/customer_images/$customer_image' style='max-width: 70px'> </td>
                                                <td>$customer_email</td>
                                                <td>$customer_country</td>
                                                <td>$customer_city</td>
                                                <td>$customer_contact</td>
                                                <td>$customer_address</td>

                                                <td >
                                                    <a class='btn btn-danger' href='index.php?delete_customer=$customer_id'>
                                                        <i class='fas fa-trash'></i> Delete
                                                    </a>
                                                </td>

                                            </tr>
                                        ";
                                }
                            
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
    



<?php
    }
?>