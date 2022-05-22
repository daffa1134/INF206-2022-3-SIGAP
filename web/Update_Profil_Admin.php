<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['is_admin']) {
    require 'Controller/AdminController.php';
    $admin = query("SELECT * FROM admins WHERE id = '$_SESSION[id]'");

    if (isset($_POST["update"])) {
        $nama = $_POST["fName"];
        $email = $_POST["email"];
        $apotek = $_POST["apotek"];
        updateProfil("UPDATE admins SET nama = '$nama', email = '$email', nama_apotek = '$apotek' WHERE id = '$_SESSION[id]'");
        header("Location: ../web/Update_Profil_Admin.php");
    }
} else {
    session_destroy();
    header("Location: ../web/Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Profile</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css" />
    <link rel="stylesheet" href="../assets/css/styleother.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ramaraja&family=Rancho&family=Roboto&family=Sora:wght@600&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="shortcut icon" href="../assets/ico/healthcare.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

</head>

<body>
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Header -->
        <header class="bg-second p-2">
            <div class="container-fluid">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <a class="btn btn-customized open-menu" href="#" role="button"> <i class="fas fa-bars"></i></a>
                    <div class="dropdown btn-group me-3">
                        <span class="me-2" style="font-weight: 600;"><?= $admin['nama'] ?></span>
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= $admin['link_pp'] ?>" alt="photo profile" width="32" height="32" class="rounded-circle" />
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="">Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- Sidebar -->
        <nav class="sidebar">
            <!-- close sidebar menu -->
            <div class="dismiss">
                <i class="fas fa-times"></i>
            </div>

            <ul class="list-unstyled menu-elements mt-5">
                <li class="active">
                    <a class="scroll-link mb-2" href="./AdminHome.php"><i class="fas fa-home"></i>Home</a>
                </li>
                <li>
                    <a class="scroll-link mb-2" href=""><i class="fas fa-user-md"></i> Data Dokter</a>
                </li>
                <li>
                    <a class="scroll-link mb-2" href="./Halaman_Tentang_Admin.php"><i class="fas fa-info-circle"></i> Tentang</a>
                </li>
                <li>
                    <a class="scroll-link mb-2" href="./Halaman_Bantuan_Admin.php"><i class="fas fa-question-circle"></i> Bantuan</a>
                </li>
                <li>
                    <a class="scroll-link mb-2" href="./Controller/LoginController.php?logout"><i class="fas fa-power-off"></i> Keluar</a>
                </li>
            </ul>
        </nav>
        <!-- End sidebar -->

        <!-- ISi konten -->
        <div class="container rounded bgThird text-white mt-5 mb-5" style="width: 50rem;">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?= $admin['link_pp'] ?>">
                        <span class="font-weight-bold mt-2"><?= $admin['nama'] ?></span>
                        <span class="text-white"><?= $admin['email'] ?></span>
                        <span> </span>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="" method="post">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="fullname" class="labels">Nama</label>
                                    <input type="text" class="form-control" id="fullname" name="fName" placeholder="Masukkan Nama Lengkap" value="<?= $admin['nama'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="mail" class="labels">Email</label>
                                    <input type="email" class="form-control" id="mail" name="email" placeholder="Masukkan Alamat Email" value="<?= $admin['email'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="aptk" class="labels">Nama Apotek</label>
                                    <input type="text" class="form-control" id="aptk" name="apotek" placeholder="Masukkan Nama Apotek / Klinik" value="<?= $admin['nama_apotek'] ?>">
                                </div>
                            </div>
                            <div class="d-grid d-md-flex justify-content-md-end mt-5">
                                <button class="btn btn-primary" name="update" type="submit">Save Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Wrapper -->

    <!-- Javascript -->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>