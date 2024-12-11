<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$tmp = $_GET["film_id"];
$sql = "SELECT*FROM film WHERE film_id=$tmp";
$result = $conn->query($sql);
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
  <main>
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

    <?php
    while ($row = $result->fetch_assoc()) {
      ?>
      <center>
        <img src="<?php echo $row['image_film'] ?>" alt="" width=" 20%" style="margin-top: 20px">
      </center>
      <h2 class="mt-4" style="text-align: center;"><?php echo $row['film_title'] ?></h2>
      <h4 class="mt-4" style="text-align: center;"><?= $row["price"]?></h4>
      <p class="ms-5"><?php echo $row['description_film'] ?></p>
      <a href="/actionOrder.php?film_id=<?php echo $row['film_id'] ?>"><button type="button"
          class="btn btn-warning ms-5">Order</button></a>
    <?php } ?>



  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>