<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Form elements </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav>
        </div>
        <div class="row">

            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body" style="background-color: dark">
                        <h4 class="card-title">EDIT DATA PEMBAYARAN</h4>
                        <form action="" class="form-sample" enctype="multipart/form-data"  method="POST">
                            <p class="card-description"> Data Pembayaran </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <input type="hidden" name="id_pendaftar" value="<?= $pembayaran['id_pendaftar']; ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="id_pendaftar" placeholder="Id Pendaftar " readonly/>
                                        <label for="nama_pembayaran" class="col-sm-3 col-form-label text-secondary">Nama</label>
                                        <div class="col-sm-9">

                                            <input type="text" name="nama_pembayaran" value="<?= $pembayaran['nama_pembayaran']; ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="nama_pembayaran" placeholder="Nama " readonly/>
                                            <?= form_error('nama_pembayaran', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="jenis_kelamin" class="col-sm-3 col-form-label text-secondary">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <input name="jenis_kelamin" value="<?= $pembayaran['jenis_kelamin']; ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="jenis_kelamin" readonly
                                            </input>
                                            <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="program_bimbel" class="col-sm-3 col-form-label text-secondary">Program Bimbel</label>
                                        <div class="col-sm-9">
                                            <input name="program_bimbel" value="<?= $pembayaran['program_bimbel']; ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="program_bimbel" readonly/>


                                            <?= form_error('program_bimbel', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="total_pembayaran" class="col-sm-3 col-form-label text-secondary">Total Pembayaran</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="total_pembayaran" value="<?= $pembayaran['total_pembayaran']; ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="total_pembayaran" readonly/>
                                            <?= form_error('total_pembayaran', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="tanggal_bayar" class="col-sm-3 col-form-label text-light">Tanggal Pembayaran yang ditentukan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="tanggal_bayar" value="<?= $pembayaran['tanggal_bayar']; ?>" class="form-control text-muted" id="tanggal_bayar" readonly/>

                                            <?= form_error('tanggal_bayar', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-3 col-form-label text-light">Status</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="status" value="<?= $pembayaran['status']; ?>" class="form-control text-light" style="background-color:#495C83" id="status" />

                                            <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="tambah" class="btn btn-primary float-right">Simpan</button>
                                <a href="<?= base_url('Admin/View_Kelola_Pembayaran') ?>" class="btn btn-danger">Tutup</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>