<!DOCTYPE html>
 <html lang="en" style="background-color:white;">

<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert() { 
      

    echo "<script>alert('Thank you. Your Order has been placed!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 

if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

										  
												foreach ($_SESSION["cart_item"] as $item)
												{
											
												$item_total += ($item["price"]*$item["quantity"]);
												
													if($_POST['submit'])
													{
                                                        $ress= mysqli_query($db,"select * from pro_duct where rs_id='$_GET[res_id]'");
                                                        $rows=mysqli_fetch_array($ress);
													$SQL="insert into users_orders(u_id,d_id,title,quantity,price,total) values('".$_SESSION["user_id"]."','".$item["d_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."','$item_total')";
                                                   
									
                                                    mysqli_query($db,$SQL);
														
                                                

                                                        unset($_SESSION["cart_item"]);
                                                        unset($item["title"]);
                                                        unset($item["quantity"]);   
                                                        unset($item["price"]);
														$success = "Thank you. Your order has been placed!";
                                                        
                                                        function_alert();

														
                                                        
													}
												}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Checkout</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
    
    <div class="site-wrapper">
        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/icn.png" style="height: 100px;"alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-wrapper">
            





                <div class="container">
                 
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					
                </div>
            
			
			
				  
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="js/notification.js">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4> </div>
                                        <div  style="     color: black;"class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                          
												 
											   
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo "".$item_total; ?></td>
                                                    </tr>
                                                 
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo "PHP".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
												
												
												
												
                                            </table>
                                        </div>
                                    </div>
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>

                                                    <span class="custom-control-description">Cash on Pickup</span>
                                                </label>
                                               
                                            </li>
                                            <li>
                                             <span class="custom-control-description">Not be able to pick up within 24hrs. will automatically disregard your reservation.</span>
                                                </label>
                                            </li>
                                         
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit" style="background-color: #181818; border-color: orange"  class="btn btn-success btn-block" value="ORDER NOW"> </p>
                                    </div>
									</form>
                                </div>
                            </div>
                           
                    </div>
                </div>
				 </form>
            </div>
            
            <footer class="footer">
                    <div class="row bottom-footer">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-xs-12 col-sm-4 address color-gray">
                                    <h5>Address</h5>
                                    <p>Mabini, Libmanan, Camarines Sur</p>
                                    <h5>Phone: </a></h5> </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Addition informations</h5>
                                   <p>Join thousands of other LiveStocks who benefit from having partnered with us.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
         </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>

<?php
}
?>
