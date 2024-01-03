<!DOCTYPE html>
 <html lang="en" style="background-color:white;">


<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


$Pugo_left = $live - $death;

if(isset($_POST['submit']))          
{		
    $Pugo = $_POST['live'];
    $dead = $_POST['dead'];
    $Pugo_left = $Pugo-$dead;
    echo "total left ".$Pugo_left;

if(empty($_POST['res_name'])||$_POST['live']==''||$_POST['dead']=='')
		{	
			$error = '<div class="alert alert-danger alert-dismissible fade show">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>All fields Must be Fillup!</strong>
					  </div>';
		}
		
else
	    {                          
            $Pugo = $_POST['live'];
            $dead = $_POST['dead'];
            $Pugo_left = $Pugo-$dead;
			$res_name=$_POST['res_name'];
				                                  
					$sql = "INSERT INTO cage(caname,live,Pugo_left,death) VALUE('".$res_name."','".$_POST['live']."','".$_POST['Pugo_left']."','".$_POST['dead']."')";  // store the submited data ino the database :images
					mysqli_query($db, $sql); 
					move_uploaded_file($temp, $store);
						$success = 	'<div class="alert alert-success alert-dismissible fade show">
									<button type="button" class="close" href="device.php" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									New Cage Added Successfully.   
									</div>';
		}
}
        if(isset($_POST['submit']))
            {       
                $Pugo = $_POST['live'];
                $dead = $_POST['dead'];
                $Pugo_left = $Pugo - $dead;
                echo $Pugo_left;
            }
?>
                                   
<?php
        $Pugo = $_POST['live'];
        $dead = $_POST['dead'];
        $Pugo_left = $Pugo - $dead;
        echo $Pugo_left;
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Add LiveStock</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
   
    <div id="main-wrapper">
       <div class="header">
          <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        <span><img src="images/icn.png" style="height: 60px;" alt="homepage" class="dark-logo" /></span>
                    </a>
            </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <ul class="navbar-nav my-lg-0">
                            <li class="nav-item dropdown">
                                <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                
                                    <ul>
                                        <li>
                                        <div class="drop-title">Notifications</div>
                                        </li>
                                    
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                    </ul>
                            </div>
                        </li>
             
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                   <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                    </li>
                </div>
           </nav>
        </div>
    </div>
      
<div class="left-sidebar">
        <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                            <li class="nav-label">Home</li>
                                <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                                <li class="nav-label">Log</li>
                                    <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>

                        <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">LiveStock</span></a>
                                <ul aria-expanded="false" class="collapse">
								<li><a href="all_LiveStock.php">All LiveStocks</a></li>
                                <li><a href="add_category.php">Add Category</a></li>
                                <li><a href="add_LiveStock.php">Add LiveStock</a></li>
                                </ul>
                        </li>

                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Product</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Products</a></li>
								<li><a href="add_menu.php">Add Product</a></li>  
                            </ul>
                       </li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="walkin_orders.php">Walk In Orders</a></li>
                                    <li><a href="all_orders.php">Online Orders</a></li>
                                </ul>
                        </li>


                        <li> <a href="sales_report.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Sales Report</span></a></li>
                        <li> <a href="supplies.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Supplies</span></a></li>
                        <li> <a href="materials.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Materials</span></a></li>
                        <li> <a href="manage_expenses.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Expenses</span></a></li>
                        <li> <a href="device.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Device</span></a></li>
                          
                    </ul>
                </nav> 
        </div>
</div>
      

<div class="page-wrapper">       
        <div class="container-fluid">
							
									<?php  echo $error;
									echo $success; ?>
								
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Add Cage</h4>
                    </div>
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body"> 
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Cage Name</label>
                                                    <input type="text" name="res_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row p-t-20">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Live quails</label>
                                                        <input type="text" name="live" class="form-control">
                                                    </div>
                                            </div>
                                                    <div class="row p-t-20">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="control-label">dead</label>
                                                    <input type="text" name="dead" class="form-control">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <div tyle="display:flex;"class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save"> 
                                        <a href="device.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                            </form><?php

if(isset($_POST['submit']))
{
    $Pugo = $_POST['live'];
    $dead = $_POST['dead'];
    $Pugo_left = $Pugo - $dead;
    echo $Pugo_left;
}
?>
                            </div>
                        </div>
                    </div>
					<footer class="footer">  
 </footer>
                </div>
                
            </div>
          
        </div>
 
    </div>
   
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>