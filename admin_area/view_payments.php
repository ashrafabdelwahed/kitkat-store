<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else {


?>


    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Payments</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered ">
                        <thead class='table-dark'>
                            <tr class='text-center'>
                                <th>NO</th>
                                <th>Invoice No </th>
                                <th>Amount Paid</th>
                                <th>Method</th>
                                <th>Reference No</th>
                                <th>Payment Code</th>
                                <th>Payment Date</th>
                                <th>Delete</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                                $get_payment = "SELECT * FROM payments";

                                $stmt = $con->query($get_payment);

                                $payments = $stmt->fetchAll(PDO::FETCH_CLASS);

                                foreach($payments as $payment) {

                                    $payment_id         = $payment->payment_id;
                                    $invoice_no         = $payment->invoice_no;
                                    $amount             = $payment->amount;
                                    $payment_mode       = $payment->payment_mode;
                                    $ref_no             = $payment->ref_no;
                                    $code               = $payment->code;
                                    $payment_date       =$payment->payment_date;



                                    
                                    echo "
                                            <tr class='text-center'>
                                                <td>$payment_id</td>
                                                <td>$invoice_no</td>
                                                <td>$amount</td>
                                                <td>$payment_mode</td>
                                                <td>$ref_no</td>
                                                <td>$code</td>
                                                <td>$payment_date</td>


                                                <td >
                                                    <a class='btn btn-danger' href='index.php?delete_payment=$payment_id'>
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