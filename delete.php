<?php   
 session_start();
 include("config/config.php");
 if($_GET['prid']=="")
 {
 ?>
  <script>
  //alert('<?php echo $_GET['prid']; ?>');
  alert('Please select the product to delete');
  // alert(window.location='http://localhost/rishi/productdisplay.php');
  alert(window.location='http://localhost/workingFiles/shopping/productdisplay.php')
  </script>
 <?php
 }
 if(isset($_SESSION['user']))
 {
  $username=$_SESSION['user'];
  $pid=$_GET['prid'];
 //echo "User name :".$username;
 //echo "pid : ".$pid;
 }
 $query=mysqli_query($con,"SELECT ord_deliverystatus FROM t_orders_trn WHERE username='$username' AND prd_id='$pid'");
 $num=mysqli_num_rows($query);
 while ($row=mysqli_fetch_assoc($query)){
     $status=$row["ord_deliverystatus"];

 }
// $status=@mysql_result(@mysql_query("SELECT ord_deliverystatus FROM t_orders_trn WHERE username='$username' AND prd_id='$pid'"),0,'ord_deliverystatus');
 if($status=='Waiting')
 {
  echo "<script>alert('Product Cannot be deleted Until it is Delivered !!');</script>";
  echo "<script>window.location='productdisplay.php';</script>";
 } else {
  $img1= mysqli_query($con,"SELECT prd_photo from t_product_mst WHERE username='$username' AND prd_id='$pid' ") or die(mysqli_error());
  $num=mysqli_num_rows($img1);
  while ($row=mysqli_fetch_assoc($img1)){
      $imgdel=$row["prd_photo"];

  }
//  $imgdel=@mysql_result($img1,'prd_photo');
  $imgdel1='images/products/'.$imgdel.'';
  unlink($imgdel1);
  
  $del = mysqli_query($con,"DELETE from t_product_mst WHERE username='$username' AND prd_id='$pid' ") or die(mysqli_error());
  $del1 = mysqli_query($con,"DELETE from t_price_mst WHERE username='$username' AND prd_id='$pid' ") or die(mysqli_error());
  
  if(mysqli_affected_rows()==0){
  echo "<script>alert('Product Deletion Failed !!');</script>";
  echo "<script>window.location='productdisplay.php';</script>";
  } else {
  echo "<script>alert('Product Deleted Sucessfully !!');</script>";
  echo "<script>window.location='productdisplay.php';</script>";
  }
 } 
 ?>