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
    <h1 style="text-align: center; font-family: fantasy; margin-top: 20px; color: #0d6efd">UPDATE CATEGORY IN HERE!!</h1>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$category_id = $_GET["category_id"];

$sql = $conn->query("SELECT * FROM categories WHERE category_id='$category_id'");
foreach ($sql as $dt) {

$conn->close();
?>

    <form action="actionAddC.php" method="POST">
        <div class="input-group mb-3" style="padding: 80px; padding-top: 40px;">
            <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" name="category">
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-outline-primary" style="margin-left: 80px">UPDATE</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>