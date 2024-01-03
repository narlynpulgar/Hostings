<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM expense WHERE ID = '".$_GET['exp_del']."'");

header("location:manage_expenses.php");  

?>
