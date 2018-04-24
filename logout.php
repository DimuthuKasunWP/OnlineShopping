<?php
 session_start();
 //echo "user".$_SESSION['user'];
 //if(session_is_registered('txt_username')){



session_destroy();

if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
    setcookie("user", '', time() - (3600));
    setcookie("pass", '', time() - (3600));
}
 ?>
 <script>    window.location.replace("index.php");
</script>;
<?php

?>
 //}// else {
 //   echo "session not set";
 //}
?>