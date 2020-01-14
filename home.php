<?php
include "form/pages/header.php";

include "form/pages/sidebar.php"; 

	
	if(!empty($_GET['page']) && $_GET['page']=='pengguna-data'){
		include "form/content/pengguna-data.php";
	}
	if(!empty($_GET['page']) && $_GET['page']=='pengguna-edit'){
		include "form/content/pengguna-edit.php";
	}
	if(!empty($_GET['page']) && $_GET['page']=='pengguna-hapus'){
		include "form/action/pengguna-hapus.php";
	}
	if(!empty($_GET['page']) && $_GET['page']=='pengguna-tambah'){
		include "form/content/pengguna-tambah.php";
	}
	if(!empty($_GET['page']) && $_GET['page']=='desa-data'){
		include "form/content/desa-data.php";
	}
	if(!empty($_GET['page']) && $_GET['page']=='desa-edit'){
		include "form/content/desa-edit.php";
	}
	if(!empty($_GET['page']) && $_GET['page']=='desa-hapus'){
		include "form/action/desa-hapus.php";
	}
	if(!empty($_GET['page']) && $_GET['page']=='desa-tambah'){
		include "form/content/desa-tambah.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='penduduk-data'){
		include "form/content/penduduk-data.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='penduduk-edit'){
		include "form/content/penduduk-edit.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='penduduk-hapus'){
		include "form/action/penduduk-hapus.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='penduduk-tambah'){
		include "form/content/penduduk-tambah.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='keluarga-data'){
		include "form/content/keluarga-data.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='keluarga-edit'){
		include "form/content/keluarga-edit.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='keluarga-hapus'){
		include "form/action/keluarga-hapus.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='keluarga-tambah'){
		include "form/content/keluarga-tambah.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='kelahiran-data'){
		include "form/content/kelahiran-data.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='kelahiran-edit'){
		include "form/content/kelahiran-edit.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='kelahiran-hapus'){
		include "form/action/kelahiran-hapus.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='kelahiran-tambah'){
		include "form/content/kelahiran-tambah.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='kematian-data'){
		include "form/content/kematian-data.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='kematian-edit'){
		include "form/content/kematian-edit.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='kematian-hapus'){
		include "form/action/kematian-hapus.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='kematian-tambah'){
		include "form/content/kematian-tambah.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='surat-data'){
		include "form/content/surat-data.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='surat-buat'){
		include "form/content/surat-buat.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='surat-hapus'){
		include "form/action/surat-hapus.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='riwayat'){
		include "form/content/riwayat.php";
	}
	elseif(!empty($_GET['page']) && $_GET['page']=='cetak'){
		include "form/include/cetak-surat.php";
	}
	

 include "form/pages/footer.php"; 
 ?>
