<div class="text-center mb-5">
    <h1>My Orders</h1>
    <p class="lead"> Your orders on one place </p>

    <p class="text-muted">
        if you have any question, feel free to <b><a href="../contact.php">contact us</a></b>. our customer service work <b>24/7</b>
    </p>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ON:</th>
                <th scope="col">Due Amount:</th>
                <th scope="col">Invoice No:</th>
                <th scope="col">Qty</th>
                <th scope="col">Size:</th>
                <th scope="col">Order Date:</th>
                <th scope="col">Paid / Unpaid:</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>

            <?php
            
                $customer_session = $_SESSION['customer_email'];
    
                $get_customer = "SELECT  * FROM customers WHERE customer_email= '$customer_session' ";
            
                $stmt = $con->query($get_customer);
                        
                $customer = $stmt->fetchAll(PDO::FETCH_CLASS);

                foreach($customer as $cust) {
                    $customer_id = $cust->customer_id;
                }


                $get_orders = "SELECT * FROM customer_orders where customer_id = '$customer_id' ";

                $stmt = $con->query($get_orders);

                $orders = $stmt->fetchAll(PDO::FETCH_CLASS);

                foreach($orders as $order) {
                    $order_id = $order->order_id;
                    $due_amount = $order->due_amount;
                    $invoice_no = $order->invoice_no;
                    $qty = $order->qty;
                    $size = $order->size;
                    $order_date = $order->order_date;
                    $order_status = $order->order_status;

                    if($order_status == 'Padding') {
                        $order_status = "Unpaid";
                    }else {
                        $order_status = "Paid";
                    }

                    echo "
                    
                    <tr class='text-center'>
                        <td> # $order_id </td>
                        <td> $$due_amount </td>
                        <td> $invoice_no </td>
                        <td> $qty </td>
                        <td> $size </td>
                        <td> $order_date </td>
                        <td> $order_status </td>
                        <td>
                            <a href='confirm.php?order_id=".$order_id."' target='_blank' class='btn btn-primary btn-sm'>Confirm Paid</a>
                        </td>
                    </tr>
                    
                        ";

                }
            
            ?>


        </tbody>
    </table>
</div>