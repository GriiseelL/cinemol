<?php
$inputCategory = $_POST["category"];

$server = "localhost";
$username = "root";
$password = "";
$database = "Film";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {

    die("Koneksi gagal: " . $conn->connect_error);

}

$id = $_GET['category_id'];

$sql = $conn->query("UPDATE categories SET category_name='$inputCategory' WHERE category_id=$id");

// $query = mysqli_query($database, $sql);

if ($sql == TRUE) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: dasboard-category.php');
} else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
}

?>