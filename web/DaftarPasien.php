<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['is_admin']) {
    header("Location: ../web/AdminHome.php");
} elseif (isset($_SESSION['login']) && $_SESSION['is_admin'] == false) {
    header("Location: ../web/UserHome.php");
}

require 'Controller/DaftarController.php';

if (isset($_POST['submit'])) {
	registerPasien($_POST);
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
	<link href="https://fonts.googleapis.com/css2?family=Ramaraja&family=Rancho&family=Roboto&family=Sora:wght@600&family=Poppins:wght@300&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<link rel="stylesheet" href="../assets/css/daftar.css" />

	<title>Daftar | SIGAP</title>
	<link rel="shortcut icon" href="../assets/ico/healthcare.png" type="image/x-icon" />
</head>

<body>
<div class="theBox">
		<h2 class="text-center mb-3" style="font-family: Stoke; color: white;"><strong>DAFTAR AKUN</strong></h2>

		<form action="" method="POST">
			<div class="d-grid gap-1 justify-content-center" style="color: black; font-family: 'Roboto', sans-serif;">
				<div class="form-floating mb-3">
					<input name="nama_lengkap" type="text" class="form-control borderTen" id="floatingInput" placeholder="Nama Lengkap" style="width: 28rem;" required>
					<label for="floatingInput">Nama Lengkap</label>
				</div>
				<div class="form-floating mb-3">
					<input name="email" type="email" class="form-control borderTen" id="floatingInput" placeholder="name@example.com" style="width: 28rem;" required>
					<label for="floatingInput">Email</label>
				</div>
				<div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control borderTen" id="floatingPassword" placeholder="Password" style="width: 28rem;" required>
                    <label for="floatingPassword">Password</label>
                </div>
				<div class="form-floating mb-3">
                    <input type="password" name="cpassword" class="form-control borderTen" id="floatingPassword" placeholder="Konfirmasi Password" style="width: 28rem;" required>
                    <label for="floatingPassword">Konfirmasi Password</label>
                </div>
			</div>
			<div class="d-grid gap-2 col-6 mx-auto mt-3" style="width: 7rem;">
				<button class="btn borderTen" type="submit" name="submit" style="background-color: #ed0b8f; color:white; font-family: Stoke;">Daftar</button>
			</div>
			<div class="text-center mt-4" style="color: white;">
				<p>Sudah punya akun? <a href="./Login.php" style="text-decoration: none; color: white"><strong>Login</strong></a></p>
			</div>
		</form>
	</div>

	<!-- Java Script -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>