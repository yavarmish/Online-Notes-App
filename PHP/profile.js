$("#updateusernameform").submit(function(event){ 
    event.preventDefault();

    var datatopost = $(this).serializeArray();
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateusername.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateusernamemessage").html(data);
            }else{
                
                location.reload();   
            }
        },
        error: function(){
            $("#updateusernamemessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

// $("#updatepasswordform").submit(function(event){ 
//      event.preventDefault();

//     var datatopost = $(this).serializeArray();

//     $.ajax({
//         url: "updatepassword.php",
//         type: "POST",
//         data: datatopost,
//         success: function(data){
//             if(data){
//                 $("#updatepasswordmessage").html(data);
//             }
//         },
//         error: function(){
//             $("#updatepasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
//         }
    
//     });

// });