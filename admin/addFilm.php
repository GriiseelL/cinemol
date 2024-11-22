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
    <div class="container">
        <h1 style="text-align: center; font-family: fantasy; margin-top: 20px; color: #0d6efd">ADD FILM IN HERE!!</h1>
        <form action="actionAddJ.php" method="POST" enctype="multipart/form-data">
            <div>
                <div class="input-group mt-4">
                    <span class="input-group-text" id="inputGroup-sizing-default">Film</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" name="film">
                </div>
                <div class="input-group mt-4">
                    <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" name="desc">
                </div>
                <div class="input-group mt-4">
                    <span class="input-group-text" id="inputGroup-sizing-default">Image</span>
                    <input type="file" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" name="berkas">
                </div>
                <button type="submit" class="btn btn-outline-primary mt-4">ADD new film</button>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>