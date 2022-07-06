$("#signupform").submit(function(event){
    event.preventDefault();
    var datapost=$(this).serializeArray();
    console.log(datapost);

    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datapost,
        success: function(data){
            if(data)
            $("#signupmessage").html(data);
        },
        error: function()
        {
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error</div>");
        }

    });
    

});

$("#loginform").submit(function(event){ 
    // console.log("yha to pohche");
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    console.log(datatopost);

    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "success"){
                window.location = "mainpageloggedin";
            }else{
                $('#loginmessage').html(data);   
            }
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});


$("#forgotpasswordform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            
            $('#forgotpasswordmessage').html(data);
        },
        error: function(){
            $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

$("#contactusform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
   console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "contactus.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            
            $('#contactusmessagef').html(data);
        },
        error: function(){
            $("#contactusmessagef").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

// $(".nav-link").on("click", function(e) {
//     // e.preventDefault();
//     $(".nav-link").removeClass("active");
//     $(this).addClass("active");
    
// });