<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 Begin -->
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard > View Orders
                
            </li><!-- active Finish -->
        </ol><!-- breadcrumb Finish -->
    </div><!-- col-lg-12 Finish -->
</div><!-- row 1 Finish -->

<div class="row"><!-- row 2 Begin -->
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover Begin -->
                        
                        <thead><!-- thead Begin -->
                            <tr><!-- tr Begin -->
                                <th> No: </th>
                                <th> Customer Email: </th>
                                <th> Customer Address: </th>
                                <th> Due Amount: </th>
                                <th> Order Date: </th>
                                <th> Payment Method: </th>
                                <th> Status: </th>
                                <th> Delete: </th>
                            </tr><!-- tr Finish -->
                        </thead><!-- thead Finish -->
                        
                        <tbody><!-- tbody Begin -->
                            
                            <?php 
                            
                                $i=0;
            
                                $get_order = "select * from customer_orders order by 1 DESC LIMIT 0,5";
            
                                $run_order = mysqli_query($con,$get_order);
            
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $due_amount = $row_order['due_amount'];
                                                                        
                                    $order_date = substr($row_order['order_date'],0,11);
                                    
                                    $payment_method = $row_order['payment_method'];

                                    $c_address = $row_order['customer_address'];
                                    
                                    $i++;
                        
                            ?>
                            
                            <tr><!-- tr Begin -->
                                <td> <?php echo $order_id; ?> </td>
                                <td> 
                                    <?php 
                                    
                                        $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                        $run_customer = mysqli_query($con,$get_customer);
                                    
                                        $row_customer = mysqli_fetch_array($run_customer);
                                    
                                        $customer_email = $row_customer['customer_email'];
                                    
                                        echo $customer_email;
                                
                                ?>
                                </td>
                                <td><?php echo $c_address; ?> </td>
                                <td> $ <?php echo $due_amount; ?> </td>
                                <td> <?php echo $order_date; ?></td>
                                <td> <?php echo $payment_method; ?> </td>
                                <td> Paid </td>
                                <td> 
                                     
                                     <a href="index.php?delete_order=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr Finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody Finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover Finish -->
                </div><!-- table-responsive Finish -->
            </div><!-- panel-body Finish -->
            
        </div><!-- panel panel-default Finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 Finish -->

<?php } ?>