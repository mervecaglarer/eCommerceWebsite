<?php
    include("includes/db.php");
    include("functions/functions.php");
?>
<?php
    if(isset($_GET['c_id'])){
        $customer_id = $_GET['c_id'];
    }

    $ip_add = getRealIpUser();

    $customer_address = $_POST['c_address'];

    $p_method = $_POST['payment_method'];

    $select_cart = "select * from cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($con,$select_cart);

    while($row_cart = mysqli_fetch_array($run_cart)){

        $pro_id = $row_cart['p_id'];

        $pro_qty = $row_cart['qty'];

        $get_products = "select * from products where product_id='$pro_id'";

        $run_products = mysqli_query($con,$get_products);

        while($row_products = mysqli_fetch_array($run_products)){

            $sub_total = $row_products['product_price'] * $pro_qty;

            $insert_customer_order = "insert into customer_orders (customer_id,due_amount,order_date,payment_method,customer_address) 
            values ('$customer_id','$sub_total',NOW(), '$p_method','$customer_address')";

            $run_customer_order = mysqli_query($con,$insert_customer_order);

            $delete_cart = "delete from cart where ip_add='$ip_add'";

            $run_delete = mysqli_query($con,$delete_cart);

            echo "<script>alert('Your Payment Has Been Confirmed, Thanks Your Shopping !') </script>";
            echo "<script>window.open('customer/my_account.php?my_orders', '_self') </script>";
        }

    }

?>