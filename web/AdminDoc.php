<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['is_admin']) {
    require 'Controller/AdminController.php';
    
    $admin = query("SELECT * FROM admins WHERE id = '$_SESSION[id]'");
    $doctors = query_banyak("SELECT * FROM doctors WHERE id_apotek = '$_SESSION[id]'");
    
    if (isset($_POST['tambah'])) {
        tambahDokter($_POST);
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
                        <span class="me-2" style="font-weight: 600;"><?= $admin["nama"] ?></span>
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= $admin["link_pp"] ?>" alt="photo profile" width="32" height="32" class="rounded-circle" />
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="./Update_Profil_Admin.php">Profile</a></li>
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
                <li>
                    <a class="scroll-link mb-2" href="./AdminHome.php"><i class="fas fa-home"></i>Home</a>
                </li>
                <li class="active">
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

        <div class="container bg-light mt-3 theFont" style="border-radius: 15px; padding: 30px; font-family: 'Roboto', sans-serif;">
            <h2>Data Dokter <?= $admin["nama_apotek"] ?></h2>
            <div class="borderTen" style="background-color: #F2EEEE;">
                <table class="table text-center table-borderless">
                    <thead>
                        <th class="col-1">No</th>
                        <th class="col-3">Nama</th>
                        <th class="col-2">Ruang</th>
                        <th class="col-2">Jam Kerja</th>
                        <th class="col-2">Spesialis</th>
                        <th class="col-2">Aksi</th>
                    </thead>

                    <tbody>
                        <?php if (sizeof($doctors) > 0) : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($doctors as $doctor) : ?>
                                <tr id="<?= $doctor['id'] ?>">
                                    <td><?= $i ?></td>
                                    <td><?= $doctor["nama"] ?></td>
                                    <td><?= $doctor["ruangan"] ?></td>
                                    <td><?= $doctor["jam_mulai"] . " - " . $doctor["jam_selesai"] ?></td>
                                    <td><?= $doctor["spesialis"] ?></td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <a class="btn btn-primary" href="./EditDoc.php?id=<?= $doctor['id'] ?>" role="button">Edit</a>
                                            <button class="btn btn-danger hapus" type="button" data-bs-toggle="modal" data-bs-target="#confirmDelete">Hapus</button>
                                        </div>
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
            <!-- Tombol tambah dokter -->
            <div class="row justify-content-end">
                <div class="text-end">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalAddDokter">Tambah</button>
                </div>
            </div>
        </div>

        <!-- Form untuk tambah dokter -->
        <div class="modal fade" id="modalAddDokter" tabindex="-1" aria-labelledby="modalForm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bgThird" style="border-radius: 20px;">
                    <!-- Modal item -->
                    <div class="modal-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                            <div class="carousel-indicators gap-1">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="btn active rounded-circle" disabled aria-current="true" aria-label="Slide 1" style="width: 20px; height: 20px;"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="btn rounded-circle" disabled aria-label="Slide 2" style="width: 20px; height: 20px;"></button>
                            </div>
                            <div class="carousel-inner">
                                <!-- Halaman 1 -->
                                <form id="tambahdoc" name="tambahdoc" class="needs-validation" action="" method="post" novalidate>
                                    <div class="carousel-item active">
                                        <!-- Isi Form -->
                                        <div id="part1" class="col-10 mx-auto mt-4">
                                            <input type="hidden" name="id_apotek" value="<?= $admin["id"] ?>">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control borderTen" id="namaDokter" name="nama" placeholder="Nama Dokter" required>
                                                <label for="namaDokter">Nama Dokter</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control borderTen" id="nip" name="nip" placeholder="NIP" required>
                                                <label for="nip">NIP</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control borderTen" id="email" name="email" placeholder="E-Mail" required>
                                                <label for="email">E-Mail</label>
                                                <div id="emailchecker" hidden style="color: red;">
                                                    <strong>Tulis alamat email yang benar</strong>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control borderTen" id="alamat" name="alamat" placeholder="Alamat" required>
                                                <label for="alamat">Alamat</label>
                                            </div>
                                            <!-- Tombol penutup -->
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center" style="margin-bottom: 60px; margin-top: 60px">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">BATAL</button>
                                                <button id="nextstep" type="button" class="btn btn-success" data-bs-target="#carouselExampleIndicators" onclick="validateForm()" data-bs-slide="">LANJUT</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Halaman 2 -->
                                    <div class="carousel-item">
                                        <!-- Isi form -->
                                        <div id="part2">
                                            <div class="col-10 mx-auto mt-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control borderTen" id="ruangan" name="ruangan" placeholder="Ruangan" required>
                                                    <label for="ruangan">Ruangan</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control borderTen" id="noHp" name="no_hp" placeholder="No. HP">
                                                    <label for="noHp">No. HP</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control borderTen" id="spesialis" name="spesialis" placeholder="Spesialis" required>
                                                    <label for="spesialis">Spesialis</label>
                                                </div>
                                            </div>
                                            <div class="row mx-auto justify-content-center">
                                                <div class="col-5" style="padding: 0px 10px 0px 0px;">
                                                    <div class="form-floating">
                                                        <input type="time" class="form-control borderTen" id="jamMulai" name="jam_mulai" placeholder="Jam Mulai" required>
                                                        <label for="jamMulai">Jam Mulai</label>
                                                    </div>
                                                </div>
                                                <div class="col-5" style="padding: 0px 0px 0px 10px;">
                                                    <div class="form-floating">
                                                        <input type="time" class="form-control borderTen" id="jamSelesai" name="jam_selesai" placeholder="Jam Selesai" required>
                                                        <label for="jamSelesai">Jam Selesai</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tombol penutup -->
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center" style="margin-bottom: 60px; margin-top: 60px">
                                                <button type="button" class="btn btn-danger" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">KEMBALI</button>
                                                <button id="siap" type="button" name="tambah" class="btn btn-success" onclick="validating()">SELESAI</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop up konfirmasi hapus dokter -->
    <div class="modal fade" id="confirmDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bgThird" style="border-radius: 20px;">
                <div class="modal-body">
                    <div class="text-center" style="color: white;">
                        <p style="font-size: 32px"><strong>KONFIRMASI</strong></p>
                        <p style="font-size: 24px">Apakah anda benar-benar<br>ingin menghapusnya?</p>
                    </div>
                </div>
                <div class="d-grid mb-4 gap-2 d-md-flex justify-content-md-center">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">BATAL</button>
                    <button type="button" class="btn btn-danger confirmhapus" data-bs-dismiss="modal">IYA</button>
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
    <script src="../assets/js/modal.js"></script>
    <script src="../assets/js/validate.js"></script>
    <script type="text/javascript" src="../assets/js/del_doc.js"></script>
</body>

</html>