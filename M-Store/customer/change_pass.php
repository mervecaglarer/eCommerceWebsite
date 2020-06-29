<h1 align="center">Change Your Password</h1>

<form action="" method="post"><!-- form Begin -->
    <div class="form-group">
        <label>Your Old Password:</label>
        <input type="text" class="form-control" name="old_pass" required>
    </div>
    <div class="form-group">
        <label>Your New Password:</label>
        <input type="text" class="form-control" name="new_pass" required>
    </div>
    <div class="form-group">
        <label>Confirm Your New Password:</label>
        <input type="text" class="form-control" name="new_pass_again" required>
    </div>
    <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Update Now
        </button>
    </div>
</form><!-- form Finish -->

<?php
    if(isset($_POST['submit'])){
        $c_email = $_SESSION['customer_email'];
        $c_old_pass = $_POST['old_pass'];
        $c_new_pass = $_POST['new_pass'];
        $c_new_pass_again = $_POST['new_pass_again'];
        $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
        $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);

        $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

        if($check_c_old_pass==0){
            echo "<script>alert('Sory, Your Current Password Didn't Valid! Please Try Again')</script>"; 
            exit();
        }
        if($c_new_pass!=$c_new_pass_again){
            echo "<script>alert('Sory, Your New Password Didn't Match! Please Try Again')</script>"; 
            exit();

        }
        
        $update_c_pass = "update customers set 
        customer_pass='$c_new_pass' where customer_email='$c_email'";

        $run_c_pass = mysqli_query($con,$update_c_pass);
        if($run_c_pass){
            echo "<script>alert('Your Password Has Been Edited Succeffuly! Please Login Again')</script>"; 
            echo "<script>window.open('logout.php','_self')</script>";  
        }
    }
?>