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
            <h5 class="card-header">Tabel Materi
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
                    <th>Judul</th>
                    <th>Nama File</th>
                    <th>RPP Index</th>
                    <th style="width:20%">Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($materi as $key => $value) : ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value->judul; ?></td>
                      <td><?php echo $value->nama_file; ?></td>
                      <td><?php echo $value->rpp_index; ?></td>
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
                    <th>Judul</th>
                    <th>Nama File</th>
                    <th>RPP Index</th>
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
        <h4 class="modal-title">Tambah Data Materi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <form class="" action="<?php echo base_url() . 'dashboard/materi/createData'; ?>" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
          <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Judul Video" required>
          </div>
          <div class="form-group">
            <label for="rpp_index">RPP Index</label>
            <input type="text" class="form-control" name="rpp_index" id="rpp_index" placeholder="RPP Index Video" required>
          </div>
          <div class="form-group">
            <label for="userfile">File</label>
            <input type="file" class="form-control" name="userfile" id="userfile" required>
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
        <h4 class="modal-title">Edit Data Kuis</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <form class="" action="<?php echo base_url() . 'dashboard/materi/editData'; ?>" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
          <!-- <input type="hidden" name="eid"> -->
          <div class="form-group">
            <label for="etitle">Judul</label>
            <input type="text" class="form-control" name="etitle" id="etitle" placeholder="Judul Video" required>
          </div>
          <div class="form-group">
            <label for="erpp_index">RPP Index</label>
            <input type="text" class="form-control" name="erpp_index" id="erpp_index" placeholder="RPP Index Video" required>
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
        url: 'materi/selectData/' + id,
        success: function(data) {
          data = data['select'][0];
          $("input[name='eid']").val(data.id);
          $("input[name='etitle']").val(data.judul);
          $("input[name='erpp_index']").val(data.rpp_index);
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
              url: 'materi/deleteData/' + id,
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