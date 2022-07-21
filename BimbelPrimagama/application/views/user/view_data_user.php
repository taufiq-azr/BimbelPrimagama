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
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link h6 rounded js-scroll-trigger text-light" href="<?= site_url('Auth/logout')?>">Logout</a></li>
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
                            <h4 class="card-title">Data Peserta Bimbel</h4>
                            <form action="" class="form-sample" method="POST" enctype="multipart/form-data">
                                <p class="card-description"> Data Pribadi </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-3 col-form-label text-light">Nama</label>
                                            <div class="col-sm-9">
                                              
                                                <input type="text" name="nama" value="<?= $data_pendaftar['nama']; ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="nama" placeholder="Nama" disabled/>
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="kelas" class="col-sm-3 col-form-label text-light">Kelas</label>
                                            <div class="col-sm-9">
                                                <select name="kelas" class="form-control text-muted" style="background-color:#F0EBE3" id="kelas" disabled>
                                                <?php foreach ($kelas as $p) : ?>
                                                    <option value="<?= $p['id_kelas']; ?>" <?php if ($data_pendaftar['kelas'] == $p['id_kelas']) {
                                                         echo "selected";
                                                    } ?>><?= $p['desc_kelas']; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                                <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="jenis_kelamin" class="col-sm-3 col-form-label text-light">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <input name="jenis_kelamin" value="<?= $data_pendaftar['jenis_kelamin'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="jenis_kelamin" disabled/>
                                                    
                                                
                                                <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="tanggal_lahir" class="col-sm-3 col-form-label text-light">Tanggal Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="tanggal_lahir" value="<?= $data_pendaftar['tanggal_lahir'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="tanggal_lahir" placeholder="dd/mm/yyyy" disabled/>
                                                <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-3 col-form-label text-light">No Hp</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no_hp" value="<?= $data_pendaftar['no_hp'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="no_hp" placeholder="No Hp" disabled/>
                                                <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="agama" class="col-sm-3 col-form-label text-light">Agama</label>
                                            <div class="col-sm-9">
                                                <input name="agama" value="<?= $data_pendaftar['agama'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="agama" disabled/>
                                                   
                                                <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-3 col-form-label text-light">Kecamatan</label>
                                            <div class="col-sm-9">
                                                <input name="kecamatan" value="<?= $data_pendaftar['kecamatan'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="kecamatan" disabled/>
                                                   
                                            
                                                <?= form_error('kecamatan', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="program_bimbel" class="col-sm-3 col-form-label text-light">Program Bimbel</label>
                                            <div class="col-sm-9">
                                                <select name="program_bimbel" class="form-control text-muted" style="background-color:#F0EBE3" id="program_bimbel" disabled>
                                                
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
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="biaya_bimbel" class="col-sm-3 col-form-label text-light">Biaya Bimbel</label>
                                            <div class="col-sm-9">
                                                <select name="biaya_bimbel" value="<?= $data_pendaftar['biaya_bimbel'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="biaya_bimbel" disabled>
                                                <?php foreach ($program_bimbel as $p) : ?>
                                                    <option value="<?= $p['id_program_bimbel']; ?>" <?php if ($data_pendaftar['kelas'] == $p['id_program_bimbel']) {
                                                         echo "selected";
                                                    } ?>><?= $p['harga']; ?></option>
                                                    <?php endforeach; ?> 
                                                </select>

                                              
                                                <?= form_error('program_bimbel', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="card-description">Data Orang tua </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="nama_ayah" class="col-sm-3 col-form-label text-light">Nama Ayah</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama_ayah" value="<?= $data_pendaftar['nama_ayah'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="nama_ayah" placeholder="Nama Ayah" disabled/>
                                                <?= form_error('nama_ayah', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="nama_ibu" class="col-sm-3 col-form-label text-light">Nama Ibu</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama_ibu" value="<?= $data_pendaftar['nama_ibu'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="nama_ibu" placeholder="Nama Ibu" disabled/>
                                                <?= form_error('nama_ibu', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="pekerjaan_ayah" class="col-sm-3 col-form-label text-light">Pekerjaan Ayah</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pekerjaan_ayah" value="<?= $data_pendaftar['pekerjaan_ayah'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" disabled />
                                                <?= form_error('pekerjaan_ayah', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="pekerjaan_ibu" class="col-sm-3 col-form-label text-light">Pekerjaan Ibu</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pekerjaan_ibu" value="<?= $data_pendaftar['pekerjaan_ibu'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" disabled/>
                                                <?= form_error('pekerjaan_ibu', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="no_telpon_ayah" class="col-sm-3 col-form-label text-light">No Telpon Ayah</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no_telpon_ayah" value="<?= $data_pendaftar['no_telpon_ayah'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="no_telpon_ayah" placeholder="No Telpon Ayah" disabled/>
                                                <?= form_error('no_telpon_ayah', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="no_telpon_ibu" class="col-sm-3 col-form-label text-light">No Telpon Ibu</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no_telpon_ibu" value="<?= $data_pendaftar['no_telpon_ibu'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="no_telpon_ibu" placeholder="No Telpon Ibu" disabled/>
                                                <?= form_error('no_telpon_ibu', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('User/Pembayaran_data/').$data_pendaftar['id_pendaftar'] ?>" class="btn btn-primary">Berikutnya</a>
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