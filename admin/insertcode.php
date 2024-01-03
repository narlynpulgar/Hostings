<?php

include("../connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['insertdata']))

    $sql="SELECT * FROM pro_duct";
    $query=mysqli_query($db,$sql);
    $rows=mysqli_fetch_array($query);
    $sql="SELECT walkin_orders.*, pro_duct.* FROM walkin_orders INNER JOIN pro_duct ON walkin_orders.d_id=pro_duct.d_id";
    $query=mysqli_query($db,$sql);
    $rows=mysqli_fetch_array($query);
    
    
    $user = $_POST['user'];
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $d_id = $_POST['d_id'];

    $query = "INSERT INTO walkin_orders(`user`,`title`,`quantity`,`price`) VALUES ('$user','$title','$quantity','$price')";
    $query_run = mysqli_query($connection, $query);
    echo '<script> alert("walkin record successfully"); </script>';
    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: walkin_orders.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }

