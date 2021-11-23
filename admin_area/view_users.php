<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>


    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Users</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered ">
                        <thead class='table-dark'>
                            <tr class='text-center'>

                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>E-Mail</th>
                                <th>Country</th>
                                <th>Job</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                                $get_Users = "SELECT * FROM admins";

                                $stmt = $con->query($get_Users);

                                $users = $stmt->fetchAll(PDO::FETCH_CLASS);

                                foreach($users as $user) {
                                    $admin_id         = $user->admin_id;
                                    $admin_name       = $user->admin_name;
                                    $admin_image	  = $user->admin_image;
                                    $admin_email      = $user->admin_email;
                                    $admin_country    = $user->admin_country;
                                    $admin_contact	  = $user->admin_contact;
                                    $admin_job	      = $user->admin_job;
                                    
                                    
                                    echo "
                                            <tr class='text-center'>
                                                <td>$admin_id</td>
                                                <td>$admin_name</td>
                                                <td> <img src='./admin_images/$admin_image' style='max-width: 70px'> </td>
                                                <td>$admin_email</td>
                                                <td>$admin_country</td>
                                                <td>$admin_job</td>
                                                <td>$admin_contact</td>


                                                <td class='text-center'>
                                                    <a class='btn btn-primary' href='index.php?user_profile=$admin_id'>
                                                        <i class='fas fa-edit'></i> Edit
                                                    </a>
                                                </td>

                                                <td >
                                                    <a class='btn btn-danger' href='index.php?delete_user=$admin_id'>
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