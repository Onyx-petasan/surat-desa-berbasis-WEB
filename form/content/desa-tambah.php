      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data Desa</h4>
                  <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="file" name="foto" class="file-upload-default foto">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Masukan Gambar Tandatangan">
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
                            <input type="text" name="desa" class="form-control" placeholder="Nama Desa">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kecamatan</label>
                          <div class="col-sm-9">
                            <input type="text" name="kecamatan" class="form-control" placeholder="Nama Kecamatan">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kabupaten</label>
                          <div class="col-sm-9">
                            <input type="text" name="kabupaten" class="form-control" placeholder="Nama Kabupaten">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <textarea name="alamat" class="form-control" rows="4"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Web/Email</label>
                          <div class="col-sm-9">
                            <input type="text" name="keterangan_lain" class="form-control" placeholder="Web/Email Jika Ada">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <input name="submit" type="submit" class="btn btn-primary mr-2" value="Simpan">
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
  if($_POST['submit'] == 'Simpan'){ //jika submit bernilai simpan maka masok

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
        
    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis').$foto;

    // Set path folder tempat menyimpan fotonya
    $path = "assets/images/logo/".$fotobaru;

    // Proses upload
    if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak

      $profile =mysql_query("
        INSERT INTO tb_desa (
          logo,
          nama_desa,
          nama_kecamatan,
          nama_kabupaten,
          alamat_desa,
          keterangan_lain
          )
        VALUES (
          '$fotobaru',
          '$_POST[desa]',
          '$_POST[kecamatan]',
          '$_POST[kabupaten]',
          '$_POST[alamat]',
          '$_POST[keterangan_lain]'
        )
        "); //sql untuk menyimpan data kategori
      
      if ($profile) { //jika simpan berhasil maka menampilkan alert dan kembali 
          echo" <script language='JavaScript'>
              alert('Data Profile Desa Berhasil diinput!');
              window.location='home.php?page=desa-data';
              </script>";
      }
      else{
        echo" <script language='JavaScript'>
            alert('Data Profile Desa Gagal diinput!');
            window.location='home.php?page=desa-tambah';
            </script>";
      }
    }
  }
?>