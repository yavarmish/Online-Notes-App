<?php
    session_start();
    include('connection.php');
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

    $missingUsername = '<strong>username, </strong>';
    $missingEmail = '<strong>email address, </strong>';
    $invalidEmail = '<strong>valid email address, </strong>';
    $missingPassword = '<strong>Password</strong>';
    $invalidPassword = '<strong>Your password should be at least 6 characters long and inlcude one capital letter and one number</strong>';
    $differentPassword = '<strong>Passwords don\'t match</strong>';
    $missingPassword2 = '<strong>Please confirm your password</strong>';

if(empty($_POST["username"])){
    $ok1=true;
    $errors .= $missingUsername;
}else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);   
}

if(empty($_POST["email"])){
    $ok2=true;
    $errors .= $missingEmail;   
}else{
    
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
    }
}

if(empty($_POST["password"])){
    $errors .= $missingPassword; 
    $ok3=true;
}elseif(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    
    $errors .= $invalidPassword; 
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}

if($errors){

    $temp="<strong>Please enter a </strong>";
    if($ok1||$ok2||$ok3)
    $resultMessage = '<div class="alert alert-danger">'. $temp . $errors .'</div>';
    else
    $resultMessage = '<div class="alert alert-danger">'. $errors .'</div>';

    echo $resultMessage;
    exit;
}

//no errors

$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);

$password = hash('sha256', $password);

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
//    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';  exit;
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';  exit;
}

$activationKey = bin2hex(openssl_random_pseudo_bytes(16));


$sql = "INSERT INTO users (`username`, `email`, `password`, `activation`) VALUES ('$username', '$email', '$password', '$activationKey')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
}

$message = "Please click on this link to activate your account:\n";
$message .= "https://yavarmish.host20.uk/onlinenotes/activate.php?email=" . urlencode($email) . "&key=$activationKey";
if(mail($email, 'Confirm your Registration', $message, 'From:'.'onlinenotesofficial@gmail.com')){
       echo "<div class='alert alert-success'>
       A confirmation mail has been sent to your email. Please activate your account!
        <div style='font-size:small'>(check your spam folder in case you haven't received)</div>
       </div>";
}

?>