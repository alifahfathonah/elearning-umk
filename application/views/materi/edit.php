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
            <!-- ============================================================== -->
            <!-- basic form  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <?php echo form_open_multipart(""); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Judul</label>
                                <input id="title" type="text" class="form-control" name="title" placeholder="Masukan Judul" value="<?php echo set_value('title', $materi[0]->judul); ?>">
                                <span class='text-danger'>
                                    <?php echo form_error('title'); ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="rpp_index">RPP Index</label>
                                <input id="rpp_index" type="text" class="form-control" name="rpp_index" placeholder="Masukkan RPP Index" value="<?php echo set_value('rpp_index', $materi[0]->rpp_index); ?>">
                                <span class='text-danger'>
                                    <?php echo form_error('rpp_index'); ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="userfile" class="col-form-label">Video</label>
                                <input id="userfile" type="file" class="form-control" name="userfile">
                                <p>Video Maks. 100 MB</p>
                                <span class='text-danger'>
                                    <?php echo form_error('userfile'); ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="ckeditor">Teori</label>
                                <textarea id="ckeditor" class="form-control" name="teori" placeholder="Masukkan Teori Materi"><?php echo set_value('teori', $materi[0]->teori); ?></textarea>
                                <span class='text-danger'>
                                    <?php echo form_error('teori'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <button class="btn btn-default" type="button" onclick="location.href='<?php echo base_url($current_page); ?>'">Kembali</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic form  -->
            <!-- ============================================================== -->
        </div>
    </div>

</div>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>