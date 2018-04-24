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
  alert(window.location='login.php');
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
 function done()
 {
  if(document.getElementById("selpid").value == "selpid")
  {
   alert("Select Product ID !!");
   document.getElementById("selpid").focus();
   return false;
  }
 }
 function hidediv()
 {
  document.getElementById('hideimg').style.display="none";
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
      <div id="subsidebar2"><a href="logout.php" onclick="isConfirmlog();">Log out</a>
      </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxt">
        <form action="productdisplay.php" method="post" name="frm_login" id="frm_login" enctype="multipart/form-data">
          <table width="100%" border=0>
                  <tr>
                    <th colspan="5" id="formhedear">Product Master Display Page.</th>
                  </tr>
                  <tr>
                    <td height="34" colspan="2"></td>
                    <td colspan="3"><div align="right"><font color="#FF0000">*</font><span class="style3"> Required  &nbsp; </span></div></td>
                  </tr>
                  <tr>
                    <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Product Id : </strong></div></td>
                    <td><select name="selpid" id="selpid" style="width:180px;">
                        <option value="selpid">- Select Product ID -</option>
                        <?php
                        $get_pid= mysqli_query($con,"SELECT prd_id FROM t_product_mst WHERE username= '$username' ")or die(mysqli_error());
                        $num_pid= mysqli_num_rows($get_pid);
                        while ($rows=mysqli_fetch_assoc($get_pid))
//                        for($i=0;$i<$num_pid;$i++)
                        {
//                         $pid= @mysql_result($get_pid,$i,'prd_id');
                         $pid=$rows["prd_id"];
                        ?>
			 <option value="<?php echo $pid;?>"><?php echo $pid;?></option>
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
              </table>
        </form>
      </div>
      </div>

 <?php
   if(isset($_POST['submitMain']))
   {
    $pid=$_POST['selpid'];
    $get= mysqli_query($con,"SELECT * FROM t_product_mst WHERE username= '$username' AND prd_id='$pid' ")or die(mysqli_error());
    $num = mysqli_num_rows($get);
    while ($rows=mysqli_fetch_assoc($get))
//    for($i=0;$i<$num;$i++)
    {
//     $prid= @mysql_result($get,$i,'prd_id');
     $prid=$rows["prd_id"];
//     $psname= @mysql_result($get,$i,'prd_sname');
     $psname=$rows["prd_sname"];
//     $plname= @mysql_result($get,$i,'prd_lname');
     $plname=$rows["prd_lname"];
//     $pimg= @mysql_result($get,$i,'prd_photo');
     $pimg=$rows["prd_photo"];
//     $psize= @mysql_result($get,$i,'prd_size');
     $psize=$rows["prd_size"];
//     $puom= @mysql_result($get,$i,'prd_uom');
     $puom=$rows["prd_uom"];
//     $pqty= @mysql_result($get,$i,'prd_qty');
     $pqty=$rows["prd_qty"];
//     $pcolor= @mysql_result($get,$i,'prd_color');
     $pcolor=$rows["prd_color"];
//     $pbrand= @mysql_result($get,$i,'prd_brand');
     $pbrand=$rows["prd_brand"];
//     $pfeatures= @mysql_result($get,$i,'prd_feature');
     $pfeatures=$rows["prd_feature"];
//     $pcat= @mysql_result($get,$i,'prd_cat');
     $pcat=$rows["prd_cat"];
//     $psubcat= @mysql_result($get,$i,'prd_sub_cat');
     $psubcat=$rows["prd_sub_cat"];
//     $psdis= @mysql_result($get,$i,'prd_sdis');
     $psdis=$rows["prd_sdis"];
//     $pldis= @mysql_result($get,$i,'prd_ldis');
     $pldis=$rows["prd_ldis"];
//     $pqtyavb= @mysql_result($get,$i,'prd_qtyavb');
     $pqtyavb=$rows["prd_qtyavb"];
//     $pstatus= @mysql_result($get,$i,'prd_status');
     $pstatus=$rows["prd_status"];
//     $pdel= @mysql_result($get,$i,'prd_delivery_mode');
     $pdel=$rows["prd_delivery_mode"];
//     $pdlead= @mysql_result($get,$i,'prd_delivery_leadtime');
     $pdlead=$rows["prd_delivery_leadtime"];
//     $psep= @mysql_result($get,$i,'prd_sep');
     $psep=$rows["prd_sep"];
    }
   }
 if(isset($_POST['submitMain'])){?>
      <div id="middletxt">
        <form action="" method="post" name="frm_prd_disp" id="frm_prd_disp" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                  <tr>
                    <th colspan="5" id="formhedear">Product Details.</th>
                  </tr>
                  <tr>
                    <td height="34" colspan="2"></td>
                    <td colspan="3"><div align="right"><font color="#FF0000">*</font><span class="style3"> Mandatory Fields&nbsp;&nbsp; </span></div></td>
                  </tr>
                  <input type="hidden" name="username" id="username" value="" />
                  <tr>
                    <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Product Id : </strong></div></td>
                    <td><?php echo $prid; ?></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong><font color="#FF0000">*</font>Product Short Name : </strong></div></td>
                    <td><?php echo $psname; ?></td>
                  </tr>
                  <tr>
                  <tr>
                    <td><div align="right"><strong><font color="#FF0000">*</font>Product Long Name : </strong></div></td>
                    <td><?php echo $plname; ?></td>
                  </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong><font color="#FF0000">*</font></strong></span><strong>Product Image : </strong></div></td>
                    <td colspan="4"><p><img id="imgCaptcha" src="images/products/<?php echo $pimg; ?>" /></p></td>
                  </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong></strong></span><strong>Product Size / Dimension : </strong></div></td>
                    <td><?php echo $psize; ?></td>
                  </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong></strong></span><strong>Unit of Measure : </strong></div></td>
                     <td><?php echo $puom; ?></td>
                   </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong><font color="#FF0000">*</font></strong></span><strong>Minimum Quantity To Be Order : </strong></div></td>
                    <td><?php echo $pqty; ?></td>
                  </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong></strong></span><strong><font color="#FF0000">*</font>Quantity Available : </strong></div></td>
                     <td><?php echo $pqtyavb; ?></td>
                  </tr>
                   <tr>
                    <td><div align="right"><span class="req"><strong></strong></span><strong>Product Color : </strong></div></td>
                     <td><?php echo $pcolor; ?></td>
                  </tr>
                   <tr>
                    <td><div align="right"><span class="req"><strong></strong></span><strong>Product Brand : </strong></div></td>
                     <td><?php echo $pbrand; ?></td>
                  </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong><font color="#FF0000">*</font></strong></span><strong>Product Features :</strong></div>
                    <td><p align="center"><?php echo $pfeatures; ?></p></td>
                  </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong><font color="#FF0000">*</font></strong></span><strong>Category : </strong></div></td>
                     <td><?php echo $pcat; ?></td>
                  </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong><font color="#FF0000">*</font></strong></span><strong>Sub Category : </strong></div></td>
                     <td><?php echo $psubcat; ?></td>
                  </tr>
                   <tr>
                    <td><div align="right"><strong>Short Description :</strong></div>
                    <td><p align="center" ><?php echo $psdis; ?></p></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong><font color="#FF0000">*</font>Long Description :</strong></div>
                    <td><p align="center"><?php echo $pldis; ?></p></td>
                  </tr>
                  <tr>
                    <td height="22"><div align="right"><strong><font color="#FF0000">*</font>Product Status : </strong></div></td>
                     <td><?php echo $pstatus; ?></td>
                  <tr>
                    <td><div align="right"><span class="req"><strong><font color="#FF0000">*</font></strong></span><strong>Mode of Delivery  : </strong></div></td>
                     <td><?php echo $pdel; ?></td>
                  </tr>
                  <tr>
                    <td><div align="right"><span class="req"><strong><font color="#FF0000">*</font></strong></span><strong>Delivery Lead Time : </strong></div></td>
                     <td><?php echo $pdlead; ?>-days</td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong>Specification : </strong></div></td>
                     <td><p align="center"><?php echo $psep; ?></p></td></tr>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td colspan="3" >&nbsp;&nbsp;&nbsp;<!--Onclick="return done(this.form);"-->
                      <a href="productedit.php?prid=<?php echo $prid; ?>"><input type="button" id="btnedit" name="btnedit" value="Edit"></a>
                      &nbsp;&nbsp;&nbsp;
                      <input type="button" id="btndelete" name="btndelete" value="Delete"  onclick="del();" /></td>
                  </tr>
                  <script>
                   function del() {
                   var r = confirm('Are you sure you want to Delete this product ??');
                    if(!r){
                    return false;
                    }
                    else
                    {
                     window.location="delete.php?prid=<?php echo $prid; ?>"
                    }
                    }
                  </script>
              </table></td>
            </tr>
          </table>
        </form>

        <!-- end #middletxt -->
      </div>
 <?php } ?>
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

  <!-- end #container -->
</div>

</body>
</html>