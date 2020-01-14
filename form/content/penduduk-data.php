      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Penduduk</h4>
                  <p class="card-description">
                    Data Penduduk
                  </p>
                  <a href="home.php?page=penduduk-tambah" class="btn btn-primary btn-icon-text" >
                    <i class="mdi mdi-account-plus btn-icon-prepend"></i>
                      Tambah
                  </a>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="table-info">
                          <th style="text-align: center;">Nik</th>
                          <th style="text-align: center;">Nama Lengkap</th>
                          <th style="text-align: center;">Tempat Lahir</th>
                          <th style="text-align: center;">Tanggal Lahir</th>
                          <th style="text-align: center;">Jenis Kelamin</th>
                          <th style="text-align: center;">Alamat</th>
                          <th style="text-align: center;">Agama</th>
                          <th style="text-align: center;">Golongan Darah</th>
                          <th style="text-align: center;">Status Perkawinan</th>
                          <th style="text-align: center;">Pekerjaan</th>
                          <th style="text-align: center;">Kewarganegaraan</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        // Perintah untuk menampilkan data
                        $penduduk= mysql_query ('
                          SELECT 
                            *
                          FROM 
                            tb_penduduk
                          ') ;  //menampikan SEMUA data dari tabel Matakuliah

                        // perintah untuk membaca dan mengambil data dalam bentuk array
                        while ($data = mysql_fetch_array ($penduduk)){ ?>  
                          <tr>
                            <td style="text-align: center;"><?=$data['nik']?></td>
                            <td style="text-align: center;"><?=$data['nama']?></td>
                            <td style="text-align: center;"><?=$data['tempat_lahir']?></td>
                            <td style="text-align: center;"><?=$data['tanggal_lahir']?></td>
                            <td style="text-align: center;"><?=$data['jenis_kelamin']?></td>
                            <td style="text-align: center;"><?=$data['alamat']?></td>
                            <td style="text-align: center;"><?=$data['agama']?></td>
                            <td style="text-align: center;"><?=$data['golongan_darah']?></td>
                            <td style="text-align: center;"><?=$data['status_perkawinan']?></td>
                            <td style="text-align: center;"><?=$data['pekerjaan']?></td>
                            <td style="text-align: center;"><?=$data['kewarganegaraan']?></td>
                            <td style="text-align: center;"> 
                              <a href="home.php?page=penduduk-edit&id=<?php echo $data['nik']?>">
                                <i class="mdi mdi-tooltip-edit btn-icon-prepend"></i>
                              </a> 
                              <a href="home.php?page=penduduk-hapus&del=<?php echo $data['nik']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
