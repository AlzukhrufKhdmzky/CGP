<!-- Navbar -->
<nav>
  <div class="logo">
    <a href="<?= base_url('home'); ?>">Bioskop <span>CGP</span></a>
  </div>
  <div class="navs navbar-navs">
    <a href="<?= base_url('home'); ?>">Home</a>
    <a href="#about">About us</a>
    <a href="#film">Now Playing</a>
    <a href="<?= base_url('home/upComing'); ?>">Up Coming</a>
  </div>
  <div class="nav-item dropdown">
    <a class="dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Account
    </a>
    <ul class="dropdown-menu mt-2 shadow">
      <?php
      if (!empty($this->session->userdata('email'))) { ?>
        <li><a class="dropdown-item" href="<?= base_url('home/myProfile'); ?>"><i class="fa-solid fa-user pe-2"></i>My Profile</a></li>
        <li><a class="dropdown-item" href="<?= base_url('TransaksiUser/index/') . $user['id_user']; ?>"><i class="fa-solid fa-credit-card pe-2"></i>Transaction</a></li>
        <hr>
        <li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="fa-solid fa-right-from-bracket pe-2"></i>Log out</a></li>
      <?php } else { ?>
        <li><a class="dropdown-item" href="<?= base_url('auth'); ?>"><i class="fa-solid fa-right-from-bracket pe-2"></i>Login</a></li>
        <li><a class="dropdown-item" href="<?= base_url('auth'); ?>"><i class="fa-solid fa-user-plus pe-2"></i>Registration</a></li>
      <?php } ?>
    </ul>
    </d>
</nav>
<!-- end navbar -->