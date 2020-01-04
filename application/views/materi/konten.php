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
                                        <button type="button" name="button" class="btn btn-sm btn-primary" onclick="location.href='<?php echo base_url($current_page); ?>/createData'"> <i class="fas fa-plus"></i> Tambah Data</button>
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
                                                        <a type="button" class="btn btn-warning btn-sm" onclick="location.href='<?php echo base_url($current_page.'/editData/'.$value->id); ?>'"> <i class="fas fa-edit"></i> Edit</a>
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

<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>

<script>
    $(function() {
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