 <?php
  // sub cat display code !!
  require_once("config/config.php");
  $category=$_GET['catval'];
  $get_subcat=mysqli_query($con,"SELECT cat_sub_category FROM t_category_mst WHERE cat_category='$category'")or die(mysqli_error());
 ?>
 
 <div id="subcat1div">
 <select name="selsubcat" id="selsubcat" style="width:180px;">
 <option value="selsubcat">Select Category</option>
  
  <?php
  while ($rows=mysqli_fetch_assoc($get_subcat))
//  for($i=0;$i<mysql_num_rows($get_subcat);$i++)
  {
//  $sub_category=mysql_result($get_subcat,$i,'cat_sub_category');
  $sub_category=$rows["cat_sub_category"];
 ?>
  
 <option value="<?php echo $sub_category;?>"><?php echo $sub_category;?></option>

 <?php
  }
 ?>

 </select>
 </div>