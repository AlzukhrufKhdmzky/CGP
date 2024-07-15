<div class="box2 container col-10 col-md-6 col-lg-6 col-xl-4 shadow">
  <div class="form-title mt-4 d-flex justify-content-center align-items-center">
    <h2 class="pt-3 border-bottom">Form registrasi</h2>
  </div>
  <div class="form-body mt-4">
    <form action="<?= base_url('auth/registrasi'); ?>" method="post">

      <!-- input nama -->
      <?= form_error('name', '<small class="ket text-danger">', '</small>'); ?>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="<?= set_value('name') ?>" autofocus>
      </div>

      <!-- input email -->
      <?= form_error('email', '<small class="ket text-danger pt-0">', '</small>'); ?>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
        <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ?>">
      </div>

      <!-- input pasword -->
      <?= form_error('password', '<small class="ket text-danger">', '</small>'); ?>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="bi bi-key"></i></span>
        <input type="password" class="form-control" name="password" id="password1" placeholder="Password">
        <span class="icon-eye" id="toggle-password">
          <i class="bi bi-eye-slash"></i>
        </span>
        <small class="fst-italic">password min 6 karakter, kombinasi huruf, angka, dan simbol</small>
      </div>

      <!-- input confpass pasword -->
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
        <input type="password" class="form-control" name="confpass" id="password2" placeholder="Confirm Password">
        <span id="toggle-confpass" class="icon-eye">
          <i class="bi bi-eye-slash"></i>
        </span>
      </div>

      <div class="button d-flex align-items-center mb-2">
        <button type="submit" name="submit" class="w-100">Daftar Akun</button>
      </div>
      <div class="form-reg d-flex justify-content-center">
        <p>Sudah punya akun? <a href="<?= base_url('auth'); ?>" class="ps-1 text-decoration-none fst-italic">Login</a></p>
      </div>
    </form>
  </div>
</div>