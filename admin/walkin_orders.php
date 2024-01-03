<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        if (
            empty($_POST['user']) ||
            empty($_POST['title']) ||
            empty($_POST['quantity']) ||
            empty($_POST['price'])
        ) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Required!</strong>
															</div>';
        } else {
            $mql = "update walkin_orders set user='$_POST[user]', title='$_POST[title]', quantity='$_POST[quantity]',price='$_POST[price]' where w_id='$_GET[walkin_upd]' ";
            mysqli_query($db, $mql);
            $success =     '<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>User Updated!</strong></div>';
        }
    }

?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image" href="/images/admin.png">
        <title>All Walkin</title>
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body class="fix-header fix-sidebar">

        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
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
                            <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>

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
                                        <?php echo $error;
                                        echo $success;
                                        ?>
                                        <h4 class="m-b-0 text-white">All Walk In</h4>
                                    </div>
                                    <div class="card-body">


                                        <div class="table-responsive m-t-40">
                                            <table id="myTable" class="table table-bordered table-striped table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Title</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Total Price</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM walkin_orders order by w_id desc";
                                                    $query = mysqli_query($db, $sql);

                                                    if (!mysqli_num_rows($query) > 0) {
                                                        echo '<td colspan="11"><center>No Walk-in orders</center></td>';
                                                    } else {
                                                        while ($rows = mysqli_fetch_array($query)) {


                                                            $mql = "SELECT * FROM pro_duct where d_id='" . $rows['d_id'] . "'";
                                                            $res = mysqli_query($db, $mql);
                                                            $row = mysqli_fetch_array($res);
                                                            $total = $rows['price'] * $rows['quantity'];
                                                            echo ' <tr><td>' . $rows['user'] . '</td>
                    <td>' . $rows['title'] . '</td>
                    <td>' . $rows['quantity'] . '</td>
                    <td>' . $rows['price'] . '</td>	
                    <td>' . $total . '</td>																							
                    <td>' . $rows['date'] . '</td>
                   
                    
                      ';
                                                            $status = $rows['status'];
                                                            if ($status == "Not confirm") {

                                                                echo '  <td style="background-color:#9b1d1d; color:white;">' . $rows['status'] . '</td>
                     <td> <a href="confirmwalkin.php?walkin_upd=' . $rows['w_id'] . '"   style="    background-color: #b21515;" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">Confirm</i></a>
                      <a href="delete_walkin.php?walkin_del=' . $rows['w_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
                          <a href="update_Walkin.php?walkin_upd=' . $rows['w_id'] . '" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
                          </td></tr>';
                                                            } else {
                                                                echo '   <td style="background-color:#197e19; color:white;">' . $rows['status'] . '</td>
                 <td> <a href="delete_walkin.php?walkin_del=' . $rows['w_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
                 
                  </tr>';
                                                            }
                                                        }
                                                    }
                                                    ?><a href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodal" style="margin-bottom: 10px; margin-left: 88%;">Add Orders</a>

                                                </tbody>

                                                <!-- Modal -->
                                                <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Add Data </h5>
                                                            </div>
                                                            <form action="insertwalkin.php" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label> User </label>
                                                                        <input type="text" name="user" class="form-control" placeholder="Enter Name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label> Quantity </label>
                                                                        <input type="number" name="quantity" min="1" required="true" class="form-control" placeholder="Enter Quantity" required>
                                                                    </div>




                                                                    <div class="form-group">
                                                                        <label class="control-label">Select Product</label>
                                                                        <select name="d_id" required="true" class="form-control custom-select" data-placeholder="Choose a category" tabindex="1" required>
                                                                            <option>--Select Product--</option>
                                                                            <?php
                                                                            $ssql = "select * from pro_duct";
                                                                            $res = mysqli_query($db, $ssql);
                                                                            while ($row = mysqli_fetch_array($res)) {
                                                                                $id = $row['d_id'];

                                                                                echo ' <option value="' . $row['d_id'] . '">' . $row['title'] . ',   PHP' . $row['price'] . '</option>
                                                        
                                                        ';
                                                                            ?>

                                                                            <?php    }    ?>

                                                                            <?php
                                                                            ?>
                                                                        </select>


                                                                    </div>


                                                                    <!-- Add more form elements as needed -->






                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" href="walkin_orders.php">Close</a>
                                                                    <input type="submit" name="insertdata" class="btn btn-primary">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>


                                        <!------update----->



                                        <?php
                                        echo $error;
                                        echo $success;



                                        ?>




                                        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"> Edit Data </h5>
                                                    </div>
                                                    <?php $ssql = "select * from walkin_orders where w_id='$_GET[walkin_upd]'";
                                                    $res = mysqli_query($db, $ssql);
                                                    $newrow = mysqli_fetch_array($res); ?>
                                                    <form action='' method='post'>
                                                        <div class="form-body">

                                                            <hr>
                                                            <div class="row p-t-20">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">User</label>
                                                                        <input type="text" name="user" class="form-control" value="<?php echo $newrow['user']; ?>" placeholder="username">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group has-danger">
                                                                        <label class="control-label">Title</label>
                                                                        <input type="text" name="title" class="form-control form-control-danger" value="<?php echo $newrow['title'];  ?>" placeholder="jon">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row p-t-20">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Quantity </label>
                                                                        <input type="text" name="quantity" class="form-control" placeholder="doe" value="<?php echo $newrow['quantity']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group has-danger">
                                                                        <label class="control-label">Price</label>
                                                                        <input type="text" name="price" class="form-control form-control-danger" value="<?php echo $newrow['price'];  ?>">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                </div>
                                                <div class="form-actions">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                                    <a href="Walkin_orders.php" class="btn btn-inverse">Cancel</a>
                                                </div>
                                                </form>

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

        <script src="js/lib/jquery/jquery.min.js"></script>>
        <script src="js/lib/bootstrap/js/popper.min.js"></script>
        <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.slimscroll.js"></script>
        <script src="js/sidebarmenu.js"></script>
        <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <script src="js/custom.min.js"></script>


    </body>

</html>
<?php
}
?>