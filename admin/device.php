<!DOCTYPE html>
 <html lang="en" style="background-color:white;">

<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


if(isset($_POST['submit']))          
{
	
			
		
			
		  
		
		
		if(empty($_POST['res_name'])||$_POST['live']=='')
		{	
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>';
									
		
								
		}
		
									else
										{
												
												
			 									$res_name=$_POST['res_name'];
				                                  
												$sql = "INSERT INTO cage(caname,live) VALUE('".$res_name."','".$_POST['live']."')";  // store the submited data ino the database :images
												mysqli_query($db, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" href="device.php" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																 New Cage Added Successfully.
															</div>';
                
	
										}
					}
				
	   



                    if(ISSET($_POST['update'])){
                        $ca_id = $_POST['ca_id'];
                        $death = $_POST['death'];
                        
                        mysqli_query($conn, "UPDATE `cage` SET , `death` = '$death' WHERE `ca_id` = '$ca_id'") or die(mysqli_error());
                
                        header("location: device.php");
                    }
	
	
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Device</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    

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
    
 
      
             
        <?php
class device{
 public $link='';
 function __construct($Storage){
  $this->connect();
  $this->storeInDB($Storage);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'pulgar') or die('Cannot select the DB');
 }
 
 function storeInDB($Storage){
  $query = "insert into device set Storage='".$Storage."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['Storage'] != ''){
 $device=new device($_GET['Storage']);
}


?>



<div class="page-wrapper">
<div class="container-fluid">
    <div class="row">
            <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Poultry</h4>
                            </div>
                     <div class="row" style="display: flex;
    justify-content: space-around;">
                   
                   
                    <div  class="col-md-3"><a href="#cages">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                 
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from cage";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Cage</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>

					<div class="col-md-3"><a href= "#Storage">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                   
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from device";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Storage</p>
                                </div>
                            </div>
                        </div>
                        </a>

                    </div>	                   
                </div>     
                
        </div>     
     
            <div class="container-fluid" style="display: flex;
    flex-wrap: wrap;
    justify-content: center;">

<div class="row">
    
<div class="card card-outline-primary" style="width:100%;">
<?php  
									        echo $error;
									        echo $success;
                                            echo $delete; ?>
<div class="card-header">
    
                                <h4 class="m-b-0 text-white" id="cages">Cages</h4>
                            </div>
                            <div style="
                                                background-color: beige;
                                                box-shadow: 0px 0px 18px #e9b47385;
                                                border-radius: 18px;
                                                padding: 25px;
                                                color: black; 
                                                font: weight 900px;
                                                font-size: 20px;
                                                margin: 15px;">
                                                <div>
                                                <?php 



$result = mysqli_query($db, 'SELECT SUM(live) AS value_sum FROM cage'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo 'Total Live Quails: '.$sum.' ';
?></div><div>
 <?php 


$result = mysqli_query($db, 'SELECT SUM(quarantined) AS value_sum FROM cage'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo 'Total Quarantined Quails: '.$sum.'';
?></div></div>
                            <div class="row">
                            <?php
$total = ($r["live"]+$r["death"]); 

?>			
						<?php 					
                        
                       $Pugo_left = $live - $death;


                       
						$query_res= mysqli_query($db,"select * from cage"); 
                                while($r=mysqli_fetch_array($query_res))
                                {
                                        ?>
                                     <div style="flex: 33.33333333333333%;
                                    max-width: 100%;"class="col-md-3">
                                            <div class="food-item-wrap">
                                                <div class="figure-wrap bg-image" data-image-src="admin/Pro_img/'.$r['image'].'"></div>
                                                <div style="text-align-last: center;
                                                background-color: beige;
                                                box-shadow: 0px 0px 18px #e9b47385;
                                                border-radius: 18px;
                                                padding: 25px;
                                                margin: 15px;" class="content"> 
                                                    <h5 style="color: black;
                                                    font-family: cursive;
                                                    font-size: 23px;
                                                    font-weight: bold;"><?php echo''.$r['caname'].''?></h5>
                                                  
                                                    <div  class="product-name"style="color: black;
                                                    font-weight: 600;
                                                    text-align-last: start; display:grid;"><?php echo'Live: '.$r['live'].''?><br>
                                                              <!-- mortality -->
                                                                 <?php
                                         
                                         if($r['death'] < 0){?>
                                            <div class="product-name" > Mortality: <?php echo '0'?><div style="display:inline-flex; color: #cfcfcf;"> <?php echo $r['death']?></div></div>
                                    
                                        <?php } else{?>
<!-- here -->                                            <div> <?php echo 'Mortality : '.$r['death'].''?></div>
                                            <?php } ?> 
                                            <!-- mortality -->
                                            <!-- quarantined -->
                                            <?php
                                            if($r['quarantined'] < 0){?>
                                                    <div class="product-name" > Quarantined: <?php echo '0'?><div style="display:inline-flex; color: #cfcfcf;"> <?php echo $r['quarantined']?></div></div>
                                            
                                                <?php } else{?>
<!-- here -->                                            <div> <?php echo 'Quarantined: '.$r['quarantined'].''?></div>
                                                    <?php } ?>

                                               <div class="col-md-6" style="display: contents;
                                                
                                                ">
                                                <!-- quarantined -->
                                                <!-- dispose -->
                                               <?php  if($r['dispose'] < 0){?>
                                            <div class="product-name" > Disposed quails: <?php echo '0'?><div style="display:inline-flex; color: #cfcfcf;"> <?php echo $r['dispose']?></div></div>
                                    
                                        <?php } else{?>
<!-- here -->                                            <div> <?php echo 'Disposed quails: '.$r['dispose'].''?></div>
                                            <?php } ?> 
                                            <!-- dispose -->
                                            <!-- pugo left -->
                                            <?php
                                            $total = $r['live'] - $r['death'] - $r['quarantined']  - $r['dispose'] ;
                                            $lives = $r['live'];

                                            if($r['death'] < 0){?>
                                            
                                                <div class="product-name" style="color: Red;
                                                text-align-last: start;  font-weight: 900;"> Pugo left: <?php echo 'Negative number'?></div>
                                          <?php  } else{
                                            if($r['death'] > $r['live']){?>
                                                    <div class="product-name" style="color: Red;
                                                    text-align-last: start;  font-weight: 900;"> Pugo left: <?php echo 'Subract the exceeded number'?></div>
                                                <?php } else{?>
<!-- here -->                                            <div class="product-name" style="color: black;
                                                    text-align-last: start;  font-weight: 900;" min="0"> Pugo left: <?php echo $total?></div>
                                                    <?php }} ?>

                                                  <div class="product-name" style="color: gray;
                                                    text-align-last: start;  "> <?php echo $r['date']?></div>
                                                                                
             <div>  <form  method="post"  enctype="multipart/form-data">
             <div class="form-group">
                                                
                                                 
                                        
                                         
             <button class="btn btn-warning" data-toggle="modal" type="button"style="width:100%; text-align:center;display: flex;margin-top:7px; justify-content: space-around;" data-target="#update_modal<?php echo $r['ca_id']?>"> Add Mortality </button>
             <button class="btn btn-warning" data-toggle="modal" type="button"style="width:100%; text-align:center;display: flex;margin-top:7px; justify-content: space-around;" data-target="#update_quarantine<?php echo $r['ca_id']?>"> Add Quarantined </button>                       
             <button class="btn btn-warning" data-toggle="modal" type="button"style="width:100%; text-align:center;display: flex;margin-top:7px; justify-content: space-around;" data-target="#update_dispose<?php echo $r['ca_id']?>"> Add Disposed </button>
                                        <?php
                                              echo'   <a href="delete_cage.php?ca_del='.$r['ca_id'].'" style="width:100%; text-align:center;display: flex; padding:9px; margin-top:5px; justify-content: space-around;"  class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
'?>
                         </form>
                         </div>
                                        
                                        
                                     
                                                   
                                            
                                                    </div>   </div>   </div>   </div>
                                    </div>
                                    <?php  include 'update_dead.php';
                                    include 'update_quarantine.php';
                                    include 'update_dispose.php';
                                    ?>                    

                               <?php }	
                                
						?>
               
            
                                             
                           
               
 <div class="dropdown" style="width: -webkit-fill-available;">   
 <button onclick="myFunction()" style="    width: -webkit-fill-available;
                 background-color: #a85f14;
                 border-radius: 10px;
                 color: beige;"class="dropbtn">Add Cage</button>
  <div id="myDropdown" class="dropdown-content">
  <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                       
                                        <hr>
  <div class="row p-t-20" style="padding-left: 30px;
    padding-bottom: 19px;     padding-right: 36px;background-color: #e7dfa7;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Cage Name</label>
                                                    <input type="text" name="res_name" class="form-control">
                                                   </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Live quails</label>
                                                    <input type="text" name="live" class="form-control">
                                                   </div>
                                          
                                              </div>  </div>
  <div class="form-actions" style="text-align-last: center;">
                                        <input type="submit" name="submit" class="btn btn-primary" style="width: -webkit-fill-available; background-color: #af670e;" value="Save"> 
                                        <a href="device.php" style="background-color: #570404;
    color: white;"class="btn btn-inverse">Cancel</a>
                                    </div>
                            </form>
</div></div></div></div></div>
                
                
              
    <div class="row" style="display: contents;">
                    <div class="col-12">
                        
                        <div class="col-lg-12">
                            
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white" id="Storage">Storage</h4>
                            </div>

<div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                            <tr>
                                                
                                              
                                                <th>storage</th>
                                                <th>date</th>
                                                <th>update</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                           
                                        <tbody>
                                           
											
                                           <?php
                                               $sql="SELECT * FROM device order by ID desc";
                                               $query=mysqli_query($db,$sql);
                                               
                                                   if(!mysqli_num_rows($query) > 0 )
                                                       {
                                                           echo '<td colspan="3"><center>No Update</center></td>';
                                                       }
                                                   else
                                                       {				
                                                                   while($rows=mysqli_fetch_array($query))
                                                                       {
                                                                                   
                                                                               
                                                                               
                                                                                   echo ' <tr>
                                                                                               <td>'.$rows['Storage'].'</td>																							
                                                                                               <td>'.$rows['Date'].'</td>
                                                                                             
                                                                                               <td><a href="delete_device.php?device_del='.$rows['ID'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
                                                                                               </td></tr>';
                                                                       }	
                                                       }
                                           ?>
                                       </tbody>
											                                       </tr></tbody>
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
    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
       
      }
    }
  }
}
</script>
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
    
</body>

</html>
