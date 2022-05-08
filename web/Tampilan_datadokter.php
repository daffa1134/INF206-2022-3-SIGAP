<?php
//memasukkan file Koneksi.php
include('Koneksi.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Daftar Dokter</font></center>
		<hr>
		<a href="index.php?page=tambah_mhs"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Spesialist</th>
					<th>Jam kerja</th>
					<th>Ruang</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM dokter ORDER BY Nama DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
			
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['nama'].'</td>
							<td>'.$data['spesialis'].'</td>
							<td>'.$data['jam_kerja'].'</td>
							<td>'.$data['ruang'].'</td>
							<td>
								<a href="index.php?page=edit_mhs&Nim='.$data['nama'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?Nim='.$data['nama'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
