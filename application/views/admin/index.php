<!-- main -->
<div class="main">
  <div class="layout">
    <h4>Selamat Datang di Halaman Admin</h4>
    <!-- cards -->

    <div class="cards">
      <!-- card -->
      <div class="card shadow ">
        <div class="card-content">
          <i class="bi bi-people"></i>
          <div class="isi">
            <h4 class="h-50 "><?= $jumlahUser; ?></h4>
            <p class="d-flex align-items-center justify-content-center">Jumlah Member</p>
          </div>
        </div>
        <div class="card-footerr border-top d-flex align-items-center justify-content-center">
          <a href="#">View details<i class="bi bi-arrow-right ps-2"></i></a>
        </div>
      </div>

      <div class="card shadow ">
        <div class="card-content">
          <i class="bi bi-film  pe-2"></i>
          <div class="isi">
            <h4 class="h-50 "><?= $film; ?></h4>
            <p class="d-flex align-items-center justify-content-center">Total Film</p>
          </div>
        </div>
        <div class="card-footerr border-top d-flex align-items-center justify-content-center">
          <a href="<?= base_url('DataFilm'); ?>">View details<i class="bi bi-arrow-right ps-2"></i></a>
        </div>
      </div>

      <div class="card shadow ">
        <div class="card-content">
          <i class="bi bi-ticket-detailed"></i>
          <div class="isi">
            <h4 class="h-50 "><?= $ticketTerjual; ?></h4>
            <p class="d-flex align-items-center justify-content-center">Tiket Terjual</p>
          </div>
        </div>
        <div class="card-footerr border-top d-flex align-items-center justify-content-center">
          <a href="">View details<i class="bi bi-arrow-right ps-2"></i></a>
        </div>
      </div>

      <div class="card shadow ">
        <div class="card-content">
          <i class="fa-solid fa-money-bill"></i>
          <div class="isi">
            <h5 class="h-50 ">Rp <?= number_format($pendapatan, 0, '', '.'); ?> </h5>
            <p class="d-flex align-items-center justify-content-center">Pendapatan</p>
          </div>
        </div>
        <div class="card-footerr border-top d-flex align-items-center justify-content-center">
          <a href="<?= base_url('admin'); ?>">View details<i class="bi bi-arrow-right ps-2"></i></a>
        </div>
      </div>
    </div>

    <!-- content -->
    <div class="row">
      <div class="col-xl-6">
        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-chart-area me-1"></i>
            Area Chart Example
          </div>
          <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-chart-bar me-1"></i>
            Bar Chart Example
          </div>
          <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
      </div>
    </div>
  </div>
</div>