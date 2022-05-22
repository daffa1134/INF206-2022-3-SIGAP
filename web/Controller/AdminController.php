<?php
require "Koneksi.php";

function tambahDokter()
{
    global $koneksi;
    $id_apotek = $_POST["id_apotek"];
    $nama = htmlspecialchars($_POST['nama']);
    $nip = htmlspecialchars($_POST['nip']);
    $email = htmlspecialchars($_POST['email']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $ruangan = htmlspecialchars($_POST['ruangan']);
    $nohp = htmlspecialchars($_POST['no_hp']);
    $spesialis = htmlspecialchars($_POST['spesialis']);
    $mulai = htmlspecialchars($_POST['jam_mulai']);
    $selesai = htmlspecialchars($_POST['jam_selesai']);

    mysqli_query($koneksi, "INSERT INTO doctors
            (id_apotek, nama, nip, email, alamat, ruangan, no_hp, spesialis, jam_mulai, jam_selesai)
            VALUES
            ('$id_apotek', '$nama', '$nip', '$email', '$alamat', '$ruangan', '$nohp', '$spesialis', '$mulai', '$selesai')");

    echo "
        <script>
        document.location.href = '../web/AdminDoc.php';
        </script>
    ";
}

function hapusDokter($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM doctors WHERE id = $id");
}

function updateLokasi($id, $long, $lat)
{
    global $koneksi;
    mysqli_query($koneksi, "UPDATE admins SET longitude = '$long', latitude = '$lat' WHERE id = $id");
}

function updateProfil($query) {
    global $koneksi;
    mysqli_query($koneksi, $query);
}

function updateDataDokter($query) {
    global $koneksi;
    mysqli_query($koneksi, $query);
}

if (isset($_GET['call'])) {
    $id = $_GET["id"];
    hapusDokter($id);
}

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $long = $_POST['longitude'];
    $lat = $_POST['latitude'];

    updateLokasi($id, $long, $lat);
}