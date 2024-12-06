<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "Film";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {

    die("Koneksi gagal: " . $conn->connect_error);

}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $tmp = $result->fetch_assoc();
   
    $_SESSION['authuser'] = $tmp;

    header("Location: ../index.php");
    // echo "hai";

} else {

    echo "Login gagal. <a href='login-admin.php'>Coba lagi</a>";

}

$conn->close();

?>