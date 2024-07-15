<div class="container bg-light shadow col-md-8 col-11">
  <div class="main-content">
    <h2 class="p-3">Histrory Transaction</h2>

    <div class="row mb-5">
      <?php foreach ($transaksi as $tr) : ?>
        <div class="col-sm-4 mb-3 mb-sm-0">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title"><?= $tr['judul']; ?></h5>
              <p class="card-text"><small class="text-body-secondary">Pembelian di tanggal <?= date('d F Y', $tr['date_pesan']); ?></small></p>
              <p><small class="text-body-secondary">Time <?= date('H:i:s', $tr['date_pesan']); ?></small></p>
              <a href="<?= base_url('TransaksiUser/detailTransaksi/') . $tr['id_transaksi']; ?>" class="nav-link text-primary text-center">Detail Transaksi<i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <p>.</p>
  </div>
</div>