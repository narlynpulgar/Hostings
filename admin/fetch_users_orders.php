<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sulit";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedYear = $_POST['year'];

$onlineQuery = "SELECT MONTH(date) AS month, SUM(total) AS total_value FROM users_orders WHERE SUBSTRING(date, 1, 4) = $selectedYear AND status = 'closed' GROUP BY MONTH(date) ORDER BY date";
$onlineResult = $conn->query($onlineQuery);
$online = array();

if ($onlineResult) {
    while ($row = $onlineResult->fetch_assoc()) {
        echo "{$row['total_value']},";
        array_push($online, $row['total_value']);
    }
} else {
    echo "No data found";
}

$conn->close();
?>