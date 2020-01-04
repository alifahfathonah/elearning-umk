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
            <h5 class="card-header">Tabel Evaluasi
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
                    <th>Pertanyaan</th>
                    <th>Opsi A</th>
                    <th>Opsi B</th>
                    <th>Opsi C</th>
                    <th>Opsi D</th>
                    <th>Jawaban</th>
                    <th style="width:20%">Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($evaluasi as $key => $value) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value->pertanyaan; ?></td>
                      <td><?php echo $value->opsi_a; ?></td>
                      <td><?php echo $value->opsi_b; ?></td>
                      <td><?php echo $value->opsi_c; ?></td>
                      <td><?php echo $value->opsi_d; ?></td>
                      <td><?php echo $value->jawaban; ?></td>
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
                    <th>Pertanyaan</th>
                    <th>Opsi A</th>
                    <th>Opsi B</th>
                    <th>Opsi C</th>
                    <th>Opsi D</th>
                    <th>Jawaban</th>
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
        <h4 class="modal-title">Tambah Data Evaluasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <form class="" action="<?php echo base_url() . 'dashboard/evaluasi/createData'; ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="pertanyaan">Pertanyaan</label>
            <textarea class="form-control" name="pertanyaan" rows="2" required></textarea>
          </div>
          <div class="form-group">
            <label for="opsi_a">Opsi A</label>
            <input type="text" class="form-control" name="opsi_a" id="opsi_a" placeholder="Opsi A" required>
          </div>
          <div class="form-group">
            <label for="opsi_b">Opsi B</label>
            <input type="text" class="form-control" name="opsi_b" id="opsi_b" placeholder="Opsi B" required>
          </div>
          <div class="form-group">
            <label for="opsi_c">Opsi C</label>
            <input type="text" class="form-control" name="opsi_c" id="opsi_c" placeholder="Opsi C" required>
          </div>
          <div class="form-group">
            <label for="opsi_d">Opsi D</label>
            <input type="text" class="form-control" name="opsi_d" id="opsi_d" placeholder="Opsi D" required>
          </div>
          <div class="form-group">
            <label for="jawaban">Jawaban</label>
            <br>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="jawaban" checked="" value="A" class="custom-control-input"><span class="custom-control-label">A</span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="jawaban" value="B" class="custom-control-input"><span class="custom-control-label">B</span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="jawaban" value="C" class="custom-control-input"><span class="custom-control-label">C</span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="jawaban" value="D" class="custom-control-input"><span class="custom-control-label">D</span>
            </label>
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
        <h4 class="modal-title">Edit Data Evaluasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <form class="" action="<?php echo base_url() . 'dashboard/evaluasi/editData'; ?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="eid">
          <div class="form-group">
            <label for="epertanyaan">Pertanyaan</label>
            <textarea class="form-control" name="epertanyaan" id="epertanyaan" rows="2" required></textarea>
          </div>
          <div class="form-group">
            <label for="eopsi_a">Opsi A</label>
            <input type="text" class="form-control" name="eopsi_a" id="eopsi_a" placeholder="Opsi A" required>
          </div>
          <div class="form-group">
            <label for="eopsi_b">Opsi B</label>
            <input type="text" class="form-control" name="eopsi_b" id="eopsi_b" placeholder="Opsi B" required>
          </div>
          <div class="form-group">
            <label for="eopsi_c">Opsi C</label>
            <input type="text" class="form-control" name="eopsi_c" id="eopsi_c" placeholder="Opsi C" required>
          </div>
          <div class="form-group">
            <label for="eopsi_d">Opsi D</label>
            <input type="text" class="form-control" name="eopsi_d" id="eopsi_d" placeholder="Opsi D" required>
          </div>
          <div class="form-group">
            <label for="ejawaban">Jawaban</label>
            <br>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="ejawaban" checked="" value="A" class="custom-control-input"><span class="custom-control-label">A</span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="ejawaban" value="B" class="custom-control-input"><span class="custom-control-label">B</span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="ejawaban" value="C" class="custom-control-input"><span class="custom-control-label">C</span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="ejawaban" value="D" class="custom-control-input"><span class="custom-control-label">D</span>
            </label>
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

<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>

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
        url: 'evaluasi/selectData/' + id,
        success: function(data) {
          data = data['select'][0];
          $("input[name='eid']").val(data.id);
          $("textarea[name='epertanyaan']").val(data.pertanyaan);
          $("input[name='eopsi_a']").val(data.opsi_a);
          $("input[name='eopsi_b']").val(data.opsi_b);
          $("input[name='eopsi_c']").val(data.opsi_c);
          $("input[name='eopsi_d']").val(data.opsi_d);
          $("input[name='ejawaban'][value='" + data.jawaban + "']").prop("checked", true);
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
              url: 'evaluasi/deleteData/' + id,
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