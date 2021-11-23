


<div class='card'>
    <div class='text-center pt-4'>
        <h2>Login</h2>
        <p class='lead '> Already have our account...? </p>
    </div>
    <div class="card-body">
        <form action='checkout.php' method='POST'>
            <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
                <label>Email : </label>
                <input type="email" name="c_email" class="form-control" required >
            </div>

            <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
                <label>Password : </label>
                <input type="password" name="c_pass" class="form-control" required >
            </div>

            <div class="text-center">
                <button class="btn btn-primary" name='login' value="login">Log in</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <h5>Dnont Have account...?   <a href="../customer_register.php">Register Here</a> </h5>
        </div>
    </div>
</div>

<?php

    if(isset($_POST['login'])) {
        $customer_email = $_POST['c_email'];
        $customer_pass = $_POST['c_pass'];

        $select_customer = "SELECT * FROM customers WHERE customer_email = '$customer_email' AND customer_pass = '$customer_pass' ";

        $stmt = $con->query($select_customer);

        $customer_data = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($customer_data as $cust_data) {

            $customer_name  =   $cust_data->customer_name;
            $customer_img   =   $cust_data->customer_image;

        }

        $check_customer = $stmt->rowCount();



        $get_ip = getRealIpUser();

        $select_cart = " SELECT * FROM cart where ip_add = '$get_ip' ";

        $stmt = $con->query($select_cart);

        $check_cart = $stmt->rowCount();

        if($check_customer == 0 ) {
            
            echo "<script>alert('Your email or password is wrong')</script>";

            exit();

        }

        if($check_customer == 1 && $check_cart == 0 ) {

            $_SESSION['customer_email'] = $customer_email;
            $_SESSION['customer_name'] = $customer_name;
            $_SESSION['customer_img'] = $customer_img;

            echo "<script>alert('Your are Loggend in')</script>";
            echo "<script>window.open('customer/my_account.php?my_orders', '_self')</script>";

        }else {

            $_SESSION['customer_email'] = $customer_email;
            $_SESSION['customer_name'] = $customer_name;
            $_SESSION['customer_img'] = $customer_img;

            echo "<script>alert('Your are Loggend in')</script>";
            echo "<script>window.open('checkout.php', '_self')</script>";


        }

    }

?>