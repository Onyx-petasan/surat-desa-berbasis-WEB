<?php
  if($_POST['submitsatu'] == 'Simpan'){ //jika submit bernilai simpan maka masok
    $SQL =mysql_query( "INSERT INTO tb_kategori_surat (nama_kategori)
      VALUES ('$_POST[kategorisatu]')"
      ); //sql untuk menyimpan data pengguna
      if ($SQL) { //jika simpan berhasil maka menampilkan alert dan kembali 
        echo" <script language='JavaScript'>
              alert('Data Kategori Surat Berhasil diinput!');
              window.location='../../home.php?page=surat-data';
              </script>";
      }
  }
?>