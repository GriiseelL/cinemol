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

$tmp = $_GET["film_id"];
$tmp2 = $_SESSION['authuser'];
$tmp3 = $tmp2['user_id'];

$cekPayment = "SELECT*FROM payment RIGHT JOIN item_paid ON payment.payment_id = item_paid.payment_id WHERE user_id=$tmp3 AND status=1";
$hasil = $conn->query($cekPayment);
while ($row1 = $hasil->fetch_assoc()) {
    $filmid = $row1["film_id"];

    if ($filmid == $tmp) {
        echo "done";
        return;
    }
}
// var_dump($row1);
// header('Content-type: application/json');
// echo json_encode($row1);
// return;

$cek = "SELECT*FROM trolly WHERE user_id=$tmp3 AND film_id=$tmp";
$hsl = $conn->query($cek);
$row = $hsl->fetch_assoc();
// var_dump($row);
// return;

if ($row != null) {
    echo "sudah dibeli";
} else {

    $sql = "INSERT INTO trolly (user_id, film_id) VALUES ($tmp3,$tmp)";
    $result = $conn->query($sql);

    // $row = $result->fetch_assoc();
    header('Location: /detailFilem.php?film_id=' . $tmp);
}

$conn->close();
?>