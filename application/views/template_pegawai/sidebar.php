<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                   <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">APOTEK</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('pegawai/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pegawai/obat_controller') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>DATA OBAT</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pegawai/pegawai_controller') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>DATA PEGAWAI</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pegawai/pembeli_controller') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>DATA PEMBELI</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pegawai/supplier_controller') ?>">
                <i class="fas fa-fw fa-database"></i>
                    <span>DATA SUPPLIER</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pegawai/transaksi_controller') ?>">
                <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>TRANSAKSI</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pegawai/laporan_controller') ?>">
                <i class="fas fa-fw fa-file-alt"></i>
                    <span>LAPORAN</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="<?php base_url('login_controller') ?>" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama_pegawai'); ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url()?>uploads/<?php echo $this->session->userdata['foto'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- profil -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php base_url('login_controller/login') ?>" data-toggle="modal" data-target="#profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a> 

                               <!-- logout -->
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="<?php echo base_url('login_controller/logout') ?>" data-toggle="modal" data-target="#logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                
                            </div>
                        </li>

                    </ul>

                    <div>
                        <!-- Modal Profile-->
                        <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profile" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="profile">Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url().'login_controller/login';?>" method="post" enctype="multipart/form-data">
                                <div class = "card">
                                    
                                    <img class="card-img-top mt-3 mb-3" style= "max-width: 200px;" src="<?php echo base_url()?>uploads/<?php echo $this->session->userdata['foto'] ?>"  alt="">
                                    
                                    <table class="table table-bordered table-hover table-striped text mb-3">
                                        <tr>
                                            <td>ID Pegawai</td>
                                            <td><strong><?php echo $this->session->userdata('id_pegawai'); ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td>Username</td>
                                            <td><strong><?php echo $this->session->userdata('username'); ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td>Nama Pegawai</td>
                                            <td><strong><?php echo $this->session->userdata('nama_pegawai'); ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td><strong><?php echo $this->session->userdata('email'); ?></strong></td>
                                        </tr>
                                    </table>
                                    
                                </div>
                                    
                                    
                                    
                                    
                                    
                                    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    
                    </div>

                    <div>   
                        <!-- Modal Logout-->
                        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="logout">Konfirmasi Logout</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url().'login_controller/logout';?>" method="post" enctype="multipart/form-data">

                                    <p>Apakah Anda yakin ingin logout ?</p>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </nav>
                
                <!-- End of Topbar -->

