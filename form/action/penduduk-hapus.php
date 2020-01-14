<?php
mysql_query("DELETE FROM tb_penduduk WHERE nik=".$_GET['del']);
echo "<script>alert('Data Penduduk Berhasil Dihapus');</script>";
echo "<script>location='home.php?page=penduduk-data';</script>";
?>