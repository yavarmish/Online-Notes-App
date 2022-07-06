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
    <title>Account Activation</title>
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
                    <h2 class="text-info">Activation Status</h2>
                    <?php
                        
                        if(!isset($_GET['email']) || !isset($_GET['key'])){
                            echo '<div class="alert alert-danger">There was an error. Please click on the activation link you received by email.</div>'; exit;
                        }
                        
                        $email = $_GET['email'];
                        $key = $_GET['key'];
                        
                        $email = mysqli_real_escape_string($link, $email);
                        $key = mysqli_real_escape_string($link, $key);
                        
                        $sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
                        $result = mysqli_query($link, $sql);
                        
                        if(mysqli_affected_rows($link) == 1){
                            echo '<div class="alert alert-success">Your account has been activated successfully!</div>';
                            echo '<a href="index.php" type="button" class="btn-sm btn-sucess">Back to Home Page<a/>';
                            
                        }else{
                            
                            echo '<div class="alert alert-danger">Your account could not be activated. Please try again later.</div>';
                            // echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
                            
                        }
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
</body>

</html>
