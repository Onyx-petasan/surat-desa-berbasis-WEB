<?php
include '../../koneksi.php';
// include "../../no-surat-otomatis/nosurat.php";
date_default_timezone_set('Asia/Jakarta');
$tgl = date("Y-m-d");
if(!empty($_GET['action'])){
        //proses kategori
    if($_GET['action']=='kelahiran'){
            //simpan
            if(!empty($_POST['submit'])){ //jika GET_act maka masok 
                if($_POST['submit'] == 'Simpan'){ //jika submit bernilai simpan maka masok
                    // echo "$_POST[idks]";
                    // echo "$_POST[idks]";
                    
                    // echo "<br>";
                    // echo      "$_POST[ayah]";
                    // echo "<br>";
                    // echo      "$_POST[nama_ayah]";
                    // echo "<br>";
                    // echo      "$_POST[ibu]";
                    // echo "<br>";
                    // echo      "$_POST[nama_ibu]";
                    // echo "<br>";
                    // echo      "$_POST[anak]";
                    // echo "<br>";
                    // echo      "$_POST[jenis_kelamin]";
                    // echo "<br>";
                    // echo      "$_POST[tempat]";
                    // echo "<br>";
                    // echo      "$_POST[waktu]";
                    // echo "<br>";
                    // echo      "$_POST[tanggal]";
                    $ks=mysql_query("SELECT * FROM tb_kategori_surat WHERE id_kategori_surat='$_POST[idks]'");
                    $data = mysql_fetch_array($ks);
                    $cek=mysql_query("SELECT * FROM tb_kelahiran WHERE no IN (SELECT MAX(no) FROM tb_kelahiran)");
                    $nom = mysql_fetch_array($cek);
                    // echo "$nom[no] <br>";
                    // $ex = explode('/', $cek[no]);
                    // if (date('d')=='01'){ $b = '01'; }
                    // else { $b = sprintf("%03d", $ex[0]+1); }
                    
                    // $sql = mysql_query("SELECT no FROM tb_surat ORDER BY no DESC");
                    // $no = mysql_fetch_array($sql);
                    // $n = $no[no];
                    $f = $nom[no];
                    $b = $f+1;
                    // echo "$b <br>";
                    $g = sprintf("%03d", $b);
                    // echo "$g";
                    $a = $data[kode_surat];
                    $c = $data[kode_desa];
                    $d = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
                    $e = date('Y');
                    $no_surat = $a.'.'.$g.'/'.$c.'/'.$d[date('n')].'/'.$e;
                    // echo $no_surat;
                    
                    $SQL =mysql_query("
                        INSERT INTO 
                        tb_kelahiran (
                        id_kategori,
                        no,
                        no_surat,
                        tanggal,
                        nik_ayah,
                        nik_ibu,
                        nama_anak,
                        jenis_kelamin,
                        tempat_lahir,
                        waktu_lahir,
                        tanggal_lahir)
                        VALUES (
                        '$_POST[idks]',
                        '$b',
                        '$no_surat',
                        '$tgl',
                        '$_POST[ayah]',
                        '$_POST[ibu]',
                        '$_POST[anak]',
                        '$_POST[jenis_kelamin]',
                        '$_POST[tempat]',
                        '$_POST[waktu]',
                        '$_POST[tanggal]')"
                        ); //sql untuk menyimpan data kategori
                    if ($SQL) { //jika simpan berhasil maka menampilkan alert dan kembali 

                        $history_surat =mysql_query("INSERT INTO tb_history (id_history_surat) VALUES ('$_POST[idks]')"); 
                        if($history_surat){
                        echo" <script language='JavaScript'>
                        alert('Data Kelahiran Berhasil disimpan!');
                        window.location='../../home.php?page=kelahiran-data';
                        </script>"; 
                        }
                        // echo" <script language='JavaScript'>
                        // alert('Data Kelahiran Berhasil disimpan!');
                        // window.location='../../home.php?page=kelahiran-data';
                        // </script>";  
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
                        WHERE id_surat      = '$_POST[iddua]'
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
                mysql_query("DELETE FROM tb_kelahiran WHERE id_kelahiran=".$_GET['del']); //pokoke proses delete
                echo" <script language='JavaScript'>
                alert('Data Kelahiran Berhasil dihapus!');
                window.location='../../home.php?page=kelahiran-data';
                    </script>"; // balik maning
                }
                else{ 
               echo '<script>window.location=history.go(-1)</script>'; //jika tidak act dan del maka balik
           }
       }
        //proes kategori mandeg
   }
   ?>