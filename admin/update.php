<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_buku'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];
$genre = $_POST['genre'];
$sinopsis = $_POST['sinopsis'];
$no_isbn = $_POST['no_isbn'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:index.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){
		$foto = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		mysqli_query($koneksi,"update daftar_buku set judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', genre='$genre', no_isbn='$no_isbn', foto='$foto' where id_buku='$id'");
		header("location:index.php?alert=berhasil");
	}else{
		header("location:index.php?alert=gagak_ukuran");
	}
}

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>