<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM LiveStock WHERE rs_id = '".$_GET['res_del']."'");
header("location:all_LiveStock.php");  

?>
