<?php
  session_start();
  if(isset($_SESSION['sid']))
  {
    $sid=$_SESSION['sid'];
  }  
    include("config/config.php");
    $username=base64_decode($_GET['un']);
//    echo $username;
//    $username=$_SESSION['user'];
    $count=mysqli_query($con,"SELECT * from t_product_mst WHERE username='$username'");
    $pcount=mysqli_num_rows($count);
//    echo  $pcount;
   if($username=="" || $pcount == 0 ){ ?>
   <script>
   alert('No Products Avilable At this time!!');
   window.location='Main.php?un=<?php echo base64_encode($username);?>';
   </script>
 <?php
 } else {
  $username=base64_decode($_GET['un']);
  $cat=$_GET['cat'];
  $sub=$_GET['sub'];
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
<script type="text/javascript" src="js/main.js"></script>
<style type="text/css" media="all">
/*@import "Webpage.css";*/
</style>
<script language="javascript">

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
      <div id="subsidebar3"> Category </div>
<div id="subsidebar2"><a href="Main.php?un=<?php echo base64_encode($username);?>"><b>All</b></a></div>
<div id="wrapper">
 <?php
   $get_catgry=mysqli_query($con,"SELECT DISTINCT(prd_cat) FROM t_product_mst WHERE username = '$username' AND prd_status='Available' ")or die(mysqli_error($con));
   $num_cat=mysqli_num_rows($get_catgry);
   $i=0;
   while ($row=mysqli_fetch_assoc($get_catgry))
//   for($i=0;$i<$num_cat;$i++)
   {
       $i++;
    //echo$i;
//    $category = @mysql_result($get_catgry,$i,'prd_cat');
    $category=$row["prd_cat"];
  ?>
<div id="subsidebar2">
  <dl class="dropdown">
    <dt id="<?php echo $i;?>-ddheader" class="upperdd" onmouseover="ddMenu('<?php echo $i;?>',1)" onmouseout="ddMenu('<?php echo $i;?>',-1)"><?php echo $category;?></dt>
    <dd id="<?php echo $i;?>-ddcontent" onmouseover="cancelHide('<?php echo $i;?>')" onmouseout="ddMenu('<?php echo $i;?>',-1)">
 <?php
                       //echo $cat_category;
                      $get_scatgry=mysqli_query($con,"SELECT DISTINCT(prd_sub_cat)  FROM t_product_mst WHERE prd_cat='$category' AND username = '$username' AND prd_status='Available'  ")or die(mysqli_error());
                       //echo ("SELECT cat_sub_category FROM t_category_mst WHERE cat_category='$cat_category' ");
                        $num_scat=mysqli_num_rows($get_scatgry);
                       // echo $num_cat;
                        ?>
      <ul>
        <?php
        while ($row=mysqli_fetch_assoc($get_scatgry))
//        for($j=0;$j<$num_scat;$j++)
              {
//               $sub_category=mysql_result($get_scatgry,$j,'prd_sub_cat');
               $sub_category=$row["prd_sub_cat"];
       ?>
        <li><a href="mainproduct.php?cat=<?php echo $category;?>&sub=<?php echo $sub_category?>&un=<?php echo base64_encode($username);?>" class="underline"><?php echo $sub_category;?></a></li>
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
    ?>
      <div id="middletxt">
       <div id="middletxtheader"><a href="Main.php?un=<?php echo base64_encode($username);?>">Category</a> ->
                                               <a href="mainproductsonly.php?un=<?php echo base64_encode($username);?>&cat=<?php echo $cat;?>"><?php echo $cat;?></a> ->
					       <?php echo $sub;?>
       <div style="float:right;"><img src="images/cart.gif"><a href="cart.php?un=<?php echo base64_encode($username); ?>">Shopping Cart (<?php  echo $ccount;  ?>)</a></div>
      </div>
        <!-- end #middletxt -->
	<form name="frm_main" id="frm_main" method="post" action="mainproduct.php?un=<?= base64_encode($username)?>&page=<?=$page?>&cat=<?php echo $category;?>&sub=<?php echo $sub_category?>">
      <table border="1" cellpadding="0" cellspacing="0" width="685" height="300">
	 <?php
	 $adjacents = 3;
	 $page=1;
	
	 /* Setup vars for query. */
	 $targetpage = "mainproduct.php"; 	//your file name  (the name of this file)
	 $limit = 4; 								//how many items to show per page
	 if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	 else
		$start = 0;								//if no page var is given, set start to 0
		
	$query=mysqli_query($con,"SELECT COUNT(*) as num FROM t_product_mst WHERE username= '$username' AND prd_cat= '$cat' AND prd_sub_cat= '$sub' AND prd_status='Available' ");
	$total_pages = mysqli_fetch_array($query);
	$num = mysqli_num_rows($query);

	$total_pages = $total_pages[$num-1];
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
		
	?>
	<!-- MSTableType="layout" -->
<?php
    $get= mysqli_query($con,"SELECT * FROM t_product_mst WHERE username= '$username' AND prd_cat= '$cat' AND prd_sub_cat= '$sub' AND prd_status='Available' LIMIT $start, $limit ")or die(mysqli_error());
    $num = mysqli_num_rows($get);
    while ($row=mysqli_fetch_assoc($get))
	
//    for($i=0;$i<$num;$i++)
    {
//     $prid= @mysql_result($get,$i,'prd_id');
     $prid=$row["prd_id"];
//     $psname= @mysql_result($get,$i,'prd_sname');
     $psname=$row["prd_sname"];
//     $plname= @mysql_result($get,$i,'prd_lname');
     $plname=$row["prd_lname"];
//     $pimg= @mysql_result($get,$i,'prd_photo');
     $pimg=$row["prd_photo"];
//     $psize= @mysql_result($get,$i,'prd_size');
     $psize=$row["prd_size"];
//     $puom= @mysql_result($get,$i,'prd_uom');
     $puom=$row["prd_uom"];
//     $pqty= @mysql_result($get,$i,'prd_qty');
     $pqty=$row["prd_qty"];
//     $pcolor= @mysql_result($get,$i,'prd_color');
     $pcolor=$row["prd_color"];
//     $pbrand= @mysql_result($get,$i,'prd_brand');
     $pbrand=$row["prd_brand"];
//     $pfeatures= @mysql_result($get,$i,'prd_feature');
     $pfeatures=$row["prd_feature"];
//     $psdis= @mysql_result($get,$i,'prd_sdis');
     $psdis=$row["prd_sdis"];
//     $pldis= @mysql_result($get,$i,'prd_ldis');
     $pldis=$row["prd_ldis"];
//     $pqtyavb= @mysql_result($get,$i,'prd_qtyavb');
     $pqtyavb=$row["prd_qtyavb"];
//     $pstatus= @mysql_result($get,$i,'prd_status');
     $pstatus=$row["prd_status"];
//     $pdel= @mysql_result($get,$i,'prd_delivery_mode');
     $pdel=$row["prd_delivery_mode"];
//     $pdlead= @mysql_result($get,$i,'prd_delivery_leadtime');
     $pdlead=$row["prd_delivery_leadtime"];
//     $psep= @mysql_result($get,$i,'prd_sep');
     $psep=$row["prd_sep"];
 ?>
 <tr>
    <td align="center" width="40"><input type="checkbox" name="chk<?php echo $i; ?>" id="chk<?php echo $i; ?>" value="<?php echo $prid; ?>"></td>
    <td width="110"><p align="Center">Product Name<br/><?php echo $plname;?></td></p>
    <td><p align="center">
    <a onclick="javascript:window.open('image.php?img=<?php echo $pimg; ?>','newWin','width=500,height=280');" >
    <img id="" src="images/products/<?php echo $pimg; ?>" width=50 height=50 /></a>
    </p></td>    <td width="250"><p align="center">Discription : <?php echo $pldis;?> <br/>
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
    <td width="220"><p align="left">Minimum Quantity To order : <?php echo $pqty?><br/>
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
    while ($row=mysqli_fetch_assoc($get_price))
//    for($j=0;$j<$num_price;$j++)
    {
//     $pact= @mysql_result($get_price,$j,'price_actual');
     $pact=$row["price_actual"];
//     $pdis= @mysql_result($get_price,$j,'price_discount');
     $pdis=$row["price_discount"];
//     $pdiscount= @mysql_result($get_price,$j,'price_discount_type');
     $pdiscount=$row["price_discount_type"];
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
}
?>
 <tr>
  <td align="center" colspan="10">
   <input type="submit" name="sub" id="sub" value="Add To Cart" onclick="return chkprdval();"></td>
 </tr>
</table>
      </form>
      <input type="hidden"  name="hdnprdnum" id="hdnprdnum" value="<?php echo $num; ?>">
 <script language="javascript">

  var count=0;
  length=document.getElementById("hdnprdnum").value;
  //alert(length);

     function chkprdval()
     {
         var count=0;
         <?php echo $num?>
         // length=document.getElementById("hdnprdnum").value;
         // var rowCount = $('#table tr').length
         for(j=0;j<<?php echo $num?>;j++)
         {
             <?php echo "fuck";?>
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
	if($lastpage > 1)
	{
	        $un=base64_encode($username);
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=$prev\">  Previous  </a>";
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
					$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=$counter\">  $counter  </a>";					
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
						$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=$counter\">  $counter  </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=$lpm1\">  $lpm1  </a>";
				$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=$lastpage\">  $lastpage  </a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=1\">  1  </a>";
				$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=2\">  2  </a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">  $counter  </span>";
					else
						$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=$counter\">  $counter  </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=$lpm1\">  $lpm1  </a>";
				$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=$lastpage\">  $lastpage  </a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=1\"> 1 </a>";
				$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=2\"> 2 </a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">  $counter  </span>";
					else
						$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=$counter\">  $counter  </a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?cat=$cat&sub=$sub&un=$un&page=$next\">  Next </a>";
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
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->


</div>
<?php
        if(isset($_POST['sub']))
        {
	  for($b=0;$b<$num;$b++)
          {
	    if(isset($_POST['chk'.$b]))
	    {
              $qtyord=$_POST['selqty'.$b];
      	      $chkbox=$_POST['chk'.$b];
	      if($qtyord=="selqty")
	     {
	      $qtyval="";
	     } else {
	      $qtyval=$qt.$qtyord;
	     }
              $pid=$_POST['chk'.$b];
              $get= mysqli_query($con,"SELECT * FROM t_product_mst WHERE username='$username' AND prd_id='$pid' ")or die(mysqli_error($con));
              $num1 = mysqli_num_rows($get);
              while ($row=mysqli_fetch_assoc($get))
//              for($i=0;$i<$num1;$i++)
              {
//                $psname= @mysql_result($get,$i,'prd_sname');
                $psname=$row["prd_sname"];
//                $plname= @mysql_result($get,$i,'prd_lname');
                $plname=$row["prd_lname"];
//                $pimg= @mysql_result($get,$i,'prd_photo');
                $pimg=$row["prd_photo"];
//                $pqty= @mysql_result($get,$i,'prd_qty'); // minimum Qty
                $pqty=$row["prd_qty"];
//                $pqtyavb= @mysql_result($get,$i,'prd_qtyavb'); // avaiable qty
                $pqtyavb=$row["prd_qtyavb"];
                 $get_price= mysqli_query($con,"SELECT * FROM t_price_mst WHERE username= '$username' AND prd_id='$pid' ")or die(mysqli_error($con));

                 $num_price = mysqli_num_rows($get_price);
                 while ($row=mysqli_fetch_assoc($get_price))
//                 for($j=0;$j<$num_price;$j++)
                 {
//                  $pact= @mysql_result($get_price,$j,'price_actual');
                  $pact=$row["price_actual"];
//                  $pdis= @mysql_result($get_price,$j,'price_discount');
                  $pdis=$row["price_discount"];
//		  $pdiscount= @mysql_result($get_price,$j,'price_discount_type');
		  $pdiscount=$row["price_discount_type"];
                    if($pdiscount=="Yes") 
		    {
		     $p_price=$qtyval*$pdis;
		    }
		    else
		    {
		     $p_price=$qtyval*$pact;
		     $pdis="0.0";
		    }
		 }
	      }
	      $query = mysqli_query($con,"INSERT INTO t_cart_temp (s_id,username,prd_id,cart_name,cart_img,cart_qty,cart_qtyavb,cart_qtyordered,cart_act,cart_dis,cart_price)
                       VALUES ('$sid','$username','$pid','$plname','$pimg','$pqty','$pqtyavb','$qtyval','$pact','$pdis','$p_price')") or die(mysqli_error($con));
	    }  
	  }
	 echo "<script>alert('Products Added to Cart !!');</script>";
//         echo "<script>window.location='mainproduct.php?cat=$cat&sub=$sub&un=$un'</script>";
      	}
  ?>
</body>
</html>