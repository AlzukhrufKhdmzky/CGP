<!-- sidebar -->
<div class="sidebar nav flex-column fixed-top">
  <!-- sidebar header -->
  <div class="title sidebar-brand d-md-flex py-3 justify-content-center align-items-center ">
    <a href="<?= base_url('admin'); ?>" class=" d-flex text-decoration-none ">
      <img class="rounded-5" style="width:60px; height:60px;" src="<?= base_url('assets/'); ?>img/download2.png" alt="">
      <span style="font-size: 1.5rem;"> Bioskop CGP</span>
    </a>
  </div>
  <!-- menu sidebar -->
  <nav class="text nav flex-column mt-4">
    <a class="list-group-item-action list-group-item-light px-3 py-2" href="<?= base_url('admin'); ?>"><i class="bi bi-house-door-fill pe-2"></i>Dashboard</a>
    <a class=" list-group-item-action list-group-item-light mt-2 px-3 py-2" href="<?= base_url('dataFilm'); ?>"><i class="bi bi-film pe-2"></i>Movie</a>
    <a class=" list-group-item-action list-group-item-light mt-2 px-3 py-2" href="<?= base_url('dataTiket'); ?>"><i class="bi bi-ticket-perforated-fill pe-2"></i>Ticket</a>
    <a class=" list-group-item-action list-group-item-light mt-2 px-3 py-2" href="<?= base_url('admin/dataTransaksi'); ?>"><i class="bi bi-cash-coin pe-2"></i>Transaksi</a>
    <a class="list-group-item-action mt-5 px-3 py-2 list-group-item-light" href="<?= base_url('authadmin/logout'); ?>"><i class="bi bi-box-arrow-right pe-2"></i>Logout</a>
  </nav>
</div>