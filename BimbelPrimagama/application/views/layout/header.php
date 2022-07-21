<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/mdi/css/materialdesignicons.min.css.map">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/codemirror/codemirror.css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/codemirror/ambiance.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/theme/dracula.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.png" />
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('css/'); ?>styles.css?<?php echo time(); ?>" rel="stylesheet" />
    <style>
        .bg-tiga {
            background-color: #1C1819 !important;
        }

        a.bg-tiga:hover,
        a.bg-tiga:focus,
        button.bg-tiga:hover,
        button.bg-tiga:focus {
            background-color: #1C1819 !important;
        }

        .bg-empat {
            background-color: #1a242f !important;
        }

        a.bg-empat:hover,
        a.bg-empat:focus,
        button.bg-empat:hover,
        button.bg-empat:focus {
            background-color: #1a242f !important;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-empat text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="sidebar-brand-wrapper h5 js-scroll-trigger text-light" href="#page-top">Lembaga Bimbel Primagama</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link h6 rounded js-scroll-trigger text-light" href="<?= site_url('User') ?>">Dashboard</a></li>
            
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link h6 rounded js-scroll-trigger text-light" href="<?= site_url('User/View_Data/').$data_pendaftar[0]['id_pendaftar']?>">Data Pendaftaran</a></li>
            
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link h6 rounded js-scroll-trigger text-light" href="<?= site_url('Auth/logout')?>">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>