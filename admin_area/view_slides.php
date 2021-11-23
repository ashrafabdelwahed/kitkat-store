<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>


    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Slides</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered ">
                        <thead class='table-dark'>
                            <tr class='text-center'>
                                <th>Slide ID</th>
                                <th>Slide Image : </th>
                                <th>Slide Image: </th>
                                <th>Slide Edit: </th>
                                <th>Slide Delete: </th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                                $get_slider = "SELECT * FROM slider";

                                $stmt = $con->query($get_slider);

                                $slider = $stmt->fetchAll(PDO::FETCH_CLASS);

                                foreach($slider as $slide) {
                                    $slide_id    = $slide->slide_id ;
                                    $slide_name = $slide->slide_name ;
                                    $slide_img   = $slide->slide_image ;
                                
                            
                                    echo "
                                            <tr class='text-center'>
                                                <td>$slide_id</td>
                                                <td>$slide_name</td>
                                                <td> <img src='./slides_images/$slide_img' style='max-width: 200px'> </td>




                                                <td>
                                                    <a class='btn btn-primary' href='index.php?edit_slide=$slide_id'>
                                                        <i class='fas fa-edit'></i> Edit
                                                    </a>
                                                </td>

                                                <td>
                                                    <a class='btn btn-danger' href='index.php?delete_slide=$slide_id'>
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