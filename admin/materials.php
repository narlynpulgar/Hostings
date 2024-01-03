<!DOCTYPE html>
 <html lang="en" style="background-color:white;">

<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


// Create an expense record
if(isset($_POST['addmaterials']))
{

    $materials = $_POST['materials'];
    $sql = "INSERT INTO materials (materials,status) VALUE('".$_POST['Materials']."','Active')";  // store the submited data ino the database :images
    mysqli_query($db, $sql); 
    echo '<script>
        Swal.fire({
            title: "Done!",
            text: "Records Updated Successfully",
            icon: "success",
            confirmButtonText: "Close"
            
        })
        </script>';
}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Materials</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #1a0000;
  color: white;
  padding: 10px 10px;
  border: none;
  border-radius: 7px;
  cursor: pointer;
  position: top;
  bottom: 23px;
  right: 28px;
  width: 130px;
  margin-left: 86%;
  margin-top: 8px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 400px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
    
</head>

<body class="fix-header; color: black;">
  
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
          						
<div class="wrapper">
        <div class="row">
           <div class="col-12">
               <div class="card">
                   <div class="card-header;">
                        
                        <i class="fas fa-ellipsis-h"></i>
                        <h3 style="font-family: cursive; font-weight: bold; font-variant-caps: small-caps; color: #775416 !important; font-size: 1.3em; background: #cfa04836; border-radius: 10px; padding: 0.75rem 1.25rem; text-align-last: center;
                        box-sizing: border-box;">
                            All Materials
                        </h3>

                   <div class="table-responsive m-t-40; padding-top: 8px;">
                                    <table id="myTable" class="table table-bordered table-striped;">
                                    <thead class="thead-dark">
								<tr style="border-collapse: collapse; background: black;">
                                    
                                    <th>Materials</th>
									<th>Status</th>
                                    <th>Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddMaterials" style="margin-bottom: 10px; margin-left: 85%;">
  Add Materials
</button>

<!-- Modal -->
<div class="modal fade" id="AddMaterials" tabindex="-1" role="dialog" aria-labelledby="AddMaterialsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddSuppliesLabel" style="font-size: 20px; font-weight: bold;">Add Materials</h5>
      </div>

      <form id="myForm" action="" method="POST">
    

            <div class="input-group mb3">
                <span class="input-group-text" id="addon-wrapping" style="width: 20%;">Material</span>
                <input  class="form-control" name="Materials" required="true"  style="width: 50%;">
            </div>

           
        <!-----modal footer-->
        <div class="modal-footer">					
        <input type="submit" name="addmaterials" class="btn btn-primary" value="Save"> 
                <a type="button" class="btn cancel" href="materials.php" style="border: solid;">Close</a>
        </div>  

        </form>

               </div>
        </div>
</div>
<!---------------- Modal --------------->   

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

            </div>

 <?php
		$sql="SELECT * FROM materials order by m_id asc";
		$query=mysqli_query($db,$sql);						
        if(!mysqli_num_rows($query) > 0 )
    {
        echo '<td colspan="11"><center>No Materials</center></td>';
    }
        else
	{				
		while($rows=mysqli_fetch_array($query))
	{
		$mql="SELECT * FROM materials where m_id='".$rows['m_id']."'";
        $res=mysqli_query($db,$mql);
        $row=mysqli_fetch_array($res);?>
                    
                 	
        <tr>
        
        <td><center><?php echo $rows['materials']; ?></center></td>
       
        <?php 
                $status=$rows['status'];
                if($status=="Active")
            {
            ?>
        <td> <center style="background-color: #0a9307;
    border-radius: 5px;
    font-weight: 600;
    color: white;"></span>Active</center></td>
     <td><center><?php echo $rows['date']; ?></center></td>
          <td> <a href="delete_materials.php?materials_del=<?=$rows['m_id']?>" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10">
          <i class="fa fa-trash-o" style="font-size:16px"></i> </a>
          <a href="materials_query.php?m_upd=<?=$rows['m_id']?>" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
								</td>
            <?php 
            }
                if($status=="Inactive")
            { ?>
        <td>   <center style="background-color: #930807;
    border-radius: 5px;
    font-weight: 600;
    color: white;"><span  aria-hidden="true" ></span>Inactive</center></td> 
     <td><center><?php echo $rows['date']; ?></center></td>
          <td> <a href="delete_materials.php?materials_del=<?=$rows['m_id']?>" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10">
          <i class="fa fa-trash-o" style="font-size:16px"></i> </a>

								</td>
            <?php
            }
            ?>
         
        </tr>	
<?php	}	
	}	
?>
                                                           
							</tbody>
						</table>
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
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
    <script src="js/jquery/4-Set-Budget.js"></script>
    </div>
 </body>
</html>