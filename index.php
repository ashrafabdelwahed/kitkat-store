    <?php

        $active = "home";
        include("./includes/header.php");
    ?>


<!-- Start Slider -->
    <div class="slider">
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                
            <div class="carousel-inner">
                
                <?php 
                    

                    $stmt = $con->query("SELECT * from slider LIMIT 0,1");
                    $result = $stmt->fetchAll(PDO::FETCH_CLASS);

                    foreach($result as $img) {

                        echo "

                                <div class='carousel-item active'>
                                    <img class='d-block w-100' src='./admin_area/slides_images/$img->slide_image'>
                                </div>

                            ";

                    }

                ?>


                <?php 
                    

                    $stmt = $con->query("SELECT * from slider where slide_image != '$img->slide_image' ");
                    $result = $stmt->fetchAll(PDO::FETCH_CLASS);

                    foreach($result as $img) {

                        echo "

                                <div class='carousel-item'>
                                    <img class='d-block w-100' src='./admin_area/slides_images/$img->slide_image'>
                                </div>

                            ";

                    }

                ?>

            </div>

            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
    </div>    
<!-- End Slider -->

<!-- Start advantages -->
    <div class="advantages mt-3 text-center">
        <div class="container">
            <div class="row">

                    <?php
                        $get_box = "SELECT * FROM boxes_section";
                        
                        $stmt = $con->query($get_box);

                        $run_box = $stmt->fetchAll(PDO::FETCH_CLASS);

                        foreach($run_box as $boxes) {

                            $box_id = $boxes->box_id;
                            $box_title = $boxes->box_title;
                            $box_desc = $boxes->box_desc;
                            $box_icon = $boxes->box_icon;


                            echo "

                            
                                <div class='col-md-4 col-sm-12'>
                                    <div class='card mb-3'>
                                        <div class='card-body'>
                                            <i class='$box_icon'></i>
                                            <h5 class='card-title text-center text-uppercase font-weight-bold mt-1'><a href='#'> $box_title</a></h5>
                                            <p class='card-text'> $box_desc  </p>
                                        </div>
                                    </div>
                                </div>

                                ";

                        }


                    ?>




            </div>
        </div>
    </div>
<!-- End advantages -->

<!-- Start Hot -->
    <div class="hot text-center mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold">Check out what's new</h2>
                    <p> Latest of the trends we have to offer</p>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
<!-- End Hot -->

<!-- Start Content -->

    <div id="content" class="content mt-5">
        <div class="container">
            <div class="row">
                <?php
                    getPro();
                ?>
            </div>
        </div>
    </div>

<!-- End Content -->

<!-- Start Footer -->
    <?php 
    
        include("includes/footer.php");
    
    ?>
<!-- End Footer -->


