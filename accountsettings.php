<?php   
  session_start();
  include("config/config.php");
  if(isset($_SESSION['user']))
  {
   $username=$_SESSION['user'];
  //echo "User name :".$username;
  } else {
 ?>
 <script>
  alert('You Are Not Logged In !! Please Login to access this page');
  window.location='login.php';
 </script>
 <?php
  }
 ?>
<!DOCTYPE html>
<html>
<head>
 <script type="text/javascript" src="js/functions.js"></script>
 <script type="text/javascript" src="js/accountsettings.js"></script>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/count.js"></script>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Online Shopping</title>
 <link href="css/online.css" rel="stylesheet" type="text/css" />
 <style type="text/css" media="all">

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
  function charcount()
  {
   document.getElementById('static').innerHTML = "Characters Remaining:  <span  id='charsLeft1'>   100 </span>";
   document.getElementById('static').innerHTML = "Characters Remaining:  <span  id='charsLeft2'>   400 </span>";
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
      <div id="subsidebar2"><a href="loghome.php">Home</a>
      </div>
      <div id="subsidebar2"><a href="productmaster.php">Product Master</a>
      </div>
      <div id="subsidebar2"><a href="pricemaster.php">Price Master</a> 
      </div>
      <div id="subsidebar4">Display
      <ul><li><a href="productdisplay.php">Product Master</a></li>
          <li><a href="pricedisplay.php">Price Master</a></li></ul>
      </div>
      <div id="subsidebar4">Account Settings
      <ul>
       <li><a href="changepassword.php">Change Password</a></li>
      </ul>
      </div>
      <div id="subsidebar2"><a href="logout.php" onclick="isConfirmlog();">Log out</a>
      </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
 <?php
  $get= mysqli_query($con,"SELECT * FROM t_custreg_mst WHERE username= '$username' ")or die(mysqli_error());
  $num= mysqli_num_rows($get);
  while ($row=mysqli_fetch_assoc($get))
  {
//   $sal=@mysql_result($get,$i,'log_sal');
   $sal=$row["log_sal"];
//   $fname=@mysql_result($get,$i,'log_fname');
   $fname= $row["log_fname"];
//   $lname=@mysql_result($get,$i,'log_lname');
   $lname=$row["log_lname"];
//   $gender=@mysql_result($get,$i,'log_gender');
   $gender=$row["log_gender"];
//   $email=@mysql_result($get,$i,'log_email');
   $email=$row["log_email"];
//   $add=@mysql_result($get,$i,'log_address');
   $add=$row["log_address"];
//   $country=@mysql_result($get,$i,'log_country');
   $country=$row["log_country"];
//   $mob=@mysql_result($get,$i,'log_mobile');
   $mob=$row["log_mobile"];
//   $phone=@mysql_result($get,$i,'log_phone');
   $phone=$row["log_phone"];
//   $about=@mysql_result($get,$i,'log_about_us');
   $about=$row["log_about_us"];
  }
  ?>
 
 <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxtheader" align="right">Account Settings</div>
      <div id="middletxt1">
       <p>Change your Account Details.</p>
       </div>
      </div>
    </div>
      <div id="middletxt">
        <form action="accountsettings.php" method="post" name="frm_signup" id="frm_signup" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                <tr>
                   <th colspan="5" id="formhedear">Please Edit Your details Here.</th>
                </tr>
                <tr>
                 <td height="34" colspan="2"></td>
                 <td colspan="3"><div align="right"><font color="#FF0000">*</font><span class="style3">Mandatory	Fields &nbsp;  </span></div></td>
                </tr>
                <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font> Salutation : </strong></div></td>
                 <td width="128">
                  <select name="selsalutation" id="selsalutation" style="width:180px;">
	           <option value="selsalutation">--Select--</option>
	           <option value="Mr" <?php if($sal =="Mr") echo "selected"; ?>>Mr.</option>
                   <option value="Ms" <?php if($sal =="Ms") echo "selected"; ?>>Ms.</option>
	           <option value="Mrs" <?php if($sal =="Mrs") echo "selected"; ?>>Mrs.</option>
	          </select>
                </tr>
                <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>First Name : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_fname" id="txtsin_fname" maxlength="30" style="width:176px;"
                                  value="<?php echo $fname;?>"
                                   onChange="document.getElementById('txtsin_fname').value=trim(this.value);"/></td>
               </tr>
                <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Last Name : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_lname" id="txtsin_lname" maxlength="30" style="width:176px;"
                                   value="<?php echo $lname;?>"
                                  onChange="document.getElementById('txtsin_lname').value=trim(this.value);"/></td>
               </tr>
                <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Gender : </strong></div></td>
                 <td width="128"><input type="radio" name="rd_gen" id="rd_male" value="Male" <?php if($gender == "Male") echo "checked"; ?>>Male &nbsp;&nbsp;&nbsp;&nbsp;
                                 <input type="radio" name="rd_gen" id="rd_female" value="Female" <?php if($gender == "Female") echo "checked"; ?>>Female</td>
               </tr>
               <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>E-mail : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_email" id="txtsin_email" maxlength="50" style="width:176px;"
                                   value="<?php echo $email;?>"
                                   onChange="document.getElementById('txtsin_email').value=trim(this.value);"/></td>
              </tr>
              <tr>
                 <td><div align="right"><strong><font color="#FF0000">*</font>Address :</strong></div>
                 <p align="right" class="example">(Maximum 100 characters) </p></td>
                 <td colspan="4"><textarea name="ta_add" id="ta_add" wrap="physical" cols="45" rows="5" title="Address Should no excide 100 characters !!"
                                  onchange=" document.getElementById('ta_add').value=trim(this.value);"><?php echo $add;?></textarea><br>
                                  Characters Remaining: <span id="charsLeft1"> </span>
              </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font> Country : </strong></div></td>
                 <td width="128">
                  <select name="selcountry" id="selcountry" style="width:180px;">
	          <option value="selcountry">--Select--</option>
                   <?php
                    $get_cty=mysqli_query($con,"SELECT country_name FROM t_country")or die(mysqli_error());
                    $num_cty=mysqli_num_rows($get_cty);
                    while ($row=mysqli_fetch_assoc($get_cty))
//                    for($i=0;$i<$num_cty;$i++)
                    {
//                     $cty=mysql_result($get_cty,$i,'country_name');
                     $cty=$row["country_name"];
		     if($cty==$country) {
                      $sel="selected";
                     } else {
                      $sel="";
                     }
                    ?>
                  <option value="<?php echo $cty;?>" <?php echo $sel;?>><?php echo $cty;?></option>
                   <?php
                    }
                   ?>
                  </select>
                 </td>
              </tr>
              <tr>
                 <td><div align="right"><strong><font color="#FF0000">*</font>About Website :</strong></div>
                 <p align="right" class="example">(Maximum 400 characters) </p></td>
                 <td colspan="4"><textarea name="ta_about" id="ta_about" wrap="physical" cols="45" rows="5" title="Details Should no excide 400 characters !!"
                                  onchange=" document.getElementById('ta_about').value=trim(this.value);"><?php echo $about;?></textarea><br>
                                  Characters Remaining: <span id="charsLeft2"> </span>
                 </td>
              </tr>
              <tr>
                 <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="submit" id="submitMain" name="submitMain" value="Update" Onclick="return done(this.form);" />
                 &nbsp;&nbsp;&nbsp;
                  <input type="reset" id="btnreset" name="btnreset" value="Reset" />
                 </td>
              </tr>
              </table></td>
            </tr>
          </table>
        </form>
        <!-- end #middletxt -->
      </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

</div>

 <?php
  if(isset($_POST['submitMain']))
  {
   $sal=$_POST['selsalutation'];
   $fname=$_POST['txtsin_fname'];
   $lname=$_POST['txtsin_lname'];
   $gender=$_POST['rd_gen']; // after renaming
   $email=$_POST['txtsin_email'];
   $add=$_POST['ta_add'];
   $country=$_POST['selcountry'];
   $about=$_POST['ta_about'];
   // Update Query 
   $query = mysqli_query($con,"UPDATE t_custreg_mst SET log_sal='$sal',log_fname='$fname',log_lname='$lname',log_email='$email',log_address='$add',log_country='$country',
                        log_about_us='$about' WHERE username='$username' ")
                        or die();
   echo "<script>alert('Account Details Changed sucessfully !!');</script>";
   echo "<script>window.location='loghome.php';</script>";
  }
 ?>

</body>
</html>