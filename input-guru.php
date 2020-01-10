<?php 
  session_start();
	if (!isset($_SESSION['login'])) {
		header('location:new_login.php');	
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/input-guru.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="main col-md-6 offset-3">
        <h2 class="text-center mt-5">Tambah Data Guru</h2>
        <form method="POST">
          <div class="form-group row">
            <div class="col-md-2 offset-1 mt-1">
              <label>NIK</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="nik" class="form-control rounded-pill">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2 offset-1 mt-1">
              <label>Nama</label>
            </div>
            <div class="col-md-7">
              <input type="text" name="nama" class="form-control rounded-pill">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2 offset-1 mt-1">
              <label>Alamat</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="alamat" class="form-control rounded-pill">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2 offset-1 mt-1">
              <label>Telepon</label>
            </div>
            <div class="col-md-5">
              <input type="telepon" name="telp" class="form-control rounded-pill">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center mt-4  ">
              <button class="submit" type="submit" name="simpan">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<?php
include 'koneksi.php';
  if (isset($_POST['simpan'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $input = mysqli_query($konek, "INSERT INTO guru(nik,namaguru,alamat,telp) VALUES('$nik','$nama','$alamat','$telp')");

    if ($input) {
      header('location:data-guru.php');
    }else{
      echo "error".mysqli_errno($input);
      echo "error".mysqli_error($input);
    }

  }
?>