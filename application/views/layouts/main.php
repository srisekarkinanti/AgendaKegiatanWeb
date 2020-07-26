<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- GLOBAL MAINLY STYLES-->
   <?php $this->load->view('partial/css') ?>
   <?php $this->load->view('partial/js') ?>

    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="index.html">
                    <span class="brand">
                        <span class="brand-tip">AGENDA KEGIATAN</span>
                    </span>
                    <span class="brand-mini">AK</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="<?= base_url() ?>/assets/img/admin-avatar.png" />
                            <span></span><?= $this->session->userdata['user_logged']['full_name'] ?><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <!-- <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a>
                            <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a>
                            <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a>
                            <li class="dropdown-divider"></li> -->
                            <a class="dropdown-item" href="<?= site_url('admin/login/logout') ?>"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="<?= base_url() ?>/assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?= $this->session->userdata['user_logged']['full_name'] ?></div><small>Administrator</small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="<?= site_url('admin') ?>"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Halaman Utama</span>
                        </a>
                    </li>
                    <li class="heading">MENU</li>
                    
                    
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Kegiatan</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="<?= site_url('admin/events/index') ?>">Daftar Kegiatan</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/participants') ?>">Peserta</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/topics/index') ?>"><i class="sidebar-item-icon fa fa-tags"></i>
                            <span class="nav-label">Topik</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/rooms/index') ?>"><i class="sidebar-item-icon fa fa-home"></i>
                            <span class="nav-label">Ruangan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/notes/index') ?>"><i class="sidebar-item-icon fa fa-sticky-note"></i>
                            <span class="nav-label">Catatan</span>
                        </a>
                    </li>
                    
                    <!-- <li>
                        <a href="<?= site_url('user/index') ?>"><i class="sidebar-item-icon fa fa-users"></i>
                            <span class="nav-label">Users</span>
                        </a>
                    </li> -->
                    
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">

                <?= $contents; ?>
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13"><?= date('Y') ?> © <b>AGENDA KEGIATAN</b> - All rights reserved.</div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    
</body>

</html>
<?php $this->load->view('admin/_partials/realtime') ?>
