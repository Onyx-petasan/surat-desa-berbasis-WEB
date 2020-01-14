<?php
include '../../koneksi.php';

date_default_timezone_set('Asia/Jakarta');

    if(!empty($_GET['actionempat'])){
        //proses kategori
        if($_GET['actionempat']=='tandatangan'){
            //simpan
            if(!empty($_POST['submitempat'])){ //jika GET_act maka masok 
                if($_POST['submitempat'] == 'Simpan'){ //jika submit bernilai simpan maka masok

                    $foto = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];
                        
                    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
                    $fotobaru = date('dmYHis').$foto;

                    // Set path folder tempat menyimpan fotonya
                    $path = "../../assets/images/tandatangan/".$fotobaru;

                    // Proses upload
                    if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak

                        $SQL =mysql_query( 
                            "INSERT INTO tb_tandatangan (nama_penandatangan,nip_penandatangan,isi_tandatangan)
                                VALUES ('$_POST[nama_penandatangan]','$_POST[nip_penandatangan]','$fotobaru')"
                            ); //sql untuk menyimpan data kategori
                        
                        if ($SQL) { //jika simpan berhasil maka menampilkan alert dan kembali 
                            echo" <script language='JavaScript'>
                                alert('Data Tandatangan Berhasil diinput!');
                                window.location='../../home.php?page=surat-data';
                                </script>";
                        }
                    }
                }
                //UBAH
                else if($_POST['submitempat'] == 'Ubah'){ //jika submit bernilai ubah maka masok
                    $foto = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];
                        
                    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
                    $fotobaru = date('dmYHis').$foto;

                    // Set path folder tempat menyimpan fotonya
                    $path = "../../assets/images/tandatangan/".$fotobaru;

                    // Proses upload
                    if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                        $SQL =mysql_query("
                            UPDATE 
                                tb_tandatangan
                            SET 
                                nama_penandatangan = '$_POST[nama_penandatangan]',
                                nip_penandatangan  = '$_POST[nip_penandatangan]',
                                isi_tandatangan    = '$fotobaru'
                            WHERE 
                                id_tandatangan     = '$_POST[idempat]'
                            "); //sql untuk merubah data kategori
                        if ($SQL) { //jika ubah berhasil maka menampilkan alert dan kembali 
                            echo" <script language='JavaScript'>
                                alert('Data Tandatangan Berhasil diubah!');
                                window.location='../../home.php?page=surat-data';
                                </script>";
                        }else{
                            //Jika Gagal
                        echo "Data Tandatangan Gagal diinput, Silahkan diulangi!"; 
                        }
                    } 
                    
                }
            }
            
            //DELETE 
            elseif(!empty($_GET['del'] OR $_GET['del']==0)){ //jika ada GET bernilai del atau del berisi nol maka masok proses hapus
                mysql_query("DELETE FROM tb_tandatangan WHERE id_tandatangan=".$_GET['del']); //pokoke proses delete
                echo '<script>window.location=history.go(-1)</script>'; // balik maning
            }else{ 
               echo '<script>window.location=history.go(-1)</script>'; //jika tidak act dan del maka balik
            }
        }
            //proes kategori mandeg
    }

?>