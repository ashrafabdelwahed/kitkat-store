<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>


    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Product Category</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered ">
                        <thead class='table-dark'>
                            <tr class='text-center'>
                                <th>ID</th>
                                <th>Product Category Title</th>
                                <th>Product Category Desc </th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php
                        
                            $get_p_cats = "SELECT * FROM product_categories";

                            $stmt = $con->query($get_p_cats);

                            $pro_cats = $stmt->fetchAll(PDO::FETCH_CLASS);

                            foreach($pro_cats as $p_cats) {
                                $p_cats_id = $p_cats->p_cat_id ;
                                $p_cats_title = $p_cats->p_cat_title ;
                                $p_cats_desc  = $p_cats->p_cat_desc ;

                                echo "
                                        <tr class='text-center'>
                                            <td >$p_cats_id</td>
                                            <td width='200'>$p_cats_title</td>
                                            <td width='500'>$p_cats_desc</td>


                                            <td>
                                                <a class='btn btn-primary' href='index.php?edit_p_cat=$p_cats_id'>
                                                    <i class='fas fa-edit'></i> Edit
                                                </a>
                                            </td>

                                            <td>
                                                <a class='btn btn-danger' href='index.php?delete_p_cat=$p_cats_id'>
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