<?php 
	include 'koneksi.php';
	$result = mysqli_query($konek,"SELECT * FROM siswa ORDER BY kelas ASC");
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
  <link rel="stylesheet" type="text/css" href="assets/css/laporan.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	    <div class="row">
	      <div class="main col-md-6 offset-3">
	        <h2 class="text-center mt-3">Laporan Pembayaran</h2>
	        <form method="GET" action="laporan_pembayaran.php" target="_blank">
	          <div class="row">
	            <div class="col-md-10 offset-1">
	              <div class="form-group row">
	              	<div class="col-md-4">
	              		<label>Dari Tanggal</label>
	              	</div>
	              	<div class="col-md-8">
	              		<input type="date" class="form-control rounded-pill" name="tgl1" value="<?php echo date('Y-m-d') ?>">
	              	</div>
	              </div>
	               <div class="form-group row">
	              	<div class="col-md-4">
	              		<label>Sampai Tanggal</label>
	              	</div>
	              	<div class="col-md-8">
	              		<input type="date" class="form-control rounded-pill" name="tgl2" value="<?php echo date('Y-m-d') ?>">
	              	</div>
	              </div>
	              <div class="clearfixs">
	              	<div class="float-right">
	              		<button class="submit" type="submit" >Tampilkan</button>
	              	</div>
	              </div>
	            </div>
	          </div>
	        </form>
	      </div>
	    </div>
	</div>
</body>
</html>
