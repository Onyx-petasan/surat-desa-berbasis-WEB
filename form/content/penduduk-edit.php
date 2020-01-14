      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Data Penduduk</h4>
                  <p class="card-description">
                    Edit Data Penduduk
                  </p>
                  <?php
                  $penduduk = mysql_query("SELECT * FROM tb_penduduk WHERE nik='$_GET[id]'");
                  $dapen = mysql_fetch_array($penduduk);
                  ?>
                  <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">No. NIK</label>
                          <div class="col-sm-9">
                            <input type="text" name="nik" class="form-control" value="<?php echo $dapen['nik']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" value="<?php echo $dapen['nama']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                          <div class="col-sm-9">
                            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $dapen['tempat_lahir']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-9">
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $dapen['tanggal_lahir']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="jenis_kelamin" value="<?php echo $dapen['jenis_kelamin']; ?>">
                              <option>Laki-Laki</option>
                              <option>Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Agama</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="agama" value="<?php echo $dapen['agama']; ?>">
                              <option>Islam</option>
                              <option>Kristen</option>
                              <option>Katolik</option>
                              <option>Hindu</option>
                              <option>Budha</option>
                              <option>Konghucu</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                            <textarea name="alamat" class="form-control" rows="5"><?php echo $dapen['alamat']; ?></textarea>
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Golongan Darah</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="golongan_darah" value="<?php echo $dapen['golongan_darah']; ?>">
                              <option>-</option>
                              <option>A</option>
                              <option>AB</option>
                              <option>B</option>
                              <option>O</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Status Perkawinan</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="status_perkawinan" value="<?php echo $dapen['status_perkawinan']; ?>">
                              <option>Belum Kawin</option>
                              <option>Kawin</option>
                              <option>Cerai Hidup</option>
                              <option>Cerai Mati</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pekerjaan</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="pekerjaan" value="<?php echo $dapen['pekerjaan']; ?>">
                              <option>Pelajar / Mahasiswa</option>
                              <option>Petani / Pekebun</option>
                              <option>Karyawan Swasta</option>
                              <option>Wiraswasta</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Kewarganegaraan</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="kewarganegaraan" value="<?php echo $dapen['kewarganegaraan']; ?>">
                              <option>WNI</option>
                              <option>WNA</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <input name="submit" type="submit" class="btn btn-primary mr-2" value="Ubah">
                          <a href="home.php?page=penduduk-data" class="btn btn-info reset">Batal</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php

  if($_POST['submit'] == 'Ubah'){ //jika submit bernilai simpan maka masok
    $SQL =mysql_query( "
      UPDATE 
        tb_penduduk 
      SET 
      nama              = '$_POST[nama]',
      tempat_lahir      = '$_POST[tempat_lahir]',
      tanggal_lahir     = '$_POST[tanggal_lahir]',
      jenis_kelamin     = '$_POST[jenis_kelamin]',
      alamat            = '$_POST[alamat]',
      golongan_darah    = '$_POST[golongan_darah]',
      status_perkawinan = '$_POST[status_perkawinan]',
      pekerjaan         = '$_POST[pekerjaan]',
      kewarganegaraan   = '$_POST[kewarganegaraan]'
      WHERE
        nik             = '$_POST[nik]'
      "); //sql untuk menyimpan data pengguna
      if ($SQL) { //jika simpan berhasil maka menampilkan alert dan kembali 
        echo" <script language='JavaScript'>
              alert('Data Penduduk Berhasil Di Ubah!');
              window.location='home.php?page=penduduk-data';
              </script>";
      }
  }
?>
<!-- <script type="text/javascript" src="assets/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
  tinymce.init({
  selector: "textarea",
  plugins: [
          "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
          "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
          "table contextmenu directionality emoticons template textcolor paste fullpage textcolor codesample"
  ],

  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft codesample",

  menubar: false,
  toolbar_items_size: 'small',

  style_formats: [
          {title: 'Bold text', inline: 'b'},
          {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
          {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
          {title: 'Example 1', inline: 'span', classes: 'example1'},
          {title: 'Example 2', inline: 'span', classes: 'example2'},
          {title: 'Table styles'},
          {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
  ],

  templates: [
          {title: 'Test template 1', content: 'Test 1'},
          {title: 'Test template 2', content: 'Test 2'}
  ]
  });
</script>

<style>
.wrapper {
  width: 840px;
}
</style>  -->