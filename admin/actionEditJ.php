<?php
$inputfilm = $_POST["film"];
$inputdesc = $_POST["desc"];

$server = "localhost";
$username = "root";
$password = "";
$database = "Film";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {

    die("Koneksi gagal: " . $conn->connect_error);

}

$id = $_GET['film_id'];

$sql = $conn->query("UPDATE film SET film_title ='$inputfilm', description_film = '$inputdesc' WHERE film_id=$id");

// $query = mysqli_query($database, $sql);

if ($sql == TRUE) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: dasboard-film.php');
} else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
}

?>