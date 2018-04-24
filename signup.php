 <?php   
 include("config/config.php");
 ?>
 <?php session_start(); ?>
 <!DOCTYPE html>
 <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Shopping</title>
<link href="css/online.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/count.js"></script>
<script type="text/javascript" src="js/ajax_captcha.js"></script>
<script type="text/javascript" src="js/signup.js"></script>
<script type="text/javascript" src="js/signupvalidation.js"></script>
<script type="text/javascript" src="securimage/securimage.js"></script>
<style type="text/css" media="all">
/*@import "online.css";*/
</style>
<script language="javascript">
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
      <div id="subsidebar2"><a href="Startup.html">Home</a>
      </div>
      <div id="subsidebar2"><a href="login.php">Login</a> 
      </div>
      <div id="subsidebar2"><a href="aboutus.php">About Us</a> 
      </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxtheader">Sign Up Page</div>
      <div id="middletxt1">
        <p>Create your account here.</p>
      </div>
      </div>
      <div id="middletxt">
        <form action="signup.php" method="post" name="frm_signup" id="frm_signup" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                  <tr>
                    <th colspan="5" id="formhedear">Please enter Your details.</th>
                  </tr>
                  <tr>
                    <td height="34" colspan="2"></td>
                    <td colspan="3"><div align="right"><font color="#FF0000">*</font><span class="style3"> Required  &nbsp; </span></div></td>
                  </tr>
                  <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font> Salutation : </strong></div></td>
                 <td width="128"><select name="selsalutation" id="selsalutation" style="width:180px;">
	                         <option value="selsalutation">--Select--</option>
	                         <option value="Mr">Mr.</option>
                                 <option value="Ms">Ms.</option>
	                         <option value="Mrs">Mrs.</option>
	                         </select>
              </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>First Name : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_fname" id="txtsin_fname" maxlength="30" style="width:176px;"
                                   onChange="document.getElementById('txtsin_fname').value=trim(this.value);"/></td>
              </tr>
               <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Last Name : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_lname" id="txtsin_lname" maxlength="30" style="width:176px;"
                                   onChange="document.getElementById('txtsin_lname').value=trim(this.value);"/></td>
              </tr>
                <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Gender : </strong></div></td>
                 <td width="128"><input type="radio" name="rd_gen" id="rd_male" value="Male">Male &nbsp;&nbsp;&nbsp;&nbsp;
                                 <input type="radio" name="rd_gen" id="rd_female" value="Female">Female</td>
              </tr>
                <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>E-mail : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_email" id="txtsin_email" maxlength="50" style="width:176px;"
                                   onChange="document.getElementById('txtsin_email').value=trim(this.value);"/></td>
              </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>User Name : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_username" id="txtsin_username" maxlength="20" style="width:176px;"
                                  onChange="UserCheckAvail(this.value);document.getElementById('txtsin_username').value=trim(this.value);"/>
                                  <div class="example">(Only Lower case Allowed.)</div>
                     <span name="userChange" id="userChange" style="color:red;">&nbsp;</span></td>
              </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Password : </strong></div>
                 <td width="128"><input type="password" name="txtsin_password" id="txtsin_password" maxlength="20" style="width:176px;"
                                   onChange="document.getElementById('txtsin_password').value=trim(this.value);"/><div class="example">(Minimum 8 characters.)</div></td></td>
              </tr>
               <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Re-Enter Password : </strong></div></td>
                 <td width="128"><input type="password" name="txtsin_rpassword" id="txtsin_rpassword" maxlength="20" style="width:176px;"
                                   onChange="document.getElementById('txtsin_rpassword').value=trim(this.value);"/><div class="example">(Minimum 8 characters.)</div></td></td>
              </tr>
<!--               <tr>-->
<!--                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>URL : </strong></div></td>-->
<!--                 <td width="200"><input type="textbox" name="txtsin_url" id="txtsin_url" maxlength="40" style="width:176px;"-->
<!--                                   onChange="document.getElementById('txtsin_url').value=trim(this.value);"/><div class="example">(Eg.http://localhost/workingFiles/'UserName'/)</div></td></td>-->
<!--              </tr>-->
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Select Security Question : </strong></div></td>
                 <td width="128"><select name="sel_SQ" id="sel_SQ" style="width:180px;">
	                        <option value="sel_SQ">--Select--</option>
                                  <option value="My age" >My Age</option>
                                  <option value="My birth place">My Birth Place</option>
                                  <option value="My primary school name">My Primary School name</option>
                                  <option value="My favourate Teacher name">My favourate Teacher name</option>
                                  <option value="My puc percentage">My puc percentage</option>
                                  <option value="My Best Friend">My Best Friend</option>
                                  <option value="My mother name">My mother name</option>
                                  </select></td>
              </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Answer : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_ans" id="txtsin_ans" maxlength="20" style="width:176px;"
                                   onChange="document.getElementById('txtsin_ans').value=trim(this.value);"/></td>
              </tr>
              <tr>
                 <td><div align="right"><strong><font color="#FF0000">*</font>Address :</strong></div>
                 <p align="right" class="example">(Maximum 100 characters) </p></td>
                 <td colspan="4"><textarea name="ta_add" id="ta_add" wrap="physical" cols="45" rows="5" title="Address Should no excide 100 characters !!"
                                  onchange=" document.getElementById('ta_add').value=trim(this.value);"></textarea><br>
                                  Characters Remaining: <span id="charsLeft1">100</span>
              </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font> Country : </strong></div></td>
                 <td width="128">
                     <select name="selcountry" id="selcountry" style="width:180px;">
	                         <option value="selcountry">--Select--</option>
                                 <?php
                                  $get_cty=mysqli_query($con,"SELECT country_name FROM t_country");
                                  $num_cty=mysqli_num_rows($get_cty);
                                  while ($row=mysqli_fetch_array($get_cty)){
                                 ?>
			          <option value="<?php echo $row['country_name'];?>"><?php echo $row['country_name'];?></option>
                                 <?php
                                 }
                                 ?>
                      </select></td>
              </tr>
               <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Mobile No : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_mobcode" id="txtsin_mobcode" maxlength="3" style="width:30px;"
                                   onChange="document.getElementById('txtsin_mobcode').value=trim(this.value);"/>-<input type="textbox" name="txtsin_mob" id="txtsin_mob" maxlength="10" style="width:120px;"
                                   onChange="document.getElementById('txtsin_mob').value=trim(this.value);"/></td>
              </tr>
               <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Phone no : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_phcode" id="txtsin_phcode" maxlength="3" style="width:30px;"
                                   onChange="document.getElementById('txtsin_phcode').value=trim(this.value);"/>-<input type="textbox" name="txtsin_pharea" id="txtsin_pharea" maxlength="5" style="width:50px;"
                                   onChange="document.getElementById('txtsin_pharea').value=trim(this.value);"/>
                                 <input type="textbox" name="txtsin_phone" id="txtsin_phone" maxlength="7" style="width:70px; onChange="document.getElementById('txtsin_phone').value=trim(this.value);"/></td>
              </tr>
              <tr>
                 <td><div align="right"><strong><font color="#FF0000">*</font>About Website :</strong></div>
                 <p align="right" class="example">(Maximum 400 characters) </p></td>
                 <td colspan="4"><textarea name="ta_about" id="ta_about" wrap="physical" cols="45" rows="5" title="Details Should no excide 400 characters !!"
                                  onchange=" document.getElementById('ta_about').value=trim(this.value);"></textarea><br>
                                  Characters Remaining: <span id="charsLeft2">400</span>
              </tr>
              <tr>

                <td><div align="right" style="padding-top:45px;"><span class="req">*</span><strong> Verification Code :</strong></div></td>
<!--                <td colspan="4"><p><img id="imgCaptcha" src="create_image.php" /><span class="style4">(letters are case sensitive )</span></p>-->
                <td colspan="4"><p><img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" /><span class="style4">(letters are case sensitive )</span></p>
<!--                <input type="text" id="txtcaptcha" name="txtcaptcha" maxlength="10" size="10" onchange="getParam(document.frm_signup);document.getElementById('txtcaptcha').value=trim(this.value);" />-->
<!--                <span id="newImg"> Can't see image ? <a onclick="getphoto(document.frm_signup)" href="javascript:void(0);" class="imglink">&nbsp;Load a new image</a></span>-->
<!--                <div name="divVeriCode" id="divVeriCode">Enter the code as shown in the image</div>-->
                    <input type="text" name="captcha_code" size="10" maxlength="6" />
                    <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
                <div id="result"></div></td>
              </tr>
              <tr>
                 <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="submit" id="submitMain" name="submitMain" value="Sign Up" Onclick="return done(this.form);" />
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
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->


</div>
<!-- Insertion for Data Base !! -->
<?php
//include 'securimage/securimage.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/workingFiles/shopping/securimage/securimage.php';
$securimage=new securimage();

//$securimage = new Securimage();

    if(isset($_POST['captcha_code'])){
        if($securimage->check($_POST['captcha_code']) == false){
            ?><script>alert("verification code is wrong")</script>

<?php

        }else{

            if(isset($_POST['submitMain']))
            {
                // geting to days date !!
                $today = getdate();
                $hh=$today["hours"];
                $mm=$today["minutes"];
                $ss=$today["seconds"];
                $wday=$today["wday"];
                $mon=$today["mon"];
                $year=$today["year"];
                $date = $year.":".$mon.":".$wday;
                //echo "date : " . $date;
                //getting the values !!
                $sal=$_POST['selsalutation'];
                $fname=$_POST['txtsin_fname'];
                $lname=$_POST['txtsin_lname'];
                $gender=$_POST['rd_gen']; // after renaming
                $email=$_POST['txtsin_email'];
                $username=$_POST['txtsin_username'];
                $password=$_POST['txtsin_password'];
                $url=$_POST['txtsin_url'];
                $sq=$_POST['sel_SQ']; //sq-security question
                $sqans=$_POST['txtsin_ans'];
                $add=$_POST['ta_add'];
                $country=$_POST['selcountry'];
                $mob=$_POST['txtsin_mobcode']."-".$_POST['txtsin_mob'];
                $phone=$_POST['txtsin_phcode']."-".$_POST['txtsin_pharea']."-".$_POST['txtsin_phone'];
                $about=$_POST['ta_about'];

                $get= mysqli_query($con,"SELECT * FROM t_admin_mst")or die(mysqli_error());
                $num= mysqli_num_rows($get);
                while ($rows=mysqli_fetch_assoc($get))
//    for($i=0;$i<$num;$i++)
                {
//     $adm_email= @mysqli_result($get,$i,'adm_email');
                    $adm_email=$rows["adm_email"];
                }
                // mail function
//                $to = $adm_email;
//                $subject = 'Your password';
//                $from = 'kasunwpdimuthu@gmail.com';
//                $message = 'Hello '.$fname.',<br> You Have an new Vendor with username <strong>'.$username.'.</strong> <br> So please create an URL for that username .
//                For more details login to your system. Thanking you ..';
//                $header = 'From : < '.$from.' >';
//                //echo $message;
//                ini_set('sendmail_from','kasunwpdimuthu@gmail.com');
//                if(mail($to,$subject,$message,"From: <{$email}> "))
//                    echo "<script>alert('Mail sent')</script>";
//                else
////                    echo "<script>alert('Mail send failure - message not sent')</script>";

                $query = mysqli_query($con,"INSERT INTO t_custreg_mst
    (log_sal,log_fname,log_lname,log_gender,log_email,username,log_password,log_url,log_security_question,log_security_answer,log_address,log_country,log_mobile,log_phone,log_about_us,log_regdate)
    VALUES ('$sal','$fname','$lname','$gender','$email','$username','$password','$url','$sq','$sqans','$add','$country','$mob','$phone','$about','$date')")
                or die(mysqli_error($con));
                echo "<script>alert('Your account has been created !!');</script>";
            }
        }

    }

 ?>
</body>
</html>