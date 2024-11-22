<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "Film";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {

    die("Koneksi gagal: " . $conn->connect_error);

}

$inputFilm = $_POST["film"];
$inputDesc = $_POST["desc"];
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "../image/";

// pindahkan file
$file = $dirUpload . rand() . $namaFile;
$terupload = move_uploaded_file($namaSementara, $file);


if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='" . $dirUpload . $namaFile . "'>" . $namaFile . "</a>";
} else {
    echo "Upload Gagal!";
}

$sql = "INSERT INTO film (film_title, description_film, image_film) VALUE ('$inputFilm', '$inputDesc', '$file')";


if (mysqli_query($conn, $sql)) {
    header("Location: dasboard-film.php");
    // echo "hai";

} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($conn);


}

$conn->close();