<?php  
	include 'koneksi.php';

	$id = $_GET['id'];
	$delete = mysqli_query($konek,"DELETE FROM siswa WHERE idsiswa = '$id'");
	if ($delete) {
		header('location:data-siswa.php');
	}

?>