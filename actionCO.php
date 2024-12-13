<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set("Asia/Jakarta");
$now = date("Y-m-d H:i");
$tmp = $_SESSION["authuser"]["user_id"];
// $total = $_GET["total"];

$select1 = "SELECT*FROM trolly INNER JOIN  film ON trolly.film_id = film.film_id WHERE user_id=$tmp";
$result1 = $conn->query($select1);

$total = 0;
while ($row1 = $result1->fetch_assoc()) {
    $total = $total + $row1["price"];
}


$sql = "INSERT INTO payment (date_payment, user_id, total_payment) VALUES ('$now',$tmp, $total)";
$result = $conn->query($sql);
$last_id = $conn->insert_id;

$select2 = "SELECT*FROM trolly WHERE user_id=$tmp";
$result3 = $conn->query(query: $select2);

while ($row = $result3->fetch_assoc()) {
    // var_dump($row);
    // return;
    $tmpfilm = $row["film_id"];
    $tmpid = $row["user_id"];
    $insert = "INSERT INTO item_paid (film_id, payment_id) VALUES ('$tmpfilm',$last_id)";
    $result2 = $conn->query($insert);

    $delete = "DELETE FROM trolly WHERE user_id=$tmpid";
    $result4 = $conn->query($delete);
}


$conn->close();