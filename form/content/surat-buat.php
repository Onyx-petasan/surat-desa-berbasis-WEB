
<div class="main-panel">        
  <div class="content-wrapper">
    <div class="row">
      <!-- awal isi -->
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Buat Surat</h4>
            
            <!-- inti isi awal -->
            <form action="form/include/buat_surat.php?action=buatsurat" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="hidden" name="idsur" class="form-control idsur">
                        <select name="idks" id="ks" class="form-control">
                          <option>Pilih Kategori Surat</option>
                          <?php
                          $kasut= mysql_query('SELECT * FROM tb_kategori_surat ORDER BY id_kategori_surat asc' );
                          while ($tiga = mysql_fetch_array ($kasut)){
                            echo '<option value="'.$tiga['id_kategori_surat'].'">'.$tiga['nama_kategori'].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <select name="nik" id="nn" class="form-control">
                          <option>Pilih Nik</option>
                          <?php
                          $penduduk= mysql_query('SELECT * FROM tb_penduduk ORDER BY nik asc' );
                          while ($pen = mysql_fetch_array ($penduduk)){
                            echo '<option value="'.$pen['nik'].'">
                            Nik : '.$pen['nik'].', Nama : '.$pen['nama'].'.
                            </option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                
                      <!-- <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Keterangan</label>
                          <div class="col-sm-10">
                            <textarea type="text" name="nama" class="form-control" placeholder="Masukan keterangan lain jika diperlukan"></textarea>
                          </div>
                        </div>
                      </div> -->
                    </div>                    
                    <div class="form-group">
                      <input name="submit" type="submit" class="btn btn-primary mr-2" value="Simpan">
                      <input type="reset" value="Batal" class="btn btn-info resettiga" onclick="batalo()" />
                    </div>
                  </form>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Surat</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="table-primary">
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Jenis Surat</th>
                          <th style="text-align: center;">No. Surat</th>
                          <th style="text-align: center;">Tanggal</th>
                          <th style="text-align: center;">Nama Pembuat</th>
                          <!-- <th style="text-align: center;">Status Cetak</th> -->
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          // Perintah untuk menampilkan data
                        $surat= mysql_query ('
                          SELECT
                          ts.*,
                          tks.nama_kategori,
                          tp.nik,
                          tp.nama,
                          tp.tempat_lahir,
                          tp.tanggal_lahir,
                          tp.status_perkawinan,
                          tp.agama,
                          tp.jenis_kelamin,
                          tp.pekerjaan,
                          tp.alamat,
                          tis.isi_surat
                          FROM
                          tb_surat ts,
                          tb_isi_surat tis,
                          tb_kategori_surat tks,
                          tb_penduduk tp
                          WHERE
                          ts.id_kategori        = tis.id_kategori_surat
                          AND tis.id_kategori_surat = tks.id_kategori_surat
                          AND ts.nik                = tp.nik
                          ORDER BY id_surat
                            ') ;  //menampikan SEMUA data dari tabel Matakuliah
                        $no = '1';
                        
                          // perintah untuk membaca dan mengambil data dalam bentuk array
                        while ($cesu = mysql_fetch_array ($surat)){ ?>
                          <tr>
                            <td style="text-align: center;"><?=$no?></td>
                            <td style="text-align: justify;"><?=$cesu['nama_kategori']?></td>
                            <td style="text-align: center;"><?=$cesu['no_surat']?></td>
                            <td style="text-align: center;"><?=$cesu['tanggal']?></td>
                            <td style="text-align: justify;"><?=$cesu['nama']?></td>
                            <!-- <td style="text-align: center;"><?=$cesu['status']?></td> -->
                            <td style="text-align: center;"> 
                                <!-- <a href="javascript:;" onclick="('<?=$cesu['id_kode_surat']?>','<?=$cesu['id_kategori']?>','<?=$cesu['kode_desa']?>');">
                                  <i class="mdi mdi-eye btn-icon-prepend"></i>
                                </a> -->

                                <a href="form/include/cetak-surat.php?&id=<?php echo $cesu['id_surat']?>" target="_blank">
                                  <i class="mdi mdi-eye btn-icon-prepend"></i>
                                </a>
                                ||
                                <a href="javascript:;">
                                  <i class="mdi mdi-delete btn-icon-prepend" onclick="del('<?=$cesu['id_surat']?>');">
                                  </i>
                                </a>
                              </td>
                            </tr> 

                            <?php $no++; } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- akhir isi -->
              </div>
            </div>

            <script type="text/javascript">
              function del(id){
                if(id != ''){
                  var r = confirm("Apakah Anda Yakin akan menanghapus ini ?");
                  if (r == true) {
                    window.location.href = 'form/include/buat_surat.php?action=buatsurat&del='+id;
                  } 
                }
              }
            </script>
            <script type="text/javascript">
              $("#ks").chosen();
            </script>
            <script type="text/javascript">
              $("#nn").chosen();
            </script>
