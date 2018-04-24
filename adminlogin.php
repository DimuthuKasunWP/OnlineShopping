<?php   
 session_start();
 include("config/config.php");
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Online Shopping</title>
 <link href="css/online.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="js/functions.js"></script>
 <style type="text/css" media="all">
 /*@import "online.css";*/
 </style>
 <script language="javascript">
  function check()
  {
   if(document.getElementById("txt_username").value =="")
   {
    alert('Please Enter Admin name !!'); 
    document.getElementById("txt_username").focus();
    return false;
   }
   if(document.getElementById("txt_password").value =="")
   {
    alert('Please Enter password !!');
    document.getElementById("txt_password").focus();
    return false;
   }
   if (isUcase(document.getElementById("txt_username").value) == false || isUcase(document.getElementById("txt_password").value) == false)
   {
    alert("Admin Name and Password not match!!");
    document.getElementById("txt_username").value = "";
    document.getElementById("txt_password").value = "";
    document.getElementById("txt_username").focus();
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
      <div id="subsidebar3"> Welcome </div>
       <div align="center"><img src="images/adm.png" alt="Welcome" width="180" height="200" /> </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxtheader">Administrator Login Page</div>
      <div id="middletxt1">
        <p>Please enter the Login details.</p>
      </div>
      </div>
      <div id="middletxt">
        <form action="" method="post" name="frm_admlogin" id="frm_admlogin" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                  <tr>
                    <th colspan="5" id="formhedear"></th>
                  </tr>
                  <tr>
                    <td height="34" colspan="2"></td>
                    <td colspan="3"><div align="right"><font color="#FF0000">*</font><span class="style3"> Required  &nbsp; </span></div></td>
                  </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Admin Name : </strong></div></td>
                 <td width="128"><input value="<?php if (isset($_COOKIE["adm_user"])){echo $_COOKIE["adm_user"];}?>" type="textbox" name="txt_username" id="txt_username" maxlength="20" style="width:176px;"
                                   onChange="document.getElementById('txt_username').value=trim(this.value);"/>
                                   <div class="example">(Only Lower case Allowed.)</div></td>
              </tr>
              <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Password : </strong></div></td>
                 <td width="128"><input type="password" value="<?php if (isset($_COOKIE["adm_pass"])){echo $_COOKIE["adm_pass"];}?>"  name="txt_password" id="txt_password" maxlength="10" style="width:176px;"
                                   onChange="document.getElementById('txt_password').value=trim(this.value);"/></td>
              </tr>
              <tr>
                 <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="submit" id="submitMain" name="submitMain" value="Login" Onclick="return check(this.form);" />
                 &nbsp;&nbsp;&nbsp;
                 </td>
              </tr>
              </table></td>
            </tr>
          </table>
        </form>
 
 <?php
 if(isset($_POST['submitMain']))
 {
   $admin =$_POST['txt_username'];
   $password=$_POST['txt_password'];
   $query = mysqli_query($con,"SELECT * FROM t_admin_mst WHERE adm_username = '$admin' AND adm_password = '$password' ")
   or die(mysqli_error($con));
   if(mysqli_num_rows($query)>0)
   {
       if($row=mysqli_fetch_assoc($query)) {
           setcookie("adm_user", $row['adm_username'], time() + (86400 * 30));
           setcookie("adm_pass", $row['adm_password'], time() + (86400 * 30));
       }
     $_SESSION['admin']=$admin;
     echo "<script>window.location='admloghome.php';</script>";
   }
   else
   {
     echo '<div align="center"><strong><font color="#FF0000">Admin Name & Password not match !!</font></Strong></div>';
   }
}
mysqli_close($con);
?>
        <div align="center"><img src="images/login_icon.png" alt="Login Please" width="200" height="200" /> </div>
        <!-- end #middletxt -->
      </div>
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

  <!-- end #container -->
</div>
</body>
</html>