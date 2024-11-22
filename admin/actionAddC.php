<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "Film";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {

    die("Koneksi gagal: " . $conn->connect_error);

}

$inputCategory = $_POST["category"];

$sql = "INSERT INTO categories (category_name) VALUE ('$inputCategory')";
$query = mysqli_query($conn, $sql);

$result = $conn->query($sql);

if (mysqli_query($conn, $sql)) {
    header("Location: daboard-category.php");
    // echo "hai";

} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($conn);


}

$conn->close();