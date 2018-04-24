<?php
  session_start();
  if(isset($_SESSION['sid']))
  {
      $globalpage=0;
    $sid=$_SESSION['sid'];
    $sid="5656";
    $row_id=0;
    $username=base64_decode($_GET['un']);
//    echo "1".$sid;
  } else {
    function snum()
    {
     $length = 8;
     $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $string = "";
     for ($p = 0; $p < $length; $p++)
     {
      $string .= $characters[mt_rand(0, strlen($characters)-1)];
     }
     return $string;
    }
     $_SESSION['sid']=snum();
     $_SESSION['sid']='5656';
     $sid = $_SESSION['sid'];
//     echo "2".$sid;
  }
//  echo "fuck".$sid;
  include("config/config.php");
    $username=base64_decode($_GET['un']);
//    echo $username;
    $count=mysqli_query($con,"SELECT * from t_product_mst WHERE username='$username'");
    $pcount=mysqli_num_rows($count);
   if($_GET['un']=="" || $pcount == 0 ){ ?>
   <script>
   // alert('No Products Avilable At this time!!');
   //window.location='<?php //echo $username;?>///index.php';
 </script>
 <?php
 } else {
  $username=base64_decode($_GET['un']);
//  echo $username;
  
  if(!isset($_GET['page']) || $_GET['page'] == ''  || $_GET['page'] <= '0')
  {
      $page ="1";

  }
  else
  {
      if(isset($_GET['page']))
    $page = intval($_GET['page']);
      else $page=$globalpage;
  }
 }
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Online Shopping</title>
 <link href="css/Webpage.css" rel="stylesheet" type="text/css" />
 <link href="css/flyout.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="js/flyout.js"></script>
<!-- <script type="text/javascript" src="js/main.js"></script>-->
 <style type="text/css" media="all">
  /*@import "Webpage.css";*/
 </style>
</head>

<body class="twoColFixLtHdr">
<div id="header">
  <!-- end #header -->
</div>
<div id="container">
  <div id="container1"></div> 
  <div id="sidebar1">
    <div id="subsidebar1">
      <div id="subsidebar3"> Category </div>
<div id="wrapper">
 <?php
   $get_catgry=mysqli_query($con,"SELECT DISTINCT(prd_cat) FROM t_product_mst WHERE username = '$username' AND prd_status='Available' ")or die(mysqli_error($con));
   $num_cat=mysqli_num_rows($get_catgry);
   $i=0;
   while ($rows=mysqli_fetch_assoc($get_catgry))
//   for($i=0;$i<$num_cat;$i++)
   {
       $i++;
//    $category = @mysql_result($get_catgry,$i,'prd_cat');
    $category=$rows["prd_cat"];
  ?>
<div id="subsidebar2">
  <dl class="dropdown">
    <dt id="<?php echo $i;?>-ddheader" class="upperdd" onmouseover="ddMenu('<?php echo $i;?>',1)" onmouseout="ddMenu('<?php echo $i;?>',-1)"><?php echo $category;?></dt>
    <dd id="<?php echo $i;?>-ddcontent" onmouseover="cancelHide('<?php echo $i;?>')" onmouseout="ddMenu('<?php echo $i;?>',-1)">
 <?php
    $get_scatgry=mysqli_query($con,"SELECT DISTINCT(prd_sub_cat) FROM t_product_mst WHERE prd_cat='$category' AND username = '$username' AND prd_status='Available' ")or die(mysqli_error($con));
    $num_scat=mysqli_num_rows($get_scatgry);
  ?>
      <ul>
        <?php
        while ($rows=mysqli_fetch_assoc($get_scatgry))
//        for($j=0;$j<$num_scat;$j++)
              {
//               $sub_category=mysql_result($get_scatgry,$j,'prd_sub_cat');
               $sub_category=$rows["prd_sub_cat"];
       ?>
        <li><a href="mainproduct.php?cat=<?php echo $category;?>&sub=<?php echo $sub_category?>&un=<?php echo base64_encode($username)?>" class="underline"><?php echo $sub_category;?></a></li>
 <?php
              }
 ?>
      </ul>
    </dd>
   </dl>
</div>
 <?php
  }
 ?>

   </div><!-- end #wrapper class -->
    </div>
    <!-- end #sidebar1 -->
  </div>
  <div id="mainContent">
    <div id="mainContent1">
    <div id="middletxtheadermain">
      <div id="middletxtheader">Welcome</div>
      <div id="middletxt1">
      <div align="left"><img src="images/Welcome.jpg" alt="Online Shopping" width="600" height="150" /> </div>
      </div>
      </div>
    <?php
    $cartcount=mysqli_query($con,"SELECT * from t_cart_temp WHERE username='$username' AND s_id='$sid'");
    $ccount=mysqli_num_rows($cartcount);
    $row_id=$ccount;
//    echo $ccount;

    ?>
     <div id="middletxt">
       <div id="middletxtheader">
	<div style="float:left;">Products</div>
       <div style="float:right;">
	<img src="images/cart.gif"><a href="cart.php?un=<?php echo base64_encode($username); ?>">Shopping Cart (<?php  echo $ccount;  ?>)</a></div>
      <div class="clear"></div>
      <!--middletxtheader--> </div>
      
        <!-- end #middletxt -->
<!--         --><?php //echo  $username?>
	<form name="frm_main" id="frm_main" method="post" action="Main.php?un=<?= base64_encode($username)?>&page=<?=$page?>">
      <table id="table" border="1" cellpadding="0" cellspacing="0" width="685" height="300">
	<!-- MSTableType="layout" -->
<?php
    $adjacents = 3;
    $page=1;
	
	/* Setup vars for query. */
	$targetpage = "Main.php"; 	//your file name  (the name of this file)
	$limit = 4; 								//how many items to show per page
	if($page)
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	$query=mysqli_query($con,"SELECT COUNT(*) as num FROM t_product_mst WHERE username = '$username' AND prd_status='Available'");
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
	
	$get= mysqli_query($con,"SELECT * FROM t_product_mst WHERE username='$username' AND prd_status='Available' LIMIT $start, $limit ")or die(mysqli_error($con));
        $num = mysqli_num_rows($get);
        $i=0;
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
//     $pqtyavb= @mysql_result($get,$i,'prd_qtyavb');
     $pqtyavb=$rows["prd_qtyavb"];
//     $pcolor= @mysql_result($get,$i,'prd_color');
     $pcolor=$rows["prd_color"];
//     $pbrand= @mysql_result($get,$i,'prd_brand');
     $pbrand=$rows["prd_brand"];
//     $pfeatures= @mysql_result($get,$i,'prd_feature');
     $pfeatures=$rows["prd_feature"];
//     $psdis= @mysql_result($get,$i,'prd_sdis');
     $psdis=$rows["prd_sdis"];
//     $pldis= @mysql_result($get,$i,'prd_ldis');
     $pldis=$rows["prd_ldis"];
//     $pstatus= @mysql_result($get,$i,'prd_status');
     $pstatus=$rows["prd_status"];
//     $pdel= @mysql_result($get,$i,'prd_delivery_mode');
     $pdel=$rows["prd_delivery_mode"];
//     $pdlead= @mysql_result($get,$i,'prd_delivery_leadtime');
     $pdlead=$rows["prd_delivery_leadtime"];
//     $psep= @mysql_result($get,$i,'prd_sep');
     $psep=$rows["prd_sep"];
 ?>
 <tr>
   <td align="center" width="40"><input type="checkbox" name="chk<?php echo $i; ?>" id="chk<?php echo $i; ?>" value="<?php echo $prid; ?>"></td>
    <td width="110"><p align="Center">Product Name<br/><?php echo $plname;?></td></p>
    <td><p align="center">
    <a onclick="javascript:window.open('image.php?img=<?php echo $pimg; ?>','newWin','width=500,height=280');" >
    <img id="" src="images/products/<?php echo $pimg; ?>" width=50 height=50 /></a>
    </p></td>
    <td width="250"><p align="center">Discription : <?php echo $pldis;?><br/>
                    <?php if($psize=="") { } else {?>
	            Product Size / Dimension : <?php echo $psize;?> <br/>
	            <?php } ?> 
                    <?php if($puom=="null") { } else {?>
	            Unit Of Measure : <?php echo $puom;?> <br/>
	            <?php } ?>
                    <?php if($pcolor=="") { } else {?>
	            Color : <?php echo $pcolor;?> <br/>
	            <?php } ?>
                    <?php if($pbrand=="") { } else {?>
	            Brand : <?php echo $pbrand;?> <br/></p>
	            <?php } ?>
    </td>
    <td width="220"><p align="left">Minimum Quantity To order:<?php echo $pqty?><br/>
        Quantity Avilable : <?php echo $pqtyavb;?> <br/>
        Your Order :<select name="selqty<?php echo $i;?>" id="selqty<?php echo $i;?>" style="width:100px;">
                     <option value="selqty">- Select -</option>
	<?php
	for($k=$pqty;$k<=$pqtyavb;$k++)
	{?>
        <option value="<?php echo $k;?>"><?php echo $k;?></option>
	<?php
	}?>
	</select><br/>
        Delivery Mode : <?php echo $pdel;?> <br/>
        Delivery Lead Time : <?php echo $pdlead;?> Days<br/></p>
    </td>
<?php
    $get_price= mysqli_query($con,"SELECT * FROM t_price_mst WHERE username= '$username' AND prd_id='$prid' ")or die(mysqli_error($con));
    $num_price = mysqli_num_rows($get_price);
    while ($rows=mysqli_fetch_assoc($get_price))
//    for($j=0;$j<$num_price;$j++)
    {
//     $pact= @mysql_result($get_price,$j,'price_actual');
     $pact=$rows["price_actual"];
//     $pdis= @mysql_result($get_price,$j,'price_discount');
     $pdis=$rows["price_discount"];
//     $pdiscount= @mysql_result($get_price,$j,'price_discount_type');
     $pdiscount=$rows["price_discount_type"];
    ?>
    <td width="130"><p align="left">Price : <?php echo $pact;?> <br/>
	<?php
        if($pdiscount=="Yes")
	{ ?>
        Discount : <?php echo $pdis;?> <br/>
	<?php
	}
	?>
    </td>
    <?php } ?>
 </tr>
<?php
    $i++;
}
?>
 <tr>
  <td align="center" colspan="10">
    <input type="submit" name="sub" id="sub" value="Add To Cart" onclick="return chkprdval();"><!--</a>--></td>
 </tr>
</table>
	</form>
<input type="hidden"  name="hdnprdnum" id="hdnprdnum" value="<?php echo $num; ?>">
<script language="javascript">
 function chkprdval()
 {
  var count=0;
  // length=document.getElementById("hdnprdnum").value;
  // var rowCount = $('#table tr').length
  for(j=0;j<<?php echo $num?>;j++)
  {
   if(document.getElementById("chk"+j).checked)
    {
     count++;
    }
    if(document.getElementById("chk"+j).checked)
    {
    if(document.getElementById('selqty'+j).value=="selqty")
   {
    alert("Please select the quantity");
    return false;
   }
    }
  }
  if(count==0)
  {
   alert("Please select any one product");
   return false;
  }
  
 }
</script>

 <?php
    $pagination = "";
	if($lastpage >1)
	{
	        $un=$username;
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?un=$un&page=$prev\">  Previous  </a>";
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
					$pagination.= "<a href=\"$targetpage?un=$un&page=$counter\">  $counter  </a>";					
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
						$pagination.= "<a href=\"$targetpage?un=$un&page=$counter\">  $counter  </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?un=$un&page=$lpm1\">  $lpm1  </a>";
				$pagination.= "<a href=\"$targetpage?un=$un&page=$lastpage\">  $lastpage  </a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?un=$un&page=1\">  1  </a>";
				$pagination.= "<a href=\"$targetpage?un=$un&page=2\">  2  </a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
				  
				  echo "cou=".$counter;
				  echo "page=".$page;
					if ($counter == $page)
						$pagination.= "<span class=\"current\">  $counter  </span>";
					else
						$pagination.= "<a href=\"$targetpage?un=$un&page=$counter\">  $counter  </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?un=$un&page=$lpm1\">  $lpm1  </a>";
				$pagination.= "<a href=\"$targetpage?un=$un&page=$lastpage\">  $lastpage  </a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?un=$un&page=1\"> 1 </a>";
				$pagination.= "<a href=\"$targetpage?un=$un&page=2\"> 2 </a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">  $counter  </span>";
					else
						$pagination.= "<a href=\"$targetpage?un=$un&page=$counter\">  $counter  </a>";					
				}
			}
		}
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?un=$un&page=$next\">  Next </a>";
		else
			$pagination.= "<span class=\"disabled\">  Next </span>";
		$pagination.= "</div>\n";		
	}
?>
<div id="middletxtheader">
<?php  echo $pagination;  ?> 
</div>
	
      </div>
    </div>
    <!-- end #mainContent -->
  </div>

</div>
 
 <?php
    if(isset($_POST['sub']))
    {
	  for($b=0;$b<$num;$b++)
          {
	    if(isset($_POST['chk'.$b]))
	    {
              $qtyord=$_POST['selqty'.$b];
              $pid=$_POST['chk'.$b];
             if($qtyord=="selqty")
	     {
	      $qtyval="";
	     } else {
	      $qtyval=$qtyord; // ordered qty
	     }
              $pid=$_POST['chk'.$b];
	      $get= mysqli_query($con,"SELECT * FROM t_product_mst WHERE username='$username' AND prd_id='$pid' ")or die(mysqli_error($con));
              $num1 = mysqli_num_rows($get);
              while ($rows=mysqli_fetch_assoc($get))
//              for($i=0;$i<$num1;$i++)
              {
//                $psname= @mysql_result($get,$i,'prd_sname');
                $psname=$rows["prd_sname"];
//                $plname= @mysql_result($get,$i,'prd_lname');
                $plname=$rows["prd_lname"];
//                $pimg= @mysql_result($get,$i,'prd_photo');
                $pimg=$rows["prd_photo"];
//                $pqty= @mysql_result($get,$i,'prd_qty'); // minimum Qty
                $pqty=$rows["prd_qty"];
//                $pqtyavb= @mysql_result($get,$i,'prd_qtyavb'); // avaiable qty
                $pqtyavb=$rows["prd_qtyavb"];
                 $get_price= mysqli_query($con,"SELECT * FROM t_price_mst WHERE username= '$username' AND prd_id='$pid' ")or die(mysqli_error($con));
                 $num_price = mysqli_num_rows($get_price);
                 while ($rows=mysqli_fetch_assoc($get_price))
//                 for($j=0;$j<$num_price;$j++)
                 {
//                  $pact= @mysql_result($get_price,$j,'price_actual');
                  $pact=$rows["price_actual"];
//                  $pdis= @mysql_result($get_price,$j,'price_discount');
                  $pdis=$rows["price_discount"];
//		            $pdiscount= @mysql_result($get_price,$j,'price_discount_type');
		          $pdiscount=$rows["price_discount_type"];
                    if($pdiscount=="Yes") 
		    {
		     $p_price=$qtyval*($pact-$pdis);
		    }
		    else
		    {
 		     $p_price=$qtyval*($pact-$pdis);
		     $pdis="0.0";
		    }
		 }
	      }
//
            $sid="5656";
	      $query = mysqli_query($con,"INSERT INTO t_cart_temp (s_id,username,prd_id,cart_name,cart_img,cart_qty,cart_qtyavb,cart_qtyordered,cart_act,cart_dis,cart_price,row_id)
                       VALUES ('$sid','$username','$pid','$plname','$pimg','$pqty','$pqtyavb','$qtyval','$pact','$pdis','$p_price','$row_id')") or die(mysqli_error($con));
//              $num=mysqli_num_rows($query);
              $globalpage=$page;
	    }
	  }
	  $un=base64_encode($_GET["un"]);
//	  echo $un."fuck";
	 echo "<script>alert('Products Added to Cart !!');</script>";
//         echo "<script>window.location='Main.php?un=$un&page=$page'</script>";
      	}
  ?>
</body>
</html>