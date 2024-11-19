<?php

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

$sql = "INSERT INTO admin (email, password)
VALUES ('$email', '$password')";

$result = $conn->query($sql);

if (mysqli_query($conn, $sql)) {
    header("Location: login-admin.php");
    // echo "hai";

} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($conn);


}

$conn->close();

?>