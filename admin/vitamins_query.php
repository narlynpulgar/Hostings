<?php
include("../connection/connect.php");

if(isset($_POST['save'] ))

{                                                           
    if(empty($_POST['Category'])||empty($_POST['Product'])||empty($_POST['Quantity'])||empty($_POST['Unit'])||($_POST['Expired_date']==''))
     {
        $message = "All fields must be Required!";
    }
    else
{
       
    $sql = "INSERT INTO supplies(Sup_ID,Category,Product,Quantity,Unit,Expired_date) VALUE('','Vitamins','".$_POST['Product']."','".$_POST['Quantity']."','".$_POST['Unit']."','".$_POST['Expired_date']."')";  // store the submited data ino the database :images
    mysqli_query($db, $sql); 
    move_uploaded_file($temp, $store);
        $success = 	'<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" href="device.php" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    New Supply Added Successfully.   
                    </div>';
	
    }
   
} header("location: supplies.php");


?>