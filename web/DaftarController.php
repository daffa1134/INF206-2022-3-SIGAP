<?php
require 'Koneksi.php';

function registerPasien($data) {
    global $koneksi;
	$nama_lengkap = $data['nama_lengkap'];
	$email = strtolower($data['email']);
	$password = ($data['password']);
	$cpassword = ($data['cpassword']);

	$duplicate = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");

	if (mysqli_fetch_assoc($duplicate)) {
		echo "
			<script>
				alert('Email sudah terdaftar!');
				document.location.href = '../web/DaftarPasien.php';
			</script>
		";
	}

	if ($password !== $cpassword) {
		echo "<script>alert('Password Tidak Sesuai')</script>";
	} else {
		$password = password_hash($password, PASSWORD_DEFAULT);
		mysqli_query($koneksi, "INSERT INTO users (nama_lengkap, email, password) VALUES ('$nama_lengkap', '$email', '$password')");
		echo "<script>alert('Akun Berhasil Dibuat')</script>";
	}
}

function registerAdmin($data) {
    global $koneksi;
	$nama = $data['nama'];
	$nama_apotek = $data['nama_apotek'];
	$email = strtolower($data['email']);
	$password = ($data['password']);
	$cpassword = ($data['cpassword']);

	$duplicate = mysqli_query($koneksi, "SELECT * FROM admins WHERE email = '$email'");

	if (mysqli_fetch_assoc($duplicate)) {
		echo "
			<script>
				alert('Email sudah terdaftar!');
				document.location.href = '../web/DaftarPasien.php';
			</script>
		";
	}

	if ($password !== $cpassword) {
		echo "<script>alert('Password Tidak Sesuai')</script>";
	} else {
		$password = password_hash($password, PASSWORD_DEFAULT);
		mysqli_query($koneksi, "INSERT INTO admins (nama, nama_apotek, email, password) VALUES ('$nama', '$nama_apotek', '$email', '$password')");
		echo "<script>alert('Akun Berhasil Dibuat')</script>";
	}
}
