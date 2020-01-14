      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Pengguna</h4>
                  <p class="card-description">
                    Data Pengguna
                  </p>
                  <a href="home.php?page=pengguna-tambah" class="btn btn-primary btn-icon-text" >
                    <i class="mdi mdi-account-plus btn-icon-prepend"></i>
                      Tambah
                  </a>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="table-info">
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Username</th>
                          <th style="text-align: center;">Password</th>
                          <th style="text-align: center;">Nama pengguna</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        // Perintah untuk menampilkan data
                        $pengguna= mysql_query ('
                          SELECT 
                            *
                          FROM 
                            tb_pengguna
                          ') ;  //menampikan SEMUA data dari tabel Matakuliah

                        // perintah untuk membaca dan mengambil data dalam bentuk array
                        while ($data = mysql_fetch_array ($pengguna)){ ?>  
                          <tr>
                            <td style="text-align: center;"><?=$data['id']?></td>
                            <td style="text-align: center;"><?=$data['username']?></td>
                            <td style="text-align: center;"><?=$data['password']?></td>
                            <td style="text-align: center;"><?=$data['nama']?></td>
                            <td style="text-align: center;"> 

                              <a href="home.php?page=pengguna-edit&id=<?php echo $data['id']?>">
                                <i class="mdi mdi-tooltip-edit btn-icon-prepend"></i>
                              </a> 

                              || 
                              
                              <a href="home.php?page=pengguna-hapus&del=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                <i class="mdi mdi-delete btn-icon-prepend"></i>
                              </a>
                            </td>
                          </tr> 
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>