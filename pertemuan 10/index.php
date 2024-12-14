<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>

<head>
	<title> Halaman Admin</title>
</head>

<body>
	<h1> Daftar Mahasiswa</h1>

	<a href="tambah.php"> Tambah data mahasiswa</a>

	<table border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($mahasiswa as $row) : ?>
			<tr>
				<td><?= $row["id"]; ?></td>
				<td>
					<a href="">ubah</a>
					<a href="hapus.php?id=<?= $row["id"]; ?>" onclick=" return confirm('apakah anda yakin ingin menghapus data?');">hapus</a>
				</td>
				<td><img src="img/<?= $row["gambar"]; ?>" widht="50" height="50"></td>
				<td><?= $row["nrp"]; ?></td>
				<td><?= $row["nama"]; ?></td>
				<td><?= $row["email"]; ?></td>
				<td><?= $row["jurusan"]; ?></td>

			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>

	</table>

</body>

</html>