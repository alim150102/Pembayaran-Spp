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
        <h2 class="text-center mt-5">Tambah Walikelas</h2>
        <form method="POST">
          <div class="row">
            <div class="col-md-8 offset-2">
              <div class="form-group">
                <label>Kelas :</label>
                <input type="text" name="kelas" class="form-control rounded-pill mb-4">

                <label>Nama Guru :</label><br>
                <div class="row">
                  <div class="col-md-10">
                    <select name="guru" class="form-control text-center rounded-pill">
                      <option value="" selected class=" text-center">- Pilih Guru -</option>
                      <?php 
                      include 'koneksi.php';

                      $tampil_guru = mysqli_query($konek, "SELECT * FROM guru ORDER BY idguru ASC");
                      while ($data = mysqli_fetch_array($tampil_guru)) {
                        echo "<option value ='$data[idguru]'>$data[namaguru]</option>";
                      }
                      ?>
                    </select>
                  </div>    
                </div>
                <div class="row">
                  <div class="col-md-12 text-center mt-5">
                    <button class="submit" name="simpan" type="submit">Simpan</button>
                  </div>
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

<?php  
  if (isset($_POST['simpan'])) {
    $kelas = $_POST['kelas'];
    $guru = $_POST['guru'];

    $input = mysqli_query($konek, "INSERT INTO walikelas(kelas,idguru) VALUES('$kelas','$guru')");

    if ($input) {
      header('location:data-walikelas.php');
    }
  }
?>