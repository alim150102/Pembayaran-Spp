<?php  
	include 'koneksi.php';

	$id = $_GET['id'];
	$delete = mysqli_query($konek,"DELETE FROM guru WHERE idguru = '$id'");
	if ($delete) {
		header('location:data-guru.php');
	}

?>