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
  $count_del=mysqli_query($con,"SELECT * from t_orders_trn WHERE username='$username' AND ord_deliverystatus= 'Waiting'");
  $del_count=mysqli_num_rows($count_del);
 if($del_count==0)
 {
 ?>
  <script>
  alert('No Orders At this time !!');
  window.location='loghome.php';
 </script>
 <?php
 }
  if(!isset($_GET['page']) || $_GET['page'] == ''  || $_GET['page'] <= '0')
  {
   $page ="1";
  }
  else
  {
   $page = intval($_GET['page']);
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
  function logoutcon() {
   var conlog = confirm('Are you sure you want to log out !!');
   if(conlog){
       window.location.replace("logout.php");
    }
    else
    {
    return false;
    }
  }
  function check()
  {
   if(document.getElementById('selpid').value == 'selpid' && document.getElementById('seldate').value == 'seldate')
   {
    alert('Select any option !!');
    return false;
   }
  }
</script>
</head>
 <?php 
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
      <div id="subsidebar2"><a href="productmaster.php">Product Master</a>
      </div>
      <div id="subsidebar2"><a href="pricemaster.php">Price Master</a> 
      </div>
      <div id="subsidebar4">Display
      <ul><li><a href="productdisplay.php">Product Master</a></li>
          <li><a href="pricedisplay.php">Price Master</a></li></ul>
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
       $get_date= mysqli_query($con,"SELECT DISTINCT bck_archive FROM t_backup_trn WHERE username= '$username' ORDER BY bck_archive DESC ")or die(mysqli_error());
       $num_date= mysqli_num_rows($get_date);
       while ($rows=mysqli_fetch_assoc($get_date))
//       for($i=0;$i<$num_date;$i++)
       {
//        $date= mysqli_result($get_date,$i,'bck_archive');
        $date=$rows["bck_archive"];
      ?>
      <li><a href="backupdisplay.php?date=<?php echo $date;?>"><?php echo $date;?></a></li>
      <?php
       }
      ?>
      </ul>
      </div>
      <div id="subsidebar2"><a href="mail.php">Send Mail</a> 
      </div>
      <div id="subsidebar2"><a href="logout.php" onclick="logoutcon();">Log out</a>
      </div>
    </div>
    <!-- end #sidebar1 -->
  </div>
 
 <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxtheader" align="right">Order Reports</div>
      <div id="middletxt1">
      <form name="frm_rpt" id="frm_rpt" action="" method="post">
        <table width="100%" border=0>
          <tr>
           <td width="245" height="37"><div align="right"><strong>Product Id : </strong></div></td>
           <td><select name="selpid" id="selpid" style="width:180px;">
               <option value="selpid">- Select Product ID -</option>
               <?php
                $get_pid= mysqli_query($con,"SELECT DISTINCT prd_id FROM t_orders_trn WHERE username= '$username' AND ord_deliverystatus= 'Waiting'")or die(mysqli_error($con));
                $num_pid= mysqli_num_rows($get_pid);
                while ($rows=mysqli_fetch_assoc($get_pid))
//                for($i=0;$i<$num_pid;$i++)
                {
//                 $pid= mysqli_result($get_pid,$i,'prd_id');
                 $pid=$rows["prd_id"];
               ?>
	       <option value="<?php echo $pid;?>"><?php echo $pid;?></option>
               <?php
                }
               ?>
              </select>
	      </td>
              </tr>
          <tr>
           <td width="245" height="37"><div align="right"><strong>Order Date : </strong></div></td>
           <td><select name="seldate" id="seldate" style="width:180px;">
               <option value="seldate">- Select Order Date -</option>
               <?php
                $get_date= mysqli_query($con,"SELECT DISTINCT ord_odate FROM t_orders_trn WHERE ord_deliverystatus= 'Waiting' AND username= '$username' ORDER BY ord_odate DESC")or die(mysqli_error());
                $num_date= mysqli_num_rows($get_date);
                while ($rows=mysqli_fetch_assoc($get_date))
//                for($i=0;$i<$num_date;$i++)
                {
//                 $odate= @mysql_result($get_date,$i,'ord_odate');
                 $odate=$rows["ord_odate"];
               ?>
	       <option value="<?php echo $odate;?>"><?php echo $odate;?></option>
               <?php
                }
               ?>
              </select>
	      </td>
              </tr>
              <tr>
                 <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="submit" id="submitMain" name="submitMain" value="Display" Onclick="return check();" />
                 &nbsp;&nbsp;&nbsp;
                 </td>
              </tr>
              </table>
      </form>
      </div>
      </div>
    
     <div id="middletxt">
       <div id="middletxtheader" align="right">Orders</div>
        <!-- end #middletxt -->
      <form name="frm_report" id="frm_report" method="post" action="reports.php?page=<?= $page?>">
      <table border="1" cellpadding="0" cellspacing="0" width="685" height="300">
      <tr>
       <th align="center">Product ID</th>
       <th align="center">Product ordered</th>
       <th align="center">Customer name</th>
       <th align="center">Date</th>
       <th align="center">Address</th>
       <th align="center"></th>
      </tr>

 <?php
  $adjacents = 3;
	
	/* Setup vars for query. */
	$targetpage = "reports.php"; 	//your file name  (the name of this file)
	$limit = 4; 								//how many items to show per page
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
		
    
	$query=mysqli_query($con,"SELECT COUNT(*) as num FROM t_orders_trn WHERE username = '$username' AND ord_deliverystatus= 'Waiting'");
	$total_pages = mysqli_fetch_array($query,MYSQLI_NUM);
	$num = mysqli_num_rows($query);
	$total_pages = $total_pages[$num-1];
	//echo $total_pages;
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 2;						//last page minus 1
	
    $get= mysqli_query($con,"SELECT * FROM t_orders_trn WHERE username='$username' AND ord_deliverystatus= 'Waiting' LIMIT $start, $limit ")or die(mysqli_error($con));
    $numprd = mysqli_num_rows($get);
    $i=0;
	while ($rows=mysqli_fetch_assoc($get))
//    for($i=0;$i<$numprd;$i++)
    {
//     $row= @mysql_result($get,$i,'row_id');
     $row=$rows["row_id"];
//     $prid= @mysql_result($get,$i,'prd_id');
     $prid=$rows["prd_id"];
//     $cust_fname=@mysql_result($get,$i,'ord_fname');
     $cust_fname=$rows["ord_fname"];
//     $cust_lname=@mysql_result($get,$i,'ord_lname');
     $cust_lname=$rows["ord_lname"];
     $cust_name=$cust_fname." ".$cust_lname;
//     $oqty=@mysql_result($get,$i,'ord_qty');
     $oqty=$rows["ord_qty"];
//     $oprice=@mysql_result($get,$i,'ord_price');
     $oprice=$rows["ord_price"];
//     $odate=@mysql_result($get,$i,'ord_odate');
     $odate=$rows["ord_odate"];
//     $oddate=@mysql_result($get,$i,'ord_ddate');
     $oddate=$rows["ord_ddate"];
//     $email=@mysql_result($get,$i,'ord_email');
     $email=$rows["ord_email"];
//     $badd=@mysql_result($get,$i,'ord_baddress');
     $badd=$rows["ord_baddress"];
//     $sadd=@mysql_result($get,$i,'ord_saddress');
     $sadd=$rows["ord_saddress"];
//     $mobile=@mysql_result($get,$i,'ord_mobile');
     $mobile=$rows["ord_mobile"];
//     $phone=@mysql_result($get,$i,'ord_phone');
     $phone=$rows["ord_phone"];
     
 ?> <tr>
    <td width="80"><?php echo $prid;?></td>
    <input type="hidden"  name="hdnrid<?php echo $i; ?>" id="hdnrid<?php echo $i; ?>" value="<?php echo $row; ?>"> 
    <td width="200">Quantity ordered : <?php echo $oqty;?><br/>Total Price : <?php echo $oprice;?></td>
    <td width="150"><?php echo $cust_name;?></td>
    <td width="250">Ordered Date : <?php echo $odate;?><br/>Delivery Date : <?php echo $oddate;?>    </td>
    <td width="250"><p align="center">Billing Address : <br/><?php echo $badd;?><br/>
                                      Shipping Address : <br/><?php echo $sadd;?><br/>
                                      Email ID : <br/><?php echo $email;?><br/>
				      <br/>Mob : <?php echo $mobile;?> <br/>Ph : <?php echo $phone;?> </p>
    </td>
    <td align="center" width="40"><input type="checkbox" name="chk<?php echo $i; ?>" id="chk<?php echo $i; ?>" value="<?php echo $prid; ?>">
    </td>
 </tr>
 <?php
  $i++;
    }
 ?>
</table>

  <div align="center" >  <input type="submit" name="subDel" id="subDel" value="Delivered" onclick="return chkprdval();"></div>

</form>
<input type="hidden"  name="hdnprdnum" id="hdnprdnum" value="<?php echo $numprd; ?>"> 

<script language="javascript">
 function chkprdval()
 {
  var count=0;
  length=document.getElementById("hdnprdnum").value;
  //alert(length);
    for(j=0;j<<?php echo $numprd?>;j++)
  {
   //if(document.getElementById("chk[j]").checked)
   if(document.getElementById("chk"+j).checked)
    {
     count++;
    }
  }
  if(count==0)
  {
   alert("Please select Product to Make It Delivered");
   return false;
  }
 }
</script>
 <?php
    $pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">  Previous  </a>";
		else
			$pagination.= "<span class=\"disabled\">  Previous  </span>";	
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">  $counter  </span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">  $counter  </a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">  $counter  </span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">  $counter  </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?&page=$lpm1\">  $lpm1  </a>";
				$pagination.= "<a href=\"$targetpage?&page=$lastpage\">  $lastpage  </a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">  1  </a>";
				$pagination.= "<a href=\"$targetpage?page=2\">  2  </a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
				  
				  echo "cou=".$counter;
				  echo "page=".$page;
					if ($counter == $page)
						$pagination.= "<span class=\"current\">  $counter  </span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">  $counter  </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">  $lpm1  </a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">  $lastpage  </a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\"> 1 </a>";
				$pagination.= "<a href=\"$targetpage?page=2\"> 2 </a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">  $counter  </span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">  $counter  </a>";					
				}
			}
		}
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">  Next </a>";
		else
			$pagination.= "<span class=\"disabled\">  Next </span>";
		$pagination.= "</div>\n";		
	}
?>
<div id="middletxtheader" align="right">
<?php  echo $pagination;  ?> 
</div>
      </div>
    </div>
    <!-- end #mainContent -->
  </div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

  <!-- end #container -->
</div>

 <?php
  if(isset($_POST['submitMain']))
  {
   $dpid=$_POST['selpid'];
   $ddate=$_POST['seldate'];
   echo "<script>window.location='reportproduct.php?pid=$dpid&date=$ddate'</script>";
  }
  if(isset($_POST['subDel']))
  {
      ?>
      <script>alert("fjalskdfjaskfjaslfjaskfd1111");
          alert(<?=$pid?>+""+<?=$r_id?>)</script>
  <?php
      $get= mysqli_query($con,"SELECT * FROM t_orders_trn WHERE username='$username' AND ord_deliverystatus= 'Waiting' LIMIT $start, $limit ")or die(mysqli_error($con));
      $numprd = mysqli_num_rows($get);
   for($b=0;$b<$numprd;$b++)
   {
    if(isset($_POST['chk'.$b]))
    {

     $pid=$_POST['chk'.$b];
     $r_id=$_POST['hdnrid'.$b];
     $today=date("Y-m-d");
        ?>
        <script>alert("fjalskdfjaskfjaslfjaskfd");
            alert(<?=$pid?>+""+<?=$r_id?>)</script>
        <?php
      echo $pid.$r_id;
     $query1=mysqli_query($con,"SELECT ord_ddate FROM t_orders_trn WHERE username='$username' AND prd_id='$pid' AND row_id='$r_id'");
     $num=mysqli_num_rows($query1);
     while ($rows=mysqli_fetch_assoc($query1)){$deldate=$rows["ord_ddate"];}
//     $deldate= @mysql_result(@mysql_query("SELECT ord_ddate FROM t_orders_trn WHERE username='$username' AND prd_id='$pid' AND row_id='$r_id'"),0,'ord_ddate');
     $deldate=date('Y-m-d',strtotime($deldate));
     if($today >= $deldate)
     {
      $ordupdate=mysqli_query($con,"UPDATE t_orders_trn SET ord_deliverystatus='Delivered' WHERE username='$username' AND prd_id='$pid' AND row_id='$r_id'");
      echo "<script>alert('Products Delivered !!');</script>";
      $count_del=mysqli_query($con,"SELECT * from t_orders_trn WHERE username='$username' AND ord_deliverystatus= 'Waiting'");
      $del_count=mysqli_num_rows($count_del);
      if($del_count==0)
      {
       echo "<script> window.location='loghome.php';</script>";
      } else {
       echo "<script>window.location='reports.php'</script>";
      }
     } else {
      echo "<script>alert('Product Not Yet Delivered !!');</script>";
      echo "<script>window.location='reports.php'</script>";
     }
    }
   }
  }
 ?>

</body>
</html>