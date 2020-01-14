<?php
mysql_query("DELETE FROM tb_desa WHERE id_desa=".$_GET['del']);

echo "<script>alert('Data Desa Berhasil Dihapus');</script>";
echo "<script>location='home.php?page=desa-data';</script>";
?>