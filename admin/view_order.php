<?php
session_start();
include("../connection/connect.php");
error_reporting(0);




include_once 'view_query.php';


?>
<!DOCTYPE html>
 <html lang="en" style="background-color:white;">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>View Order</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+1000+',height='+1000+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>

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
                        
                        <span><img src="images/icn.png" style="height: 100px;" alt="homepage" class="dark-logo" /></span>
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
                    <div class="col-12">
                        
                        <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">View Order</h4>
                            </div>
                             
                                <div class="table-responsive m-t-20">
                                    <table id="myTable" class="table table-bordered table-striped">
                                       
                                        <tbody>

                                           <?php
											$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='".$_GET['user_upd']."'";
												$query=mysqli_query($db,$sql);
												$rows=mysqli_fetch_array($query);
											?>
											
		<tr>
			<td><strong>Username:</strong></td>
			<td><center><?php echo $rows['username']; ?></center></td>
			<td><center>
			  
                <a data-toggle="modal" href="view_order.php?user_upd=<?php echo htmlentities($rows['o_id']);?>" data-target="#UpdateOrder"><button type="button" class="btn btn-primary">Update Order Status</button></a>
			    </center>
		    </td>
		</tr>	


		<tr>
			<td><strong>Title:</strong></td>
			<td><center><?php echo $rows['title']; ?></center></td>
			<td><center>
					<a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?newform_id=<?php echo htmlentities($rows['o_id']);?>');" title="Update order">
					<button type="button" class="btn btn-primary">View User Detials</button></a>
			</center></td>
		</tr>	


		<tr>
			<td><strong>Quantity:</strong></td>
			<td><center><?php echo $rows['quantity']; ?></center></td>		
		</tr>
											
        
        <tr>
			<td><strong>Price:</strong></td>
			<td><center>PHP<?php echo $rows['price']; ?></center></td>
		</tr>

										
		<tr>
			<td><strong>Date:</strong></td>
			<td><center><?php echo $rows['date']; ?></center></td>
		</tr>

		
        <tr>
			<td><strong>Status:</strong></td>
				<?php 
					$status=$rows['status'];
					if($status=="" or $status=="NULL")
				{
				?>
			<td> <center><button type="button" class="btn btn-info"><span class="fa fa-bars"  aria-hidden="true" ></span> Dispatch</button></center></td>
				<?php 
				}
					if($status=="in process")
				{ ?>
			<td>   <center><button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span>Ready for Pickup!</button></center></td> 
				<?php
				}
					if($status=="closed")
				{
				?>
			<td>  <center><button type="button" class="btn btn-primary" ><span  class="fa fa-check-circle" aria-hidden="true"></span> Completed</button></center></td> 
				<?php 
				} 
				?>
				<?php
				if($status=="rejected")
				{
				?>
			<td>  <center><button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button> </center></td> 
				<?php 
				} 
				?>
			</tr>
											
        
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
          <!-- Checkout -->
<div class="modal fade" id="UpdateOrder" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
   	
    <div class="modal-content" style="width: max-content;">
        
    <div class="modal-header">
        <h4 class="modal-title" style="padding-top: 10px;">Update Order</h4>
      </div>
      <div class="modal-body">
     
<div class="container m-t-30">
 <form name="updateticket" id="updatecomplaint" method="post"> 

 
<table  border="0" cellspacing="0" cellpadding="0">
    
	<tr>
      

 
      <td><strong>Title:</strong></td>
												    <td name="title"><center style="font-size: xx-large;
    font-weight: 700; color:black;"><?php echo $rows['title']; ?></center></td>
  
    </tr>
   
    <tr >
      <td><b>Status</b></td>
      <td style="text-align-last: justify;"><select  style="width:100%; height: 60px; text-align-last: center; color: white; font-size: large; background-color: #785211a1; border-color: transparent; border-radius: 10px " name="status" required="required" >
      <option value="">Select Status</option>
      <option value="in process">Ready for Pickup!</option>
    <option  name= "complete" value="closed">Completed</option>
	 <option value="rejected">Cancelled</option>
        
      </select></td>
    </tr>

</tr>
											</td>  
                       <td><strong>ID:</strong></td>
												    <td name="title"><center><?php echo $rows['d_id']; ?></center></td>
</tr>
											</td>

                    <tr>
													<td><strong>Quantity:</strong></td>
												    <td name="pqty" ><center><?php echo $rows['quantity']; ?></center></td>
													  
												   																							
											</tr>

     


        <tr>
      <td><b>Action</b></td>
  
      <td><input type="submit" name="update"  class="btn btn-primary" value="Submit">
	   
      <input  type="submit"  class="btn btn-danger"  value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>



     
   
   

 
</table>
 </form>
 
</div>
            
</div> 
      </div>
  </div>
  </div></div>
<!-- end of checkout -->

            <footer class="footer">  
 </footer>
        
        </div>
       
    </div>
    
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
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>