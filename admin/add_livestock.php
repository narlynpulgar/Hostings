<!DOCTYPE html>
 <html lang="en" style="background-color:white;">

<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(empty($_SESSION["adm_id"]))
{
	header('location:index.php');
}
else
{
if(isset($_POST['submit']))          
{	
	if(empty($_POST['c_name'])||empty($_POST['res_name'])||$_POST['address']=='')
		    {	
				$error = 	'<div class="alert alert-danger alert-dismissible fade show">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							 <strong>All fields Must be Fillup!</strong>
							 </div>';							
		    }
	else
		    {
		
				$fname = $_FILES['file']['name'];
						 $temp = $_FILES['file']['tmp_name'];
						 $fsize = $_FILES['file']['size'];
						 $extension = explode('.',$fname);
						 $extension = strtolower(end($extension));  
						 $fnew = uniqid().'.'.$extension;
                         $store = "Pro_img/".basename($fnew);                      
	if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
			{        
				if($fsize>=1000000)
					{
							$error = 	'<div class="alert alert-danger alert-dismissible fade show">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										 <strong>Max Image Size is 1024kb!</strong> Try different Image.
										 </div>';
	   
					}
		
				else
					{
    					$res_name=$_POST['res_name'];
            			$sql = "INSERT INTO LiveStock(c_id,title,address,image) VALUE('".$_POST['c_name']."','".$res_name."','".$_POST['address']."','".$fnew."')";  // store the submited data ino the database :images
								mysqli_query($db, $sql); 
								move_uploaded_file($temp, $store);
			            $success = 	'<div class="alert alert-success alert-dismissible fade show">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									 New LiveStock Added Successfully.
									</div>';
                    }
			}
					
                elseif($extension == '')
					{
						    $error = 	'<div class="alert alert-danger alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<strong>select image</strong>
										</div>';
					}

				else{
					
							$error = 	'<div class="alert alert-danger alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<strong>invalid extension!</strong>png, jpg, Gif are accepted.
										</div>';
					}               
	    }

}


?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Add LiveStock</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background-color: #f4f4f4;
    }

    #notification {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background-color: #3498db;
      color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      z-index: 999;
      text-align: center;
      opacity: 0;
      animation: pop-up 0.5s ease-out;
    }

    #notification.show {
      display: block;
      animation: fadeInOut 4s ease-in-out;
    }

    @keyframes fadeInOut {
      0%, 100% {
        opacity: 0;
      }
      25%, 75% {
        opacity: 1;
      }
    }

    @keyframes pop-up {
      0% {
        transform: translate(-50%, -60%);
        opacity: 0;
      }
      100% {
        transform: translate(-50%, -50%);
        opacity: 1;
      }
    }

    button {
      padding: 15px 25px;
      font-size: 18px;
      background-color: #2ecc71;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    button:hover {
      background-color: #27ae60;
    }

    .icon {
      margin-right: 10px;
    }
  </style>
</head>

<body class="fix-header">
  
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
   
    <div id="main-wrapper">
       <div style="position: relative;"class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php">
                <span><img src="images/icn.png" style="height: 63px;" alt="homepage" class="dark-logo" /></span>
                </a>
            </div>
                    <div class="navbar-collapse">
                        <ul class="navbar-nav mr-auto mt-md-0"></ul>
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
               
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                   <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
      
        <div class="left-sidebar" style="position: fixed;">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                        
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">LiveStock</span></a>
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
									
        
									
									<div class="row">
		    <div class="col-lg-12">
                <div class="card card-outline-primary">
                <?php  echo $error;
									        echo $success; 
                                    ?>
                    <div class="card-header">
                        
                        <h4 class="m-b-0 text-white">Add LiveStock</h4>
                    </div>
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">LiveStock Name</label>
                                                    <input type="text" name="res_name" class="form-control">
                                                </div>
                                            </div>
                                  
											<div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="file"  id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                    </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Select</label>
													<select name="c_name" class="form-control custom-select" data-placeholder="Choose a category" tabindex="1">
                                                        <option>--Select Category--</option>
                                                 
                                                <?php 
                                                    $ssql ="select * from res_category";
													$res=mysqli_query($db, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{
                                                       echo' <option value="'.$row['c_id'].'">'.$row['c_name'].'</option>';;
													}  
												?> 
													 </select>
                                                </div>
                                            </div>	
                                        </div>

                                        <h3 class="box-title m-t-40">LiveStock Description</h3>
                                        <hr>
                                                <div class="row">
                                                        <div class="col-md-12 ">
                                                                <div class="form-group">       
                                                                        <textarea name="address" type="text" style="height:100px;" class="form-control"></textarea>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                    </div>
                                            <div class="form-actions">
                                                <input type="submit" name="submit" class="btn btn-primary" value="Save"> 
                                                <a href="add_LiveStock.php" class="btn btn-inverse">Cancel</a>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div></div>
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
<?php
}?>