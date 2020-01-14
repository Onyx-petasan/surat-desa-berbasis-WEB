      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Data Pengguna</h4>
                  <p class="card-description">
                    Edit Data Pengguna
                  </p>
                  <?php
                    $pengguna = mysql_query("SELECT * FROM tb_pengguna WHERE id='$_GET[id]'");
                    $data = mysql_fetch_array($pengguna);
                  ?>
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="hidden" name="id" class="form-control" value="<?php echo $data['id']; ?>">
                      <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Nama Pengguna</label>
                      <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                    </div>
                    <input name="submit" type="submit" class="btn btn-primary mr-2" value="Ubah">
                    <a href="home.php?page=pengguna-data" class="btn btn-info reset">Batal</a>
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
        tb_pengguna
      SET 
      
      username = '$_POST[username]',
      password = '$_POST[password]',
      nama     = '$_POST[nama]'
      WHERE
        id     = '$_POST[id]'
      "); //sql untuk menyimpan data pengguna
      if ($SQL) { //jika simpan berhasil maka menampilkan alert dan kembali 
        echo" <script language='JavaScript'>
              alert('Data Penduduk Berhasil Di Ubah!');
              window.location='home.php?page=pengguna-data';
              </script>";
      }
  }