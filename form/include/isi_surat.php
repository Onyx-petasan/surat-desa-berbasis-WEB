<?php
include '../../koneksi.php';

date_default_timezone_set('Asia/Jakarta');

if(!empty($_GET['actiontiga'])){
    //proses kategori
    if($_GET['actiontiga']=='isisurat'){
        //simpan
        if(!empty($_POST['submittiga'])){ //jika GET_act maka masok 
            if($_POST['submittiga'] == 'Simpan'){ //jika submit bernilai simpan maka masok
                $SQL =mysql_query( 
                    "INSERT INTO tb_isi_surat (id_kategori_surat,isi_surat)
                        VALUES ('$_POST[kategoritiga]','$_POST[isi_surat]')"
                    ); //sql untuk menyimpan data kategori
                if ($SQL) { //jika simpan berhasil maka menampilkan alert dan kembali 
                    echo" <script language='JavaScript'>
                        alert('Data Isi Surat Berhasil diinput!');
                        window.location='../../home.php?page=surat-data';
                        </script>";
                }
            }
            //UBAH
            else if($_POST['submittiga'] == 'Ubah'){ //jika submit bernilai ubah maka masok
                $SQL =mysql_query("
                    UPDATE 
                        tb_isi_surat
                    SET 
                        id_kategori_surat = '$_POST[kategoritiga]',
                        isi_surat         = '$_POST[isi_surat]'
                    WHERE id_isi_surat    = '$_POST[idtiga]'
                    "); //sql untuk merubah data kategori
                if ($SQL) { //jika ubah berhasil maka menampilkan alert dan kembali 
                    echo" <script language='JavaScript'>
                        alert('Data Isi Surat Berhasil diubah!');
                        window.location='../../home.php?page=surat-data';
                        </script>";
                }
            }
            else {
            //Jika Gagal
            echo "Data Isi Surat Gagal diinput, Silahkan diulangi!"; 
            }
        }
        //DELETE 
        elseif(!empty($_GET['del'] OR $_GET['del']==0)){ //jika ada GET bernilai del atau del berisi nol maka masok proses hapus
            mysql_query("DELETE FROM tb_isi_surat WHERE id=".$_GET['del']); //pokoke proses delete
            echo '<script>window.location=history.go(-1)</script>'; // balik maning
        }
        else{ 
           echo '<script>window.location=history.go(-1)</script>'; //jika tidak act dan del maka balik
        }
    }
    //proes kategori mandeg
}
?>