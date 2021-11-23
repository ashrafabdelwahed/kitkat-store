<?php

    include("./includes/db.php");
    include("./functions/functions.php");



    if(isset($_GET['c_id'])) {
        $customer_id = $_GET['c_id'];
    }

    $ip_add = getRealIpUser();


    $status = "Padding";

    $invoice_no = mt_rand();

    $select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add' ";

    $stmt = $con->query($select_cart);

    $orders = $stmt->fetchAll(PDO::FETCH_CLASS);

    foreach($orders as $order) {
        $pro_id     = $order->p_id;
        $pro_qty    = $order->qty;
        $pro_size   = $order->size;

        $get_products = "SELECT * FROM products where product_id='$pro_id'";

        $stmt = $con->query($get_products);

        $products = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($products as $product) {
            $sub_total = $product->product_price * $pro_qty;

            $insert_customer_order = "INSERT INTO 
            customer_orders(customer_id, due_amount, invoice_no, qty, size, order_date, order_status) 
            VALUES ('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";

            $con->exec($insert_customer_order);


            $insert_padding_order = "INSERT INTO 
            padding_orders(customer_id, invoice_no, product_id, qty, size,order_status) 
            VALUES ('$customer_id','$invoice_no', '$pro_id' ,'$pro_qty','$pro_size','$status')";

            $con->exec($insert_padding_order);


            $delete_cart = "DELETE FROM cart WHERE ip_add='$ip_add' "; 

            $con->exec($delete_cart);

            echo "<script>alert('Your Orders Has Been Submitted, Thanks ')</script>";
            echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

        }

    }

?>