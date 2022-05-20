<?php
require 'Koneksi.php';
if (isset($_POST['test'])) {
    var_dump($_POST);
}
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
    <form action="" method="post">
        <button type="button" id="noticeme" name="test" onclick="ambatukam()">Click Me</button>
    </form>

<script>
    function ambatukam() {
        botom = document.getElementById("noticeme");
        botom.setAttribute("type", "submit");
    }
</script>
</body>

</html>