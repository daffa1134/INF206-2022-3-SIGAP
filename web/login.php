<?php
require 'LoginController.php';

if (isset($_POST['login'])) {
    login($_POST['email'], $_POST['password']);
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

<body id="bd-login">
    <div class="box-login" style="font-family: 'Roboto', sans-serif;">
        <h2 class="text-center mb-4 mt-4"><strong>LOG-IN</strong></h2>
        <form action="" method="post">
            <div class="d-grid gap-1 justify-content-center" style="color: black;">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control borderTen" name="email" id="floatingInput" placeholder="name@example.com" style="width: 28rem;" required>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control borderTen" name="password" id="floatingPassword" placeholder="Password" style="width: 28rem;" required>
                    <label for="floatingPassword">Password</label>
                </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto" style="width: 7rem;">
                <button class="btn borderTen" type="submit" name="login" style="background-color: #ed0b8f; color:white;">Masuk</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <p>Belum punya akun? klik <a href="./DaftarPasien.php" style="text-decoration: none; color: white"><strong>di sini</strong></a> <br>
                Ingin mendaftarkan klinik anda? klik <a href="./DaftarAdmin.php" style="text-decoration: none; color: white"><strong>di sini</strong></a></p>
        </div>
    </div>

    <!-- Java Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>