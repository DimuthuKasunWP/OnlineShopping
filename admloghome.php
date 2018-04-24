<?php   
 session_start();
 include("config/config.php");
 if(isset($_SESSION['admin']))
 {
  $username=$_SESSION['admin'];
 //echo "Admin name :".$username;
 } else {
 ?>
 <script>
  alert('You Are Not Logged In !! Please Login to access this page');
  window.location='adminlogin.php';
 </script>
 <?php
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="js/functions.js"></script>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Online Shopping</title>
 <link href="css/online.css" rel="stylesheet" type="text/css" />
 <style type="text/css" media="all">
 /*@import "online.css";*/
 </style>
 <script language="javascript">
 // function for comfirm box !!
 function logoutcon()
 {
  var conlog = confirm('Are you sure you want to log out !!');
  if(conlog)
  {
      window.location.replace("admlogout.php");
  }
  else
  {
  return false;
  }
 }
 </script>
</head>

<body class="twoColFixLtHdr">
<div id="header">
  <!-- end #header -->
</div>
<div id="container">
  <div id="container1"></div>
  <div id="sidebar1">
    <div id="subsidebar1">
      <div id="subsidebar3"> Navigation </div>
      <div id="subsidebar2"><a href="addcat.php?un=<?php echo $username;?>">Add Category</a>
      </div>
      <div id="subsidebar4">Account Settings
      <ul><li><a href="admemail.php">Change Email</a></li>
          <li><a href="admpassword.php">Change Password</a></li></ul>
      </div>
      <div id="subsidebar2"><a href="admdisplay.php">Display Vendors</a> 
      </div>
      <div id="subsidebar2"><a href="adminmail.php">Send Mail</a> 
      </div>

        <div id="subsidebar2"><a href="pricemaster.php">Price Master</a>
        </div>
      <div id="subsidebar2"><a href="admlogout.php" onclick="logoutcon();">Log out</a>
      </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
  
  <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxtheader" align="right">Welcome</div>
      <div id="middletxt1">
       <div align="center"><img src="images/admin.jpg" alt="Administrator" width="500" height="100"/> </div>
      </div>
      </div>
      <div id="middletxt">
       <div id="middletxtheader" align="right"></div>
        <!-- end #middletxt -->
       <div align="center"><img src="images/images_2.jpg" alt="Administrator" width="300" height="300" align="center" /> </div>
      </div>
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

  <!-- end #container -->
</div>
</body>
</html>