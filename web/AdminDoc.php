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
                        <span class="me-2" style="font-weight: 600;">Firman</span>
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/img/pp-example.png" alt="photo profile" width="32" height="32" class="rounded-circle" />
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
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
                    <a class="scroll-link mb-2" href="#"><i class="fas fa-info-circle"></i> Tentang</a>
                </li>
                <li>
                    <a class="scroll-link mb-2" href="#"><i class="fas fa-question-circle"></i> Bantuan</a>
                </li>
                <li>
                    <a class="scroll-link mb-2" href="./login.php"><i class="fas fa-power-off"></i> Keluar</a>
                </li>
            </ul>
        </nav>
        <!-- End sidebar -->

        <!-- ISi konten -->
        <div class="container bg-light mt-3" style="border-radius: 15px; padding: 30px; font-family: 'Roboto', sans-serif;">
            <h2>Data Dokter Apotek Laris</h2>
            <div style="background-color: #F2EEEE; border-radius: 10px">
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
                        <tr>
                            <td>1</td>
                            <td>Anas Al-Karim</td>
                            <td>Merpati</td>
                            <td>18.00-21.00</td>
                            <td>Jantung</td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a class="btn btn-primary" href="#" role="button">Edit</a>
                                    <a class="btn btn-danger" href="#" role="button">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol tambah dokter -->
            <div class="row justify-content-end">
                <div class="col-1 align-self-end">
                    <a class="btn btn-success" href="./TambahDokter.php" role="button">Tambah</a>
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