<!DOCTYPE html>
<html lang="en">
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
if(isset($_POST['save'] ))

{                                                           
    if(empty($_POST['Category'])||empty($_POST['Product'])||empty($_POST['Quantity'])||empty($_POST['Unit'])||($_POST['Expired_date']==''))
     {
        $message = "All fields must be Required!";
    }
    else
{
       
    $sql = "INSERT INTO supplies(Sup_ID,Category,Product,Quantity,Unit,Expired_date) VALUE('','Feeds','".$_POST['Product']."','".$_POST['Quantity']."','".$_POST['Unit']."','".$_POST['Expired_date']."')";  // store the submited data ino the database :images
    mysqli_query($db, $sql); 
    move_uploaded_file($temp, $store);
        $success = 	'<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" href="device.php" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    New Supply Added Successfully.   
                    </div>';
	
    }
   
}
//this is a php function not js
function ExpirationChecker($targetDate){
    // Convert the target date to a Unix timestamp
    $targetTimestamp = strtotime($targetDate);

    // Get the current date as a Unix timestamp
    $currentTimestamp = time();

    // Calculate the difference in seconds
    $difference = $targetTimestamp - $currentTimestamp;

    // Calculate the difference in days
    $daysDifference = floor($difference / (60 * 60 * 24));

    // Check if the target date is nearing (less than or equal to) 7 
    
    if(!($daysDifference <= 10) && $daysDifference <= 20 )
    {
        return "bg-yellow";
    }
    else if($daysDifference <= 10)
    {
        return "bg-red";
    }
    else
    {
        return false;
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
    <title>All Supplies</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .bg-red {
            background:red!important;
        }

        .bg-yellow {
            background:yellow!important;
        }
    </style>
</head>

<body class="fix-header fix-sidebar">

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
             
                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>
                  
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
            
                                    <?php  echo $error;
                                    
                                    echo $success;?>
                                    
            <div class="container-fluid">
         
                <div class="row">
                    <div class="col-12">
                        	    
                            <div class="col-lg-12">
                            <div class="card card-outline-primary">
                            <div class="card-header">
                            <h4 class="m-b-0 text-white">All Supplies</h4>

                          
                            </div>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead class="thead-dark">
                                        <tr>
                                                <th>Date</th>
                                                <th>Category</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Expiry Date</th>
                                                <th>Action</th>	  
                                            </tr>
                                        </thead>
                                        <tbody>
                                             
<!-- Button trigger modal -->
<div>
<button class="btn btn-warning" data-toggle="modal" type="button"style="margin-bottom: 10px; display:block;" data-target="#Addvitamins">
 Add Vitamins
 </button>
 <?php  
include 'add_feeds.php';


                                    
                                    ?> 
 </div>              
<button class="btn btn-warning" data-toggle="modal" type="button"style="margin-bottom: 10px; " data-target="#feeds">
 Add feeds
 </button>

                              

<?php  
include 'add_vitamins.php';


                                    
                                    ?> 
<!-- Modal -->

<!---------------- Modal --------------->          


<?php
                                                
												$sql="SELECT * FROM supplies order by Sup_ID desc";
												$query=mysqli_query($db,$sql);
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="11"><center>No Supplies</center></td>';
														}
													else
														{ 
                                                           
                                                            $supplies =  mysqli_fetch_all($query,MYSQLI_ASSOC);
                                                            foreach($supplies as $key => $supply) : 
                                                            ?>
                                                                
                                                                <tr class="<?=ExpirationChecker($supply['Expired_date'])?>">
                                                                    <td><?=$supply['Date']?></td>
                                                                    <td><?=$supply['Category']?></td>
                                                                    <td><?=$supply['Product']?></td>
                                                                    <td><?=$supply['Quantity']?></td>
                                                                    <td><?=$supply['Unit']?></td>
                                                                    <td><?=$supply['Expired_date']?></td>
                                                                    <td>
                                                                        <a href="delete_supplies.php?supplies_del=<?=$supply['Sup_ID']?>" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10">
                                                                            <i class="fa fa-trash-o" style="font-size:16px"></i>
                                                                        </a>
                                                                       
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; }?>	
                                                		                    
											    
                                            	 
                    </div>
                     
                </div>             
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
             
            </div>
         
           
        </div>
       
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>	
    <script src="js/bootstrap.js"></script>	
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html><?php
}
?>