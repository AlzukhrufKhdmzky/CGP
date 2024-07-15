<div class="box1 container col-10 col-md-6 col-lg-6 col-xl-3 shadow">
  <div class="form-title mt-4 d-flex justify-content-center align-items-center">
    <h2 class="pt-3 border-bottom">Form Login</h2>
  </div>
  <?= $this->session->flashdata('message'); ?>
  <div class="form-body mt-5">
    <form action="<?= base_url('authadmin'); ?>" method="post">

      <?= form_error('email', '<small class="ket text-danger pt-0">', '</small>'); ?>
      <div class="input-group mb-4">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
        <input type="text" class="form-control" placeholder="Email" name="email">
      </div>

      <?= form_error('password', '<small class="ket text-danger pt-0">', '</small>'); ?>
      <div class="input-group mb-4">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
        <input type="password" id="password1" class="form-control" placeholder="Password" name="password">
        <span class="icon-eye" id="toggle-password">
          <i class="bi bi-eye-slash"></i>
        </span>
      </div>
      <div class="button d-flex justify-content-between align-items-center">
        <button type="submit" name="submit" class="mb-5 w-100 rounded-1">Login</button>
      </div>
    </form>
  </div>
</div>