<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/transaksi.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="main col-md-8">
        <form method="GET">
          <div class="form-group row mt-2">
            <input type="text" name="nis" placeholder="Masukan Nomor Induk Siswa" class="form-control-plaintext col-md-7 offset-1 ">
            <button class="btn submit col-md-3" name="cari" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <?php
      if(isset($_GET['nis']) && $_GET['nis']!=''){
        $sqlSiswa = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
        $ds=mysqli_fetch_array($sqlSiswa);
        $nis = $ds['nis'];
      ?>

      <h2 class="text-center mt-4 mb-3">Tagihan SPP <?php echo $ds['namasiswa']; ?></h2>
      <div class="row">
        <div class="col-sm-8 offset-2">
          <table id="transaksi" class="table table-bordered table-sm table-hover text-center shadow">
            <thead id="thead">
              <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Tgl. Bayar</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Bayar</th>
              </tr>
            </thead>
            <tbody id="tbody">
            <?php
            $sql = mysqli_query($konek, "SELECT * FROM spp WHERE idsiswa='$ds[idsiswa]' ORDER BY jatuhtempo ASC");
            $no=1;
            while($d=mysqli_fetch_array($sql)){
              echo "<tr>
                <td>$no</td>
                <td>$d[bulan]</td>
                <td>$d[tglbayar]</td>
                <td>$d[jumlah]</td>
                <td>$d[ket]</td>
                <td align='center'>";
                  if($d['nobayar']==''){
                    echo "<a href='proses_transaksi.php?nis=$nis&act=bayar&id=$d[idspp]'>Bayar</a>";
                  }else{
                    echo "-";
                  }
                echo "</td>
              </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>

      <?php
    }
  ?>
  </div>
  <div class="container">
    <a href="dashboard.php" class="kembali">Kembali</a>
  </div>
  <div>
    <p class="text-center mt-1">SMK MUHAMMADIYAH PEKALONGAN</p>
  </div>
</body>
</html>
