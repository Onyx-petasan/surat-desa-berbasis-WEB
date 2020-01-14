<?php
date_default_timezone_set('Asia/Jakarta');
function tgl_indonesia($tgl)
{
    //explode / pecah tanggal berdasarkan tanda "-"
    $exp = explode("-", $tgl);
    
    //siapkan nama bulan dalam array
    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    return $exp[2].' '.$bulan[(int)$exp[1]].' '.$exp[0];
}

?>