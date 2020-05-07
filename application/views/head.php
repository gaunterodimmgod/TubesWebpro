<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ClemPHC</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
</head>

<body class="skin-black">
    <!-- header logo -->
    <header class="header">
        <p href="#" class="logo">Admin</p>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- User Account -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span><?php echo $this->session->userdata('nama_dokter'); ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                            <li class="dropdown-header text-center">Akun</li>
                            <li>
                                <?php echo anchor('dashboard/logout', "<i class='fa fa-ban fa-fw pull-right'></i> Logout"); ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <center>
                        <div class="pull-left image">
                            <img src="<?php echo base_url('assets/img/avatar5.png'); ?>" width="50%" class="img-circle" alt="User Image" />
                        </div>
                    </center>
                    <div class="pull-left info" align="center"><br />
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Hello, Admin</p>
                    </div>
                </div>
                <!-- sidebar menu -->
                <ul class="sidebar-menu">
                    <li class="active">
                        <?php echo anchor('dashboard', "<i class='fa fa-dashboard'></i> <span>Dashboard</span>"); ?>
                    </li>
                    <?php if ($this->session->userdata('role') == 'dokter') { ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Data</span>
                                <i class="fa  "></i>
                            </a>
                            <ul class="">
                                <li>
                                    <?php echo anchor('pasien', "<i class='fa '></i> Pasien"); ?>
                                </li>
                                <li>
                                    <?php echo anchor('riwayat', "<i class='fa '></i> Riwayat"); ?>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php echo anchor('history', "<i class='fa fa-history'></i> <span>History</span>"); ?>
                        </li>
                        <li>
                            <?php echo anchor('user', "<i class='fa fa-user'></i> <span>User</span>"); ?>
                        </li>
                    <?php } else if ($this->session->userdata('role') == 'perawat') { ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Data</span>
                                <i class="fa  "></i>
                            </a>
                            <ul class="">
                                <li>
                                    <?php echo anchor('pasien', "<i class='fa '></i> Pasien"); ?>
                                </li>
                                <li>
                                    <?php echo anchor('riwayat', "<i class='fa '></i> Riwayat"); ?>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php echo anchor('history', "<i class='fa fa-history'></i> <span>History</span>"); ?>
                        </li>
                        <li>
                            <?php echo anchor('user', "<i class='fa fa-user'></i> <span>User</span>"); ?>
                        </li>
                    <?php } ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
    </div>
</body>