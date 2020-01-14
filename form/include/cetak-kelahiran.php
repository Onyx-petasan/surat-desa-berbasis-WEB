<?php

session_start();
    include "../../koneksi.php"; // memanggil koneksi

     if(@$_SESSION['admin']) { //apabila sessionnya admin
     	$userlogin = @$_SESSION['admin'];

     } else {
     	header("location: login.php");

     }

     // menuliskan query mysql dimana kode_user = $userlogin
     // yaitu session pada script di atas
     $sql = mysql_query("select * from tb_pengguna where id = '$userlogin'") or die(mysql_error());
     
     //menjadikan data sebagai arrray
     $data = mysql_fetch_array($sql);

     $desa= mysql_query('SELECT * FROM tb_desa');
     $dades = mysql_fetch_array($desa);
     $tata= mysql_query('SELECT * FROM tb_tandatangan');
     $ta = mysql_fetch_array($tata);
     $dasu= mysql_query("SELECT * FROM tb_kelahiran WHERE id_kelahiran='$_GET[id]'");
     $st = mysql_fetch_array($dasu);
     $id=$st[id_kelahiran];
     $surat= mysql_query ('
     	SELECT
          k.id_kelahiran,
          k.id_kategori,
          k.no_surat,
          k.nama_anak nama_anak,
          k.tempat_lahir,
          k.jenis_kelamin,
          k.tanggal_lahir tanggal_lahir_anak,
          k.waktu_lahir waktu_lahir_anak,
          k.tanggal,
          k.status,
          ks.nama_kategori,
          k.nik_ibu,
          i.nama nama_ibu,
          i.tempat_lahir tem_ibu,
          i.tanggal_lahir tgl_ibu,
          i.pekerjaan pekerjaan_ibu,
          i.alamat alamat_ibu,
          k.nik_ayah,
          a.nama nama_ayah,
          a.tempat_lahir tem_ayah,
          a.tanggal_lahir tgl_ayah,
          a.pekerjaan pekerjaan_ayah,
          a.alamat alamat_ayah,
          isi.isi_surat
          FROM
          tb_kelahiran k
          LEFT JOIN tb_penduduk i ON (i.nik = k.nik_ibu)
          LEFT JOIN tb_penduduk a ON (a.nik = k.nik_ayah)
          LEFT JOIN tb_kategori_surat ks ON (
          ks.id_kategori_surat = k.id_kategori
          )
          LEFT JOIN tb_isi_surat isi ON (
          isi.id_kategori_surat = ks.id_kategori_surat
     )

     WHERE
     k.id_kelahiran = "'.$id.'"

     ');
     $isu = mysql_fetch_array($surat);

     date_default_timezone_set('Asia/Jakarta');
     $h = date('l', strtotime($isu['tanggal_lahir_anak']));
     $t = date('d', strtotime($isu['tanggal_lahir_anak']));
     $b = date('F', strtotime($isu['tanggal_lahir_anak']));
     $th = date('Y', strtotime($isu['tanggal_lahir_anak']));
     $hi = array(
          'Sunday' => 'Minggu', 
          'Monday' => 'Senin',
          'Tuesday' => 'Selasa',
          'Wednesday' => 'Rabu',
          'Thursday' => 'Kamis',
          'Friday' => 'Jumat',
          'Saturday' => 'Sabtu'
     );
     $bi = array(
     	'January' => 'Januari',
     	'February' => 'Februari',
     	'March' => 'Maret',
     	'April' => 'April',
     	'May' => 'Mei',
     	'June' => 'Juni',
     	'July' => 'Juli',
     	'August' => 'Agustus',
     	'September' => 'September',
     	'October' => 'Oktober',
     	'November' => 'November',
     	'December' => 'Desember'
     );
     $t_ibu = date('d', strtotime($isu['tgl_ibu']));
     $b_ibu = date('F', strtotime($isu['tgl_ibu']));
     $th_ibu = date('Y', strtotime($isu['tgl_ibu']));
     $bi_ibu = array(
     	'January' => 'Januari',
     	'February' => 'Februari',
     	'March' => 'Maret',
     	'April' => 'April',
     	'May' => 'Mei',
     	'June' => 'Juni',
     	'July' => 'Juli',
     	'August' => 'Agustus',
     	'September' => 'September',
     	'October' => 'Oktober',
     	'November' => 'November',
     	'December' => 'Desember'

     );
     $t_ayah = date('d', strtotime($isu['tgl_ayah']));
     $b_ayah = date('F', strtotime($isu['tgl_ayah']));
     $th_ayah = date('Y', strtotime($isu['tgl_ayah']));
     $bi_ayah = array(
     	'January' => 'Januari',
     	'February' => 'Februari',
     	'March' => 'Maret',
     	'April' => 'April',
     	'May' => 'Mei',
     	'June' => 'Juni',
     	'July' => 'Juli',
     	'August' => 'Agustus',
     	'September' => 'September',
     	'October' => 'Oktober',
     	'November' => 'November',
     	'December' => 'Desember'

     );
     ?>


     <!DOCTYPE html>
     <html>
     <head>
     	<link rel="shortcut icon" href="../../assets/images/indramayu.png"/>
     	<title>Cetak Surat</title>
     	<style type="text/css" media="print">
     		@page { margin: 0; }
     		body { 
     			margin-top: 2cm;
     			margin-left: 2cm;
     			margin-right: 2cm;
     			margin-bottom: 2cm;
     			font-family: "Times New Roman", Times, serif;
     		}
     	</style>
     </head>
     <body>

     	<table align="center">
     		<tr>
     			<td>
     				<img src="../../assets/images/logo/<?=$dades['logo']?>" width="100" height="100">
     			</td>
     			<td width="600" align="center">
     				<div class="header">
     					<div align="center" style="font-size: 15pt;"><b>PEMERINTAHAN KABUPATEN <?= strtoupper($dades['nama_kabupaten'])?></b></div>
     					<div align="center" style="font-size: 15pt;"><b>KECAMATAN <?= strtoupper($dades['nama_kecamatan'])?></b></div>
     					<div align="center" style="font-size: 15pt;"><b>DESA <?= strtoupper($dades['nama_desa'])?></b></div>
     					<div align="center" style="font-size: 8pt;">Alamat : <?= $dades['alamat_desa']?></div>
     					<div align="center" style="font-size: 8pt;"><?=$dades['keterangan_lain']?></div>
     				</div>
     			</td>
     		</tr>
     	</table><div><hr size="2px" color="black"></div><br>
     	<table align="center">
     		<tr>
     			<td align="center">
     				<b><u><?=$isu['nama_kategori']?></u></b><br>
     				Nomor : <?=$isu['no_surat']?>
     			</td>
     		</tr>
     	</table><br>
     	<table align="center">
     		<tr>
     			<td style="text-align: justify;">
     				Yang bertanda tangan di bawah ini Kepala Desa <?= ucwords($dades['nama_desa'])?> Kecamatan <?= ucwords($dades['nama_kecamatan'])?> menerangkan dengan sesungguhnya bahwa Pada: 
     			</td>

     		</tr>
     	</table><br>
     	<table>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hari
     			</td>
     			<td style="text-align: justify;">
     				: <?php echo $hi[$h]  ?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal
     			</td>
     			<td style="text-align: justify;">
     				: <?php echo $t . " " . $bi[$b] . " " . $th; ?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pukul / Jam
     			</td>
     			<td style="text-align: justify;">
     				: <?= ucwords($isu['waktu_lahir_anak'])?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat Lahir
     			</td>
     			<td style="text-align: justify;">
     				: <?= ucwords($isu['tempat_lahir'])?>
     			</td>
     		</tr>
     	</table><br>
     	<table>
     		<tr>
     			<td>
     				<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telah Lahir Seorang Anak</b>
     			</td>
     		</tr>
          </table>
          <table>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bernama
     			</td>
     			<td style="text-align: justify;">
     				: <?= ucwords($isu['nama_anak'])?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin
     			</td>
     			<td style="text-align: justify;">
     				: <?= ucwords($isu['jenis_kelamin'])?>
     			</td>
     		</tr>
     	</table><br>
     	<table>
     		<tr>
     			<td align="margin-left">
     				<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dari Seorang Ibu</b>

     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Lengkap
     			</td>

     			<td style="text-align: justify;">
     				: <?= ucwords($isu['nama_ibu'])?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK
     			</td>

     			<td style="text-align: justify;">
     				: <?=$isu['nik_ibu']?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat, Tanggal Lahir
     			</td>
     			<td style="text-align: justify;">
     				: <?=$isu['tem_ibu']?>, <?php echo $t_ibu . " " . $bi_ibu[$b_ibu] . " " . $th_ibu; ?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan
     			</td>

     			<td style="text-align: justify;">
     				: <?=$isu['pekerjaan_ibu']?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat
     			</td>
     			<td style="text-align: justify;">
     				: <?=$isu['alamat_ibu']?>
     			</td>
     		</tr>
     	</table><br>
     	<table>
     		<tr>
     			<td align="margin-left">
     				<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Istri Dari</b>

     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Lengkap
     			</td>

     			<td style="text-align: justify;">
     				: <?= ucwords($isu['nama_ayah'])?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK
     			</td>

     			<td style="text-align: justify;">
     				: <?=$isu['nik_ayah']?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat, Tanggal Lahir
     			</td>
     			<td style="text-align: justify;">
     				: <?=$isu['tem_ayah']?>, <?php echo $t_ayah . " " . $bi_ayah[$b_ayah] . " " . $th_ayah; ?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan
     			</td>

     			<td style="text-align: justify;">
     				: <?=$isu['pekerjaan_ayah']?>
     			</td>
     		</tr>
     		<tr>
     			<td align="margin-left" width="200">
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat
     			</td>
     			<td style="text-align: justify;">
     				: <?=$isu['alamat_ayah']?>
     			</td>
     		</tr>
     	</table>
     	<table>
     		<tr>
     			<td style="text-align: justify;">
     				<?=$isu['isi_surat']?>
     			</td>

     		</tr>
     	</table><br>
     	<table align="right">
     		<tr>
     			<td style="text-align: center;">
     				<?= ucwords($dades['nama_desa'])?>, <?php include"format_tanggal.php"; echo tgl_indonesia(date('Y-m-d')) ?><br>
     				Kepala Desa<br>
     				<img src="../../assets/images/tandatangan/<?=$ta['isi_tandatangan']?>" width="100" height="100"><br>
     				<b><u><?=$ta['nama_penandatangan']?></u></b><br>
     				<?=$ta['nip_penandatangan']?>
     			</td>

     		</tr>
     	</table><br>

     	<script>
     		window.print();
     	</script>
     </body>
     </html>
