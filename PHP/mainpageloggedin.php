<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
// include('connection.php');

// $user_id = $_SESSION['user_id'];

// $sql = "SELECT * FROM users WHERE user_id='$user_id'";
// $result = mysqli_query($link, $sql);

// $count = mysqli_num_rows($result);

// if($count == 1){
//     $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
//     $username = $row['username'];
//     $email = $row['email']; 
// }else{
//     echo "There was an error retrieving the username and email from the database";   
// }
 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Notes</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <style>
        /* body{
            overflow-y: hidden;
            
            background:linear-gradient(0deg, rgba(9, 162, 255,0.8), rgba(9, 162, 255,0.8)), url(assets/main.jpg);
            background-size:cover;background-repeat:no-repeat; 
            height: 100%;
            
        } */
        
        /* .updateemail:hover, .editusername:hover{
            cursor: pointer !important;
            text-decoration: underline !important;
            color:rgb(12, 130, 180) !important;
        } */

        
        /* @media screen and (max-width:360px){
            .modal-body .text-info{
                display: none;
            }
        } */
        
        /* .add-notes:focus{
            box-shadow: none;
        } */

        /* .custompage{
            
        } */
        /* #allnotes,#done{
            display: none;
        } */

        textarea{
            box-sizing: border-box;
            /* padding-left: 30px;
            padding-right: 30px; */
            padding: 30px;
            /* resize: none; */
            border-radius: 3px;
            /* overflow-y: scroll; */
            /* display: none; */
                        
        }
        /* .text{
            overflow: hidden;
            white-space: pre;
            text-overflow: ellipsis;
        } */
        
        .ellipsis {
            overflow: hidden;
            height: 100px;
            line-height: 25px;
            /* margin: 20px; */
            /* border: 5px solid #AAA; */
        }
        .ellipsis:before {
            content: "";
            float: left;
            width: 5px;
            height: 200px;
        }
        .ellipsis > *:first-child {
            float: right;
            width: 100%;
            margin-left: -5px;
        }
        .ellipsis:after {
            content: "\02026";
            box-sizing: content-box;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            float: right;
            position: relative;
            top: -25px;
            left: 100%;
            width: 3em;
            margin-left: -3em;
            padding-right: 5px;
            text-align: right;
            background-size: 100% 100%;/* 512x1 image,gradient for IE9. Transparent at 0% -> white at 50% -> white at 100%.*/
            background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAABCAMAAACfZeZEAAAABGdBTUEAALGPC/xhBQAAAwBQTFRF////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////AAAA////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////wDWRdwAAAP90Uk5TgsRjMZXhS30YrvDUP3Emow1YibnM9+ggOZxrBtpRRo94gxItwLOoX/vsHdA2yGgL8+TdKUK8VFufmHSGgAQWJNc9tk+rb5KMCA8aM0iwpWV6dwP9+fXuFerm3yMs0jDOysY8wr5FTldeoWKabgEJ8RATG+IeIdsn2NUqLjQ3OgBDumC3SbRMsVKsValZplydZpZpbJOQco2KdYeEe36BDAL8/vgHBfr2CvTyDu8R7esU6RcZ5ecc4+Af3iLcJSjZ1ivT0S/PMs3LNck4x8U7wz7Bv0G9RLtHuEq1TbJQr1OtVqqnWqRdoqBhnmSbZ5mXapRtcJGOc4t2eYiFfH9AS7qYlgAAARlJREFUKM9jqK9fEGS7VNrDI2+F/nyB1Z4Fa5UKN4TbbeLY7FW0Tatkp3jp7mj7vXzl+4yrDsYoVx+JYz7mXXNSp/a0RN25JMcLPP8umzRcTZW77tNyk63tdprzXdmO+2ZdD9MFe56Y9z3LUG96mcX02n/CW71JH6Qmf8px/cw77ZvVzB+BCj8D5vxhn/vXZh6D4uzf1rN+Cc347j79q/zUL25TPrJMfG/5LvuNZP8rixeZz/mf+vU+Vut+5NL5gPOeb/sd1dZbTs03hBuvmV5JuaRyMfk849nEM7qnEk6IHI8/qn049hB35QGHiv0yZXuMdkXtYC3ebrglcqvYxoj1muvC1nDlrzJYGbpcdHHIMo2FwYv+j3QAAOBSfkZYITwUAAAAAElFTkSuQmCC);
            background: -webkit-gradient(linear,left top,right top,
                from(rgba(255,255,255,0)),to(white),color-stop(50%,white));
                background: -moz-linear-gradient(to right,rgba(255,255,255,0),white 50%,white);
                background: -o-linear-gradient(to right,rgba(255,255,255,0),white 50%,white);
                background: -ms-linear-gradient(to right,rgba(255,255,255,0),white 50%,white);
                background: linear-gradient(to right,rgba(255,255,255,0),white 50%,white);
            }

        .card{
            box-shadow: 0 2px 10px rgb(0 0 0 / 8%);
            transition: 0.3s;
        }
        .card:hover{
            box-shadow: 0 4px 20px rgb(0 0 0 / 20%);
            
        }
        .card p:hover{
            cursor: pointer;

        }

        
    </style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">OneBud</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/onlinenotes">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="features">Features</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="contact-us">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">My Notes</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#ProfileModal" 
                    data-whatever="Profile" href="#"><b><?php echo $_SESSION['username']?></b></a></li>
                    <li class="nav-item"><a class="nav-link" href="index?logout=1">Logout</a></li>
                </ul>                
            </div>
        </div>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark" style="padding-top:3rem;">
        <div class="container">
                    <div>
                    <form style="max-width:100%;">
                        
                        <h4 class="text-info">Add your notes here!</h4>
                            <div id="notepad">
                                <div class="form-group">
                                    <!-- style="width: 100%; max-width:100%; font-size:16px" -->
                                    <textarea class="form-control txt1" name="" id="" rows="4"></textarea>
                                    <!-- <button class="btn btn-outline-light btn-lg add-notes" id="add-note" type="button"
                                    data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp" style="margin-top: 0.5rem;">
                                        Add Note
                                    </button> -->
                                    
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="button" id="add-note" style="width: fit-content;">
                                        Add Note
                                    </button>
                                </div>
                    
                            </div>
                        </form>
                            <h3 style="margin-top: 1rem;" class="text-info">Your Notes</h3>
                            
                            <hr>

                            
                        
                        <!-- <button class="btn btn-outline-light btn-lg add-notes" id="add-note" type="button"
                        data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp" style="font-size: 12px;">
                            Add Note
                        </button>
                            
                        <button class="btn btn-outline-light btn-lg add-notes" id="allnotes" type="button"
                        data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp">
                            All Notes
                        </button>

                        <button class="btn btn-outline-light btn-lg add-notes float-right" id="edit" type="button"
                        data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp">
                            Edit
                        </button>


                        <button class="btn btn-green btn-outline-light btn-lg add-notes float-right" id="done" type="button"
                        data-toggle="modal" data-target="#SignupModal" data-whatever="SignUp">
                            Done
                        </button> -->
                 
                    </div>
                    


                    

                    <div id="notes" class="notes row container-fluid">
                            <!-- <div class="card my-2 mx-2" style="width: 18rem;">
                                <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                
                                <a href="#" class="btn btn-primary">Delete</a>
                                    
                                </div>

                                <div class="card-footer text-muted">
                                    2 days ago
                                </div>
                            </div> -->
                   

                    </div>

                    

            <div class="modal fade" id="CardModal" tabindex="-1" role="dialog" aria-labelledby="CardModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: rgb(121,181,255);" id="SignupModalLabel">Notes Editor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;outline:none;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-width: 100%;">
                <section class="clean-block clean-form" style="padding: 0;">
                    <div class="container">
                                             
                        <!-- <h2 class="text-info" style="margin-top:5px;padding: 0;margin-bottom:10px;">Sign Up</h2> -->
                        <!-- <p style="padding: 0;">Edit your notes here!</p> -->

                        <div id="signupmessage">

                        </div>
                        <!-- <form method="POST" id="signupform" style="width: 100%;margin:auto; padding-top:10px;padding-bottom:10px">
                            <div class="form-group"><label>Username</label><input class="form-control" type="text"></div>
                            <div class="form-group"><label>Email</label><input class="form-control" type="email"></div>
                            <div class="form-group"><label>Password</label><input class="form-control" type="password"></div>
                            <div class="form-group"><label>Confirm Password</label><input class="form-control" type="password"></div>
                        </form> -->
                        <form style="max-width:100%;">
                        
                        <h4 style="color: rgb(121,181,255);">Edit your notes here!</h4>
                            <div id="notepad">
                                <div class="form-group">
                                    
                                    <textarea class="form-control txt2" name="" id="" rows="5"></textarea>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="button" id="done" style="width: fit-content;" data-dismiss="modal">
                                        Done
                                    </button>
                                </div>
                    
                            </div>
                        </form>
                        
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary">Sign Up</button> -->
                <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button> -->
                
            </div>
            </div>
            </div>
            </div>


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
    <script src="mynotes.js"></script>
    <script src="profile.js"></script>

    <!-- <script>
        $('.noteheader').click(function(evt){    
            if(evt.target.id == "del")
          return;
       


        });
    </script> -->
</body>

</html>