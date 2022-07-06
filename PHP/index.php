<!DOCTYPE html>
<html>

<?php
session_start();
include('connection.php');

include('logout.php');

include('remember.php');
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    
    <style>
        body{
            overflow-y: hidden;
        }
        .clean-hero{
            background:url(assets/main.jpg) no-repeat center;
            color:rgba(9, 162, 255,0.8);
            height: 750px;
        }
        .forgotpassword:hover{
            cursor: pointer;
            text-decoration: underline;
            color:rgb(12, 130, 180);
        }
        /* @media screen and (max-width:360px){
            .modal-body .text-info{
                display: none;
            }
        } */

    </style>
</head>

<body>
    <!-- <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container">
        <a class="navbar-brand logo" href="#">&nbsp;</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
        <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="features.php">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#LoginModal" 
                    data-whatever="Login" href="#">Login</a></li>
                </ul>                
            </div>
        </div>
    </nav> -->

    <?php
    $pagename='index';
    if(isset($_SESSION["user_id"])){
        
        include("navigationbarconnected.php");
    }else{
        include("navigationbarnotconnected.php");
    }  
    ?>
    <main class="page landing-page">
        <section class="clean-block clean-hero">
            <div class="text">
                <h2>Online Notes App</h2>
                <p>Your Notes with you wherever you go.</br>Easy to use, keeps your notes secure!</p>
                
                <button class="btn btn-outline-light btn-lg" type="button"
                data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp">
                    Sign Up
                </button>
            </div>


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
                <section class="clean-block clean-form" style="padding: 0;">
                    <div class="container">
                                             
                        <!-- <h2 class="text-info" style="margin-top:5px;padding: 0;margin-bottom:10px;">Sign Up</h2> -->
                        <p style="padding: 0;">Sign Up today and start using our Online Notes App!</p>
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
                <button class="btn btn-primary" data-dismiss="modal"
                data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp">
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



            
        </section>


    </main>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="javascript.js"></script>
    <script src="profile.js"></script>

</body>

</html>
