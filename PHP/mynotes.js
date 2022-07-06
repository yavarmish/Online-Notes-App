$(function(){
    var activeNote = 0;
    // var editMode = false;

    $.ajax({
        url: "loadnotes.php",
        success: function (data){
            $('#notes').html(data);
            clickonNote(); 
            clickonDelete();
            
        },
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
        }
    
    });




$('#add-note').click(function(){
    $.ajax({
        url: "createnote.php",
        success: function(data){
            if(data == 'error'){
                $('#alertContent').text("There was an issue inserting the new note in the database!");
                $("#alert").fadeIn();
            }else{
                //update activeNote to the id of the new note
                activeNote = data;
                // $("textarea").val("");
                $.ajax({
                    url: "updatenote.php",
                    type: "POST",
                    
                    data: {note: $('.txt1').val(), id:activeNote},
                    success: function (data){
                        if(data == 'error'){
                            $('#alertContent').text("There was an issue updating the note in the database!");
                            $("#alert").fadeIn();
                        }

                        $.ajax({
                            url: "loadnotes.php",
                            success: function (data){
                                $('#notes').html(data);
                                clickonNote(); 
                                clickonDelete();
                                
                            },
                            error: function(){
                                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                                        $("#alert").fadeIn();
                            }
                        
                        });
                        $(".txt1").val("");
                    },
                    error: function(){
                        $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                                $("#alert").fadeIn();
                    }
            
                });

                

                // showHide(["#notePad", "#allNotes"], ["#notes", "#addNote", "#edit", "#done"]);
                // $("textarea").focus();
                
            }
        },
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                $("#alert").fadeIn();
        }
    
    
    });


    
    
});

function clickonNote(){$(".noteheader").click(function(){
    activeNote = $(this).attr("id");
    $(".txt2").val($(this).find('.text').text());
}); 
}

$("#done").click(function(){
    $.ajax({
        url: "updatenote.php",
        type: "POST",
        
        data: {note: $('.txt2').val(), id:activeNote},
        success: function (data){
            if(data == 'error'){
                $('#alertContent').text("There was an issue updating the note in the database!");
                $("#alert").fadeIn();
            }
                $.ajax({
                    url: "loadnotes.php",
                    success: function (data){
                        $('#notes').html(data);
                        clickonNote(); 
                        clickonDelete();
                        
                    },
                    error: function(){
                        $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                                $("#alert").fadeIn();
                    }
                
                });
            
        },
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
        }

    });

    
    // $(".txt1").val("");
});

function clickonDelete(){
                    

    $(".delete").click(function(){
        // console.log('we reached here');
        var deleteButton = $(this);
         
        $.ajax({
            url: "deletenote.php",
            type: "POST",

            data: {id:deleteButton.next().attr("id")},
            success: function (data){
                if(data == 'error'){
                    
                    $('#alertContent').text("There was an issue delete the note from the database!");
                    $("#alert").fadeIn();
                }else{
                    console.log('there was no error');
                    deleteButton.parent().remove();
                    $.ajax({
                        url: "loadnotes.php",
                        success: function (data){
                            $('#notes').html(data);
                            clickonNote(); 
                            clickonDelete();
                            
                        },
                        error: function(){
                            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                                    $("#alert").fadeIn();
                        }
                    
                    });
                }
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                        $("#alert").fadeIn();
            }

        });

        
        
    });
    
}

});