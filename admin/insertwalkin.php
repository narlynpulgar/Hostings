

<?php

include("../connection/connect.php");


						
    
if(isset($_POST['insertdata']))

  {
    
$ssql ="select * from pro_duct where d_id = '".$_POST['d_id']."'";
$res=mysqli_query($db, $ssql); 
while($row=mysqli_fetch_array($res))  
{
    $user = $_POST['user'];
    $title = $row['title'];
    $quantity = $_POST['quantity'];
    $price = $row['price'];
    $d_id = $_POST['d_id'];
    $role_json = $_POST['price,title,d_id'];
    $role_data = json_decode($role_json, true);
    $total= $quantity * $price;

    $sql = "INSERT INTO walkin_orders(`d_id`,`user`,`title`,`quantity`,`price`,`total`,`status`) VALUES ('$d_id','$user','$title','$quantity','$price','$total','Not confirmed')";
    mysqli_query($db, $sql); 
    move_uploaded_file($temp, $store);
    echo '<script> alert("walkin record successfully"); </script>';
  }}
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }

    header('Location: walkin_orders.php');    
	?>
    
      
      <?php    	?>	