<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Log-In | SIGAP</title>
</head>
<body id="bd-login">
    <div class="box-login">
        <h2>LOG-IN</h2>
        <form action="" method="POST">
            <input type="text" name="email" placeholdher="Masukkan Email"  class="input-control"><br>
            <input type="password" name="password" placeholdher="Masukkan Password" class="input-control">
            <input type="submit" name="submit" value="Masuk" class="beton">
            <p style="text-align : center;" class="daftar">Belum punya akun ? klik <a href="#">disini</a></p>
        </form>
        <?php
            if (isset($_POST['submit'])) {
               $email = $_POST['email'];
                $password = $_POST['password'];
                $cek = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
                
                
            }
            ?>
    </div>
</body>
</html>