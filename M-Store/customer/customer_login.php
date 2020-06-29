<div class="box"><!-- box Begin -->
    <div class="box-header"><!-- box-header Begin -->
        <center>
            <h1>Login</h1>
        </center>
    </div><!-- box-header Finish -->
    <form method="post" action="checkout.php"><!-- form Begin -->
        <div class="form-group"><!-- form-group Begin -->
            <label for=""> Email </label>
            <input name="c_email" type="text" class="form-control" required>
        </div><!-- form-group Finish -->
        <div class="form-group"><!-- form-group Begin -->
            <label for=""> Password </label>
            <input name="c_pass" type="password" class="form-control" required>
        </div><!-- form-group Finish -->
        <div class="text-center"><!-- form-group Begin -->
            <button name="login" value="Login" class="btn btn-primary">
                <i class="fa fa-sign-in"></i> Login
            </button>
        </div><!-- form-group Finish -->
    </form><!-- form Finish -->
    <center>
        <a href="customer_register.php">
            <h3>Don't Have An Account? Register Here...</h3>
        </a>
    </center>
</div><!-- box Finish -->

<?php
    if(isset($_POST['login'])){

        $customer_email = $_POST['c_email'];

        $customer_pass = $_POST['c_pass'];

        $select_customer = "select * from customers where customer_email = '$customer_email' AND customer_pass = '$customer_pass'";

        $run_customer = mysqli_query($con, $select_customer);

        $get_ip = getRealIpUser();

        $check_customer = mysqli_num_rows($run_customer);
        
        $select_cart = "select * from cart where ip_add='$get_ip'";

        $run_cart = mysqli_query($con, $select_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if($check_customer==0){
            echo "<script>alert('Your email or password is wrong!')</script>";
            exit();
        }
        if($check_customer==1 AND $check_cart==0){

            $_SESSION['customer_email']=$customer_email;

            echo "<script>alert('Login Successfully!')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }else{

            $_SESSION['customer_email']=$customer_email;

            echo "<script>alert('Login Successfully!')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";

        }
    }

?>