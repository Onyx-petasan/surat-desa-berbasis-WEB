<?php
include '../../koneksi.php';
// include "../../no-surat-otomatis/nosurat.php";
date_default_timezone_set('Asia/Jakarta');
$tgl = date("Y-m-d");
    if(!empty($_GET['action'])){
        //proses kategori
        if($_GET['action']=='buatsurat'){
            //simpan
            if(!empty($_POST['submit'])){ //jika GET_act maka masok 
                if($_POST['submit'] == 'Simpan'){ //jika submit bernilai simpan maka masok
                    $ks=mysql_query("SELECT * FROM tb_kategori_surat WHERE id_kategori_surat='$_POST[idks]'");
                    $data = mysql_fetch_array($ks);
                    $cek=mysql_query("SELECT * FROM tb_surat WHERE no IN (SELECT MAX(no) FROM tb_surat)");
                    $nom = mysql_fetch_array($cek);
                    echo "$nom[no] <br>";
                    // $ex = explode('/', $cek[no]);
                    // if (date('d')=='01'){ $b = '01'; }
                    // else { $b = sprintf("%03d", $ex[0]+1); }
                    
                    // $sql = mysql_query("SELECT no FROM tb_surat ORDER BY no DESC");
                    // $no = mysql_fetch_array($sql);
                    // $n = $no[no];
                    $f = $nom[no];
                    $b = $f+1;
                    echo "$b <br>";
                    $g = sprintf("%03d", $b);
                    echo "$g";
                    $a = $data[kode_surat];
                    $c = $data[kode_desa];
                    $d = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
                    $e = date('Y');
                    $no_surat = $a.'.'.$g.'/'.$c.'/'.$d[date('n')].'/'.$e;
                    // echo $no_surat;
                    
                    $SQL =mysql_query( 
                        "INSERT INTO tb_surat (id_kategori,no,no_surat,tanggal,nik,status)
                            VALUES ('$_POST[idks]','$b','$no_surat','$tgl','$_POST[nik]','Belum')"
                        ); //sql untuk menyimpan data kategori
                    if ($SQL) { //jika simpan berhasil maka menampilkan alert dan kembali 
                        echo" <script language='JavaScript'>
                            alert('Data Surat Berhasil disimpan!');
                            window.location='../../home.php?page=surat-buat';
                            </script>";
                    }
                }
                //UBAH
                else if($_POST['submit'] == 'Ubah'){ //jika submit bernilai ubah maka masok
                    $SQL =mysql_query("
                        UPDATE 
                            tb_kode_surat
                        SET 
                            kode_surat      = '$_POST[kode_surat]',
                            kode_desa       = '$_POST[kode_desa]'
                        WHERE id_surat = '$_POST[iddua]'
                        "); //sql untuk merubah data kategori
                    if ($SQL) { //jika ubah berhasil maka menampilkan alert dan kembali 
                        echo" <script language='JavaScript'>
                            alert('Data Kode Surat Berhasil diubah!');
                            window.location='../../home.php?page=surat-data';
                            </script>";
                    }
                }
                else {
                //Jika Gagal
                echo "Data Kode Surat Gagal diinput, Silahkan diulangi!"; 
                }
            }
            //DELETE 
            elseif(!empty($_GET['del'] OR $_GET['del']==0)){ //jika ada GET bernilai del atau del berisi nol maka masok proses hapus
                mysql_query("DELETE FROM tb_surat WHERE id_surat=".$_GET['del']); //pokoke proses delete
                echo" <script language='JavaScript'>
                    alert('Data Kode Surat Berhasil dihapus!');
                    window.location='../../home.php?page=surat-buat';
                    </script>"; // balik maning
            }
            else{ 
               echo '<script>window.location=history.go(-1)</script>'; //jika tidak act dan del maka balik
            }
        }
        //proes kategori mandeg
    }
?>