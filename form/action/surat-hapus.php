<?php
mysql_query("DELETE FROM tb_surat WHERE id_surat=".$_GET['del']);

echo "<script>alert('Data Surat Berhasil Dihapus');</script>";
echo "<script>location='home.php?page=pengguna-data';</script>";
?>