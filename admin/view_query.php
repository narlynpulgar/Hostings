<?php
if(isset($_POST['update']))
{
$form_id=$_GET['user_upd'];
$status=$_POST['status'];


$sql=mysqli_query($db,"update users_orders set status='$status' where o_id='$form_id'");
       


if($status == "closed")
{
    $form_id=$_GET['user_upd'];
$sql="SELECT users_orders.*, pro_duct.* FROM users_orders INNER JOIN pro_duct ON users_orders.d_id=pro_duct.d_id where o_id='$form_id'";
$query=mysqli_query($db,$sql);
$rows=mysqli_fetch_array($query);


$titles=$rows['d_id'];

$sql=mysqli_query($db,"update pro_duct left join users_orders on pro_duct.d_id = users_orders.d_id set pro_duct.stock
= pro_duct.stock
- users_orders.quantity where pro_duct.d_id = '$titles' and o_id='$form_id';");

                      
                   
                  
} 
echo "<script>alert('Form Details Updated Successfully');</script>"; }

?>