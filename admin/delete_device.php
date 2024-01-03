<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM device WHERE id = '".$_GET['device_del']."'");
header("location:device.php");  

?>
