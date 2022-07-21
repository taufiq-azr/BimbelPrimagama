
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
                    <h4 class="card-title">Kelola Data Admin</h4>
                    <code>Data Admin</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered text-light">
                        <thead>
                        <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>Tanggal Daftar</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    <?php foreach ($user as $us) : ?>
                    <tr>
                        <td> <?= $i; ?>.</td>
                        <td> <?= $us['nama']; ?></td>
                        <td> <?= $us['email']; ?></td>
                        <td> <?= date('d F Y', $us['tanggal_daftar']); ?></td>
                        
                        <td>
                            <a  href="<?= base_url('Admin/hapus_admin/') . $us['id']; ?>" class="btn btn-outline-secondary btn-md" >Hapus</a>
                            <a  href="<?= base_url('Admin/View_Tambah_Admin/') ?>" class="btn btn-outline-secondary btn-md" >Tambah</a>
                            
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
          