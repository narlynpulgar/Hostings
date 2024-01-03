<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM supplies WHERE Sup_ID = '".$_GET['supplies_del']."'");
header("location:supplies.php");  

?>
