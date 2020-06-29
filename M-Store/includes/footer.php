<div id="footer"><!-- footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->

            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                <h4>User Section</h4>
                    <ul><!-- ul Begin -->
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>Login</a>"; 
                            }else{
                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>"; 
                            }
                        ?>
                        <li><a href="customer_register.php">Register</a></li>
                    </ul><!-- ul Finish -->
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                <h4>Pages</h4>
                <ul><!-- ul Begin -->
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul><!-- ul Finish -->
            </div><!-- col-sm-6 col-md-3 Finish -->

            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                <h4>Top Product Categories</h4>
                <ul><!-- ul Begin -->
                    <?php
                        $get_p_cats = "select * from product_categories";

                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            echo "
                            <li>
                                <a href='shop.php?p_cat=$p_cat_id'>
                                    $p_cat_title
                                </a>
                            </li>
                            ";
                        }
                    ?>
                </ul><!-- ul Finish -->
            <hr>
                <h4>Categories</h4>
                <ul><!-- ul Begin -->
                    <?php
                        $get_cats = "select * from categories";

                        $run_cats = mysqli_query($con,$get_cats);
                    
                        while($row_cats = mysqli_fetch_array($run_cats)){
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];
                            echo "
                            <li>
                                <a href='shop.php?cat=$cat_id'>
                                    $cat_title
                                </a>
                            </li>
                            ";
                        }
                    ?>
                </ul><!-- ul Finish -->
            </div><!-- col-sm-6 col-md-3 Finish -->

            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                <h4>Contact Us</h4>
                    <p><!-- p Begin -->
                        <strong>M-Store Media inc.</strong>
                        <br/>m-store@contact.com
                    </p><!-- p Finish -->
                    <a href="contact.php">Go To Contact Page</a>

                <hr>

                <h4>Keep In Touch</h4>
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>

            </div><!-- col-sm-6 col-md-3 Finish -->

        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div><!-- footer Finish -->

<div id="copyright"><!-- #copyright Begin -->
    <div class="container"><!-- container Begin -->

        <div class="col-md-6"><!-- col-md-6 Begin -->
            <p class="pull-left">&copy; 2020 M-Store</p>
        </div><!-- col-md-6 Finish -->

        <div class="col-md-6"><!-- col-md-6 Begin -->
            <p class="pull-right">Theme By: Merve Çağlarer</p>
        </div><!-- col-md-6 Finish -->

    </div><!-- container Finish -->
</div><!-- #copyright Finish -->