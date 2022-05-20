<?php
require 'Koneksi.php';

function login($email, $password)
{
    global $koneksi;
    // cek dari tabel users
    $users = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");
    $admins = mysqli_query($koneksi, "SELECT * FROM admins WHERE email = '$email'");
    if (mysqli_num_rows($users) === 1) {
        $user = mysqli_fetch_assoc($users);
        if (password_verify($password, $user['password'])) {
            header("Location: ../web/UserHome.php");
            exit;
        }
    } else if (mysqli_num_rows($admins) === 1 || mysqli_num_rows($admins) === 1) {
        $admin = mysqli_fetch_assoc($admins);
        if (password_verify($password, $admin['password'])) {
            header("Location: ../web/AdminHome.php");
            exit;
        }
    }

    $error = true;

    if (isset($error)) {
        echo "
            <script>
                alert('Email atau Password salah!');
            </script>
            ";
    }
}
