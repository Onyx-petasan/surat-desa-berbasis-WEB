<?php 
include '../../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['save']))
 {
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi,"images/".$nama);
	$query = "INSERT INTO tb_tandatangan VALUES ('','$_POST[nama_penandatangan]','$_POST[nip_penandatangan]','$nama')";
	
	if (mysqli_query($koneksi,$query)) {
		echo "<script>alert('data produk telah di simpan');</script>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
	} else {
		echo "<script>alert('data produk gagal ditambahkan');</script>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=tambahproduk'>";
	}
	

	
}
?>
<!-- <?php
// Load file koneksi.php
include '../../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
// Ambil Data yang Dikirim dari Form

$idempat = $_POST['idempatd'];
$nama_penandatangan = $_POST['nama_penandatangan'];
$nip = $_POST['nip_penandatangan'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
	
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "../../assets/images/tandatangan/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$query = "INSERT INTO tb_tandatangan VALUES('".$idempat."', '".$nama_penandatangan."', '".$nip."', '".$fotobaru."')";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo "<script language='JavaScript'>
				alert('Data tandatangan Surat Berhasil diinput!');
				window.location='../../home.php?page=surat-data';
				</script>";
	}else{
		//Jika Gagal, Lakukan :
		echo "<script language='JavaScript'>
				alert('Data tandatangan Surat Gagal diinput!');
				window.location='../../home.php?page=surat-data';
				</script>";
	}

	// Jika gambar gagal diupload, Lakukan :
	echo "<script language='JavaScript'>
				alert('Maaf, Gambar gagal untuk diupload.');
				window.location='../../home.php?page=surat-data';
				</script>";
}
?> -->
