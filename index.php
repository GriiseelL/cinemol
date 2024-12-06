<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "Film";

$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT*FROM film";
$result = $conn->query($sql);

$conn->close();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class=" navbar-brand" href="#">
                <img src="../logo.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </div>
            </div>
            <?php
            if (!isset($_SESSION['authuser'])) {
                ?>
                <a href="../client/login-client.php"><button type="button" class="btn btn-primary">Login</button></a>
                <a href="../client/regis-page.php"><button type="button" class="btn btn-success"
                        style="margin-left: 10px;">Registrasi</button></a>
            <?php } else { ?>

                <a href="../client/actionOut.php"><button type="button" class="btn btn-primary">Logout</button></a>
                <button type="button" class="btn btn-secondary ms-2">Trolly</button>
            <?php } ?>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-3" style="margin-left: 20px;">
                    <div class="card" style="width: 18rem; margin-top: 20px;">
                        <img src="<?= $row["image_film"] ?>" alt="" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["film_title"] ?></h5>
                            <p class="card-text"><?= $row["description_film"] ?></p>
                            <a href="/detailFilem.php?film_id=<?php echo $row['film_id'] ?>" class="btn btn-primary">View
                                this movie</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>