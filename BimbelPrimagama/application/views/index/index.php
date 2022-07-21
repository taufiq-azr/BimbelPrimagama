<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Penerimaan Peserta Didik Baru (PPDB) Online</title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('css/'); ?>styles.css?<?php echo time(); ?>" rel="stylesheet" />
    <style>
        .bg-tiga {
            background-color: #1C1819  !important;
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
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Lembaga Bimbel Primagama</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#panduan">Panduan</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= site_url('Auth')?>"">Login</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead bg-tiga text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="<?php echo base_url('assets/img/avatar.png'); ?>" alt="" />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Sistem Penerimaan Bimbel Peserta Didik Baru (PPDB) Online</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Lembaga Bimbingan Belajar Primagama</p>
        </div>
    </header>
    <section class="page-section bg-empat  text-white mb-0" id="panduan">
        <div class="divider-custom divider-light">
        </div>
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">Panduan Pendaftaran</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto">
                    <p>Pendaftaran akan dibuka untuk Kelas 7 - 12</p>
                    <p>Pengajar akan mengajar Mata Pelajaran selama 3 pertemuan per-minggu</p>
                </div>
                <div class="col-lg-4 mr-auto">
                    <p ">Langkah pertama mendaftar adalah klik tombol Login, jika belum memiliki akun, harap Daftar terlebih dahulu. Kemudian lengkapi data pendaftaran dan data pengajuan pembayaran</p>
            </div>
        </div>
        <div class=" text-center mt-4">
                        <a class="btn btn-xl btn-outline-light" href="<?= base_url('Auth/registrasi'); ?>">
                            Daftar
                        </a>
                </div>
            </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Telepon</h4>
                    <p class="lead mb-0">
                        +6282294160400
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Media Sosial</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Alamat Sekolah</h4>
                    <p class="lead mb-0">
                    JL. Ahmad Yani No. 4, Teluk Kuantan, Kuantan Singingi, Pekanbaru - Riau, Pasar Taluk, Kuantan Tengah, Kuantan Singingi Regency, Riau 29566
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Lembaga Bimbingan Primagama - 2022 </small></div>
    </div>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- Portfolio Modals-->
    <!-- Portfolio Modal 1-->
    
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="<?php echo base_url('assets/mail/jqBootstrapValidation.js'); ?>"></script>
    <script src="<?php echo base_url('assets/mail/contact_me.js'); ?>"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url('js/scripts.js'); ?>"></script>
</body>

</html>