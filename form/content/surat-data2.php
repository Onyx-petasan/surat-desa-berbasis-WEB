      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

            <!-- awal isi -->

            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Kategori Surat</h4>
                  
                  <!-- inti isi awal -->
                  <div class="col-md-12">
                    <form action="form/include/kategori.php?actionsatu=kategorisatu" method="POST" class="form-horizontal">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <input type="hidden" name="idsatu" class="form-control idsatu">
                        <input type="text" name="kategorisatu" class="form-control kategorisatu" placeholder="Masukan Kategori Surat">
                      </div>
                      <div class="form-group">
                        <input name="submitsatu" type="submit" class="btn btn-primary mr-2 actionsatu" value="Simpan">
                        <input type="reset" value="Batal" class="btn btn-info resetsatu" onclick="batalsatu()" />
                      </div>
                    </div>
                  </form>
                  </div>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Kategori Surat</h4>
                  
                  <!-- inti isi awal -->
                  <div class="col-md-12">
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="table-info">
                            <th style="text-align: center;">Kategori</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          // Perintah untuk menampilkan data
                          $ktsu= mysql_query ('
                            SELECT 
                              *
                            FROM 
                              tb_kategori_surat
                            ') ;  //menampikan SEMUA data dari tabel Matakuliah

                          // perintah untuk membaca dan mengambil data dalam bentuk array
                          while ($kategori = mysql_fetch_array ($ktsu)){ ?>  
                            <tr>
                              <td style="text-align: justify;"><?=$kategori['nama_kategori']?></td>
                              <td style="text-align: center;"> 
                                <a href="javascript:;" onclick="editsatu('<?=$kategori['id_kategori_surat']?>','<?=$kategori['nama_kategori']?>');">
                                  <i class="mdi mdi-tooltip-edit btn-icon-prepend">
                                  </i>
                                </a> 
                                ||
                                <a href="javascript:;">
                                  <i class="mdi mdi-delete btn-icon-prepend" onclick="delsatu('<?=$kategori['id_kategori_surat']?>');">
                                  </i>
                                </a>
                              </td>
                            </tr> 
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Nomer Surat</h4>
                  
                  <!-- inti isi awal -->
                  <form action="form/include/Kode_surat.php?actiondua=kodesurat" method="POST">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kode Surat</label>
                        <div class="col-sm-9">
                          <input type="hidden" name="iddua" class="form-control iddua">
                          <input type="text" name="kode_surat" class="form-control kode_surat" placeholder="Masukan Kode Surat">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kode Desa</label>
                        <div class="col-sm-9">
                          <input type="text" name="kode_desa" class="form-control kode_desa" placeholder="Masukan Kode Desa">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submitdua" type="submit" class="btn btn-primary mr-2 actiondua" value="Simpan">
                        <input type="reset" value="Batal" class="btn btn-info resetdua" onclick="bataldua()" />
                      </div>
                    </div>
                  </form>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Kode Surat</h4>
                  
                  <!-- inti isi awal -->
                  <div class="col-md-12">
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="table-info">
                            <th style="text-align: center;">Kode Surat</th>
                            <th style="text-align: center;">Kode Desa</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          // Perintah untuk menampilkan data
                          $kosu= mysql_query ('
                            SELECT 
                              *
                            FROM 
                              tb_kode_surat
                            ') ;  //menampikan SEMUA data dari tabel Matakuliah

                          // perintah untuk membaca dan mengambil data dalam bentuk array
                          while ($kodesurat = mysql_fetch_array ($kosu)){ ?>  
                            <tr>
                              <td style="text-align: center;"><?=$kodesurat['kode_surat']?></td>
                              <td style="text-align: center;"><?=$kodesurat['kode_desa']?></td>
                              <td style="text-align: center;"> 
                                <a href="javascript:;" onclick="editdua('<?=$kodesurat['id_kode_surat']?>','<?=$kodesurat['kode_surat']?>','<?=$kodesurat['kode_desa']?>');">
                                  <i class="mdi mdi-tooltip-edit btn-icon-prepend">
                                  </i>
                                </a> 
                                ||
                                <a href="javascript:;">
                                  <i class="mdi mdi-delete btn-icon-prepend" onclick="deldua('<?=$kodesurat['id_kode_surat']?>');">
                                  </i>
                                </a>
                              </td>
                            </tr> 
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Isi Surat</h4>
                  
                  <!-- inti isi awal -->
                  <form action="form/include/isi_surat.php?actiontiga=isisurat" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">kategori Surat</label>
                        <input type="hidden" name="idtiga" class="form-control idtiga">
                        <div class="col-sm-9">
                          <select name="kategoritiga" class="form-control kategoritiga">
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
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="file" name="isi_surat" class="file-upload-default isi_surat">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Masukan File Surat">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-dark" type="button">Cari File</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submittiga" type="submit" class="btn btn-primary mr-2 actiontiga" value="Simpan">
                        <input type="reset" value="Batal" class="btn btn-info resettiga" onclick="bataltiga()" />
                      </div>
                    </div>
                  </form>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Isi Surat</h4>
                  
                  <!-- inti isi awal -->
                  <div class="col-md-12">
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="table-info">
                            <th style="text-align: center;">Kategori Surat</th>
                            <th style="text-align: center;">Isi Surat</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          // Perintah untuk menampilkan data
                          $isisurat= mysql_query ('
                            SELECT 
                              isi.*,
                              ks.*
                              
                            FROM 
                              tb_isi_surat isi,
                              tb_kategori_surat ks
                            WHERE
                              isi.id_kategori_surat = ks.id_kategori_surat

                            ') ;  //menampikan SEMUA data dari tabel Matakuliah

                          // perintah untuk membaca dan mengambil data dalam bentuk array
                          while ($issu = mysql_fetch_array ($isisurat)){ ?>  
                            <tr>
                              <td style="text-align: center;"><?=$issu['nama_kategori']?></td>

                              <!-- <td style="text-align: center;">
                                <embed src="assets/berkas/<?=$issu['isi_surat']?>" type="application/pdf" width="50" height="100"/>
                              </td> -->

                              <td style="text-align: center;"><?=$issu['isi_surat']?></td>

                              <td style="text-align: center;"> 
                                <a href="javascript:;" onclick="edittiga('<?=$issu['id_isi_surat']?>','<?=$issu['id_kategori_surat']?>','<?=$issu['isi_surat']?>');">
                                  <i class="mdi mdi-tooltip-edit btn-icon-prepend">
                                  </i>
                                </a> 
                                ||
                                <a href="javascript:;">
                                  <i class="mdi mdi-delete btn-icon-prepend" onclick="deltiga('<?=$issu['id_isi_surat']?>');">
                                  </i>
                                </a>
                              </td>
                            </tr> 
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Penandatangan</h4>
                  
                  <!-- inti isi awal -->
                  <form action="form/include/tandatangan.php?actionempat=tandatangan" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                      <input type="hidden" name="idempat" class="form-control idempat">
                      <div class="form-group">
                        <input type="text" name="nama_penandatangan" class="form-control nama_penandatangan" placeholder="Nama Lengkap">
                      </div>
                      <div class="form-group">
                        <input type="text" name="nip_penandatangan" class="form-control nip_penandatangan" placeholder="Nip">
                      </div>

                      <div class="form-group">
                        <input type="file" name="foto" class="file-upload-default foto">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Masukan Gambar Tandatangan">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-dark" type="button">Cari File</button>
                          </span>
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <input type="file" class="form-control foto" name="foto">
                      </div> -->
                      <div class="form-group">
                        <input name="submitempat" type="submit" class="btn btn-primary mr-2 actionempat" value="Simpan">
                        <input type="reset" value="Batal" class="btn btn-info resetempat" onclick="bataldua()" />
                      </div>
                    </div>
                  </form>
                  <form>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Tandatangan</h4>
                  
                  <!-- inti isi awal -->
                  <div class="col-md-12">
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="table-info">
                            <th style="text-align: center;">Nama Lengkap</th>
                            <th style="text-align: center;">Nip</th>
                            <th style="text-align: center;">Tandatangan</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          // Perintah untuk menampilkan data
                          $tandatangan= mysql_query ('
                            SELECT 
                              *
                            FROM 
                              tb_tandatangan
                            ') ;  //menampikan SEMUA data dari tabel Matakuliah

                          // perintah untuk membaca dan mengambil data dalam bentuk array
                          while ($ttd = mysql_fetch_array ($tandatangan)){ ?>  
                            <tr>
                              <td style="text-align: center;"><?=$ttd['nama_penandatangan']?></td>
                              <td style="text-align: center;"><?=$ttd['nip_penandatangan']?></td>
                              <td style="text-align: center;"><img src="assets/images/tandatangan/<?=$ttd['isi_tandatangan']?>" width="100" height="100" /></td>
                              <td style="text-align: center;"> 
                                <a href="javascript:;" onclick="editempat('<?=$ttd['id_tandatangan']?>','<?=$ttd['nama_penandatangan']?>','<?=$ttd['nip_penandatangan']?>','<?=$ttd['isi_tandatangan']?>');">
                                  <i class="mdi mdi-tooltip-edit btn-icon-prepend">
                                  </i>
                                </a> 
                                ||
                                <a href="javascript:;">
                                  <i class="mdi mdi-delete btn-icon-prepend" onclick="delempat('<?=$ttd['id_tandatangan']?>');">
                                  </i>
                                </a>
                              </td>
                            </tr> 
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            
            <!-- akhir isi -->
          </div>
        </div>

<script type="text/javascript">
  function editsatu(idsatu,kategorisatu){
    $(".idsatu").val(idsatu);
    $(".kategorisatu").val(kategorisatu);
    $(".actionsatu").val('Ubah');
  }

  function batalsatu(){
    $(".actionsatu").val('Simpan');
  }

  function delsatu(idsatu){
    if(idsatu != ''){
      var r = confirm("Apakah Anda Yakin akan menanghapus ini ?");
      if (r == true) {
          window.location.href = 'form/include/kategori.php?actionsatu=kategorisatu&del='+idsatu;
      } 
    }
  }

  function editdua(iddua,kode_surat,kode_desa){
    $(".iddua").val(iddua);
    $(".kode_surat").val(kode_surat);
    $(".kode_desa").val(kode_desa);
    $(".actiondua").val('Ubah');
  }

  function bataldua(){
    $(".actiondua").val('Simpan');
  }

  function deldua(iddua){
    if(iddua != ''){
      var r = confirm("Apakah Anda Yakin akan menanghapus ini ?");
      if (r == true) {
          window.location.href = 'form/include/Kode_surat.php?actiondua=Kode_surat&del='+iddua;
      } 
    }
  }

  function edittiga(idtiga,kategoritiga,isi_surat){
    $(".idtiga").val(idtiga);
    $(".kategoritiga").val(kategoritiga);
    $(".isi_surat").val(isi_surat);
    $(".actiontiga").val('Ubah');
  }

  function bataltiga(){
    $(".actiontiga").val('Simpan');
  }

  function deltiga(idtiga){
    if(idtiga != ''){
      var r = confirm("Apakah Anda Yakin akan menanghapus ini ?");
      if (r == true) {
          window.location.href = 'form/include/isi_surat.php?actiontiga=isisurat&del='+idtiga;
      } 
    }
  }
  function editempat(idempat,nama_penandatangan,nip_penandatangan,isi_tandatangan){
    $(".idempat").val(idempat);
    $(".nama_penandatangan").val(nama_penandatangan);
    $(".nip_penandatangan").val(nip_penandatangan);
    $(".isi_tandatangan").val(isi_tandatangan);
    $(".actionempat").val('Ubah');
  }

  function batalempat(){
    $(".actionempat").val('Simpan');
  }

  function delempat(idempat){
    if(idempat != ''){
      var r = confirm("Apakah Anda Yakin akan menanghapus ini ?");
      if (r == true) {
          window.location.href = 'form/include/tandatangan.php?actionempat=tandatangan&del='+idempat;
      } 
    }
  }
</script>


<!-- kedua -->

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

            <!-- awal isi -->

            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Kategori Surat</h4>
                  
                  <!-- inti isi awal -->
                  <div class="col-md-12">
                    <form action="form/include/kategori.php?actionsatu=kategorisatu" method="POST" class="form-horizontal">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <input type="hidden" name="idsatu" class="form-control idsatu">
                        <input type="text" name="kategorisatu" class="form-control kategorisatu" placeholder="Masukan Kategori Surat">
                      </div>
                      <div class="form-group">
                        <input name="submitsatu" type="submit" class="btn btn-primary mr-2 actionsatu" value="Simpan">
                        <input type="reset" value="Batal" class="btn btn-info resetsatu" onclick="batalsatu()" />
                      </div>
                    </div>
                  </form>
                  </div>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Kategori Surat</h4>
                  
                  <!-- inti isi awal -->
                  <div class="col-md-12">
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="table-info">
                            <th style="text-align: center;">Kategori</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          // Perintah untuk menampilkan data
                          $ktsu= mysql_query ('
                            SELECT 
                              *
                            FROM 
                              tb_kategori_surat
                            ') ;  //menampikan SEMUA data dari tabel Matakuliah

                          // perintah untuk membaca dan mengambil data dalam bentuk array
                          while ($kategori = mysql_fetch_array ($ktsu)){ ?>  
                            <tr>
                              <td style="text-align: justify;"><?=$kategori['nama_kategori']?></td>
                              <td style="text-align: center;"> 
                                <a href="javascript:;" onclick="editsatu('<?=$kategori['id_kategori_surat']?>','<?=$kategori['nama_kategori']?>');">
                                  <i class="mdi mdi-tooltip-edit btn-icon-prepend">
                                  </i>
                                </a> 
                                ||
                                <a href="javascript:;">
                                  <i class="mdi mdi-delete btn-icon-prepend" onclick="delsatu('<?=$kategori['id_kategori_surat']?>');">
                                  </i>
                                </a>
                              </td>
                            </tr> 
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Nomer Surat</h4>
                  
                  <!-- inti isi awal -->
                  <form action="form/include/Kode_surat.php?actiondua=kodesurat" method="POST">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kode Surat</label>
                        <div class="col-sm-9">
                          <input type="hidden" name="iddua" class="form-control iddua">
                          <input type="text" name="kode_surat" class="form-control kode_surat" placeholder="Masukan Kode Surat">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kode Desa</label>
                        <div class="col-sm-9">
                          <input type="text" name="kode_desa" class="form-control kode_desa" placeholder="Masukan Kode Desa">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submitdua" type="submit" class="btn btn-primary mr-2 actiondua" value="Simpan">
                        <input type="reset" value="Batal" class="btn btn-info resetdua" onclick="bataldua()" />
                      </div>
                    </div>
                  </form>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Kode Surat</h4>
                  
                  <!-- inti isi awal -->
                  <div class="col-md-12">
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="table-info">
                            <th style="text-align: center;">Kode Surat</th>
                            <th style="text-align: center;">Kode Desa</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          // Perintah untuk menampilkan data
                          $kosu= mysql_query ('
                            SELECT 
                              *
                            FROM 
                              tb_kode_surat
                            ') ;  //menampikan SEMUA data dari tabel Matakuliah

                          // perintah untuk membaca dan mengambil data dalam bentuk array
                          while ($kodesurat = mysql_fetch_array ($kosu)){ ?>  
                            <tr>
                              <td style="text-align: center;"><?=$kodesurat['kode_surat']?></td>
                              <td style="text-align: center;"><?=$kodesurat['kode_desa']?></td>
                              <td style="text-align: center;"> 
                                <a href="javascript:;" onclick="editdua('<?=$kodesurat['id_kode_surat']?>','<?=$kodesurat['kode_surat']?>','<?=$kodesurat['kode_desa']?>');">
                                  <i class="mdi mdi-tooltip-edit btn-icon-prepend">
                                  </i>
                                </a> 
                                ||
                                <a href="javascript:;">
                                  <i class="mdi mdi-delete btn-icon-prepend" onclick="deldua('<?=$kodesurat['id_kode_surat']?>');">
                                  </i>
                                </a>
                              </td>
                            </tr> 
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Isi Surat</h4>
                  
                  <!-- inti isi awal -->
                  <form action="form/include/isi_surat.php?actiontiga=isisurat" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">kategori Surat</label>
                          <div class="col-sm-9">
                            <select name="kategoritiga" class="form-control kategoritiga">
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
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-1 col-form-label">Isi Surat</label>
                          <div class="col-sm-11">
                            <textarea type="text" name="nama" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>                    
                    
                    <div class="form-group">
                      <input name="submittiga" type="submit" class="btn btn-primary mr-2 actiontiga" value="Simpan">
                      <input type="reset" value="Batal" class="btn btn-info resettiga" onclick="bataltiga()" />
                    </div>
                  </form>
                  <br>   
                  <br>              
                  <h4 class="card-title">Data Isi Surat</h4>
                  
                  <!-- inti isi awal -->
                  <div class="col-md-12">
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="table-info">
                            <th style="text-align: center;">Kategori Surat</th>
                            <th style="text-align: center;">Isi Surat</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          // Perintah untuk menampilkan data
                          $isisurat= mysql_query ('
                            SELECT 
                              isi.*,
                              ks.*
                              
                            FROM 
                              tb_isi_surat isi,
                              tb_kategori_surat ks
                            WHERE
                              isi.id_kategori_surat = ks.id_kategori_surat

                            ') ;  //menampikan SEMUA data dari tabel Matakuliah

                          // perintah untuk membaca dan mengambil data dalam bentuk array
                          while ($issu = mysql_fetch_array ($isisurat)){ ?>  
                            <tr>
                              <td style="text-align: center;"><?=$issu['nama_kategori']?></td>

                              <!-- <td style="text-align: center;">
                                <embed src="assets/berkas/<?=$issu['isi_surat']?>" type="application/pdf" width="50" height="100"/>
                              </td> -->

                              <td style="text-align: center;"><?=$issu['isi_surat']?></td>

                              <td style="text-align: center;"> 
                                <a href="javascript:;" onclick="edittiga('<?=$issu['id_isi_surat']?>','<?=$issu['id_kategori_surat']?>','<?=$issu['isi_surat']?>');">
                                  <i class="mdi mdi-tooltip-edit btn-icon-prepend">
                                  </i>
                                </a> 
                                ||
                                <a href="javascript:;">
                                  <i class="mdi mdi-delete btn-icon-prepend" onclick="deltiga('<?=$issu['id_isi_surat']?>');">
                                  </i>
                                </a>
                              </td>
                            </tr> 
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>

            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Penandatangan</h4>
                  
                  <!-- inti isi awal -->
                  <form action="form/include/tandatangan.php?actionempat=tandatangan" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                      <input type="hidden" name="idempat" class="form-control idempat">
                      <div class="form-group">
                        <input type="text" name="nama_penandatangan" class="form-control nama_penandatangan" placeholder="Nama Lengkap">
                      </div>
                      <div class="form-group">
                        <input type="text" name="nip_penandatangan" class="form-control nip_penandatangan" placeholder="Nip">
                      </div>

                      <div class="form-group">
                        <input type="file" name="foto" class="file-upload-default foto">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Masukan Gambar Tandatangan">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-dark" type="button">Cari File</button>
                          </span>
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <input type="file" class="form-control foto" name="foto">
                      </div> -->
                      <div class="form-group">
                        <input name="submitempat" type="submit" class="btn btn-primary mr-2 actionempat" value="Simpan">
                        <input type="reset" value="Batal" class="btn btn-info resetempat" onclick="bataldua()" />
                      </div>
                    </div>
                  </form>
                  <form>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Tandatangan</h4>
                  
                  <!-- inti isi awal -->
                  <div class="col-md-12">
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="table-info">
                            <th style="text-align: center;">Nama Lengkap</th>
                            <th style="text-align: center;">Nip</th>
                            <th style="text-align: center;">Tandatangan</th>
                            <th style="text-align: center;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          // Perintah untuk menampilkan data
                          $tandatangan= mysql_query ('
                            SELECT 
                              *
                            FROM 
                              tb_tandatangan
                            ') ;  //menampikan SEMUA data dari tabel Matakuliah

                          // perintah untuk membaca dan mengambil data dalam bentuk array
                          while ($ttd = mysql_fetch_array ($tandatangan)){ ?>  
                            <tr>
                              <td style="text-align: center;"><?=$ttd['nama_penandatangan']?></td>
                              <td style="text-align: center;"><?=$ttd['nip_penandatangan']?></td>
                              <td style="text-align: center;"><img src="assets/images/tandatangan/<?=$ttd['isi_tandatangan']?>" width="100" height="100" /></td>
                              <td style="text-align: center;"> 
                                <a href="javascript:;" onclick="editempat('<?=$ttd['id_tandatangan']?>','<?=$ttd['nama_penandatangan']?>','<?=$ttd['nip_penandatangan']?>','<?=$ttd['isi_tandatangan']?>');">
                                  <i class="mdi mdi-tooltip-edit btn-icon-prepend">
                                  </i>
                                </a> 
                                ||
                                <a href="javascript:;">
                                  <i class="mdi mdi-delete btn-icon-prepend" onclick="delempat('<?=$ttd['id_tandatangan']?>');">
                                  </i>
                                </a>
                              </td>
                            </tr> 
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- inti isi akhir -->
                </div>
              </div>
            </div>
            
            <!-- akhir isi -->
          </div>
        </div>

<script type="text/javascript">
  function editsatu(idsatu,kategorisatu){
    $(".idsatu").val(idsatu);
    $(".kategorisatu").val(kategorisatu);
    $(".actionsatu").val('Ubah');
  }

  function batalsatu(){
    $(".actionsatu").val('Simpan');
  }

  function delsatu(idsatu){
    if(idsatu != ''){
      var r = confirm("Apakah Anda Yakin akan menanghapus ini ?");
      if (r == true) {
          window.location.href = 'form/include/kategori.php?actionsatu=kategorisatu&del='+idsatu;
      } 
    }
  }

  function editdua(iddua,kode_surat,kode_desa){
    $(".iddua").val(iddua);
    $(".kode_surat").val(kode_surat);
    $(".kode_desa").val(kode_desa);
    $(".actiondua").val('Ubah');
  }

  function bataldua(){
    $(".actiondua").val('Simpan');
  }

  function deldua(iddua){
    if(iddua != ''){
      var r = confirm("Apakah Anda Yakin akan menanghapus ini ?");
      if (r == true) {
          window.location.href = 'form/include/Kode_surat.php?actiondua=Kode_surat&del='+iddua;
      } 
    }
  }

  function edittiga(idtiga,kategoritiga,isi_surat){
    $(".idtiga").val(idtiga);
    $(".kategoritiga").val(kategoritiga);
    $(".isi_surat").val(isi_surat);
    $(".actiontiga").val('Ubah');
  }

  function bataltiga(){
    $(".actiontiga").val('Simpan');
  }

  function deltiga(idtiga){
    if(idtiga != ''){
      var r = confirm("Apakah Anda Yakin akan menanghapus ini ?");
      if (r == true) {
          window.location.href = 'form/include/isi_surat.php?actiontiga=isisurat&del='+idtiga;
      } 
    }
  }
  function editempat(idempat,nama_penandatangan,nip_penandatangan,isi_tandatangan){
    $(".idempat").val(idempat);
    $(".nama_penandatangan").val(nama_penandatangan);
    $(".nip_penandatangan").val(nip_penandatangan);
    $(".isi_tandatangan").val(isi_tandatangan);
    $(".actionempat").val('Ubah');
  }

  function batalempat(){
    $(".actionempat").val('Simpan');
  }

  function delempat(idempat){
    if(idempat != ''){
      var r = confirm("Apakah Anda Yakin akan menanghapus ini ?");
      if (r == true) {
          window.location.href = 'form/include/tandatangan.php?actionempat=tandatangan&del='+idempat;
      } 
    }
  }
</script>