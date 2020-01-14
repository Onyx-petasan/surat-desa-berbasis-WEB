
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <!-- awal isi -->
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Buat Surat</h4>
                  
                  <!-- inti isi awal -->
                  <form action="form/include/buat_kelahiran.php?action=kelahiran" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input type="hidden" name="idsur" class="form-control idsur">
                              <select name="ayah" id="ayah" class="form-control">
                                <option>Pilih Nama Ayah</option>
                                <?php
                                  $ayah= mysql_query("SELECT * FROM tb_penduduk WHERE jenis_kelamin = 'Laki-laki'" );
                                  while ($ay = mysql_fetch_array ($ayah)){
                                    echo '<option value="'.$ay['nik'].'"> 
                                            Nik : '.$ay['nik'].', 
                                            Nama : '.$ay['nama'].'.
                                          </option>';
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Anak</label>
                                <div class="col-sm-9">
                                  <input type="text" name="anak" class="form-control" placeholder="Nama Lengkap Anak">
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="jenis_kelamin">
                                  <option>Laki-Laki</option>
                                  <option>Perempuan</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                  <input type="hidden" name="idks" class="form-control" value="4">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <select name="ibu" id="ibu" class="form-control">
                                <option>Pilih Nama Ibu</option>
                                <?php
                                  $ibu= mysql_query("SELECT * FROM tb_penduduk WHERE jenis_kelamin = 'Perempuan'" );
                                  while ($i = mysql_fetch_array ($ibu)){
                                    echo '<option value="'.$i['nik'].'"> 
                                            Nik : '.$i['nik'].', 
                                            Nama : '.$i['nama'].'.
                                          </option>';
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                  <input type="text" name="tempat" class="form-control" placeholder="Tempat Kelahiran">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Waktu Lahir</label>
                                <div class="col-sm-9">
                                  <input type="time" name="waktu" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                  <input type="date" name="tanggal" class="form-control">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
                          <th style="text-align: center;">Nama Ayah</th>
                          <th style="text-align: center;">Nama Ibu</th>
                          <th style="text-align: center;">Nama Anak</th>
                          <th style="text-align: center;">Status Cetak</th>
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
                                tp.tanggal_lahir,
                                tp.pekerjaan,
                                tp.alamat,
                                tis.isi_surat
                            FROM
                                tb_kelahiran ts,
                                tb_isi_surat tis,
                                tb_kategori_surat tks,
                                tb_penduduk tp
                            WHERE
                                ts.id_kategori        = tis.id_kategori_surat
                            AND tis.id_kategori_surat = tks.id_kategori_surat
                            AND ts.nik_ayah         = tp.nik
                            AND ts.nik_ibu          = tp.nik
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
                              <td style="text-align: justify;"><?=$cesu['nama']?></td>
                              <td style="text-align: justify;"><?=$cesu['anak']?></td>
                              <td style="text-align: center;"><?=$cesu['status']?></td>
                              <td style="text-align: center;"> 
                                <a href="javascript:;" onclick="edit('<?=$cesu['id_kode_surat']?>','<?=$cesu['id_kategori']?>','<?=$cesu['kode_desa']?>');">
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
  $("#ayah").chosen();
</script>
<script type="text/javascript">
  $("#ibu").chosen();
</script>