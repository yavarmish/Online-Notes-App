<?php
session_start();
include('connection.php');
?>
<style>
html, body{
    background-color:#f6f6f6 !important;
}
</style>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Password Reset</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    <!-- <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Sysma</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="features.php">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contact-us.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav> -->
    <main class="page contact-us-page">
        <section class="clean-block clean-form" >
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Reset Password</h2>
                    <?php
                        //If user_id or key is missing
                        if(!isset($_GET['user_id']) || !isset($_GET['key'])){
                            echo '<div class="alert alert-danger">There was an error. Please click on the link you received by email.</div>'; exit;
                        }
                        //else
                            //Store them in two variables
                        $user_id = $_GET['user_id'];
                        $key = $_GET['key'];
                        $time = time() - 86400;
                            //Prepare variables for the query
                        $user_id = mysqli_real_escape_string($link, $user_id);
                        $key = mysqli_real_escape_string($link, $key);
                            //Run Query: Check combination of user_id & key exists and less than 24h old
                        $sql = "SELECT user_id FROM forgotpassword WHERE rkey='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
                        $result = mysqli_query($link, $sql);
                        if(!$result){
                            echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
                        }
                        //If combination does not exist
                        //show an error message
                        $count = mysqli_num_rows($result);
                        if($count !== 1){
                            echo '<div class="alert alert-danger">Please try again.</div>';
                            exit;
                        }
                        //print reset password form with hidden user_id and key fields
                        echo "
                        <form method=post id='passwordreset'>
                        <input type=hidden name=key value=$key>
                        <input type=hidden name=user_id value=$user_id>
                        <div id='resultmessage'></div>

                        <div class='form-group'>
                            <label for='password'>Enter your new Password:</label>
                            <input type='password' name='password' id='password' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label for='password2'>Re-enter Password:</label>
                            <input type='password' name='password2' id='password2' class='form-control'>
                        </div>
                        <input type='submit' name='resetpassword' class='btn btn-primary' value='Reset Password'>


                        </form>
                        ";


                    ?>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p> -->
                </div>
                <!-- <form>
                    <div class="form-group"><label>Name</label><input class="form-control" type="text"></div>
                    <div class="form-group"><label>Subject</label><input class="form-control" type="text"></div>
                    <div class="form-group"><label>Email</label><input class="form-control" type="email"></div>
                    <div class="form-group"><label>Message</label><textarea class="form-control"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Send</button></div>
                </form> -->
            </div>
        </section>
    </main>
    <!-- <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2020 Copyright Text</p>
        </div>
    </footer> -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
                     
    $("#passwordreset").submit(function(event){ 
        
        event.preventDefault();
        
        var datatopost = $(this).serializeArray();
        
        $.ajax({
            url: "storeresetpassword.php",
            type: "POST",
            data: datatopost,
            success: function(data){

                $('#resultmessage').html(data);
            },
            error: function(){
                $("#resultmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

            }

        });

    });    
    </script>
</body>

</html>
