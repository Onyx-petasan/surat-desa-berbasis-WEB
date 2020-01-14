<?php
include '../../koneksi.php';

date_default_timezone_set('Asia/Jakarta');

    if(!empty($_GET['actionsatu'])){
        //proses kategori
        if($_GET['actionsatu']=='kategorisatu'){
            //simpan
            if(!empty($_POST['submitsatu'])){ //jika GET_act maka masok 
                if($_POST['submitsatu'] == 'Simpan'){ //jika submit bernilai simpan maka masok
                    $SQL =mysql_query( 
                        "INSERT INTO tb_kategori_surat (nama_kategori,kode_surat,kode_desa)
                            VALUES ('$_POST[kategorisatu]','$_POST[kode_surat]','$_POST[kode_desa]')"
                        ); //sql untuk menyimpan data kategori
                    if ($SQL) { //jika simpan berhasil maka menampilkan alert dan kembali 
                        echo" <script language='JavaScript'>
                            alert('Data kategori Surat Berhasil diinput!');
                            window.location='../../home.php?page=surat-data';
                            </script>";
                    }
                }
                //UBAH
                else if($_POST['submitsatu'] == 'Ubah'){ //jika submit bernilai ubah maka masok
                    $SQL =mysql_query("
                        UPDATE 
                            tb_kategori_surat
                        SET 
                            nama_kategori     = '$_POST[kategorisatu]',
                            kode_surat        = '$_POST[kode_surat]',
                            kode_desa         = '$_POST[kode_desa]'
                        WHERE 
                            id_kategori_surat = '$_POST[idsatu]'
                        "); //sql untuk merubah data kategori
                    if ($SQL) { //jika ubah berhasil maka menampilkan alert dan kembali 
                        echo" <script language='JavaScript'>
                            alert('Data Kategori Surat Berhasil diubah!');
                            window.location='../../home.php?page=surat-data';
                            </script>";
                    }
                }
                else {
                //Jika Gagal
                echo "Data Kategori Surat Gagal diinput, Silahkan diulangi!"; 
                }
            }
            //DELETE 
            elseif(!empty($_GET['del'] OR $_GET['del']==0)){ //jika ada GET bernilai del atau del berisi nol maka masok proses hapus
                mysql_query("DELETE FROM tb_kategori_surat WHERE id_kategori_surat=".$_GET['del']); //pokoke proses delete
                echo '<script>window.location=history.go(-1)</script>'; // balik maning
            }
            else{ 
               echo '<script>window.location=history.go(-1)</script>'; //jika tidak act dan del maka balik
            }
        }
        //proes kategori mandeg
    }
?>