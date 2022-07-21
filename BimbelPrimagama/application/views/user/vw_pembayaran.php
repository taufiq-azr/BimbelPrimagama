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
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link h6 rounded js-scroll-trigger text-light" href="<?= site_url('Auth/logout') ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-panel no-js">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="col-12 grid-margin stretch-card main-panel">
                    <div class="card">
                        <div class="card-body" style="background-color: #1a242f;">
                            <h4 class="card-title">Halamana Penetapan Pembayaraan</h4>
                            <form action="<?= base_url('User/Pembayaran/') . $data_pendaftar['id_pendaftar'] ?>" class="form-sample" method="POST" enctype="multipart/form-data">
                                <p class="card-description"> Data Pribadi </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="nama_pembayaran" class="col-sm-3 col-form-label text-light">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="id_pendaftar" value="<?= $data_pendaftar['id_pendaftar']; ?>" class="form-control text-muted" id="id_pendaftar" placeholder="Nama" readonly />
                                                <input type="text" name="nama_pembayaran" value="<?= $data_pendaftar['nama'] ?>" class="form-control text-secondary" id="nama_pembayaran" placeholder="Isi Nama Pembayar" readonly/>
                                                <?= form_error('nama_pembayaran', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="jenis_kelamin" class="col-sm-3 col-form-label text-light">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <input name="jenis_kelamin" value="<?= $data_pendaftar['jenis_kelamin'] ?>" class="form-control text-muted" id="jenis_kelamin" readonly />


                                                <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="program_bimbel" class="col-sm-3 col-form-label text-light">Program Bimbel</label>
                                            <div class="col-sm-9">
                                                <select name="program_bimbel" class="form-control text-muted" id="program_bimbel" disabled>

                                                    <?php foreach ($program_bimbel as $p) : ?>
                                                        <option value="<?= $p['id_program_bimbel']; ?>" <?php if ($data_pendaftar['kelas'] == $p['id_program_bimbel']) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?= $p['program_bimbel']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>


                                                <?= form_error('program_bimbel', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="total_pembayaran" class="col-sm-3 col-form-label text-light">Biaya Bimbel</label>
                                            <div class="col-sm-9">
                                                <select name="total_pembayaran" value="<?= $data_pendaftar['biaya_bimbel'] ?>" class="form-control text-muted" id="total_pembayaran" disabled>
                                                    <?php foreach ($program_bimbel as $p) : ?>
                                                        <option value="<?= $p['id_program_bimbel']; ?>" <?php if ($data_pendaftar['kelas'] == $p['id_program_bimbel']) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?= $p['harga']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>


                                                <?= form_error('total_pembayaran', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="tanggal_bayar" class="col-sm-3 col-form-label text-light">Tanggal Pembayaran Yang ditentukan</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tanggal_bayar" value="<?= set_value('tanggal_bayar') ?>" class="form-control" id="tanggal_bayar" placeholder="dd/mm/yyyy" />
                                            <?= form_error('tanggal_bayar', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                    </div>
                                </div>
                                </div>
                            


                                <div class="modal-footer">
                                
                                    <input type="submit" name="submit" class="btn btn-danger" value="Tetapkan Pembayaran">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>

        </div>
    </footer>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('assets/') ?>vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets/') ?>js/off-canvas.js"></script>
    <script src="<?= base_url('assets/') ?>js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets/') ?>js/misc.js"></script>
    <script src="<?= base_url('assets/') ?>js/settings.js"></script>
    <script src="<?= base_url('assets/') ?>js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <script>
        $("#kelas").change(function() {

            // variabel dari nilai combo box kendaraan
            var id_kelas = $("#kelas").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url: "<?php echo base_url(); ?>User/get_bimbel",
                method: "POST",
                data: {
                    id_kelas: id_kelas
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;

                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_program_bimbel + '>' + data[i].program_bimbel + '</option>';

                    }
                    $('#program_bimbel').html(html);

                }
            });

        });
        $("#kelas").change(function() {

            // variabel dari nilai combo box kendaraan
            var id_kelas = $("#kelas").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url: "<?php echo base_url(); ?>User/get_bimbel",
                method: "POST",
                data: {
                    id_kelas: id_kelas
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;

                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_program_bimbel + '>' + data[i].harga + '</option>';

                    }
                    $('#biaya_bimbel').html(html);

                }
            });

        });
    </script>
</body>

</html>