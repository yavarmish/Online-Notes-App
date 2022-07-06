<!DOCTYPE html>
<html>
<?php
    session_start();
    // include("contactus.php");
    include('connection.php');

    include('logout.php');

    include('remember.php');
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">

    <style>
        .form-group{
            text-align: center;
            color:rgba(9, 162, 255,0.8);
        }
        .modal-title{
            color:rgba(9, 162, 255,0.8);
        }
        .forgotpassword:hover{
            cursor: pointer;
            text-decoration: underline;
            color:rgb(12, 130, 180);
        }

    </style>
</head>

<body>
    
    
<div class="modal fade" id="SignupModal" tabindex="-1" role="dialog" aria-labelledby="SignupModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SignupModalLabel">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;outline:none;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-width: 100%;">
                <section class="clean-block clean-form" style="padding: 0; text-align:center;">
                    <div class="container">
                                             
                        <!-- <h2 class="text-info" style="margin-top:5px;padding: 0;margin-bottom:10px;">Sign Up</h2> -->
                        <p style="padding: 0; font-size:18px; margin-bottom:30px; color: rgba(9, 162, 255,0.8);">Sign Up today and start using our Online Notes App!</p>
                        <div id="signupmessage">

                        </div>
                        <form method="post" id="signupform" style="width: 100%;margin:auto; padding-top:10px;padding-bottom:10px">
                            <div class="form-group"><label>Username</label><input class="form-control" type="text" name="username" id="username" maxlength="30"></div>
                            <div class="form-group"><label>Email</label><input class="form-control" type="email" name="email" id="email" maxlength="50"></div>
                            <div class="form-group"><label>Password</label><input class="form-control" type="password" name="password" id="password" maxlength="30"></div>
                            <div class="form-group"><label>Confirm Password</label><input class="form-control" type="password" name="password2" id="password2"maxlength="30"></div>
                        
                        
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Sign Up</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                
            </div>
           
            </div>
            </div>
            </div>
            </form>

            <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LoginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;outline:none;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-width: 100%;">
                <section class="clean-block clean-form" style="padding: 0;">
                    <div class="container">
                                             
                        <!-- <h2 class="text-info" style="margin-top:5px;padding: 0;margin-bottom:10px;">Sign Up</h2> -->
                        <!-- <p style="padding: 0;">Sign Up today and start using our Online Notes App!</p> -->
                        <div id="loginmessage">

                        </div>  
                        <form method="post" id="loginform" style="width: 100%;margin:auto; padding-top:10px;padding-bottom:10px">
                            
                            <div class="form-group"><label>Email</label><input class="form-control" type="email" name="loginemail" id="loginemail" maxlength="50"></div>
                            <div class="form-group"><label>Password</label><input class="form-control" type="password" name="loginpassword" id="loginpassword" maxlength="30"></div>
                            <div style="display:flex; justify-content:space-between; font-size: small;" 
                            class="checkbox form-group">
                                <!-- <label for="checkbox">Remember Me</label> -->
                                <span>
                                    Remember Me:
                                    <input type="checkbox" id="checkbox" style="transform: translateY(1px);" name="rememberme" id="rememberme">
                                   
                                </span>
                                

                                <span class="forgotpassword">
                                   <a href="#" style="text-decoration: none;color:inherit" data-dismiss="modal"
                                   data-toggle="modal" data-target="#forgotpasswordModal" data-whatever="forgotpassword">
                                        Forgot Password?
                                   </a>
                                <span>
                            </div>
                            
                            

                        
                    </div>
                </section>
            </div>
            
            <div class="modal-footer">
                <div style="margin-right:auto;">
                <button class="btn btn-primary" type="button" 
                data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp" data-dismiss="modal" onclick="myf()">
                    Register
                </button>
                </div>
                <button class="btn btn-primary" name="login" type="submit">Login</button>                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
            </div>
            </div>
            </form>

            <div class="modal fade" id="forgotpasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotpasswordLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotpasswordLabel">Enter  your email address:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;outline:none;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-width: 100%;">
                <section class="clean-block clean-form" style="padding: 0;">
                    <div class="container">
                                             
                        <!-- <h2 class="text-info" style="margin-top:5px;padding: 0;margin-bottom:10px;">Sign Up</h2> -->
                        <!-- <p style="padding: 0;">Sign Up today and start using our Online Notes App!</p> -->
                        <div id="forgotpasswordmessage">

                        </div>  
                        <form method="post" id="forgotpasswordform" style="width: 100%;margin:auto; padding-top:10px;padding-bottom:10px">
                            
                            <div class="form-group"><label>Email</label><input class="form-control" type="email" name="forgotemail" id="forgotemail" maxlength="50"></div>

                        
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <!-- <div style="margin-right:auto;">
                <button class="btn btn-primary" data-dismiss="modal"
                data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp">
                    Register
                </button>
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
            </div>
            </div>
            </form>


            <div class="modal fade" id="ProfileModal" tabindex="-1" role="dialog" aria-labelledby="ProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LoginModalLabel"  style="color:rgba(9, 162, 255,0.8)">Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;outline:none;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-width: 100%;">
                <section class="clean-block clean-form" style="padding: 0;">
                    <div class="container">
                                             
                        <!-- <h2 class="text-info" style="margin-top:5px;padding: 0;margin-bottom:10px;">Sign Up</h2> -->
                        <!-- <p style="padding: 0;">Sign Up today and start using our Online Notes App!</p> -->
                        <div id="profilemessage">

                        </div>  
                        <form method="POST" id="profileform" style="width: 100%;margin:auto; padding-top:10px;padding-bottom:10px">
                            
                            <div class="form-group" style="color:rgba(9, 162, 255,0.8)"><label>Username:</label>
                                <input style="background: none;" class="form-control" type="username" value="<?php echo $_SESSION['username'] ?>" readonly="readonly">
                            </div>
                            <div class="form-group" style="color:rgba(9, 162, 255,0.8)"><label>Email:</label>
                                <input style="background: none;" class="form-control" type="email" value="<?php echo $_SESSION['email'] ?>" readonly="readonly">
                            </div>
                            <div style="display:flex; justify-content:space-between; font-size: small;" 
                            class="checkbox form-group">
                                <!-- <label for="checkbox">Remember Me</label> -->
                                <span class="editusername" style="color:rgba(9, 162, 255,0.8)">
                                    <a href="#" style="text-decoration: none;color:inherit" data-toggle="modal" data-dismiss="modal"
                                    data-target="#updateusernameModal" data-whatever="updateusername">
                                        Update Username
                                   </a>
                                   
                                </span>
                                
                                

                                <!-- <span class="updatepassword" style="color:rgba(9, 162, 255,0.8)">
                                   <a href="#" style="text-decoration: none;color:inherit" data-toggle="modal" data-dismiss="modal"
                                    data-target="#updatepasswordModal" data-whatever="updatepassword">
                                        Update Password
                                   </a>
                                <span> -->
                            </div>
                            
                            

                        </form>
                        
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <div style="margin-right:auto;">
                <!-- <button class="btn btn-primary" data-dismiss="modal"
                data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp">
                    Register
                </button> -->
                </div>
                <!-- <button type="button" class="btn btn-primary">Login</button> -->
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
            </div>
            </div>
            </div>

            <div class="modal fade" id="updatepasswordModal" tabindex="-1" role="dialog" aria-labelledby="updatepasswordLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotpasswordLabel" style="color:rgba(9, 162, 255,0.8)">Change password:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;outline:none;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-width: 100%;">
                <section class="clean-block clean-form" style="padding: 0;">
                    <div class="container">
                                             
                        <!-- <h2 class="text-info" style="margin-top:5px;padding: 0;margin-bottom:10px;">Sign Up</h2> -->
                        <!-- <p style="padding: 0;">Sign Up today and start using our Online Notes App!</p> -->
                        <div id="updatpasswordmessage">

                        </div>  
                        <form method="POST" id="updatepasswordform" style="width: 100%;margin:auto; padding-top:10px;padding-bottom:10px">
                            
                            <div class="form-group" ><label style="color:rgba(9, 162, 255,0.8)">Password:</label>
                            <input class="form-control" type="password"></div>

                        </form>
                        
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <!-- <div style="margin-right:auto;">
                <button class="btn btn-primary" data-dismiss="modal"
                data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp">
                    Register
                </button>
                </div> -->
                <button type="button" class="btn btn-primary">Submit</button>                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
            </div>
            </div>


            <div class="modal fade" id="updateusernameModal" tabindex="-1" role="dialog" aria-labelledby="usernameLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateusernamealabel" style="color:rgba(9, 162, 255,0.8)">Edit Username:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;outline:none;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-width: 100%;">
                <section class="clean-block clean-form" style="padding: 0;">
                    <div class="container">
                                             
                        <!-- <h2 class="text-info" style="margin-top:5px;padding: 0;margin-bottom:10px;">Sign Up</h2> -->
                        <!-- <p style="padding: 0;">Sign Up today and start using our Online Notes App!</p> -->
                        <div id="updateusernamemessage">

                        </div>  
                        <form method="POST" id="updateusernameform" style="width: 100%;margin:auto; padding-top:10px;padding-bottom:10px">
                            
                            <div class="form-group"><label style="color:rgba(9, 162, 255,0.8)">Username:</label><input name="username" class="form-control" type="text"></div>

                        
                        
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <!-- <div style="margin-right:auto;">
                <button class="btn btn-primary" data-dismiss="modal"
                data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp">
                    Register
                </button>
                </div> -->
                <button name="updateusername" type="submit" class="btn btn-primary">Submit</button>                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
            </div>
            </div>
            </form>


            <div class="modal fade" id="forgotpasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotpasswordLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotpasswordLabel">Enter  your email address:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;outline:none;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-width: 100%;">
                <section class="clean-block clean-form" style="padding: 0;">
                    <div class="container">
                                             
                        <!-- <h2 class="text-info" style="margin-top:5px;padding: 0;margin-bottom:10px;">Sign Up</h2> -->
                        <!-- <p style="padding: 0;">Sign Up today and start using our Online Notes App!</p> -->
                        <div id="forgotpasswordmessage">

                        </div>  
                        <form method="post" id="forgotpasswordform" style="width: 100%;margin:auto; padding-top:10px;padding-bottom:10px">
                            
                            <div class="form-group"><label>Email</label><input class="form-control" type="email" name="forgotemail" id="forgotemail" maxlength="50"></div>

                        
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <!-- <div style="margin-right:auto;">
                <button class="btn btn-primary" data-dismiss="modal"
                data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp">
                    Register
                </button>
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
            </div>
            </div>
            </form>


    <!-- <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">&nbsp;</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="features.php">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contact-us.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#LoginModal" 
                    data-whatever="Login" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav> -->
    <?php
    $pagename='contact-us';
    if(isset($_SESSION["user_id"])){
        
        include("navigationbarconnected.php");
    }else{
        include("navigationbarnotconnected.php");
    }  
    ?>

    <main class="page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Contact Us</h2>
                    <p>Get in touch with us and our expert support team will answer all your queries!</p>
                </div>
                <form action="contactus.php" method="post" id="contactusform">
                    <div id="contactusmessagef">
                    </div>
                    <div class="form-group"><label>Name</label><input class="form-control" type="text"  name="contactusname" id="contactusname" maxlength="30"></div>
                    <div class="form-group"><label>Subject</label><input class="form-control" type="text" name="contactussubject" id="contactussubject"></div>
                    <div class="form-group"><label>Email</label><input class="form-control" type="email" name="contactusemail" id="contactusemail"></div>
                    <div class="form-group"><label>Message</label><textarea class="form-control" name="contactusmessage" id="contactusmessage"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Send</button></div>
                </form>
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
    <!-- <script>
    var e=document.getElementById("co");
    $(e).addClass("active");
    </script>    -->
    
    <script src="javascript.js"></script>
    <script src="profile.js"></script>
    
</body>

</html>
