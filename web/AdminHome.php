<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['is_admin']) {
    require 'Controller/AdminController.php';
    $admin = query("SELECT * FROM admins WHERE id = '$_SESSION[id]'");
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
    <title>Home | Admin</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css" />
    <link rel="stylesheet" href="../assets/css/styleother.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/map.css">

    <!-- Icon -->
    <link rel="shortcut icon" href="../assets/ico/healthcare.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
                            <img src="<?= $admin['link_pp'] ?>" alt="photo profile" width="32" height="32" class="rounded-circle" />
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
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
                <li class="active">
                    <a class="scroll-link mb-2" href=""><i class="fas fa-home"></i>Home</a>
                </li>
                <li>
                    <a class="scroll-link mb-2" href="./AdminDoc.php"><i class="fas fa-user-md"></i> Data Dokter</a>
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
        <div class="container-fluid w-auto h-auto">
            <!-- Tombol simpan lokasi -->
            <button type="button" class="btn" id="save" data-bs-toggle="modal" data-bs-target="#saveLoc" title="Click to save your location" style="margin-left: 8px;">Save Location</button>
            <!-- Tombol cari lokasi -->
            <button type="button" class="btn" id="find" title="Click to find your location" style="margin-right: 8px;">
                <img src="../assets/ico/loc.png" alt="Find Location" style="width: 40px;">
            </button>

            <!-- Modal popup save-->
            <div class="modal fade" id="saveLoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bgThird" style="border-radius: 20px;">
                        <input id="idAdmin" name="idAdmin" type="hidden" value="<?php $admin['id'] ?>">
                        <input id="long" name="long" type="hidden" value="<?php $admin['longitude'] ?>">
                        <div class="modal-body text-center">
                            <p style="font-size: 24px; color: white;">Save this location?</p>
                        </div>
                        <div class="d-grid mb-4 gap-2 d-md-flex justify-content-md-center">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                            <button id="saveloc" type="button" class="btn btn-success simpan">YES</button>
                        </div>
                    </div>
                </div>
            </div>


            <div id="map"></div>
        </div>
    </div>
    <!-- End Wrapper -->

    <!-- Javascript -->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script type="text/javascript">
        var datas = {
            id: <?= $admin['id'] ?>,
            nama_apotek: "<?= $admin['nama_apotek'] ?>",
            longitude: <?= $admin['longitude'] ?>,
            latitude: <?= $admin['latitude'] ?>,
        }
    </script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwSSO6fRI2XwFLFnHJqjYLBwPiwWkuu48&callback=initMap"></script>
    <script src="../assets/js/adminMap.js"></script>
</body>

</html>