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
if(isset($_POST['submit'] ))
{
    if(empty($_POST['c_name']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>field Required!</strong>
					  </div>';
		}
	else
	    {
	        $check_cat= mysqli_query($db, "SELECT c_name FROM res_category where c_name = '".$_POST['c_name']."' ");

	if(mysqli_num_rows($check_cat) > 0)
     {
    	$error = '<div class="alert alert-danger alert-dismissible fade show">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Category already exist!</strong>
				  </div>';
     }

	else{

	    $mql = "INSERT INTO res_category(c_name) VALUES('".$_POST['c_name']."')";
	        mysqli_query($db, $mql);
			    $success = 	'<div class="alert alert-success alert-dismissible fade show">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							 New Category Added Successfully.</br></div>';
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
    <title>Add Category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
                            <span><img src="images/icn.png" style="height: 63px;" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>

                    <div class="navbar-collapse">
                        <ul class="navbar-nav mr-auto mt-md-0"></ul>

                        <ul class="navbar-nav my-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/avatar.webp" alt="user" class="profile-pic" /></a>
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
								<li><a href="all_LiveStock.php">All LiveStock</a></li>
	                            <li><a href="add_category.php">Add Category</a></li>	  
                                <li><a href="add_LiveStock.php">Add LiveStock</a></li>   
                            </ul>
                        </li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Products</span></a>
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
					    <div class="container-fluid">
         
								
									
        <div class="col-lg-12">
               <div class="card card-outline-primary">
               <?php  
									    echo $error;
									    echo $success; 
                                    ?>
                    <div class="card-header">
                            <h4 class="m-b-0 text-white">Add LiveStock Category</h4>
                    </div>
                                
                    <form action='' method='post' >
                        <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Category</label>
                                                <input type="text" name="c_name" class="form-control" >
                                            </div>
                                    </div>     
                                </div>
                                        <div class="form-actions">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Save"> 
                                            <a href="add_category.php" class="btn btn-inverse">Cancel</a>
                                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
					
		<div class="col-12">
                <div class="card">
                        <div class="card-body">
                                <h4 class="card-title">Listed Categories</h4>
                                    <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-hover table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Name</th>
                                                <th>Date</th>
												<th>Action</th> 
                                            </tr>
                                        </thead>
                                    <tbody>                                          
											
<?php
		$sql="SELECT * FROM res_category order by c_id desc";
			    $query=mysqli_query($db,$sql);
												
				if (!mysqli_num_rows($query) > 0 )
				    {
					echo '<td colspan="7"><center>No Categories-Data!</center></td>';
				    }

				else
					{				
				while($rows=mysqli_fetch_array($query))
					    {
							echo ' <tr><td>'.$rows['c_id'].'</td>
									<td>'.$rows['c_name'].'</td>
    								<td>'.$rows['date'].'</td>													
     								<td><a href="delete_category.php?cat_del='.$rows['c_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
									<a href="update_category.php?cat_upd='.$rows['c_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
									</td></tr>';
					    }	
					}
?>
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
				    </div>
				
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
