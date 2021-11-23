<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>


    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Category</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered ">
                        <thead class='table-dark'>
                            <tr class='text-center'>
                                <th>ID</th>
                                <th>Category Title</th>
                                <th>Category Desc </th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php
                        
                            $get_cats = "SELECT * FROM categories";

                            $stmt = $con->query($get_cats);

                            $pro_cats = $stmt->fetchAll(PDO::FETCH_CLASS);

                            foreach($pro_cats as $cats) {
                                $cats_id = $cats->cat_id ;
                                $cats_title = $cats->cat_title ;
                                $cats_desc  = $cats->cat_desc ;

                                echo "
                                        <tr class='text-center'>
                                            <td >$cats_id</td>
                                            <td width='200'>$cats_title</td>
                                            <td width='500'>$cats_desc</td>


                                            <td>
                                                <a class='btn btn-primary' href='index.php?edit_cat=$cats_id'>
                                                    <i class='fas fa-edit'></i> Edit
                                                </a>
                                            </td>

                                            <td>
                                                <a class='btn btn-danger' href='index.php?delete_cat=$cats_id'>
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