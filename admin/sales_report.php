<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

// try push

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sulit";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
} else {
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
        <title>Walk In Sales</title>
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: sans-serif;
            }

            .chartContainer {
                max-width: 600px;
                margin: 20px auto;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .chartBox {
                padding: 20px;
                background-color: #f8f8f8;
            }
        </style>
        <!-- Include Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>

    <body class="fix-header; color: black;">


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
                            <span><img src="images/icn.png" style="height: 60px;" alt="homepage" class="dark-logo" /></span>
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
                            <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>

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

                    <div class="container-fluid">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-outline-primary">
                                        <div class="card-header">
                                            <h4 class="m-b-0 text-white">Total Sales</h4>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4"><a href="all_orders.php">
                                                    <div class="card p-30" style="margin-top: 25px;">
                                                        <div class="media">
                                                            <div class="media-left meida media-middle">
                                                                <span><i class="fa fa-check f-s-40" aria-hidden="true"></i></span>
                                                            </div>
                                                            <div class="media-body media-text-right">
                                                                <h2><?php



                                                                    $result = mysqli_query($db, 'SELECT SUM(total) AS value_sum FROM walkin_orders WHERE status = "Confirm"');
                                                                    $row = mysqli_fetch_assoc($result);
                                                                    $sum = $row['value_sum'];


                                                                    $result = mysqli_query($db, 'SELECT SUM(total) AS value_sum FROM users_orders WHERE status = "closed"');
                                                                    $row = mysqli_fetch_assoc($result);
                                                                    $sums = $row['value_sum'];


                                                                    $total = $sums + $sum;
                                                                    echo $total;
                                                                    ?></h2>
                                                                <p class="m-b-0">Total Orders</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>



                                            <div class="col-md-4"><a href="all_orders.php">
                                                    <div class="card p-30" style="margin-top: 25px;">
                                                        <div class="media">
                                                            <div class="media-left meida media-middle">
                                                                <span><i class="fa fa-check f-s-40" aria-hidden="true"></i></span>
                                                            </div>
                                                            <div class="media-body media-text-right">
                                                                <h2><?php



                                                                    $result = mysqli_query($db, 'SELECT SUM(total) AS value_sum FROM walkin_orders WHERE status = "Confirm"');
                                                                    $row = mysqli_fetch_assoc($result);
                                                                    $sum = $row['value_sum'];
                                                                    echo $sum;
                                                                    ?></h2>
                                                                <p class="m-b-0">Walkin Orders</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>


                                            <div class="col-md-4"><a href="sales_report.php">
                                                    <div class="card p-30" style="margin-top: 25px;">
                                                        <div class="media">
                                                            <div class="media-left meida media-middle">
                                                                <span><i class="fa fa-check f-s-40" aria-hidden="true"></i></span>
                                                            </div>
                                                            <div class="media-body media-text-right">
                                                                <h2><?php



                                                                    $result = mysqli_query($db, 'SELECT SUM(price) AS value_sum FROM users_orders WHERE status = "closed"');
                                                                    $row = mysqli_fetch_assoc($result);
                                                                    $sums = $row['value_sum'];
                                                                    echo $sums;
                                                                    ?></h2>
                                                                <p class="m-b-0">Online orders</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="col-lg-12">
                                                <div class="card card-outline-primary">
                                                    <div class="card-header">
                                                        <h4 class="m-b-0 text-white">Sales Report Graph</h4>
                                                    </div>

                                                        <form id="yearTag">
                                                            <label for="selectYear">Choose an option:</label>
                                                            <select id="selectYear" onchange="fetchData()">
                                                                <option class="btn btn-primary" data-toggle="modal" data-target="#addmodal" style="margin-bottom: 10px; margin-left: 88%" value="">Select Year</option>
                                                                <?php

                                                                $query = "SELECT DISTINCT YEAR(date) AS unique_year FROM walkin_orders";
                                                                $result = $conn->query($query);
                                                                $years = array();

                                                                if ($result) {
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        array_push($years, $row['unique_year']);
                                                                    }
                                                                } else {
                                                                    echo "Query failed: ";
                                                                }
                                                                for ($i = 0;$i < count($years); $i++) {
                                                                    echo "<option value=$years[$i]>$years[$i]</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </form>

                                                        </tbody>
                                                        
                                                        <div class="chartMenu">
                                                            <!-- Additional content for chart menu if needed -->
                                                        </div>
                                                        <div class="chartCard">
                                                            <div class="chartBox">
                                                                <canvas id="myChart"></canvas>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12">

                                                <div class="col-lg-12">
                                                    <div class="card card-outline-primary">
                                                        <div class="card-header">
                                                            <h4 class="m-b-0 text-white">Sales Report</h4>

                                                        </div>
                                                        <div class="table-responsive m-t-40">
                                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                <thead class="thead-dark">
                                                                    <thead class="thead-dark">
                                                                        <tr style="border-collapse: collapse; background: black;">

                                                                            <th>Date</th>
                                                                            <th>Product Name</th>
                                                                            <th>Quantity</th>
                                                                            <th>Price</th>
                                                                            <th>Total</th>

                                                                        </tr>
                                                                    </thead>

                                                                    <?php
                                                                    $sql = "SELECT users_orders.title,users_orders.quantity,users_orders.price,users_orders.date
            FROM `users_orders`WHERE status ='closed' UNION SELECT walkin_orders.title,walkin_orders.quantity,
            walkin_orders.price,walkin_orders.date FROM `walkin_orders` ORDER BY date";

                                                                    $query = mysqli_query($db, $sql);

                                                                    if (!mysqli_num_rows($query) > 0) {
                                                                        echo '<td colspan="7"><center>No Purchase Record!</center></td>';
                                                                    } else {
                                                                        while ($rows = mysqli_fetch_array($query)) {
                                                                            $item_total = ($rows["price"] * $rows["quantity"]);

                                                                            echo ' <tr> <td>' . date_format(date_create($row['date']), "M, D, Y, H:i:s") . '</td> 
                                                           <td>' . $rows['title'] . '</td>
                                                           <td>' . $rows['quantity'] . '</td>
                                                           <td>' . $rows['price'] . '</td>
                                                           <td>' . $item_total . '</td>
                                                        
                                                         
                                                        </tr>';
                                                                        }
                                                                    }

                                                                    ?>


                                                                    </td>
                                                                    </tr>
                                                        </div>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div>
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
    <script src="https://code.jquery.com/jquery-3.6.4.mim.js"></script>

    <script>
        const selectYear = document.getElementById('selectYear');
        let currentYear = new Date().getFullYear();

        let walkinData = <?php echo json_encode($walkin, JSON_HEX_TAG); ?>;
        let onlineData = <?php echo json_encode($online, JSON_HEX_TAG); ?>;

        const yearLabels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        const data = {
            labels: yearLabels,
            datasets: [
                {
                    label: 'Online Sales',
                    data: onlineData,
                    fill: true,
                    backgroundColor: 'rgba(255, 26, 104, 0.2)',
                    borderColor: 'rgba(255, 26, 104, 1)',
                    borderWidth: 2
                },
                {
                    label: 'Walkin Sales',
                    data: walkinData,
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                }
            ]
        };

        // config 
        const config = {
            type: 'line',
            data,
            options: {
                scales: {
                    y: {
                    ticks: {
                        beginAtZero: true,
                        },
                    },
                    x: {
                    ticks: {
                        },
                    },
                }
            }
        };
        const actions = [{
            name: 'Randomize',
            handler(chart) {
                chart.data.datasets.forEach(dataset => {
                    dataset.data = Utils.numbers({
                        count: chart.data.labels.length,
                        min: -100,
                        max: 100
                    });
                });
                chart.update();
            }
        }, ]


        // render init block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        function updateChart(newData) {
            myChart.data = newData;

            myChart.update();
        }

        // set the select tag option to select the current year
        for (let i = 0; i < selectYear.options.length; i++) {
            console.log(selectYear.options[i].value);
            if (selectYear.options[i].value == currentYear) {
                selectYear.options[i].selected = true;
                break;
            }
        }

        function fetchData() {
            let selectedYear = $('#selectYear').val();
            walkinData = [];
            onlineData = [];

            $.ajax({
                type: "POST",
                url: "fetch_walkin_orders.php",
                data: {
                    year: selectedYear
                },
                success: function (data1) {
                    walkinData = data1.split(',').map(Number);
                    walkinData.pop();

                    $.ajax({
                        type: "POST",
                        url: "fetch_users_orders.php",
                        data: {
                            year: selectedYear
                        },
                        success: function (data2) {
                            onlineData = data2.split(',').map(Number);
                            onlineData.pop();
                            console.log(walkinData);
                            console.log(onlineData);

                            let newData = {
                                labels: yearLabels,
                                datasets: [
                                    {
                                        label: 'Online Sales',
                                        data: onlineData,
                                        fill: true,
                                        backgroundColor: 'rgba(255, 26, 104, 0.2)',
                                        borderColor: 'rgba(255, 26, 104, 1)',
                                        borderWidth: 2
                                    },
                                    {
                                        label: 'Walkin Sales',
                                        data: walkinData,
                                        fill: true,
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 2
                                    }
                                ]
                            }
                            updateChart(newData);
                        }
                    });
                }
            });
        }

        $(document).ready(function() {
            fetchData();
        });
    </script>

</html>
<?php
} ?>