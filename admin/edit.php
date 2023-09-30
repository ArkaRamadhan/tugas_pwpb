<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>
<body>

	<h2>CRUD DATA MAHASISWA - WWW.MALASNGODING.COM</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA BUKU</h3>

	<?php
	include 'koneksi.php';
	$id = $_GET['id_buku'];
	$data = mysqli_query($koneksi,"select * from daftar_buku where id_buku='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Judul Buku</td>
					<td>
						<input type="hidden" name="id_buku" value="<?php echo $d['id_buku']; ?>">
						<input type="text" name="judul" value="<?php echo $d['judul']; ?>">
					</td>
				</tr>
				<tr>
					<td>Penulis</td>
					<td><input type="text" name="penulis" value="<?php echo $d['penulis']; ?>"></td>
				</tr>
				<tr>
					<td>penerbit</td>
					<td><input type="text" name="penerbit" value="<?php echo $d['penerbit']; ?>"></td>
				</tr>
				<tr>
					<td>Tahun terbit</td>
                    <td><input type="date" name="tahun_terbit" value="<?php echo $d['tahun_terbit'];?>"></td>
				</tr>
				<tr>
					<td>Genre</td>
					<td><input type="text" name="genre" value="<?php echo $d['genre']; ?>"></td>
				</tr>
				<tr>
					<td>Sinopsis</td>
					<td><input type="text" name="sinopsis" value="<?php echo $d['sinopsis']; ?>"></td>
				</tr>
				<tr>
					<td>No ISBN</td>
					<td><input type="text" name="no_isbn" value="<?php echo $d['no_isbn']; ?>"></td>
				</tr>
				<tr>
					<label>Foto :</label>
					<input type="file" name="foto" required="required">
					<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>
			</table>
		</form>
		<?php
	}
	?>
 
</body>
</html>