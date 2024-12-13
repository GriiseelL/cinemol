<?php
// $inputfilm = $_POST["film"];
// $inputdesc = $_POST["desc"];

$server = "localhost";
$username = "root";
$password = "";
$database = "Film";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {

    die("Koneksi gagal: " . $conn->connect_error);

}

$id = $_GET['payment_id'];

$sql = $conn->query("UPDATE payment SET status=1 WHERE payment_id=$id");

// $query = mysqli_query($database, $sql);

if ($sql == TRUE) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: transaksi.php');
} else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
}

?>