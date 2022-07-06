<?php
// echo "logut me h aap";   
if(isset($_SESSION['user_id']) && $_GET['logout'] == 1){
    setcookie("rememberme", "", time()-3600);
    session_destroy();
}

?>