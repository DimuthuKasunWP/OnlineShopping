<?php   
 session_start();
 include("config/config.php");
 //echo "User".$_SESSION['user'];
 if(isset($_SESSION['user']))
 {
  $username=$_SESSION['user'];
 } else {
 ?>
 <script>
  alert('You Are Not Logged In !! Please Login to access this page');
  alert(window.location='login.php');
 </script>
 <?php
 }
 ?>
<!DOCTYPE html>
<html>
<head>
 <script type="text/javascript" src="js/functions.js"></script>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/count.js"></script>
 <script type="text/javascript" src="js/ajax_captcha.js"></script>
 <script type="text/javascript" src="js/productmaster.js"></script>
 <script type="text/javascript" src="js/productmastervalidation.js"></script>
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
  function check()
  {
   if(document.getElementById("txt_sub").value =="")
   {
    alert('Please Enter Subject !!');
    document.getElementById("txt_sub").focus();
    return false;
   }
    if(document.getElementById("tamsg").value =="")
   {
    alert('Please Enter Message !!');
    document.getElementById("tamsg").focus();
    return false;
   }
  }
  function charcount()
  {
   document.getElementById('static1').innerHTML = "Characters Remaining:  <span  id='charsLeft2'>   500 </span>";   
  }
 </script>  

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Online Shopping</title>
 <link href="css/online.css" rel="stylesheet" type="text/css" />
 <style type="text/css" media="all">
  /*@import "online.css";*/
 </style>
</head>

 <?php 
   $count=mysqli_query($con,"SELECT * from t_orders_trn WHERE username='$username' AND ord_deliverystatus= 'Waiting'");
   $order_count=mysqli_num_rows($count);
   $count_del=mysqli_query($con,"SELECT * from t_orders_trn WHERE username='$username' AND ord_deliverystatus= 'Delivered'");
   $del_count=mysqli_num_rows($count_del);
 ?>

<body class="twoColFixLtHdr">
<div id="header">
  <!-- end #header -->
</div>
<div id="container">
  <div id="container1"></div>
  <div id="sidebar1">
    <div id="subsidebar1">
      <div id="subsidebar3"> Navigation </div>
      <div id="subsidebar2"><a href="loghome.php">Home</a>
      </div>
      <div id="subsidebar2"><a href="reports.php">Order Reports<?php echo' ('.$order_count.')';?></a> 
      </div>
      <div id="subsidebar2"><a href="delivered.php">Delivery Reports<?php echo' ('.$del_count.')';?></a> 
      </div>
      <div id="subsidebar2"><a href="stock.php">Stock Reports</a> 
      </div>
      <div id="subsidebar2"><a href="backup.php">Back UP</a> 
      </div>
      <div id="subsidebar5">Archive
      <ul>
      <?php
        $get_date= mysqli_query($con,"SELECT DISTINCT bck_archive FROM t_backup_trn WHERE username= '$username' ORDER BY bck_archive DESC")or die(mysqli_error());
        $num_date= mysqli_num_rows($get_date);
        while ($row=mysqli_fetch_assoc($get_date))
//        for($i=0;$i<$num_date;$i++)
        {
//         $date= @mysql_result($get_date,$i,'bck_archive');
         $date=$row["bck_archive"];
      ?>
      <li><a href="backupdisplay.php?date=<?php echo $date;?>"><?php echo $date;?></a></li>
      <?php
        }
      ?>
      </ul>
      </div>
      <div id="subsidebar2"><a href="mail.php">Send Mail</a> 
      </div>
      <div id="subsidebar4">Account Settings
      <ul><li><a href="changepassword.php">Change Password</a></li>
          <li><a href="accountsettings.php">Account Details</a></li></ul>
      </div>
      <div id="subsidebar2"><a href="logout.php" onclick="isConfirmlog();">Log out</a>
      </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxtheader">Administrator Mail Page</div>
      <div id="middletxt1">
        <p align="left">Enter the Subject and Message.</p>
      </div>
      </div>
      <div id="middletxt">
        <form action="" method="post" name="frm_mail" id="frm_mail" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                  <tr>
                    <th colspan="5" id="formhedear">Mail.</th>
                  </tr>
                  <tr>
                   <td></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong>Subject : </strong></div></td>
                    <td width="128"><input type="textbox" name="txt_sub" id="txt_sub"  value="" maxlength="30" style="width:176px;"
                                      onchange="document.getElementById('txt_sub').value=trim(this.value);"/></td>
                  </tr>
                   <tr>
                    <td><div align="right"><strong>Message :</strong></div>
                      <p align="right" class="example">(Maximum 500 characters) </p></td>
                      <td width="128"><textarea name="tamsg" id="tamsg" wrap="physical" cols="45" rows="5" title="Message Should not excide 500 characters !!"
                                       onchange=" document.getElementById('tamsg').value=trim(this.value);"></textarea><br>
                                    Characters Remaining: <span id="charsLeft1">500</span></td>
                    </tr>
                  <tr>
                    <td></td>
                    <td colspan="3" >&nbsp;&nbsp;&nbsp;<!--Onclick="return done(this.form);"-->
                      <input type="submit" id="submitMain" name="submitMain" value="Send  " Onclick="return check(this.form);" > 
                      &nbsp;&nbsp;&nbsp;
                      <input type="reset" id="subintr" name="subintr" value="Reset"  /></td>
                  </tr>
              </table></td>
            </tr>
          </table>
        </form>
        <div align="center"><img src="images/mail.png" alt="mail image" width="200" height="150" /> </div>
        <!-- end #middletxt -->
      </div>
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

  <!-- end #container -->
</div>

 <!-- Code for inserting into data base -->
 <?php
  if(isset($_POST['submitMain']))
  {
   //getting the values !!
   $username=$_SESSION['user'];
   $sub=$_POST['txt_sub'];
   $message=$_POST['tamsg'];

   $get_adm= mysqli_query($con,"SELECT * FROM t_admin_mst")or die(mysqli_error($con));
   $num_adm= @mysqli_num_rows($get_adm);
   while ($row=mysqli_fetch_assoc($get_adm))
//   for($i=0;$i<$num_adm;$i++)
   {
//    $adm_email= @mysql_result($get_adm,$i,'adm_email');
    $adm_email=$row["adm_email"];
   }
   
   $get= mysqli_query($con,"SELECT * FROM t_custreg_mst WHERE username= '$username' ")or die(mysqli_error($con));
   $num= mysqli_num_rows($get);
   while ($row=mysqli_fetch_assoc($get))
//   for($j=0;$j<$num;$j++)
   {
//    $vend_email= @mysql_result($get,$j,'log_email');
    $vend_email=$row["log_email"];
//    echo $vend_email;
   }
    // mail function
    $to = $adm_email;
    $subject = $sub;
//    $from = 'vidu996@gmail.com';
      $from=$vend_email;
    $message =  $message.'Thanking you ..';
    $header = 'From : < '.$from.' >';
    //echo $message;
      ini_set("SMTP", "aspmx.l.google.com");
      ini_set("sendmail_from", "kasunwpdimuthu@gmail.com");
    ini_set('smtp_port',25);
    if(mail($to,$subject,$message))
      echo "<script>alert('Mail sent')</script>";
     else
      echo "<script>alert('Mail send failure - message not sent')</script>";
    echo "<script>window.location='admmail.php'</script>";
  }
 ?>
</body>
</html>