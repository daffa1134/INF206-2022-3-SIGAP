<?php
require 'Controller/AdminController.php';
$admins = query_banyak("SELECT * FROM admins");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Custom Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ramaraja&family=Rancho&family=Roboto&family=Sora:wght@600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css" />

    <title>Log-In | SIGAP</title>
    <link rel="shortcut icon" href="../assets/ico/healthcare.png" type="image/x-icon" />
</head>

<body>

    <div>
        <p style="font-size: 20px;"><strong>Apotek Laris</strong></p>
        <div class="d-grid d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="./UserDoc.php?idApotek=" role="button">LIHAT</a>
        </div>
    </div>

    

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./te.js"></script>
</body>

</html>