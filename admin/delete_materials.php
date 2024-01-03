<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM materials WHERE m_id = '".$_GET['materials_del']."'");

header("location:materials.php");  

?>
