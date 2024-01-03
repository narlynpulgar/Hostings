<!DOCTYPE html>
 <html lang="en" style="background-color:white;">

<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

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
                $store = "pro_img/".basename($fnew);                   
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
			$sql = "update LiveStock set c_id='$_POST[c_name]', title='$res_name',address='$_POST[address]',image='$fnew' where rs_id='$_GET[res_upd]' ";  // store the submited data ino the database :images												mysqli_query($db, $sql); 
			mysqli_query($db, $sql); 
			move_uploaded_file($temp, $store);
			  
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Record Updated!</strong>.
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
    <title>Update LiveStock</title>
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
    
                    <ul class="navbar-nav mr-auto mt-md-0"></ul>
               
                    <ul class="navbar-nav my-lg-0">                                                       
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
      
        <div class="left-sidebar">
       
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

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Menues</a></li>
								<li><a href="add_menu.php">Add Menu</a></li>  
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
                            
                 <h4 class="m-b-0 ">Update LiveStock</h4>
                            
                     <div class="card-body">
                        <form action='' method='post'  enctype="multipart/form-data">
                            <div class="form-body">

                                       <?php $ssql ="select * from LiveStock where rs_id='$_GET[res_upd]'";
													$res=mysqli_query($db, $ssql); 
													$row=mysqli_fetch_array($res);?>

                                        <hr>

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                 <label class="control-label">LiveStock Name</label>
                                    <input type="text" name="res_name" value="<?php echo $row['title'];  ?>" class="form-control" placeholder="John doe">
                            </div>
                        </div>
                                   
                                           	
					<div class="col-md-6">
                         <div class="form-group has-danger">
                             <label class="control-label">Image</label>
                                   <input type="file" name="file"  id="lastName"  class="form-control form-control-danger" placeholder="12n">
                          </div>
                    </div>

                    <div class="col-md-12">
                          <div class="form-group">
                              <label class="control-label">Select Category </label>
									<select name="c_name" class="form-control custom-select" data-placeholder="Choose a category" tabindex="1">
                                                        
                                        <?php $ssql ="select * from res_category";
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
        </div>
                                       
       <h3 class="box-title m-t-40">LiveStock Description</h3>
       <hr>
                <div class="row">
                      <div class="col-md-12 ">
                            <div class="form-group">
                                 <textarea name="address" type="text" style="height:100px;" class="form-control" > <?php echo $row['address']; ?> </textarea>
                            </div>
                       </div>
                </div>
                                      
                                  
                </div>
     </div>

            <div class="form-actions">
                    <input type="submit" name="submit" class="btn btn-primary" value="Save"> 
                        <a href="all_LiveStock.php" class="btn btn-inverse">Cancel</a>
            </div>
   </form>
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