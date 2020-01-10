<?php 
  session_start();
	if (!isset($_SESSION['login'])) {
		header('location:new_login.php');	
	}
  include 'koneksi.php';
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
        <h2 class="text-center mt-4">Tambah Data Siswa</h2>
        <form method="POST">
          <div class="form-group row">
            <div class="col-md-4 offset-1 mt-1">
              <label>NIS </label>
            </div>
            <div class="col-md-4">
              <input type="text" name="nis" class="form-control rounded-pill">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 offset-1 mt-1">
              <label>Nama Siswa</label>
            </div>
            <div class="col-md-5">
              <input type="text" name="namasiswa" class="form-control rounded-pill">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 offset-1 mt-1">
              <label>Kelas</label>
            </div>
            <div class="col-md-6">
              <select type="text" name="kelas" class="form-control rounded-pill">
                <option value="" selected>- Pilih Kelas -</option>
                <?php  
                  $kelas = mysqli_query($konek, "SELECT * FROM walikelas ORDER BY kelas ASC");
                  while ($data = mysqli_fetch_array($kelas)) {
                ?>
                  <option value="<?php echo $data['kelas']; ?>"><?php echo $data['kelas']; ?></option>
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
              <input type="text" name="biaya" class="form-control rounded-pill" value="420000" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 offset-1 mt-1">
              <label>Tahun Ajaran</label>
            </div>
            <div class="col-md-4">
              <input type="text" name="tahunajaran" class="form-control rounded-pill" value="2019/2020" readonly>
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
  //   $nama = $_POST['nama'];
  //   $kelas = $_POST['kelas'];
  //   $biaya = $_POST['biaya'];
  //   $tahun= $_POST['tahun'];
  //   $awaltempo = $_POST['tempo'];

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
    $nis  = $_POST['nis'];
    $nama   = $_POST['namasiswa'];
    $kelas  = $_POST['kelas'];
    $tahun  = $_POST['tahunajaran'];
    $biaya  = $_POST['biaya'];
    $awaltempo = $_POST['jatuhtempo'];

    // Membuat Array untuk menampung bulan bahasa indonesia
    $bulanIndo = array(
      '01' => 'Januari',
      '02' => 'Februari',
      '03' => 'Maret',
      '04' => 'April',
      '05' => 'Mei',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'Agustus',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'Desember'
    );


    //proses simpan
    if($nis=='' || $nama=='' || $kelas==''){
      echo "Form belum lengkap...";
    }else{
      $simpan = mysqli_query($konek, "insert into siswa(nis,namasiswa,kelas,tahunajaran,biaya)
          values('$nis','$nama','$kelas','$tahun','$biaya')");
      if(!$simpan){
        echo "Penyimpanan data gagal..";
      }else{
        //ambil data id siswa terakhir
        $ds=mysqli_fetch_array(mysqli_query($konek, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
        $idsiswa = $ds['idsiswa'];

        //membuat tagihan (12 bulan dimulai dari Juli 2017 dan menyimpan tagihan di tabel spp
        for($i=0; $i<12; $i++){
          //membuat tanggal jatuh tempo nya setiap tanggal 10
          $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

          $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))]." ".date('Y',strtotime($jatuhtempo));

          mysqli_query($konek, "INSERT INTO spp(idsiswa,jatuhtempo,bulan,jumlah)
                values('$idsiswa','$jatuhtempo','$bulan','$biaya')");
        }

        header('location:data-siswa.php');
      }
    }

  }
?>
