<?php
    $active = "contact";
    include("./includes/header.php");
?>




<!-- Strat breadcrumb -->
    <div class="breadcrumb-content mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Content Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<!-- End breadcrumb -->

<!-- Start Content -->

    <div class="content-contact-us py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="text-capitalize">Feel free to contact us</h1>
                <p class="text-muted">if you have any question, feel free to contact us, our customer service work <b>24/7</b></p>
            </div>
            <form action="contact.php" method="post">
                
                <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" required aria-describedby="emailHelp">
                </div>

                <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control" required>
                </div>

                <div class="form-group offset-lg-3  offset-md-2 col-md-8 col-lg-6">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" required style=""></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-danger">Send Message</button>
                </div>
            </form>

            <?php
                if(isset($_POST['submit'])) {

                    //  Admin receives message with this

                    $sender_name        = $_POST['name'];
                    $sender_email       = $_POST['email'];
                    $sender_subject     = $_POST['subject'];
                    $sender_message     = $_POST['message'];

                    $revceiver_email = "kitkat.store7422@gmail.com";

                    mail($revceiver_email, $sender_name, $sender_subject, $sender_message, $sender_email);


                    // auto  reply to sender with this

                    $email = $_POST['email'];

                    $subject = "Welcome to my website";

                    $msg = "Thanks for sending us Message, ASAP we will replay your message";

                    $from = "kitkat.store7422@gmail.com";

                    mail($email, $subject, $msg, $from);

                    echo "
                        <div class='alert alert-success text-center mt-4 font-weight-bold' role='alert'>
                            Your Message Has Sent sucessfully </h2>
                        </div>
                        ";


                }
            ?>

        </div>
    </div>

<!-- End Content -->

<!-- Start Footer -->
    <?php 
        
        include("includes/footer.php");

    ?>
<!-- End Footer -->
