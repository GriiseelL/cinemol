<?php

$server = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "Film";

$conn = new mysqli($server, $username, $password, $database); 

if ($conn->connect_error) { 

 die("Koneksi gagal: " . $conn->connect_error); 

}

$id = $_GET['category_id'];
$inputCategory = $_POST["category"];
$sql = "UPDATE categories SET nama='$inputCategory' WHERE id=$id";
$query = mysqli_query($db, $sql);

 if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: dasboard-film.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }

?>