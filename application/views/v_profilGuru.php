<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">

      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title"><?php echo $title; ?></h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <h5 class="card-header">Tabel Profil Guru
              <div class="float-right">
                <button type="button" name="button" class="btn btn-sm btn-default" onclick="location.href='<?php echo base_url($current_page); ?>'"> <i class="fas fa-sync"></i> Muat Ulang</button>
                <button type="button" name="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"> <i class="fas fa-plus"></i> Tambah Data</button>
              </div>
            </h5>
            <div class="container">
              <br>
              <?php
              if ($this->session->flashdata('alert')) {
                echo $this->session->flashdata('alert');
              }
              ?>
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>JK</th>
                    <th>Mapel</th>
                    <th style="width:20%">Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($profilGuru as $key => $value) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value->nama; ?></td>
                      <td><?php echo $value->alamat; ?></td>
                      <td><?php echo $value->email; ?></td>
                      <td><?php echo $value->no_hp; ?></td>
                      <td><?php echo $value->jk; ?></td>
                      <td><?php echo $value->mapel; ?></td>
                      <td style="text-align:center">
                        <a type="button" class="btn btn-warning btn-sm btn-edit-modal" data-id="<?php echo $value->id; ?>"> <i class="fas fa-edit"></i> Edit</a>
                        <button type="button" class="btn btn-danger btn-sm btn-delete-confirm" data-id="<?php echo $value->id; ?>"> <i class="fa fa-trash"></i> Hapus</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>JK</th>
                    <th>Mapel</th>
                    <th>Pilihan</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
  </div>

</div>
</div>
</div>


<div class="modal modal-primary fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Tambah Data Guru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <form class="" action="<?php echo base_url() . 'dashboard/profilGuru/createData'; ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" rows="2" required></textarea>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="no_hp">No Handphone</label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No. Handphone" required>
          </div>
          <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <br>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="jk" checked="" value="Laki-Laki" class="custom-control-input"><span class="custom-control-label">Laki-Laki</span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="jk" value="Perempuan" class="custom-control-input"><span class="custom-control-label">Perempuan</span>
            </label>
          </div>
          <div class="form-group">
            <label for="mapel">Mata Pelajaran</label>
            <input type="text" class="form-control" name="mapel" id="mapel" placeholder="Mata Pelajaran" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary btn-outline">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal modal-primary fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">Edit Data Guru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <form class="" action="<?php echo base_url() . 'dashboard/profilGuru/editData'; ?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="eid">
          <div class="form-group">
            <label for="enama">Nama</label>
            <input type="text" class="form-control" name="enama" id="enama" placeholder="Nama" required>
          </div>
          <div class="form-group">
            <label for="ealamat">Alamat</label>
            <textarea class="form-control" name="ealamat" rows="2" required></textarea>
          </div>
          <div class="form-group">
            <label for="eemail">Email</label>
            <input type="email" class="form-control" name="eemail" id="eemail" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="eno_hp">No Handphone</label>
            <input type="text" class="form-control" name="eno_hp" id="eno_hp" placeholder="No. Handphone" required>
          </div>
          <div class="form-group">
            <label for="ejk">Jenis Kelamin</label>
            <br>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="ejk" value="Laki-Laki" class="custom-control-input"><span class="custom-control-label">Laki-Laki</span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="ejk" value="Perempuan" class="custom-control-input"><span class="custom-control-label">Perempuan</span>
            </label>
          </div>
          <div class="form-group">
            <label for="emapel">Mata Pelajaran</label>
            <input type="text" class="form-control" name="emapel" id="emapel" placeholder="Mata Pelajaran" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-warning btn-outline">Edit</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script> -->

<script>
  $(function() {
    $('.btn-edit-modal').click(function(e) {
      e.preventDefault();
      $('#modal-edit').modal({
        backdrop: 'static',
        show: true
      });
      id = $(this).data('id');
      // mengambil nilai data-id yang di click
      $.ajax({
        url: 'profilGuru/selectData/' + id,
        success: function(data) {
          console.log(data);
          
          data = data['select'][0];          
          $("input[name='eid']").val(data.id);
          $("input[name='enama']").val(data.nama);
          $("textarea[name='ealamat']").val(data.alamat);
          $("input[name='eemail']").val(data.email);
          $("input[name='eno_hp']").val(data.no_hp);
          $("input[name='ejk'][value='" + data.jk + "']").prop("checked", true);
          $("input[name='emapel']").val(data.mapel);
        }
      });
    });

    $('.btn-delete-confirm').click(function(e) {
      id = $(this).data('id');
      swal({
          title: "Apakah Anda Yakin Ingin Menghapus Data?",
          text: "Data yang sudah dihapus tidak dapat dikembalikan!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: 'profilGuru/deleteData/' + id,
              error: function() {
                alert('Terjadi Kesalahan');
              },
              success: function(data) {
                swal("Data Berhasil Dihapus!", {
                  icon: "success"
                });
                location.reload();
              }
            });
          }
        });
    });

  });
</script>