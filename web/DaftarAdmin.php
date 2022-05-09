<?php

include 'Koneksi.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$nama_apotek = $_POST['nama_apotek'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM admin WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO admin (nama, nama_apotek, email, password)
					VALUES ('$nama','$nama_apotek', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Pendaftaran Berhasil')</script>";
				$nama = "";
				$nama_apotek = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";

				header("Location: login.php");
			} else {
				echo "<script>alert('Terdapat Kesalahan')</script>";
			}
		} else {
			echo "<script>alert('Email Telah Digunakan')</script>";
		}
	} else {
		echo "<script>alert('Password Tidak Sesuai')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,
    initial-scale=1.0">
	<title>SIGAP</title>
	<link rel="stylesheet" href="../assets/css/daftar.css">
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="daftar-form">
			<p class="daftar-text">DAFTAR</p>
			<div class="input-group"><input type="text" placeholder="Nama Lengkap" name="nama"></div>
			<div class="input-group"><input type="text" placeholder="Nama Apotek" name="nama_apotek"></div>
			<div class="input-group"><input type="text" placeholder="E-mail" name="email"></div>
			<div class="input-group"><input type="password" placeholder="Password" name="password"></div>
			<div class="input-group"><input type="password" placeholder="Konfirmasi Password" name="cpassword"></div>

			<div class="input-group"><button name="submit" class="btn">DAFTAR</button></div>
		</form>
	</div>
</body>

</html>