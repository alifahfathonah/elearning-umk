<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>

    <title>E-Learning</title>

    <style>
        .dashboard-wrapper {
            position: relative;
            left: 0;
            margin-left: 100px;
            margin-right: 100px;
            min-height: 870px !important;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="javascript:void(0)">E-Learning - <small>Media Pembelajaran SMAN 05 Bombana</small> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a href="<?php echo base_url() ?>" class="nav-link nav-user-img">Materi</a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a href="<?php echo base_url('kuis')?>" class="nav-link nav-user-img">Kuis</a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a href="<?php echo base_url('login')?>" class="nav-link nav-user-img">Masuk</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ==========================================vidio auta download php ============================================================== -->

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Materi</h5>
                                <div class="container">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="embed-responsive embed-responsive-16by9 border">
                                                <!-- <iframe class="embed-responsive-item" src="<?php echo base_url() . "assets/video/" . $materi[0]->nama_file; ?>" frameborder="0" allowfullscreen id="video"></iframe> -->
                                                <!-- <video width="320" height="240" controls>
                                                    <source src="<?php echo base_url() . "assets/video/" . $materi[0]->nama_file; ?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video> -->
                                            </div>
                                            <div style="margin-top: 20px">
                                                <?php echo $materi[0]->teori;?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                                            <ul class="list-group" style="cursor:pointer" id="my_list">
                                                <?php foreach ($materi as $key => $value) : ?>
                                                    <li class="list-group-item" data-id="<?php echo $value->nama_file ?>"><?php echo $value->rpp_index . ". " . $value->judul; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#my_list').on('click', 'li', function() {
                var base_url = $('#base_url').val();
                var my_video = $(this).data('id')
                var src = base_url + "assets/video/" + my_video;
                console.log(src);
                $("#video").attr("src", src);
            });
        });
    </script>

    
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <div class="footer" style="bottom:0 !important">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
    </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <!-- <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script> -->
    <!-- bootstap bundle js -->
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="<?php echo base_url(); ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="<?php echo base_url(); ?>assets/libs/js/main-js.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- chart chartist js -->
    <script src="<?php echo base_url(); ?>assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="<?php echo base_url(); ?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="<?php echo base_url(); ?>assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>

