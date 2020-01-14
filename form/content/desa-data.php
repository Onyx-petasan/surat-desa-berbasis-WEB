      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Profile Desa</h4>
                  <!-- <a href="home.php?page=desa-tambah" class="btn btn-primary btn-icon-text" >
                    <i class="mdi mdi-account-plus btn-icon-prepend"></i>
                      Tambah
                  </a> -->
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="table-info">
                          <th style="text-align: center;">logo</th>
                          <th style="text-align: center;">Desa</th>
                          <th style="text-align: center;">Kecamatan</th>
                          <th style="text-align: center;">Kabupaten</th>
                          <th style="text-align: center;">Alamat</th>
                          <th style="text-align: center;">Web/Email</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        // Perintah untuk menampilkan data
                        $desa= mysql_query ('
                          SELECT 
                            *
                          FROM 
                            tb_desa
                          ') ;  //menampikan SEMUA data dari tabel Matakuliah

                        // perintah untuk membaca dan mengambil data dalam bentuk array
                        while ($dades = mysql_fetch_array ($desa)){ ?>  
                          <tr>
                            <td style="text-align: center;"><img src="assets/images/logo/<?=$dades['logo']?>" width="100" height="100" /></td>
                            <td style="text-align: center;"><?=$dades['nama_desa']?></td>
                            <td style="text-align: center;"><?=$dades['nama_kecamatan']?></td>
                            <td style="text-align: center;"><?=$dades['nama_kabupaten']?></td>
                            <td style="text-align: center;"><?=$dades['alamat_desa']?></td>
                            <td style="text-align: center;"><?=$dades['keterangan_lain']?></td>
                            <td style="text-align: center;"> 
                              <a href="home.php?page=desa-edit&id=<?php echo $dades['id_desa']?>">
                                <i class="mdi mdi-tooltip-edit btn-icon-prepend"></i>
                              </a> 
                              <a href="home.php?page=desa-hapus&del=<?php echo $dades['id_desa']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
