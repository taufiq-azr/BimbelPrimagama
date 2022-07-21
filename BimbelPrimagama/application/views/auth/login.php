

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth " style="background-color: #1a242f;">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form method="post" action="<?= base_url('auth'); ?>">
                  <div class="form-group">
                    <label>Email *</label>
                    <input type="text" class="form-control p_input text-secondary" value="<?=set_value('email'); ?>" id="email" name="email" placeholder="Masukkan Alamat Email...">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input text-secondary" value="<?= set_value('nama'); ?>" name="password" id="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                  </div>
                
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  
                  <p class="sign-up">Tidak Punya Akun?<a href="<?= base_url('Auth/registrasi'); ?>"> Daftar</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    