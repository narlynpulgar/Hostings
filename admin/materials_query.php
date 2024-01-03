<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

$mql = "update materials set status ='Inactive' where m_id='$_GET[m_upd]'";
mysqli_query($db, $mql);
header("location:materials.php");  

?>