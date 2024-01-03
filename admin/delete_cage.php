<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM cage WHERE ca_id = '".$_GET['ca_del']."'");

$delete = 	'<div class="alert alert-success alert-dismissible fade show">
<button type="button" class="close" href="device.php" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 Cage deleted Successfully.
</div>';
header("location:device.php");  

?>
