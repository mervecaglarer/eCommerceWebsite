<div class="box"><!-- box Begin -->
    <?php
        $session_email = $_SESSION['customer_email'];

        $select_customer = "select * from customers where customer_email='$session_email'";

        $run_customer = mysqli_query($con, $select_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['customer_id'];

    ?>
    <h1 align="center">Confirm Your Payment</h1>
    <form action="order.php?c_id=<?php echo $customer_id;?>" method="post" enctype="multipart/form-data"><!-- form Begin -->
    
        <div class="form-group"><!-- form-group Begin -->
            <label>Address:</label>
            <input type="text" class="form-control" name="c_address" required>
        </div><!-- form-group Finish -->

        <div class="form-group"><!-- form-group Begin -->
            <label>Payment Method:</label>
            <select name="payment_method" class="form-control">
                <option>Select Payment Method</option>
                <option>Cash</option>
                <option>Credit Card</option>
                <option>Discount Coupon</option>
            </select>
        </div><!-- form-group Finish -->

        <div class="text-center">
            <button class="btn btn-primary btn-lg">
                <i class="fa fa-user-md"> Confirm Payment</i>
            </button>
        </div>
    </form><!-- form Finish -->
</div><!-- box Finish -->

