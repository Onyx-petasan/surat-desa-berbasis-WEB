<?php
include'../koneksi.php';
 
$query = "select * from tb_isi_surat WHERE id_isi_surat=".$_GET['id'];
$hasil  =mysql_query($query);
 
 
if(mysql_num_rows($hasil) > 0 ){
  $response = array();
  $response["data"] = array();

  while($x = mysql_fetch_array($hasil)){
    $h['id_isi_surat'] = $x["id_isi_surat"];
    $h['id_kategori_surat'] = $x["id_kategori_surat"];
    $h['isi_surat'] = $x["isi_surat"];
    array_push($response["data"], $h);
  }
  echo json_encode($response);
}else {
  $response["message"]="tidak ada data";
  echo json_encode($response);
}
?>