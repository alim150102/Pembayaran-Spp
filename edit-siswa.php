<?php 
  session_start();
	if (!isset($_SESSION['login'])) {
		header('location:new_login.php');	
	}
  include 'koneksi.php';
  $id = $_GET['id'];
  $tampilSiswa = mysqli_query($konek,"SELECT * FROM siswa WHERE idsiswa = $id");

  while ($data = mysqli_fetch_array($tampilSiswa)) {
    $id = $data['idsiswa'];
    $nis = $data['nis'];
    $nama = $data['namasiswa'];
    $kelasSiswa = $data['kelas'];
    $tahun = $data['tahunajaran'];
    $biaya = $data['biaya'];
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
  <link rel="stylesheet" type="text/css" href="assets/css/input-siswa.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="main col-md-6 offset-3">
        <h2 class="text-center mt-4">Update Siswa</h2>
        <form method="POST">
          <input type="hidden" name="idsiswa" value="<?php echo $id ?>">
          <div class="form-group row">
            <div class="col-md-4 offset-1 mt-1">
              <label>NIS </label>
            </div>
            <div class="col-md-4">
              <input type="text" name="nis" class="form-control rounded-pill" value="<?php echo $nis ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 offset-1 mt-1">
              <label>Nama Siswa</label>
            </div>
            <div class="col-md-5">
              <input type="text" name="namasiswa" class="form-control rounded-pill" value="<?php echo $nama ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 offset-1 mt-1">
              <label>Kelas</label>
            </div>
            <div class="col-md-6">
              <select type="text" name="kelas" class="form-control rounded-pill">
                <?php
                  $sqlKelas = mysqli_query($konek, "select * from walikelas order by kelas ASC");
                  while($k=mysqli_fetch_array($sqlKelas)){

                    if($k['kelas'] == $kelasSiswa){
                      $selected = "selected";
                    }else{
                      $selected ="";
                    }

                    ?>
                    <option value="<?php echo $k['kelas']; ?>" <?php echo $selected; ?>><?php echo $k['kelas']; ?></option>
                    <?php
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 offset-1 mt-1">
              <label>Biaya Pendidikan</label>
            </div>
            <div class="col-md-3">
              <input type="text" name="biaya" class="form-control rounded-pill" value="<?php echo $biaya ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 offset-1 mt-1">
              <label>Tahun Ajaran</label>
            </div>
            <div class="col-md-4">
              <input type="text" name="tahunajaran" class="form-control rounded-pill" value="<?php echo $tahun ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 offset-1 mt-1">
              <label>Jatuh Tempo Awal</label>
            </div>
            <div class="col-md-3">
              <input type="text" name="jatuhtempo" class="form-control rounded-pill" value="2019-07-10" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center mt-2  ">
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
  // if (isset($_POST['simpan'])) {
  //   $nis = $_POST['nis'];
  //   $nama = $_POST['namasiswa'];
  //   $kelas = $_POST['kelas'];
  //   $biaya = $_POST['biaya'];
  //   $tahun= $_POST['tahunajaran'];
  //   $awaltempo = $_POST['jatuhtempo'];

  //   $bulanindo = array(
  //       '01' => 'Januari',
  //       '02' => 'Februari',
  //       '03' => 'Maret',
  //       '04' => 'April',
  //       '05' => 'Mei',
  //       '06' => 'Juni',
  //       '07' => 'Juli',
  //       '08' => 'Agustus',
  //       '09' => 'September',
  //       '10' => 'Oktober',
  //       '11' => 'November',
  //       '12' => 'Desember',
  //   );

  //   $input = mysqli_query($konek, "INSERT INTO siswa(nis,namasiswa,kelas,tahunajaran,biaya,jatuhtempo,) VALUES('$nis','$nama','$kelas','$tahun','$biaya','$awaltempo')");

  //   if ($input) {
  //     //ambil id siswa
  //     $siswa = mysqli_query($konek,"SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1");
  //     $datasiswa = mysqli_fetch_array($siswa);
  //     $idsiswa = $datasiswa['idsiswa'];

  //     for ($i=0; $i <12 ; $i++) { 
  //       $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

  //       $bulan = $bulanindo[date('m', strtotime($jatuhtempo))]." ".date('Y',strtotime($jatuhtempo));

  //       mysqli_query($konek,"INSERT INTO spp(idsiswa,jatuhtempo,bulan,jumlah) VALUES('$idsiswa','$jatuhtempo','$bulan','$biaya')");
  //     }

  //     header('location:data-siswa.php');
  //   }else{
  //     echo "error";
  //   }

  // }
?>

<!-- simpan data -->
<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){

  //variabel untuk menampung inputan dari form
  $id   = $_POST['idsiswa'];
  $nis  = $_POST['nis'];
  $nama   = $_POST['namasiswa'];
  $kelas  = $_POST['kelas'];
  $tahun  = $_POST['tahunajaran'];
  $biaya  = $_POST['biaya'];

  if($nis=='' || $nama =='' || $kelas==''){
    echo "Form Belum lengkap....";
  }else{
    $update = mysqli_query($konek, "UPDATE siswa SET nis='$nis',namasiswa='$nama',kelas='$kelas',tahunajaran='$tahun',biaya='$biaya'WHERE idsiswa='$id'");

    if(!$update){
      echo "Update data gagal...";

    }else{
      header('location:data-siswa.php');
    }
  }
}
?>
