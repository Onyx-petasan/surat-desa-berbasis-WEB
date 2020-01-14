      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data Desa</h4>
                  <?php
                  $profile = mysql_query("SELECT * FROM tb_desa WHERE id_desa='$_GET[id]'");
                  $pro = mysql_fetch_array($profile);
                  ?>
                  <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_desa" class="form-control id_desa" value="<?php echo $pro['id_desa']; ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          
                          <input type="file" name="foto" class="file-upload-default foto">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Masukan Logo">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-dark" type="button">Cari File</button>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Desa</label>
                          <div class="col-sm-9">
                            <input type="text" name="desa" class="form-control" value="<?php echo $pro['nama_desa']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kecamatan</label>
                          <div class="col-sm-9">
                            <input type="text" name="kecamatan" class="form-control" value="<?php echo $pro['nama_kecamatan']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kabupaten</label>
                          <div class="col-sm-9">
                            <input type="text" name="kabupaten" class="form-control" value="<?php echo $pro['nama_kabupaten']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <textarea name="alamat" class="form-control" rows="4"><?php echo $pro['alamat_desa']; ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Web/Email</label>
                          <div class="col-sm-9">
                            <input type="text" name="keterangan_lain" class="form-control" value="<?php echo $pro['keterangan_lain']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <input name="submit" type="submit" class="btn btn-primary mr-2" value="Ubah">
                          <a href="home.php?page=desa-data" class="btn btn-info reset">Batal</a>
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
  date_default_timezone_set('Asia/Jakarta');
  if($_POST['submit'] == 'Ubah'){ //jika submit bernilai simpan maka masok

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
        
    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis').$foto;

    // Set path folder tempat menyimpan fotonya
    $path = "assets/images/logo/".$fotobaru;

    // Proses upload
    if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak

      $profile =mysql_query("
        UPDATE 
          tb_desa
        SET
          logo            = '$fotobaru',
          nama_desa       = '$_POST[desa]',
          nama_kecamatan  = '$_POST[kecamatan]',
          nama_kabupaten  = '$_POST[kabupaten]',
          alamat_desa     = '$_POST[alamat]',
          keterangan_lain = '$_POST[keterangan_lain]'
        WHERE
          id_desa         = '$_POST[id_desa]'
        "); //sql untuk menyimpan data kategori
      
      if ($profile) { //jika simpan berhasil maka menampilkan alert dan kembali 
          echo" <script language='JavaScript'>
              alert('Data Profile Desa Berhasil Diubah!');
              window.location='home.php?page=desa-data';
              </script>";
      }
      else{
        echo" <script language='JavaScript'>
            alert('Data Profile Desa Gagal Diubah!');
            window.location='home.php?page=desa-edit';
            </script>";
      }
    }
  }
?>