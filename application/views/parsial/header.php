<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- judul halaman -->
    <title><?= isset($title)? $title : 'Blank'?></title>

    <!-- load css bootstrap -->
    <link href="<?=base_url('assets/sbadmin/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- load css font-awesome -->
    <link href="<?=base_url('assets/sbadmin/font-awesome/css/font-awesome.css')?>" rel="stylesheet">
    <!-- load css sb-admin -->
    <link href="<?=base_url('assets/sbadmin/css/sb-admin.css" rel="stylesheet')?>">

    <!-- load library jquery -->
    <script src="<?=base_url('assets/jquery/jquery.min.js')?>"></script>
    <!-- load library datatables -->
    <script src="<?=base_url('assets/datatables/datatables.min.js')?>"></script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <!-- tombol navigasi akan tampil ketika ukuran layar kecil  -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Absensi Karyawan</a>
            </div>

            <div class="navbar-default navbar-static-side" role="navigation">
                <!-- side menu -->
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?=base_url('home')?>"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="<?=base_url('absensi')?>"><i class="fa fa-edit fa-fw"></i> Absensi</a>
                        </li>
                        <li>
                            <a href="<?=base_url('karyawan')?>"><i class="fa fa-user"></i> Karyawan</a>
                        </li>
                        <li>
                            <a href="<?=base_url('unit')?>"><i class="fa fa-user"></i> Ganti Unit</a>
                        </li>
                        <li>
                            <a href="<?=base_url('rekap')?>"><i class="fa fa-table"></i> Rekap</a>
                        </li>
                        <li>
                            <a href="<?=base_url('auth/logout')?>"><i class="fa fa-sign-out"></i> Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
    </div>

    <!-- haed -->

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><?= isset($head) ? $head : null?></h2>
            </div>
        </div>