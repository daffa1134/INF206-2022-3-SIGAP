<?php
require 'Koneksi.php';

$apotekInfo = query_banyak("SELECT id, nama_apotek, longitude, latitude FROM admins");

function search($key, $id) {
    $query = "SELECT * FROM doctors WHERE id_apotek = '$id' AND spesialis LIKE '%$key%'";
    return query_banyak($query);
}

function update($query) {
    global $koneksi;
    mysqli_query($koneksi, $query);
}