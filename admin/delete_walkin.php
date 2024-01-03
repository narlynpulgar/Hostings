<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM walkin_orders WHERE w_id = '".$_GET['walkin_del']."'");
header("location:walkin_orders.php");  

?>
