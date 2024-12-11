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

$tmp = $_SESSION["authuser"]["user_id"];

$sql = "SELECT*FROM trolly INNER JOIN  film ON trolly.film_id = film.film_id WHERE trolly.user_id= $tmp";
// var_dump($sql);
// return;
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
    <style>
        .object-fit-cover {
            object-fit: cover;
        }
    </style>

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
                <a href="trolly.php"><button type="button" class="btn btn-secondary ms-2">Trolly</button></a>
            <?php } ?>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-12">
                    <div class="card mb-3" style="height: 300px;">
                        <div class="row g-0 h-100">
                            <div class="col-md-4 h-100">
                                <img src="<?= $row['image_film'] ?>" class="img-fluid h-100 w-100 object-fit-cover"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row["film_title"] ?></h5>
                                    <p class="card-text"><?= $row["description_film"] ?></p>
                                    <a href="actionDeleteT.php?trolly_id=<?php echo $row["trolly_id"] ?>"><button
                                            type="button" class="btn btn-danger">Delete</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <a href="actionCO.php"><button type="button" class="btn btn-success">Success</button></a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>