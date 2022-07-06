<?php
    
    session_start();
    // include('connection.php');
    // $missingUsername = '<p><strong>Please enter a username!</strong></p>';
    // $missingEmail = '<p><strong>Please enter an email address!</strong></p>';
    // $invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
    // $missingPassword = '<p><strong>Please enter a Password!</strong></p>';
    // $invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
    // $differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
    // $missingPassword2 = '<p><strong>Please confirm your password</strong></p>';

    $ok1=false;
    $ok2=false;
    $ok3=false;
    $ok4=false;


    $missingUsername = '<strong>name, </strong>';
    $missingEmail = '<strong>email address, </strong>';
    $missingSubject = '<strong>subject, </strong>';
    $missingMessage = '<strong>message </strong>';
    $invalidEmail = '<strong>valid email address, </strong>';
    
// echo $_POST["contactusname"];
if(empty($_POST["contactusname"])){
    $ok1=true;
    $errors .= $missingUsername;
    // echo "sksjbxkjbxkxkxjbxkbxkjxbj";
}else{
    $name = filter_var($_POST["contactusname"], FILTER_SANITIZE_STRING);   
}

if(empty($_POST["contactusemail"])){
    $ok2=true;
    $errors .= $missingEmail;   
}else{
    
    $email = filter_var($_POST["contactusemail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
    }
}
if(empty($_POST["contactussubject"])){
    $ok3=true;
    $errors .= $missingSubject;
}else{
    $subject = filter_var($_POST["contactussubject"], FILTER_SANITIZE_STRING);   
}

if(empty($_POST["contactusmessage"])){
    $ok4=true;
    $errors .= $missingMessage;
}else{
    $message = filter_var($_POST["contactusmessage"], FILTER_SANITIZE_STRING);   
}
// if(empty($_POST["password"])){
//     $errors .= $missingPassword; 
//     $ok3=true;
// }elseif(!(strlen($_POST["password"])>6
//          and preg_match('/[A-Z]/',$_POST["password"])
//          and preg_match('/[0-9]/',$_POST["password"])
//         )
//        ){
    
//     $errors .= $invalidPassword; 
// }else{
//     $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
//     if(empty($_POST["password2"])){
//         $errors .= $missingPassword2;
//     }else{
//         $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
//         if($password !== $password2){
//             $errors .= $differentPassword;
//         }
//     }
// }

if($errors){

    $temp="<strong>Please enter a </strong>";
    // if($ok1||$ok2||$ok3||$ok4)
    $resultMessage = '<div class="alert alert-danger">'. $temp . $errors .'</div>';
    // else
    // $resultMessage = '<div class="alert alert-danger">'. $errors .'</div>';
    
    echo $resultMessage;
    exit;
}

//no errors

// $name = mysqli_real_escape_string($link, $name);
// $email = mysqli_real_escape_string($link, $email);
// $subject = mysqli_real_escape_string($link, $subject);
// $message = mysqli_real_escape_string($link, $message);

// $password = hash('sha256', $password);

// $sql = "SELECT * FROM users WHERE username = '$username'";
// $result = mysqli_query($link, $sql);
// if(!$result){
//     echo '<div class="alert alert-danger">Error running the query!</div>';
// //    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
//     exit;
// }
// $results = mysqli_num_rows($result);
// if($results){
//     echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';  exit;
// }

// $sql = "SELECT * FROM users WHERE email = '$email'";
// $result = mysqli_query($link, $sql);
// if(!$result){
//     echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
// }
// $results = mysqli_num_rows($result);
// if($results){
//     echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';  exit;
// }

// $activationKey = bin2hex(openssl_random_pseudo_bytes(16));


// $sql = "INSERT INTO users (`username`, `email`, `password`, `activation`) VALUES ('$username', '$email', '$password', '$activationKey')";
// $result = mysqli_query($link, $sql);
// if(!$result){
//     echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
//     exit;
// }

// $message = "Please click on this link to activate your account:\n";
// $message .= "https://yavarmish.host20.uk/onlinenotes/activate.php?email=" . urlencode($email) . "&key=$activationKey";
if(mail('onlinenotesofficial@gmail.com', 'online notes' , $message,'From: '. $email)){
       echo "<div class='alert alert-success'><strong>Your mail has been sent succesfully. We'll get back to you asap!</strong></div>";
}

?>