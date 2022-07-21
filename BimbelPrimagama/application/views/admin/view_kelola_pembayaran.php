
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Admin Page</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Admin Page</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Kelola Data Pembayaran</h4>
                    <code>Data Pembayaran</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered text-light">
                        <thead>
                        <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Jenis Kelamin</td>
                        <td>Program Bimbel</td>
                        <td>Total Bayar</td>
                        <td>Tanggal yang ditentukan</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    <?php foreach ($user as $us) : ?>
                    <tr>
                        <td> <?= $i; ?>.</td>
                        <td> <?= $us['nama_pembayaran']; ?></td>
                        <td> <?= $us['jenis_kelamin']; ?></td>
                        <td> <?= $us['program_bimbel']; ?></td>
                        <td> Rp. <?= $us['total_pembayaran']; ?></td>
                        <td> <?= $us['tanggal_bayar']; ?></td>
                        <td> <?= $us['status']; ?></td>
                        <td>
                       
                          
                            <a  href="<?= base_url('Admin/View_Edit_Pembayaran/').$us['id'] ?>" class="btn btn-outline-secondary btn-md" >Edit</a>
                            <a  href="<?= base_url('Admin/hapus_pembayaran/') . $us['id']; ?>" class="btn btn-outline-secondary btn-md" >Hapus</a>
                            
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          