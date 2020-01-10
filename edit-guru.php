<?php 
  session_start();
	if (!isset($_SESSION['login'])) {
		header('location:new_login.php');	
	}

  include 'koneksi.php';
  $id = $_GET['id'];
  $tampil = mysqli_query($konek,"SELECT * FROM guru WHERE idguru = $id");
  while ($data = mysqli_fetch_array($tampil)) {
    $nik = $data['nik'];
    $nama = $data['namaguru'];
    $alamat = $data['alamat'];
    $telp = $data['telp'];

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
        <h2 class="text-center mt-5">Update Data Guru</h2>
        <form method="POST">
          <div class="form-group row">
            <div class="col-md-2 offset-1 mt-1">
              <label>NIK</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="nik" class="form-control rounded-pill" value="<?php echo $nik ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2 offset-1 mt-1">
              <label>Nama</label>
            </div>
            <div class="col-md-7">
              <input type="text" name="nama" class="form-control rounded-pill" value="<?php echo $nama ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2 offset-1 mt-1">
              <label>Alamat</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="alamat" class="form-control rounded-pill" value="<?php echo $alamat ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2 offset-1 mt-1">
              <label>Telepon</label>
            </div>
            <div class="col-md-5">
              <input type="telepon" name="telp" class="form-control rounded-pill" value="<?php echo $telp ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center mt-4  ">
              <button class="submit" type="submit" name="update">Update</button>
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
  if (isset($_POST['update'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $update = mysqli_query($konek,"UPDATE guru SET namaguru='$nama', alamat='$alamat', telp='$telp' WHERE idguru ='$id'");

    if ($update) {
      header('location:data-guru.php');
    }

  }
?>