<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>


    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Orders</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered ">
                        <thead class='table-dark'>
                            <tr class='text-center'>
                                <th>ID</th>
                                <th>Customer Email</th>
                                <th>Invoice No</th>
                                <th>Product Name</th>
                                <th>Product Qty</th>
                                <th>Product Size</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>status</th>
                                <th>Delete</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                                $get_order = "SELECT * FROM padding_orders";

                                $stmt = $con->query($get_order);

                                $orders = $stmt->fetchAll(PDO::FETCH_CLASS);

                                foreach($orders as $order) {

                                    $order_id       = $order->order_id;
                                    $customer_id    = $order->customer_id;
                                    $invoice_no     = $order->invoice_no;
                                    $product_id     = $order->product_id;
                                    $qty            = $order->qty;
                                    $size           = $order->size;
                                    $order_status   =$order->order_status;

                                        // Get customer email where  customer_id = customer_id

                                            $get_c_email = "SELECT customer_email FROM customers where customer_id = '$customer_id' ";

                                            $stmt = $con->query($get_c_email);

                                            $run_c_email = $stmt->fetchAll(PDO::FETCH_CLASS);

                                            foreach($run_c_email as $customer_email ) {
                                                $c_email = $customer_email->customer_email;
                                            }

                                        // Get customer email

                                        // Get Porduct name, price   where  product_id = product_id 

                                            $get_p_name_price = "SELECT product_title,product_price FROM products where product_id = '$product_id' ";

                                            $stmt = $con->query($get_p_name_price);

                                            $run_p_name_price = $stmt->fetchAll(PDO::FETCH_CLASS);

                                            foreach($run_p_name_price as $pro_name_price ) {
                                                $p_name = $pro_name_price->product_title;
                                                $p_price = $pro_name_price->product_price;
                                            }

                                        // Get customer email

                                        // Get Porduct name, price   where  product_id = product_id 

                                            $get_order_date = "SELECT order_date FROM customer_orders where order_id = '$order_id' ";

                                            $stmt = $con->query($get_order_date);

                                            $run_order_date = $stmt->fetchAll(PDO::FETCH_CLASS);

                                            foreach($run_order_date as $orders_date ) {
                                                $order_date = $orders_date->order_date;
                                            }

                                        // Get customer email

                                            
                                    $total_amount = $p_price * $qty;
                                    

                                    
                                    echo "
                                            <tr class='text-center'>
                                                <td>$order_id</td>
                                                <td>$c_email</td>
                                                <td>$invoice_no</td>
                                                <td>$p_name</td>
                                                <td>$qty</td>
                                                <td>$size</td>
                                                <td>$order_date</td>
                                                <td>$total_amount</td>
                                                <td>$order_status</td>

                                                <td >
                                                    <a class='btn btn-danger' href='index.php?delete_order=$order_id'>
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