      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data Penduduk</h4>
                  <p class="card-description">
                    Tambah Data Penduduk
                  </p>
                  <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">No. NIK</label>
                          <div class="col-sm-9">
                            <input type="text" name="nik" class="form-control" placeholder="Nik">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                          <div class="col-sm-9">
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-9">
                            <input type="date" name="tanggal_lahir" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="jenis_kelamin">
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
                            <select class="form-control" name="agama">
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
                            <textarea name="alamat" class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Golongan Darah</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="golongan_darah">
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
                          <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="status_perkawinan">
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
                            <select class="form-control" name="pekerjaan">
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
                          <label class="col-sm-3 col-form-label">Kewarganegaraan</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="status_perkawinan">
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
                          <input name="submit" type="submit" class="btn btn-primary mr-2" value="Simpan">
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
  if($_POST['submit'] == 'Simpan'){ //jika submit bernilai simpan maka masok
    $penduduk =mysql_query("
      INSERT INTO 
      tb_penduduk (nik,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,alamat,agama,golongan_darah,status_perkawinan,pekerjaan,kewarganegaraan) VALUES ('$_POST[nik]','$_POST[nama]','$_POST[tempat_lahir]','$_POST[tanggal_lahir]','$_POST[jenis_kelamin]','$_POST[alamat]','$_POST[agama]','$_POST[golongan_darah]','$_POST[status_perkawinan]','$_POST[pekerjaan]','$_POST[kewarganegaraan]')
      "); //sql untuk menyimpan data pengguna
      if ($penduduk) { //jika simpan berhasil maka menampilkan alert dan kembali 
          echo" <script language='JavaScript'>
              alert('Data Penduduk Berhasil diinput!');
              window.location='home.php?page=penduduk-data';
              </script>";
      }else{
          echo" <script language='JavaScript'>
              alert('Data Penduduk Gagal diinput!');
              window.location='home.php?page=penduduk-tambah';
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