<?php
mysql_query("DELETE FROM tb_pengguna WHERE id=".$_GET['del']);

echo "<script>alert('Data Pengguna Berhasil Dihapus');</script>";
echo "<script>location='home.php?page=pengguna-data';</script>";
?>