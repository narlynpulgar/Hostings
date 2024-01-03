<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

$mql = "update walkin_orders set status ='Confirmed' where w_id='$_GET[walkin_upd]'";
mysqli_query($db, $mql);
header("location:walkin_orders.php"); 

  $sql="SELECT walkin_orders.*, pro_duct.* FROM walkin_orders INNER JOIN pro_duct ON walkin_orders.d_id=pro_duct.d_id where w_id='".$_GET['walkin_upd']."'";
  $query=mysqli_query($db,$sql);
  $rows=mysqli_fetch_array($query);
  
  
  $titles=$rows['d_id'];
 
  $sql=mysqli_query($db,"update pro_duct left join walkin_orders on pro_duct.d_id = walkin_orders.d_id set pro_duct.stock
 = pro_duct.stock
 - walkin_orders.quantity where pro_duct.d_id = '$titles' and w_id='".$_GET['walkin_upd']."';");
  
                        
                     
                    


?>