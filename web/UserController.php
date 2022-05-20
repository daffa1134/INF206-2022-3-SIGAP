<?php
require 'Koneksi.php';

$users = query("SELECT * FROM users WHERE id = 2");
$doctors = query_banyak("SELECT * FROM doctors ORDER BY nama");

function search($key) {
    $query = "SELECT * FROM doctors WHERE spesialis LIKE '%$key%'";
    return query_banyak($query);
}
