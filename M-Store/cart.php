<?php
    $active='Cart';
    include("includes/header.php"); 
?>

<div id="content"><!-- #content Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-12"><!-- col-md-12 Begin -->

            <ul class="breadcrumb"><!-- breadcrumb Begin -->

                <li><a href="index.php">Home</a></li>
                <li>Shopping Cart</li>

            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div id="cart" class="col-md-9"><!-- #cart Begin -->

            <div class="box"><!-- box Begin -->

                <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

                    <h1>Shopping Cart</h1>

                    <?php

                        $ip_add = getRealIpUser();

                        $select_cart = "select * from cart where ip_add='$ip_add'";

                        $run_cart = mysqli_query($con,$select_cart);

                        $count = mysqli_num_rows($run_cart);

                    ?>

                    <p class="text-muted"><?php echo $count;?> Items In Your Cart</p>

                    <div class="table-responsive"><!-- table-responsive Begin -->

                        <table class="table"><!-- table Begin -->
                            <thead><!-- thead Begin -->
                                <tr><!-- tr Begin -->
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th colspan="1">Delete</th>
                                    <th colspan="2">Sub-Total</th>
                                </tr><!-- tr Finish -->
                            </thead><!-- thead Finish -->

                            <tbody><!-- tbody Begin -->

                                <?php

                                    $total = 0;

                                    while($row_cart = mysqli_fetch_array($run_cart)){

                                        $pro_id = $row_cart['p_id'];

                                        $pro_qty = $row_cart['qty'];

                                        $get_products = "select * from products where product_id='$pro_id'";

                                        $run_products = mysqli_query($con,$get_products);

                                        while($row_products = mysqli_fetch_array($run_products)){

                                            $product_title = $row_products['product_title'];

                                            $product_img1 = $row_products['product_img1'];

                                            $only_price = $row_products['product_price'];

                                            $sub_total = $row_products['product_price'] * $pro_qty;

                                            $total += $sub_total;
                                    
                                ?>

                                <tr><!-- tr Begin -->
                                    <td><!-- td Begin -->
                                        <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1;?>">
                                    </td><!-- td Finish -->
                                    <td><!-- td Begin -->
                                        <a href="details.php?pro_id=<?php echo $pro_id;?>"><?php echo $product_title;?></a>
                                    </td><!-- td Finish -->
                                    <td><!-- td Begin -->
                                        <?php echo $pro_qty;?>
                                    </td><!-- td Finish -->
                                    <td><!-- td Begin -->
                                        <?php echo $only_price;?>
                                    </td><!-- td Finish -->
                                    <td><!-- td Begin -->
                                        <input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>">
                                    </td><!-- td Finish -->
                                    <td><!-- td Begin -->
                                        <?php echo $sub_total;?>
                                    </td><!-- td Finish -->
                                </tr><!-- tr Finish -->

                                <?php
                                        }
                                    }
                                ?>
                            </tbody><!-- tbody Finish -->


                            <tfoot><!-- tfoot Begin -->
                                <tr><!-- tr Begin -->
                                    <th colspan="5">Total</th>
                                    <th colspan="2"> $ <?php echo $total;?></th>
                                </tr><!-- tr Finish -->
                            </tfoot><!-- tfoot Finish -->

                        </table><!-- table Finish -->

                    </div><!-- table-responsive Finish -->

                    <div class="box-footer"><!-- box-footer Begin -->

                        <div class="pull-left"><!-- pull-left Begin -->
                            <a href="index.php" class="btn btn-default">
                                <i class="fa fa-chevron-left"></i> Continue Shopping
                            </a>
                        </div><!-- pull-left Finish -->

                        <div class="pull-right"><!-- pull-right Begin -->
                            <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                <i class="fa fa-refresh"></i> Update Cart
                            </button>

                            <a href="checkout.php" class="btn btn-primary">
                                Proceed Checkout <i class="fa fa-chevron-right"></i>
                            </a>
                        </div><!-- pull-right Finish -->

                    </div><!-- box-footerFinish -->
                </form><!-- form Finish -->

            </div><!-- box Finish -->

            <?php

                function update_cart(){

                    global $con;

                    if(isset($_POST['update'])){

                        foreach($_POST['remove'] as $remove_id){

                            $delete_product = "delete from cart where p_id='$remove_id'";

                            $run_delete = mysqli_query($con,$delete_product);

                            if($run_delete){

                                echo "<script>window.open('cart.php','_self') </script>";
                            }

                        }
                    }
                }

                echo @$up_cart = update_cart();
            ?>

        </div><!-- #cart Finish -->

        <div class="col-md-3"><!-- col-md-3 Begin -->
            <div id="order-summary" class="box"><!-- box Begin -->

                <div class="box-header"><!-- box-header Begin -->
                    <h3>Order Summary</h3>
                </div><!-- box-header Finish -->

                <div class="table-responsive"><!-- table-responsive Begin -->
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Order Sub-Total</td>
                                <th>$ <?php echo $total;?> </th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th>$ 0</th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th>$ <?php echo $total;?> </th>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- table-responsive Finish -->

            </div><!-- box Finish -->

        </div><!-- col-md-3 Finish -->

    </div><!-- container  Finish -->
</div><!-- #content Finish -->

<?php
    include("includes/footer.php");
?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>

</body>
</html>