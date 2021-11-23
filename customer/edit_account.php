<?php

    $customer_session = $_SESSION['customer_email'];

    $get_customer = "SELECT * FROM customers WHERE customer_email  = '$customer_session' ";

    $stmt = $con->query($get_customer);

    $customers = $stmt->fetchAll(PDO::FETCH_CLASS);

    foreach($customers as $customer) {

        $customer_id        = $customer->customer_id;
        $customer_name	    = $customer->customer_name;
        $customer_email     = $customer->customer_email;
        $customer_pass      = $customer->customer_pass;
        $customer_country   = $customer->customer_country;
        $customer_city      = $customer->customer_city;
        $customer_contact   = $customer->customer_contact;
        $customer_address   = $customer->customer_address;
        $customer_image     = $customer->customer_image;
        

    }

?>



<h1 class="text-center mb-5">Edit Your Account</h1>


<form method="POST" enctype="multipart/form-data">

    <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
        <label class="font-weight-bold">Customer Name :</label>
        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name ?>" required>
    </div>

    <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
        <label class="font-weight-bold">Customer Email :</label>
        <input type="email" name="c_email" class="form-control" value="<?php echo $customer_email ?>" required >
    </div>

    <div class="col">
        <div class="row">
            <div class="form-group  col-md-3 offset-md-3">
                <label class="font-weight-bold">Customer Country :</label>
                <input type="text" name="c_country" class="form-control" value="<?php echo $customer_country ?>" required>
            </div>

            <div class="form-group  col-md-3">
                <label class="font-weight-bold">Customer City :</label>
                <input type="text" name="c_city" class="form-control" value="<?php echo $customer_city ?>" required>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row">
            <div class="form-group  col-md-3 offset-md-3">
                <label class="font-weight-bold">Customer Contact :</label>
                <input type="text" name="c_phone" class="form-control" value="<?php echo $customer_contact ?>" required>
            </div>

            <div class="form-group  col-md-3">
                <label class="font-weight-bold">Customer Address : </label>
                <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address ?>" required>
            </div>
        </div>
    </div>
    
    <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
        <label class="font-weight-bold">Customer Profile Picture </label>
        <div class="custom-file">
            <input type="file" name="c_images" class="custom-file-input">
            <label class="custom-file-label">Choose file</label>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" name="update" class="btn btn-danger">Update Now</button>
    </div>

</form>

<?php





    if(isset($_POST['update'])) {
        $c_id           = $customer_id;
        $c_name	        = $_POST['c_name'] ;
        $c_email        = $_POST['c_email'] ;
        $c_country      = $_POST['c_country'] ;
        $c_city         = $_POST['c_city'] ;
        $c_phone        = $_POST['c_phone'] ;
        $c_address      = $_POST['c_address'] ;
        $c_images       = $_FILES["c_images"]["name"];

        if(empty($c_images)) {
            $c_images = $customer_image;
        }else {
            $c_images       = $_FILES["c_images"]["name"];
        }


        $update_customer = "UPDATE customers SET 
        customer_name      ='$c_name' ,     customer_email	   ='$c_email' ,
        customer_country   ='$c_country',   customer_city      ='$c_city' ,
        customer_contact   ='$c_phone',     customer_address   ='$c_address' ,
        customer_image     ='$c_images'     WHERE customer_id = '$c_id' ";


        $con->exec($update_customer);

        if($con) {
            echo "<script>alert('Your Account has been edited, to complete the process, please Relogin')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }

    }

?>

