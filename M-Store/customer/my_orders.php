<center>
    <h1>My Orders</h1>
    <p class="lead">Your LAst Order Listed In Here</p>
</center>

<hr>

<div class="table-responsive"><!-- table-responsive Begin -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ON:</th>
                <th>Due Amount:</th>
                <th>Order Date:</th>
                <th>Status:</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $customer_session = $_SESSION['customer_email'];
                $get_customer = "select * from customers where customer_email='$customer_session'";
                $run_customer = mysqli_query($con,$get_customer);
                $row_customer = mysqli_fetch_array($run_customer);
                $customer_id=$row_customer['customer_id'];
                $get_orders= "select * from customer_orders where customer_id='$customer_id' ";
                $run_orders = mysqli_query($con,$get_orders);
                
                $i = 0 ;
                while($row_orders = mysqli_fetch_array($run_orders)){
                    $order_id=$row_orders['order_id'];
                    $due_amount=$row_orders['due_amount'];
                    $order_date=substr($row_orders['order_date'],0,11);
                    $i++;
            ?>
            <tr>
                <th> <?php  echo $i; ?> </th>
                <td> $ <?php  echo $due_amount; ?></td>
                <td> <?php  echo $order_date; ?></td>
                <td>Paid</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div><!-- table-responsive Finish -->