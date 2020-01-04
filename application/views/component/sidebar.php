        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?php if($this->uri->segment(2)==''){echo "active";} ?>" href="<?php echo base_url('dashboard'); ?>"><i class="fas fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?php if($this->uri->segment(2)=='materi'){echo "active";} ?>" href="<?php echo base_url()."dashboard/materi"; ?>"><i class="fa fa-book"></i>Materi <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?php if($this->uri->segment(2)=='kuis'){echo "active";} ?>" href="<?php echo base_url()."dashboard/kuis"; ?>"><i class="fa fa-question-circle"></i>Kuis <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?php if($this->uri->segment(2)=='evaluasi'){echo "active";} ?>" href="<?php echo base_url()."dashboard/evaluasi"; ?>"><i class="fas fa-chart-line"></i>Evaluasi <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?php if($this->uri->segment(2)=='profilGuru'){echo "active";} ?>" href="<?php echo base_url()."dashboard/profilGuru"; ?>"><i class="fa fa-fw fa-user-circle"></i>Profil Guru <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?php if($this->uri->segment(2)=='tentang'){echo "active";} ?>" href="<?php echo base_url()."dashboard/tentang"; ?>"><i class="fa fa-info-circle"></i>Tentang <span class="badge badge-success">6</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
