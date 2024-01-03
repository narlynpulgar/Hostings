<?php
//main connection file for both admin & front end
$servername = "localhost"; //server
$username = "root"; //username
$password = ""; //password
$dbname = "sulit";  //database

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
// Check connection
if (!$db) {       //checking connection to DB	
    die("Connection failed: " . mysqli_connect_error());
}


// Handle form submission
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulit Puguan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .container {
            display: block;
            width: 100%;
            background: #fff;
            max-width: 350px;
            padding: 25px;
            margin: 50px auto 0;
            box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        }

        .receipt_header {
            padding-bottom: 40px;
            border-bottom: 1px dashed #000;
            text-align: center;
        }

        .receipt_header h1 {
            font-size: 20px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .receipt_header h1 span {
            display: block;
            font-size: 25px;
        }

        .receipt_header h2 {
            font-size: 14px;
            color: #727070;
            font-weight: 300;
        }

        .receipt_header h2 span {
            display: block;
        }

        .receipt_body {
            margin-top: 25px;
        }

        table {
            width: 100%;
        }

        thead,
        tfoot {
            position: relative;
        }

        thead th:not(:last-child) {
            text-align: left;
        }

        thead th:last-child {
            text-align: right;
        }

        thead::after {
            content: '';
            width: 100%;
            border-bottom: 1px dashed #000;
            display: block;
            position: absolute;
        }

        tbody td:not(:last-child),
        tfoot td:not(:last-child) {
            text-align: left;
        }

        tbody td:last-child,
        tfoot td:last-child {
            text-align: right;
        }

        tbody tr:first-child td {
            padding-top: 15px;
        }

        tbody tr:last-child td {
            padding-bottom: 15px;
        }

        tfoot tr:first-child td {
            padding-top: 15px;
        }

        tfoot::before {
            content: '';
            width: 100%;
            border-top: 1px dashed #000;
            display: block;
            position: absolute;
        }

        tfoot tr:first-child td:first-child,
        tfoot tr:first-child td:last-child {
            font-weight: bold;
            font-size: 20px;
        }

        .date_time_con {
            display: flex;
            justify-content: center;
            column-gap: 25px;
        }

        .items {
            margin-top: 25px;
        }

        h3 {
            border-top: 1px dashed #000;
            padding-top: 10px;
            margin-top: 25px;
            text-align: center;
            text-transform: uppercase;
        }
    </style>
</head>



<body>
    <div class="container">

        <div class="receipt_header">
            <h1>Receipt of Sale <span>Sulit Puguan</span></h1>
            <h2>Address: Mabini, Libmanan, Camarines Sur <span>Tel: +1 012 345 67 89</span></h2>
        </div>

        <div class="receipt_body">



            <div class="items">
                <table>
                    <?php
                    $sql = "SELECT * FROM users_orders where o_id ='" . $_GET['order_rec'] . "'";
                    $query = mysqli_query($db, $sql);

                    if (!mysqli_num_rows($query) > 0) {
                        echo '<td colspan="11"><center>No Expenses</center></td>';
                    } else {
                        while ($rows = mysqli_fetch_array($query)) {

                            $total = $rows['price'] * $rows['quantity'];
                            echo '
                            <div class="date_time_con">
                            <div class="date">' . date_format(date_create($rows['date']), "M, D, Y, g:i A") .  '</div>

                        </div>
                        <thead>
                            <th>PRODUCT</th>
                            <th>QTY</th>
                            <th>AMT</th>
                        </thead>
             
                    <tbody>
                        <tr>
                            <td>' . $rows['title'] . '</td>
                            <td>' . $rows['quantity'] . '</td>
                            <td>' . $rows['price'] . '</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td>' . $total . '</td>
                        </tr>


                    </tfoot>';
                        }
                    }

                    ?>
                    <script>
                        setTimeout(function() {
                            window.print()
                            setTimeout(function() {
                                window.close()
                            }, 500)
                        }, 300)
                    </script>




                </table>
            </div>

        </div>


        <h3>Show this to claim your orders!</h3>


    </div>

</body>

</html>