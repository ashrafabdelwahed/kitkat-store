<?php
    include("db.php");
    include("./functions/functions.php");
?>
<div id="footer" class="bg-dark"><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
               
               <h4>Pages</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
                    <li><a href="../shop.php">Shop</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                </ul><!-- ul Finish -->
                
                <hr>
                
                <h4>User Section</h4>
                
                <ul><!-- ul Begin -->
                    <li class="nav-item  <?php if($active == 'my_account') echo "active"; ?>">
                        <?php

                            if(!isset($_SESSION['customer_email'])) {
                                echo "<a class='nav-link' href='../../checkout.php'>Log in</a>";

                            }else {
                                echo "<a class='nav-link' href='my_account.php'>My Account</a>";

                            }

                        ?>
                    </li>

                    <li class="nav-item  <?php if($active == 'my_account') echo "active"; ?>">
                        <?php

                            if(!isset($_SESSION['customer_email'])) {
                                echo "<a class='nav-link' href='../../checkout.php'>Log in</a>";

                            }else {
                                echo "<a class='nav-link' href='my_account.php?edit_account'>Edit Account</a>";

                            }

                        ?>
                    </li>

                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Top Products Categories</h4>
                
                <ul><!-- ul Begin -->
                    <?php
                        getProCat();
                    ?>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Find Us</h4>
                
                <p class="info"><!-- p Start -->
                    
                    <strong>KITKAT Media inc.</strong>
                    <br/>Egypt
                    <br/>Cairo
                    <br/>0818-0683-3157
                    <br/>kitkat779@gmail.com
                    <br/><strong>A.ABDELWAHED</strong>
                    
                </p><!-- p Finish -->
                
                <a href="contact.php">Check Our Contact Page</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3">
                
                <h4>Get The News</h4>
                
                <p class="text-muted">
                    Dont miss our latest update products.
                </p>
                
                <form action="" method="post"><!-- form begin -->
                    <div class="input-group"><!-- input-group begin -->
                        
                        <input type="text" class="form-control" name="email">
                        
                        <span class="input-group-btn"><!-- input-group-btn begin -->
                            
                            <input type="submit" value="subscribe" class="btn btn-primary subscribe">
                            
                        </span><!-- input-group-btn Finish -->
                        
                    </div><!-- input-group Finish -->
                </form><!-- form Finish -->
                
                <hr>
                
                <h4>Keep In Touch</h4>
                
                <p class="social">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
                
            </div>
        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div><!-- #footer Finish -->


<div id="copyright"><!-- #copyright Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row">
            <div class="col-6"><!-- col-md-6 Begin -->
                
                <p class="float-left">&copy; 2019 Kitkat All Rights Reserve</p>
                
            </div><!-- col-md-6 Finish -->
            <div class="col-6"><!-- col-md-6 Begin -->
                
                <p class="float-right">Theme by: <a href="#">A.ABDELWAHED</a></p>
                
            </div><!-- col-md-6 Finish -->
        </div>
    </div><!-- container Finish -->
</div><!-- #copyright Finish -->


<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/lightbox.min.js"></script>
<script src="js/mian.js"></script>
</body>
</html>