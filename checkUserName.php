<?php
  include("config/config.php");

  $user=$_REQUEST['user'];
  //echo "user : ". $user;
  $get_user= mysqli_query($con,"SELECT * FROM t_custreg_mst WHERE username='$user' ");
  $num_rows= mysqli_num_rows($get_user);
?>
 <input type="hidden" name="noofrows" id="noofrows" value="<?php echo $num_rows; ?>" />
 <?php
  if($num_rows>0 && $user!=""){
  echo "User Name Already Exists"; 
  }
  if($num_rows==0 && $user!=""){
  echo "User Name Is Available";
  }
?>