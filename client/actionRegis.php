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


if ($email==null) {
    echo "gagal";
    return;
} else{
    if ($password==null) {
        echo "ggal";
        return;
    }
}
$sql = "INSERT INTO users (email, password)
VALUES ('$email', '$password')";


if (mysqli_query($conn, $sql)) {
    header("Location: login-client.php");
    // echo "hai";
return;
} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($conn);


}

$conn->close();

?>