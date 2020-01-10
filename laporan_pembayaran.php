<?php 
	session_start();
	if (isset($_SESSION['login'])) {
		include 'koneksi.php';
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Laporan Pembayaran</title>
 	<style type="text/css">
 		body{
 			font-family: Arial;
 		}

 		@media print{
 			.no-print{
 				display: none;
 			}
 		}

 		table{
 			border-collapse: collapse;
 		}
 	</style>
 </head>
 <body>
 	<h3 align="center">LAPORAN PEMBAYARAN SPP <br> SMK MUHAMMADIYAH PEKALONGAN</h3>
 	<br>
 	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="4">
 		<thead>
 			<tr align="center">
 			<td>NO</td>
	 		<td>NIS</td>
	 		<td>Nama Siswa</td>
	 		<td>Kelas</td>
	 		<td>No Bayar</td>
	 		<td>Pembayaran Bulan</td>
	 		<td>Keterangan</td>
	 		<td>Jumlah</td>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		<?php  
	 			$tgl1 = $_GET['tgl1'];
	 			$tgl2 = $_GET['tgl2'];
	 			$no = 1;
	 			$total = 0;
	 			$laporan = mysqli_query($konek,"SELECT spp.*,siswa.nis,siswa.namasiswa,siswa.kelas FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa WHERE tglbayar BETWEEN '$tgl1' AND '$tgl2' ORDER BY nobayar ASC ");

	 			while ($data = mysqli_fetch_array($laporan)) {
	 				echo "<tr>
	 					<td align='center'>$no</td>
	 					<td align='center'>$data[nis]</td>
	 					<td >$data[namasiswa]</td>
	 					<td align='center'>$data[kelas]</td>
	 					<td align='center'>$data[nobayar]</td>
	 					<td align='left'>$data[bulan]</td>
	 					<td align='center'>$data[ket]</td>
	 					<td align='center'>$data[jumlah]</td>
	 				</tr>";
	 				$no++;
	 				$total += $data['jumlah'];
	 			}
	 		?>
	 		<tr>
	 			<td colspan="7" align="center"><strong>Total</strong></td>
	 			<td align="left"><strong><?php echo $total ?></strong></td>
	 		</tr>
	 	</tbody>
 	</table>

 	<table width="80%" align="center">
 		<tr>
 			<td></td>
 			<td width="200px">
 				<p>Pekalongan, <?php echo date('Y-m-d') ?><br>Operator</p>
 				<br><br>
 				<p>_________________</p>
 				<a href="#" class="no-print" onclick="window.print();">Cetak Laporan</a>
 			</td>
 		</tr>
 	</table>
 	

 </body>
 </html>