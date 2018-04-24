<?php
  session_start();
  if(isset($_SESSION['sid']))
  {
    $sid=$_SESSION['sid'];
  }
  $sid="5656";
  include("config/config.php");
//echo $sid;

    $username=base64_decode($_GET['un']); 
    $count=mysqli_query($con,"SELECT * from t_cart_temp WHERE username='$username' AND s_id='$sid'");
    $pcount=mysqli_num_rows($count);
    //echo "Product Count".$pcount;
//    echo $sid;
//    echo $pcount;
   if($_GET['un']=="" || $pcount == 0 ){ ?>
   <script>
   alert('You have not added any products to cart  !!');
   window.location='Main.php?un=<?php echo base64_encode($username);?>';
 </script>
 <?php
 } else {
  $username=base64_decode($_GET['un']); 
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Shopping</title>
<link href="css/Webpage.css" rel="stylesheet" type="text/css" />
<link href="css/flyout.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="js/cart.js"></script>-->
<script type="text/javascript" src="js/flyout.js"></script>
<!--<script type="text/javascript" src="js/main.js"></script>-->
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/count.js"></script>
<script type="text/javascript" src="js/ajax_captcha.js"></script>
<script type="text/javascript" src="js/cartvalidation.js"></script>
<style type="text/css" media="all">
/*@import "Webpage.css";*/
</style>
<script language="javascript">
  function charcount()
 {
  document.getElementById('static').innerHTML = "Characters Remaining:  <span  id='charsLeft1'>   100 </span>";
  document.getElementById('static').innerHTML = "Characters Remaining:  <span  id='charsLeft2'>   100 </span>";
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
      <div id="subsidebar3"> Cart Page</div>
      <div id="subsidebar2"><a href="Main.php?un=<?php echo base64_encode($username);?>"><b>Continue Shopping</b></a></div>
       <div align="center"><img src="images/cart.jpg" alt="Online Shopping" width="180" height="200" /> </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxtheader">Shopping Cart</div>
      <div id="middletxt1">
      <div align="left"><img src="images/Welcome.jpg" alt="Online Shopping" width="600" height="150" /> </div>
      </div>
      </div>
      <div id="middletxt">
       <div id="middletxtheader">Cart Items</div>
        <!-- end #middletxt -->
	<form name="frm_cart" id="frm_cart" method="post" action="cart.php?un=<?php echo base64_encode($username); ?>">
        <table border="1" cellpadding="0" cellspacing="0" width="685" height="300">
	<!-- MSTableType="layout" -->
<?php
     $get= mysqli_query($con,"SELECT * FROM t_cart_temp WHERE username='$username' AND s_id='$sid'")or die(mysqli_error($con));
     $num = mysqli_num_rows($get);
	 $total=0.0;
	 $i=0;
	 while ($rows=mysqli_fetch_assoc($get))
//     for($i=0;$i<$num;$i++)
     {
//      $row= @mysql_result($get,$i,'row_id');
      $row=$rows["row_id"];
//      $prid= @mysql_result($get,$i,'prd_id');
      $prid=$rows["prd_id"];
//      $cname= @mysql_result($get,$i,'cart_name');
      $cname=$rows["cart_name"];
//      $cimg= @mysql_result($get,$i,'cart_img');
      $cimg=$rows["cart_img"];
//      $cqty= @mysql_result($get,$i,'cart_qty');
      $cqty=$rows["cart_qty"];
//      $cqtyordered= @mysql_result($get,$i,'cart_qtyordered');
      $cqtyordered=$rows["cart_qtyordered"];
//      $cact= @mysql_result($get,$i,'cart_act');
      $cact=$rows["cart_act"];
//      $cdis= @mysql_result($get,$i,'cart_dis');
      $cdis=$rows["cart_dis"];
//      $cprice= @mysql_result($get,$i,'cart_price');
      $cprice=$rows["cart_price"];
 ?>
 <tr>
    <td align="center" width="40"><input type="checkbox" name="chk<?php echo $i; ?>" id="chk<?php echo $i; ?>" value="<?php echo $prid; ?>">
    </td>
    <input type="hidden"  name="hdnrid<?php echo $i; ?>" id="hdnrid<?php echo $i; ?>" value="<?php echo $row; ?>">
    <td width="110"><p align="Center">Product Name<br/><?php echo $cname;?></td></p>
    <td><p align="center">
     <img id="" src="images/products/<?php echo $cimg; ?>" width=50 height=50 />
    </p></td>
    <td width="250"><p align="left">Minimum Quantity To order : <?php echo $cqty;?><br/>
	<?php echo "Quantity Ordered By you :".$cqtyordered."<br/>";?>
    </td>
    <td width="105"><p align="left">Price : <?php echo $cact;?> <br/>
	<?php if($cdis=="0.0") { } else {?>
	Discount : <?php echo $cdis;?> <br/>
	<?php } ?>
	Amount to pay : <?php echo $cprice; ?>
    </td>
 </tr>
 <?php
 $total+=$cprice;
  $i++;
     }
 ?>
 <tr>
  <td align="right" colspan="10"> <b>Total Amount To Pay : Rs  <?php echo $total; ?> </b></td>
 </tr>
 <tr>
  <td align="center" colspan="10">
  <a href="Main.php?un=<?php echo base64_encode($username);?>"><input type="button" name="btncontinue" id="btncontinue" value="Continue Shopping"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" name="btnremove" id="btnremove" value="Remove" onclick="return chkprdval();"></td>
 </tr>
</table>
</form>
<input type="hidden"  name="hdnprdnum" id="hdnprdnum" value="<?php echo $num; ?>"> 

<script language="javascript">


    function chkprdval()
 {
     var count=0;
  length=document.getElementById("hdnprdnum").value;
  //alert(length);

    for(j=0;j<<?php echo $num; ?>;j++)
  {
   //if(document.getElementById("chk[j]").checked)
   if(document.getElementById("chk"+j).checked)
    {
     count++;
    }
  }
  if(count==0)
  {
   alert("Please select Product to Remove");
   return false;
  }
 }

</script>
 
<div id="middletxtheader">Enter Your Information</div>
      <form name="frm_cust" id="frm_cust" action="cart.php?un=<?php echo base64_encode($username); ?>" method="post">
        <table width="100%" border=0>
	  <tr>
                    <td height="34" colspan="2"></td>
                    <td colspan="3"><div align="right"><font color="#FF0000">*</font><span class="style3"> Required Fields  &nbsp; </span></div></td>
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
	      <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>E-mail ID: </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_email" id="txtsin_email" maxlength="50" style="width:176px;"
                                   onChange="document.getElementById('txtsin_email').value=trim(this.value);"/></td>
	  </tr>
	  <tr>
                 <td><div align="right"><strong><font color="#FF0000">*</font>Billing Address :</strong></div>
                 <p align="right" class="example">(Maximum 100 characters) </p></td>
                 <td colspan="4"><textarea name="ta_badd" id="ta_badd" wrap="physical" cols="45" rows="5" title="Address Should no excide 100 characters !!"
                                  onchange=" document.getElementById('ta_badd').value=trim(this.value);"></textarea><br>
                                  Characters Remaining: <span id="charsLeft1">100</span>
          </tr>
         <tr>
	         <td></td>  
	  	 <td width="245" height="37"><div align="left"><input type="checkbox" name="chksame" id="chksame" value="yes"><strong>&nbsp;Same As above</strong></td>
	 </tr>
	  <tr>
                 <td><div align="right"><strong><font color="#FF0000">*</font>Shipping Address :</strong></div>
                 <p align="right" class="example">(Maximum 100 characters) </p></td>
                 <td colspan="4"><textarea name="ta_sadd" id="ta_sadd" wrap="physical" cols="45" rows="5" title="Address Should no excide 100 characters !!"
                                  onchange=" document.getElementById('ta_sadd').value=trim(this.value);"></textarea><br>
                                  Characters Remaining: <span id="charsLeft2">100</span>
          </tr>
	  <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font> Country : </strong></div></td>
                 <td width="128"><select name="selcountry" id="selcountry" style="width:180px;">
	                         <option value="selcountry">--Select--</option>
                                 <?php
                                  $get_cty=mysqli_query($con,"SELECT country_name FROM t_country")or die(mysqli_error($con));
                                  $num_cty=mysqli_num_rows($get_cty);
                                  while ($row=mysqli_fetch_assoc($get_cty))
//                                  for($i=0;$i<$num_cty;$i++)
                                 {
//                                  $cty=mysql_result($get_cty,$i,'country_name');
                                  $cty=$row["country_name"];
                                 ?>
			          <option value="<?php echo $cty;?>"><?php echo $cty;?></option>
                                 <?php
                                 }
                                 ?>
                      </select></td>
          </tr>
          <tr>
                 <td width="245" height="37"><div align="right"><strong>Mobile No : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_mobcode" id="txtsin_mobcode" maxlength="3" style="width:30px;"
                                   onChange="document.getElementById('txtsin_mobcode').value=trim(this.value);"/>-<input type="textbox" name="txtsin_mob" id="txtsin_mob" maxlength="10" style="width:120px;"
                                   onChange="document.getElementById('txtsin_mob').value=trim(this.value);"/></td>
          </tr>
          <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Phone no : </strong></div></td>
                 <td width="128"><input type="textbox" name="txtsin_phcode" id="txtsin_phcode" maxlength="3" style="width:30px;"
                                   onChange="document.getElementById('txtsin_phcode').value=trim(this.value);"/>-<input type="textbox" name="txtsin_pharea" id="txtsin_pharea" maxlength="5" style="width:50px;"
                                   onChange="document.getElementById('txtsin_pharea').value=trim(this.value);"/>-
                                 <input type="textbox" name="txtsin_phone" id="txtsin_phone" maxlength="7" style="width:70px; onChange="document.getElementById('txtsin_phone').value=trim(this.value);"/></td>
          </tr>
	  <tr>
                <td><div align="right" style="padding-top:45px;"><span class="req">*</span><strong> Verification&nbsp;Code :</strong></div></td>
          <td colspan="4"><p><img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" /><span class="style4">(letters are case sensitive )</span></p>
              <!--                <input type="text" id="txtcaptcha" name="txtcaptcha" maxlength="10" size="10" onchange="getParam(document.frm_signup);document.getElementById('txtcaptcha').value=trim(this.value);" />-->
              <!--                <span id="newImg"> Can't see image ? <a onclick="getphoto(document.frm_signup)" href="javascript:void(0);" class="imglink">&nbsp;Load a new image</a></span>-->
              <!--                <div name="divVeriCode" id="divVeriCode">Enter the code as shown in the image</div>-->
              <input type="text" name="captcha_code" size="10" maxlength="6" />
              <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
                <div id="result"></div></td>
          </tr>
          <tr><br/>
          <td colspan="3" align="center"><input type="submit" name="subbuy" id="subbuy" value="Buy" style="width:100px;" onclick="return done(this.form);">
          </td>
          </tr>
        </table>
      </form>
      </div>
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

</div>
 <?php
	if(isset($_POST['btnremove']))
        {
            ?>
<!--            <script>alert("fuckddd")</script>-->
            <?php
         for($b=0;$b<$num;$b++)
          {
              ?>

              <?php
            $username=base64_decode($_GET['un']);
	    if(isset($_POST['chk'.$b])) {
           ?>
<!--            <script>alert("fuckddd2")</script>-->
            <?php
            $pid = $_POST['chk' . $b];
            $r_id = $_POST['hdnrid' . $b];
//            ?><!-- <script>alert(--><?php //echo $pid?>//+<?php //echo $r_id?>//);
            <?php
            $del = mysqli_query($con, "DELETE from t_cart_temp WHERE username='$username'  AND prd_id='$pid' AND row_id=$r_id AND s_id='$sid'") or die(mysqli_error($con));
            $delli = mysqli_num_rows($del);
        }
	  }  
	     $count=mysqli_query($con,"SELECT * from t_cart_temp WHERE username='$username' AND s_id='$sid'");
             $pcount=mysqli_num_rows($count);
	     //echo "ppppp".$pcount;
	     $un=base64_encode($username);
	     if($pcount == 0) {
                echo "<script>alert('Product Removed From Cart !!');</script>";
                echo "<script>window.location='Main.php?un=$un'</script>";
	      } else {
                echo "<script>alert('Products Removed From Cart !!');</script>";
                echo "<script>window.location='cart.php?un=$un'</script>";
	      }
	}
        if(isset($_POST['subbuy']))
        {
		 $fname=$_POST['txtsin_fname'];
		 $lname=$_POST['txtsin_lname'];
		 $mail=$_POST['txtsin_email'];
		 $badd=$_POST['ta_badd'];
		 if($_POST['chksame']=="yes")
		 {
		  $sadd=$_POST['ta_badd'];
		 }
		 else
		 {
		  $sadd=$_POST['ta_sadd'];
		 }
		 $country=$_POST['selcountry'];
		 $mob=$_POST['txtsin_mobcode']."-".$_POST['txtsin_mob'];
                 $phone=$_POST['txtsin_phcode']."-".$_POST['txtsin_pharea']."-".$_POST['txtsin_phone'];
          $odate=date("d-m-Y");
	  $status='Waiting';
	  while ($rows=mysqli_fetch_assoc($get))
//	 for($i=0;$i<$num;$i++)
          {
              ?>
              <script>
                  // console.log("fjdlfjasfasfkjaflkajl;fjaakl;fdjafakj;fklasj")

              </script>

              <?php

//	        $row= @mysqli_result($get,$i,'row_id');
	        $row=$rows["row_id"];
//     	   $prid= @mysqli_result($get,$i,'prd_id');
     	   $prid=$rows["prd_id"];
//           $cname= @mysqli_result($get,$i,'cart_name');
           $cname=$rows["cart_name"];
//           $cimg= @mysqli_result($get,$i,'cart_img');
           $cimg=$rows["cart_img"];
//           $cqty= @mysqli_result($get,$i,'cart_qty');
           $cqty=$rows["cart_qty"];
//           $cqtyavb= @mysqli_result($get,$i,'cart_qtyavb');
           $cqtyavb=$rows["cart_qtyavb"];
//           $cqtyordered= @mysqli_result($get,$i,'cart_qtyordered');
           $cqtyordered=$rows["cart_qtyordered"];
//           $cact= @mysqli_result($get,$i,'cart_act');
           $cact=$rows["cart_act"];
//           $cdis= @mysqli_result($get,$i,'cart_dis');
           $cdis=$rows["cart_dis"];
//           $cprice= @mysqli_result($get,$i,'cart_price');
           $cprice=$rows["cart_price"];
	   $total += $cprice;
	   $query1=mysqli_query($con,"SELECT prd_delivery_leadtime FROM t_product_mst WHERE username='$username' AND prd_id='$prid'");
	   $num=mysqli_num_rows($query1);
//	   $lead= @mysqli_result(@mysql_query("SELECT prd_delivery_leadtime FROM t_product_mst WHERE username='$username' AND prd_id='$prid'"),0,'prd_delivery_leadtime');
	   while ($row=mysqli_fetch_assoc($query1)){

	      $lead=$row["prd_delivery_leadtime"];
       }

        $query2=mysqli_query($con,"SELECT prd_qtyavb FROM t_product_mst WHERE username='$username' AND prd_id='$prid'");
	    $num=mysqli_num_rows($query2);
	    while ($row=mysqli_fetch_assoc($query2)){
	        $qtyavb=$row["prd_qtyavb"];

        }
//	   $qtyavb=@mysqli_result(@mysql_query("SELECT prd_qtyavb FROM t_product_mst WHERE username='$username' AND prd_id='$prid'"),0,'prd_qtyavb');
        $query3=mysqli_query($con,"SELECT prd_qty FROM t_product_mst WHERE username='$username' AND prd_id='$prid'");
	    $num=mysqli_num_rows($query3);
	    while ($row=mysqli_fetch_assoc($query3)){

	       $minqty=$row["prd_qty"];
        }
//	   $minqty=@mysqli_result(@mysql_query("SELECT prd_qty FROM t_product_mst WHERE username='$username' AND prd_id='$prid'"),0,'prd_qty');
//	   $pname=@mysqli_result(@mysql_query("SELECT prd_lname FROM t_product_mst WHERE username='$username' AND prd_id='$prid'"),0,'prd_lname');
	    $query4=mysqli_query($con,"SELECT prd_lname FROM t_product_mst WHERE username='$username' AND prd_id='$prid'");
	    $num=mysqli_num_rows($query4);
	    while ($row=mysqli_fetch_assoc($query4)){

	        $pname=$row["prd_lname"];
        }
           $allproducts = $allproducts." , ".$pname;
           //echo $allproducts;
	   $ddate = strtotime(date("d-m-Y",strtotime($odate))."+ $lead day");
	   $ddate=date("d-m-Y",$ddate);
	   $qtyavb = $qtyavb - $cqtyordered;
	   if($qtyavb == 0 || $minqty > $qtyavb )
	   {
	   $prdupdate=mysqli_query($con,"UPDATE t_product_mst SET prd_qtyavb='$qtyavb',prd_status='Unavailable' WHERE username='$username' AND prd_id='$prid'");
	   $num=mysqli_num_rows($prdupdate);
	   $query5=mysqli_query($con,"SELECT log_email FROM t_custreg_mst WHERE username='$username'");
//	   $num=mysqli_num_rows($query5);
	   while ($rows=mysqli_fetch_assoc($query5)){
	      $to=$rows["log_email"];

       }
          // mail() for product stock empty
//           $to = @mysql_result(@mysql_query("SELECT log_email FROM t_custreg_mst WHERE username='$username'"),0,'log_email');
           $subject = 'Stock Report';
           $from = 'kasunwpdimuthu@gmail.com';
           $message = 'Hello <br> Your Product ID'.$prid.' <br> Stock has been Empty <br> Thanking you .';
           $header = 'From : < '.$from.' >';
          // echo $message;
           ini_set('sendmail_from','kasunwpdimuthu@gmail.com');
           if(mail($to,$subject,$message,"From: <{$email}> ")){
             echo "<script>alert('Mail sent')</script>";
	     } else {
              echo "<script>alert('Mail send failure - message not sent')</script>";
	     }
	   } else
	   {
           ?><script>alert("hello fuck")</script>
           <?php
	    $prdupdate=mysqli_query($con,"UPDATE t_product_mst SET prd_qtyavb='$qtyavb' WHERE username='$username' AND prd_id='$prid'")or die(mysqli_error($con));
	    if(mysqli_num_rows($prdupdate)>0){
//	        echo "good1";
            ?>
<!--            <script>alert("good1");-->
<!--            console.log("good1");-->
<!--            </script>-->

            <?php
        }
	   }
	   $qq=mysqli_query($con,"SELECT * FROM t_orders_trn ");
//	   while ($rows=mysqli_fetch_assoc($qq)){
//	       $rowww=$rows["row_id"];
//
//       }
//	   $rowww++;
	   $query = mysqli_query($con,"INSERT INTO t_orders_trn (prd_id,username,ord_pname,ord_qty,ord_price,ord_fname,ord_lname,ord_odate,ord_ddate,ord_email,ord_baddress,ord_saddress,ord_country,ord_mobile,ord_phone,ord_deliverystatus,ord_sid,row_id)
                      VALUES ('$prid','$username','$pname','$cqtyordered','$cprice','$fname','$lname','$odate','$ddate','$mail','$badd','$sadd','$country','$mob','$phone','$status','$sid','$row')") or die(mysqli_error($con));

	   $one=mysqli_num_rows($query);
	   if($one>0){
           ?>
<!--                <script>alert("good2");-->
<!--               console.log("good2");-->
<!--           </script>-->
           <?php
       }
           $del = mysqli_query($con,"DELETE from t_cart_temp WHERE username='$username' AND row_id='$row' ") or die(mysqli_error($con));
           $two=mysqli_num_rows($del);
           if($two>0){
//               echo "good3";
               ?><script>
                   // alert("good3");
                   // console.log("good3");
               </script>
    <?php
           }
	  }
	  // mail(); for vendors
            $query6=mysqli_query($con,"SELECT log_email FROM t_custreg_mst WHERE username='$username'");
//            $num=mysqli_num_rows($query6);
            while ($rows=mysqli_fetch_assoc($query6)){
                $to=$rows["log_email"];

            }
//           $to = @mysql_result(@mysql_query("SELECT log_email FROM t_custreg_mst WHERE username='$username'"),0,'log_email');
           $subject = 'You have an Order';
           $from = 'kasunwpdimuthu@gmail.com';
           $message = 'Hello <br> You have an Order for products '.$allproducts.' <br> Please login to your account for more details. <br> Thanking you .';
           $header = 'From : < '.$from.' >';
           //echo $message;
           ini_set('sendmail_from','kasunwpdimuthu@gmail.com');
           if(mail($to,$subject,$message,"From: <{$email}> ")){
             echo "<script>alert('Mail sent')</script>";
	     } else {
              echo "<script>alert('Mail send failure - message not sent2')</script>";
	     }
  	  // mail(); for Customer
           $to = $mail;
           $subject = 'Your order';
           $from = 'kasunwpdimuthu@gmail.com';
           $message = 'Hello <br> Your you have ordered for this products '.$allproducts.' <br> Total amount is '.$total.' <br> Thanking you <br> Visit Again!! .';
           $header = 'From : < '.$from.' >';
          // echo $message;
           ini_set('sendmail_from','kasunwpdimuthu@gmail.com');
           if(mail($to,$subject,$message,"From: <{$email}> ")){
             echo "<script>alert('Mail sent')</script>";
	     } else {
              echo "<script>alert('Mail send failure - message not sent')</script>";
	     }
	     $un=base64_encode($username);
 	 echo "<script>alert('Thank You For Shopping !!');</script>";
         echo "<script>window.location.replace('cartdisplay.php?un=$un')</script>";
	}
  ?>
</body>
</html>