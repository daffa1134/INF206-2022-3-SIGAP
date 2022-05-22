<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['is_admin'] === false) {
    require 'Controller/UserController.php';
    $user = query("SELECT * FROM users WHERE id = '$_SESSION[id]'");
    if (isset($_GET["idApotek"])) {
        $id = $_GET["idApotek"];
        $apotekName = query("SELECT nama_apotek FROM admins WHERE id = '$id'");
        $apotekName = $apotekName['nama_apotek'];
        $datas = query_banyak("SELECT * FROM doctors WHERE id_apotek = '$id' ORDER BY nama");

        if (isset($_POST["cari"])) {
            $datas = search($_POST["keyword"], $id);
        }
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
    <title>Data Dokter</title>

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
                        <span class="me-2" style="font-weight: 600;"><?= $user["nama_lengkap"] ?></span>
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= $user["link_pp"] ?>" alt="photo profile" width="32" height="32" class="rounded-circle" />
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="./Update_Profil.php">Profile</a></li>
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
                    <a class="scroll-link mb-2" href="./UserHome.php"><i class="fas fa-home"></i>Home</a>
                </li>
                <li>
                    <a class="scroll-link mb-2" href="./Halaman_Tentang.php"><i class="fas fa-info-circle"></i> Tentang</a>
                </li>
                <li>
                    <a class="scroll-link mb-2" href="./Halaman_Bantuan.php"><i class="fas fa-question-circle"></i> Bantuan</a>
                </li>
                <li>
                    <a class="scroll-link mb-2" href="./Controller/LoginController.php?logout"><i class="fas fa-power-off"></i> Keluar</a>
                </li>
            </ul>
        </nav>
        <!-- End sidebar -->

        <!-- ISi konten -->
        <div class="container bg-light mt-3 theFont" style="border-radius: 15px; padding: 30px; font-family: 'Roboto', sans-serif;">
            <div class="row justify-content-between">
                <div class="col">
                    <h2><?= $apotekName ?></h2>
                </div>
                <div class="col-3">
                    <form action="" method="post" class="d-flex">
                        <input class="form-control me-2 border borderTen" name="keyword" placeholder="Cari Spesialis" aria-label="Search" autocomplete="off">
                        <button type="submit" name="cari" class="searchbtn">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="borderTen" style="background-color: #F2EEEE;">
                <table class="table text-center align-middle table-borderless">
                    <thead>
                        <th class="col-1">No</th>
                        <th class="col-3">Foto</th>
                        <th class="col-2">Nama</th>
                        <th class="col-2">Jam Kerja</th>
                        <th class="col-2">Spesialis</th>
                        <th class="col-2">Aksi</th>
                    </thead>

                    <tbody>
                        <?php if (sizeof($datas) > 0) : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($datas as $data) : ?>
                                <tr id="<?= $data['id'] ?>">
                                    <td><?= $i ?></td>
                                    <td><img src="<?= $data["link_pp"] ?>" alt="foto_dokter" style="width: 200px;"></td>
                                    <td><?= $data["nama"] ?></td>
                                    <td><?= $data["jam_mulai"] . " - " . $data["jam_selesai"] ?></td>
                                    <td><?= $data["spesialis"] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="./Tampilan_Profil.php?idDokter=<?= $data['id'] ?>" role="button">Lihat</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center"><strong>Tidak ada data</strong></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <!-- End Wrapper -->

    <!-- Javascript -->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/modal.js"></script>
</body>

</html>