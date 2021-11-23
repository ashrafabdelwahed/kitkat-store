<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>


    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Products</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered ">
                        <thead class='table-dark'>
                            <tr>
                                <th>ID</th>
                                <th class='text-center'>Product Title : </th>
                                <th>Product Image : </th>
                                <th>Product Price: </th>
                                <th>Product Sold: </th>
                                <th>Keywords: </th>
                                <th>Product Date: </th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                                $get_pro = "SELECT * FROM products";

                                $stmt = $con->query($get_pro);

                                $products = $stmt->fetchAll(PDO::FETCH_CLASS);

                                foreach($products as $pro) {
                                    $pro_id         = $pro->product_id;
                                    $pro_title      = $pro->product_title;
                                    $pro_img        = $pro->product_img1;
                                    $pro_price      = $pro->product_price;
                                    $pro_keywords   = $pro->product_keywords;
                                    $pro_date	    = $pro->date;
                                    
                                    $get_sold = "SELECT * FROM padding_orders where product_id = '$pro_id' ";

                                    $stmt = $con->query($get_sold);

                                    $count = $stmt->rowCount();

                                    echo "
                                            <tr>
                                                <td class='text-center'>$pro_id</td>
                                                <td class='text-center'>$pro_title</td>
                                                <td class='text-center'> <img src='./product_images/$pro_img' style='max-width: 70px'> </td>
                                                <td class='text-center'>$$pro_price</td>
                                                <td class='text-center'>$count</td>
                                                <td class='text-center'>$pro_keywords</td>
                                                <td class='text-center'>$pro_date</td>



                                                <td class='text-center'>
                                                    <a class='btn btn-primary' href='index.php?edit_product=$pro_id'>
                                                        <i class='fas fa-edit'></i> Edit
                                                    </a>
                                                </td>

                                                <td class='text-center'>
                                                    <a class='btn btn-danger' href='index.php?delete_product=$pro_id'>
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