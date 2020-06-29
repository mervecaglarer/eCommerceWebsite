<?php
    $active='Contact';
    include("includes/header.php"); 
?> 

<div id="content"><!-- #content Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-12"><!-- col-md-12 Begin -->

            <ul class="breadcrumb"><!-- breadcrumb Begin -->

                <li><a href="index.php">Home</a></li>
                <li>Contact Us</li>

            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3"><!-- col-md-3 Begin -->
            <?php
                include("includes/sidebar.php");
            ?>
        </div><!-- col-md-3 Finish -->

        
        <div class="col-md-9"><!-- col-md-9 Begin -->
            <div class="box"><!-- box Begin -->
                <div class="box-header"><!-- box-header Begin -->
                    <center>
                        <h2>Send Any Messages To Us</h2>
                        <p class="text-muted">Customer Services work <strong> 24/7</strong></p>
                    </center>
                    <form action="contact.php" method="post">
                        <div class="form-group">
                            <label>Name Surname</label>
                            <input type="text" class="form-control" name="c_name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="c_email" required>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="c_subject" required>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i> Send Message
                            </button>
                        </div>
                    </form>

                </div><!-- box-header Finish -->
            </div><!-- box Finish -->

        </div><!-- col-md-9 Finish -->

    </div><!-- container  Finish -->
</div><!-- #content Finish -->

<?php
    include("includes/footer.php");
?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>

</body>
</html>