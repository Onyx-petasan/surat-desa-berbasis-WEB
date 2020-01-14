      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Data Pengguna</h4>
                  <p class="card-description">
                    Tambah Data Pengguna
                  </p>
                  <!-- <a href="home.php?page=pengguna-data" class="btn btn-primary mr-2" >
                      Kembali
                  </a>
                  <br><br> -->
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Nama Pengguna</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <input name="submit" type="submit" class="btn btn-primary mr-2" value="Simpan">
                    <a href="home.php?page=pengguna-data" class="btn btn-info reset">Batal</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php
  if($_POST['submit'] == 'Simpan'){ //jika submit bernilai simpan maka masok
    $SQL =mysql_query( "INSERT INTO tb_pengguna (username,password,nama,level)
      VALUES ('$_POST[username]','$_POST[password]','$_POST[nama]','admin')"
      ); //sql untuk menyimpan data pengguna
      if ($SQL) { //jika simpan berhasil maka menampilkan alert dan kembali 
        echo" <script language='JavaScript'>
              alert('Data Pengguna Berhasil diinput!');
              window.location='../home.php?page=pengguna-data';
              </script>";
      }
  }
?>