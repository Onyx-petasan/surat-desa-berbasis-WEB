<?php
include "../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
// include "fungsi-romawi.php";
//     $bulan    = date('n');
//     $romawi    = getRomawi($bulan);
//     $tahun     = date ('Y');
//     $nomor     = "/KDW/".$romawi."/".$tahun;

//     $hasil = mysql_query("SELECT max (id_kategori) as maxKode FROM tb_surat WHERE month(tanggal)='$bulan'");
//     $data  = mysql_fetch_array($hasil);
//     $no= $data['maxKode'];
//     $noUrut= $no + 1;
    
//     //membuat Nomor Surat Otomatis dengan awalan depan 0 misalnya , 01,02 
//     //jika ingin 003 ,tinggal ganti %03
//     $kode =  sprintf("%03s", $noUrut);
//     $nomorbaru = $kode.$nomor;
?>
<?php
$ks=mysql_query("SELECT * FROM tb_kategori_surat WHERE id_kategori_surat='1'");
$data = mysql_fetch_array($ks);

$sql = mysql_query("SELECT no FROM tb_surat ORDER BY no DESC");
$no = mysql_fetch_array($sql);
echo $no[no];

$cek = mysql_fetch_array(mysql_query("SELECT no FROM tb_surat ORDER BY id_surat DESC LIMIT 1"));
$ex = explode('/', $cek[no_surat]);

if (date('d')=='01'){ $b = '01'; }
else { $b = sprintf("%03d", $ex[0]+1); }
// if (date('d')=='01'){ $b = '001'; }
// else{ $b = $ex[0]+1; }
$a = $data[kode_surat];
$c = $data[kode_desa];
$d = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
$e = date('Y');
$no_surat = $b.'/'.$c.'/'.$d[date('n')].'/'.$e;
echo "<br>";
echo "<br>";
echo $no_surat;

?>
