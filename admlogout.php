<?php
 session_start();
 //echo "user".$_SESSION['user'];
 //if(session_is_registered('txt_username')){

session_destroy();

if (isset($_COOKIE["adm_user"]) AND isset($_COOKIE["adm_pass"])){
    setcookie("adm_user", '', time() - (3600));
    setcookie("adm_pass", '', time() - (3600));
}

echo "<script>window.location='adminlogin.php';</script>";
 //}// else {
 //   echo "session not set";
 //}
?>