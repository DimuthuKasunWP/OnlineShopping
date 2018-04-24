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
 @import "online.css";
 </style>
 <script language="javascript">
 // function for comfirm box !!
 function isConfirmlog()
 {
  var r = confirm('Are you sure you want to log out !!');
  if(!r)
  {
   return false;
  }
  else
  {
      window.location.replace("logout.php");
  }
 }
 // function validation.
 function done()
 {
  if(document.getElementById("selun").value == "selun")
  {
   alert("Select User Name !!");
   document.getElementById("selun").focus();
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
      <div id="subsidebar2"><a href="admloghome.php">Home</a>
      </div>
      <div id="subsidebar2"><a href="addcat.php">Add Category</a>
      </div>
      <div id="subsidebar4">Account Settings
      <ul><li><a href="admemail.php">Change Email</a></li>
          <li><a href="admpassword.php">Change Password</a></li></ul>
      </div>
      <div id="subsidebar2"><a href="adminmail.php">Send Mail</a> 
      </div>
      <div id="subsidebar2"><a href="logout.php" onclick="isConfirmlog();">Log out</a>
      </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxt">
        <form action="" method="post" name="frm_admdisplay" id="frm_admdisplay" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                  <tr>
                    <th colspan="5" id="formhedear">Vendors Display Page.</th>
                  </tr>
                  <tr>
                    <td height="34" colspan="2"></td>
                    <td colspan="3"><div align="right"><font color="#FF0000">*</font><span class="style3"> Required  &nbsp; </span></div></td>
                  </tr>
                  <tr>
                    <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>User Name : </strong></div></td>
                    <td><select name="selun" id="selun" style="width:180px;">
                        <option value="selun">- Select User Name -</option>
                        <?php
                        $get_un= mysqli_query($con,"SELECT username FROM t_custreg_mst")or die(mysqli_error());
                        $num_un= mysqli_num_rows($get_un);
                        while ($row=mysqli_fetch_assoc($get_un))
//                        for($i=0;$i<$num_un;$i++)
                        {
//                         $user= @mysql_result($get_un,$i,'username');
                         $user=$row["username"];
                        ?>
			 <option value="<?php echo $user;?>"><?php echo $user;?></option>
                        <?php
                        }
                        ?>
                      </select></td>
                  </tr>
              <tr>
                 <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="submit" id="submitMain" name="submitMain" value="Display" Onclick="return done(this.form);hidediv();" />
                 &nbsp;&nbsp;&nbsp;
                 </td>
              </tr>
              </table></td>
            </tr>
          </table>
        </form>
      </div>
      </div>
 
 <?php
  if(isset($_POST['submitMain']))
  {
   $usn=$_POST['selun'];
   $get= mysqli_query($con,"SELECT * FROM t_custreg_mst WHERE username='$usn'")or die(mysqli_error($con));
   $num = mysqli_num_rows($get);
   while ($row=mysqli_fetch_assoc($get))

   {
//    $sal= @mysql_result($get,$i,'log_sal');
    $sal=$row["log_sal"];
//    $fname= @mysql_result($get,$i,'log_fname');
    $fname=$row["log_fname"];
//    $lname= @mysql_result($get,$i,'log_lname');
    $lname=$row["log_lname"];
    $cname= $sal." ".$fname." ".$lname;
//    $email= @mysql_result($get,$i,'log_email');
    $email=$row["log_email"];
//    $username1= @mysql_result($get,$i,'username');
    $username1=$row["username"];
//    $url= @mysql_result($get,$i,'log_url');
    $url=$row["log_url"];
//    $add= @mysql_result($get,$i,'log_address');
    $add=$row["log_address"];
//    $country= @mysql_result($get,$i,'log_country');
    $country=$row["log_country"];
//    $mob= @mysql_result($get,$i,'log_mobile');
    $mob=$row["log_mobile"];
//    $phone= @mysql_result($get,$i,'log_phone');
    $phone=$row["log_phone"];
//    $about= @mysql_result($get,$i,'log_about_us');
    $about=$row["log_about_us"];
?>

      <div id="middletxt">
        <form action="" method="post" name="frm_price_disp" id="frm_price_disp" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                  <tr>
                    <th colspan="5" id="formhedear">Vendor Details.</th>
                  </tr>
                  <tr>
                    <td width="245" height="37"><div align="right"><strong> Vendor Name : </strong></div></td>
                    <td><?php echo $cname; ?></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong> Email ID : </strong></div></td>
                    <td><?php echo $email; ?></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong> User Name : </strong></div></td>
                     <td><?php echo $username1; ?></td>
                   </tr>
                  <tr>
                    <td><div align="right"><strong> User URL : </strong></div></td>
                     <td><?php echo $url; ?></td>
                   </tr>
                  <tr>
                    <td><div align="right"><strong> Address : </strong></div></td>
                    <td><p><?php echo $add; ?> </br> <?php echo $country; ?></p></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong> Mobile No : </strong></div></td>
                     <td><?php echo $mob; ?></td>
                   </tr>
                  <tr>
                    <td><div align="right"><strong> Phone No : </strong></div></td>
                     <td><?php echo $phone; ?></td>
                   </tr>
                  <tr>
                    <td><div align="right"><strong> About us : </strong></div></td>
                     <td><?php echo $about; ?></td>
                   </tr>
                   <tr>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
          </table>
        </form>
        <!-- end #middletxt -->
      </div>
    </div>
      <?php
      }
      }
      ?>
    <!-- end #mainContent -->
  </div>

  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

  <!-- end #container -->
</div>
</body>
</html>