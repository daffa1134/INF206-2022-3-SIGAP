<?php
require "Koneksi.php";
if (isset($_POST['fungsi'])) {
    mysqli_query($koneksi, "INSERT INTO admins (nama) VALUES 
    ('$_POST[nama]')"
    );
}