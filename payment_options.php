<div class="card">

    <?php
    
        $session_email = $_SESSION['customer_email'];

        $select_customer = "SELECT * FROM customers WHERE  customer_email='$session_email' ";

        $stmt = $con->query($select_customer);

        $row_customer = $stmt->rowCount();

        $result = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($result as $customer) {

            $customer_id = $customer->customer_id;

        }


    ?>

    <div class="text-center pt-4">
        <h2>Payment Options For You</h2>
        <p class="lead">
            <a href="order.php?c_id=<?php echo $customer_id ?>">offline Payment</a>
        </p>
        <p class="lead">
            <a href="#">
                Paypal payment
                <img class='img-fluid d-block m-auto' src="./admin_area/paypal-img-2.png" alt="">
            </a>
        </p>
    </div>

</div>