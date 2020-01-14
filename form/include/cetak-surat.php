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
 $dasu= mysql_query("SELECT * FROM tb_surat WHERE id_surat='$_GET[id]'");
 $st = mysql_fetch_array($dasu);
 $id=$st[id_surat];
 $surat= mysql_query ('
	SELECT
	    ts.*,
	    tks.nama_kategori,
	    tp.nik,
	    tp.nama,
	    tp.tempat_lahir,
	    tp.tanggal_lahir,
	    tp.status_perkawinan,
	    tp.agama,
	    tp.jenis_kelamin,
	    tp.pekerjaan,
	    tp.alamat,
	    tp.kewarganegaraan,
	    tis.isi_surat
	FROM
	    tb_surat ts,
	    tb_isi_surat tis,
	    tb_kategori_surat tks,
	    tb_penduduk tp
	WHERE
		ts.id_surat 		  = "'.$id.'"
	AND ts.id_kategori        = tis.id_kategori_surat
	AND tis.id_kategori_surat = tks.id_kategori_surat
	AND ts.nik                = tp.nik
 ');
 $isu = mysql_fetch_array($surat);


 	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('d', strtotime($isu['tanggal_lahir']));
    $bulan = date('F', strtotime($isu['tanggal_lahir']));
    $tahun = date('Y', strtotime($isu['tanggal_lahir']));
    $bulanIndo = array(
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
						<div align="center" style="font-size: 15pt;"><b>DESA <?= strtoupper($dades['nama_desa'])?></b></div><br>
						<div align="center" style="font-size: 8pt;">Alamat : <?= $dades['alamat_desa']?></div>
						<div align="center" style="font-size: 8pt;"><?=$dades['keterangan_lain']?></div>
					</div>
				</td>
			</tr>
		</table><div><hr size="1px" color="black"><hr size="2px" color="black"></div><br>
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
					Yang bertanda tangan di bawah ini Kepala Desa <?= ucwords($dades['nama_desa'])?> Kecamatan <?= ucwords($dades['nama_kecamatan'])?> menerangkan dengan sesungguhnya bahwa : 
				</td>
				
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="margin-left" width="200">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Lengkap
				</td>
				
				<td style="text-align: justify;">
					: <?= ucwords($isu['nama'])?>
				</td>
			</tr>
			<tr>
				<td align="margin-left" width="200">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK
				</td>
				
				<td style="text-align: justify;">
					: <?=$isu['nik']?>
				</td>
			</tr>
			<tr>
				<td align="margin-left" width="200">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat, Tanggal Lahir
				</td>
				<td style="text-align: justify;">
					: <?=$isu['tempat_lahir']?>, <?php echo $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?>
				</td>
			</tr>
			<tr>
				<td align="margin-left" width="200">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin
				</td>
				
				<td style="text-align: justify;">
					: <?=$isu['jenis_kelamin']?>
				</td>
			</tr>
			<tr>
				<td align="margin-left" width="200">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kewarganegaraan
				</td>
				
				<td style="text-align: justify;">
					: <?=$isu['kewarganegaraan']?>
				</td>
			</tr>
			<tr>
				<td align="margin-left" width="200">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agama
				</td>
				
				<td style="text-align: justify;">
					: <?=$isu['agama']?>
				</td>
			</tr>
			<tr>
				<td align="margin-left" width="200">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan
				</td>
				
				<td style="text-align: justify;">
					: <?=$isu['pekerjaan']?>
				</td>
			</tr>
			<tr>
				<td align="margin-left" width="200">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status Perkawinan
				</td>
				
				<td style="text-align: justify;">
					: <?=$isu['status_perkawinan']?>
				</td>
			</tr>
			<tr>
				<td align="margin-left" width="200">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat
				</td>
				<td style="text-align: justify;">
					: <?=$isu['alamat']?>
				</td>
			</tr>
		</table><br>
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
