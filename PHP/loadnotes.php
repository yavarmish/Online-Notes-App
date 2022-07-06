<?php
    session_start();
    include('connection.php');
    $user_id = $_SESSION['user_id'];
    $sql = "DELETE FROM notes WHERE note=''";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-warning">An error occured!</div>'; exit;
    }

    $sql = "SELECT * FROM notes WHERE user_id ='$user_id' ORDER BY time DESC";

    

    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result)>0){
            $c=1;
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $note_id = $row['id'];
                $note = $row['note'];
                $time = $row['time'];
                date_default_timezone_set('Asia');
                $time = date("F d, Y", $time);
                
            //     echo "
            // <div class='note'>
            //     <div class='col-xs-5 col-sm-3 delete'>
            //         <button class='btn-lg btn-danger' style='width:100%'>delete</button>
                
            //     </div>
            //     <div class='noteheader' id='$note_id'>
            //         <div class='text'>$note</div>
            //         <div class='timetext'>$time</div>    
            //     </div>
            // </div>";
                echo "
                
                <div class='card my-2 mx-2 noteheader' id='$note_id' style='width: 18rem;'>
                    
                    <div class='card-body'>
                    <h5 class='card-title'>Note #$c</h5>
                    <p data-toggle='modal' data-target='#CardModal' data-whatever='Card' class='card-text text ellipsis'>$note</p>
                    <div id='del' class='delete' style= 'display: inline-block;'>
                        <button class='btn btn-primary'>Delete</button>
                    </div>
                    <div id='$note_id'></div>
                        
                    </div>
                    
                    
                    <div style='font-size: 0.9rem;' class='card-footer text-muted'>
                        $time
                    </div>
                </div>";
                $c+=1;
            }
        }else{
            echo '<div class="alert alert-warning">You haven\'t created any notes yet!</div>'; exit;
        }
        
    }else{
        echo '<div class="alert alert-warning">An error occured!</div>'; exit;
    //    echo "ERROR: Unable to excecute: $sql." . mysqli_error($link);
    }

?>