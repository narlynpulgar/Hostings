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
$walkinQuery = "SELECT MONTH(date) AS month, SUM(total) AS total_value FROM walkin_orders WHERE SUBSTRING(date, 1, 4) = $selectedYear AND status = 'Confirm' GROUP BY MONTH(date) ORDER BY date";
$walkinResult = $conn->query($walkinQuery);
$walkin = array();

if ($walkinResult) {
    while ($row = $walkinResult->fetch_assoc()) {
        echo "{$row['total_value']},";
        array_push($walkin, $row['total_value']);
    }
} else {
    echo "No data found";
}

$conn->close();
?>