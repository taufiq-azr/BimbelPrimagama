
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
                        <div class="card-body" style="background-color: dark" >
                            <h4 class="card-title">PENDAFTARAN PESERTA DIDIK BARU</h4>
                            <form action="" class="form-sample" method="POST" enctype="multipart/form-data">
                                <p class="card-description"> Data Pribadi </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-3 col-form-label text-secondary">Nama</label>
                                            <div class="col-sm-9">
                                              
                                                <input type="text" name="nama" value="<?= $data_pendaftar['nama']; ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="nama" placeholder="Nama" disabled/>
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="kelas" class="col-sm-3 col-form-label text-secondary">Kelas</label>
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
                                            <label for="jenis_kelamin" class="col-sm-3 col-form-label text-secondary">Jenis Kelamin</label>
                                            <div class="col-sm-9">
                                                <input name="jenis_kelamin" value="<?= $data_pendaftar['jenis_kelamin'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="jenis_kelamin" disabled/>
                                                    
                                                
                                                <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="tanggal_lahir" class="col-sm-3 col-form-label text-secondary">Tanggal Lahir</label>
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
                                            <label for="no_hp" class="col-sm-3 col-form-label text-secondary">No Hp</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no_hp" value="<?= $data_pendaftar['no_hp'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="no_hp" placeholder="No Hp" disabled/>
                                                <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="agama" class="col-sm-3 col-form-label text-secondary">Agama</label>
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
                                            <label for="kecamatan" class="col-sm-3 col-form-label text-secondary">Kecamatan</label>
                                            <div class="col-sm-9">
                                                <input name="kecamatan" value="<?= $data_pendaftar['kecamatan'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="kecamatan" disabled/>
                                                   
                                            
                                                <?= form_error('kecamatan', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="program_bimbel" class="col-sm-3 col-form-label text-secondary">Program Bimbel</label>
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
                                            <label for="biaya_bimbel" class="col-sm-3 col-form-label text-secondary">Biaya Bimbel</label>
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
                                            <label for="nama_ayah" class="col-sm-3 col-form-label text-secondary">Nama Ayah</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama_ayah" value="<?= $data_pendaftar['nama_ayah'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="nama_ayah" placeholder="Nama Ayah" disabled/>
                                                <?= form_error('nama_ayah', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="nama_ibu" class="col-sm-3 col-form-label text-secondary">Nama Ibu</label>
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
                                            <label for="pekerjaan_ayah" class="col-sm-3 col-form-label text-secondary">Pekerjaan Ayah</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pekerjaan_ayah" value="<?= $data_pendaftar['pekerjaan_ayah'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" disabled />
                                                <?= form_error('pekerjaan_ayah', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="pekerjaan_ibu" class="col-sm-3 col-form-label text-secondary">Pekerjaan Ibu</label>
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
                                            <label for="no_telpon_ayah" class="col-sm-3 col-form-label text-secondary">No Telpon Ayah</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no_telpon_ayah" value="<?= $data_pendaftar['no_telpon_ayah'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="no_telpon_ayah" placeholder="No Telpon Ayah" disabled/>
                                                <?= form_error('no_telpon_ayah', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="no_telpon_ibu" class="col-sm-3 col-form-label text-secondary">No Telpon Ibu</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="no_telpon_ibu" value="<?= $data_pendaftar['no_telpon_ibu'] ?>" class="form-control text-muted" style="background-color:#F0EBE3" id="no_telpon_ibu" placeholder="No Telpon Ibu" disabled/>
                                                <?= form_error('no_telpon_ibu', '<small class="text-danger">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    
                                    <a href="<?= base_url('Admin') ?>" class="btn btn-danger">Tutup</a>
                                </div>

                            </form>
                        </div>
                    </div>
              </div>
              