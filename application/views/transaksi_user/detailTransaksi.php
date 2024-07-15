<div class="container bg-light shadow col-md-8 col-11">
  <div class="main-content">
    <h2 class="p-4 text-center">Detail Transaksi</h1>
      <div class="detail row mx-2 p-3">
        <div class="img col-4 me-3">
          <img src="<?= base_url('assets/img/') . $detail['img']; ?>" alt="gambar">
        </div>
        <div class="content col-6">
          <h3><?= $detail['judul']; ?></h3>
          <p>Date : <?= $detail['date']; ?></p>
          <p>Time : <?= $detail['time']; ?> WIB</p>
          <p>studio : <?= $detail['studio']; ?></p>
          <p>Number seats : <?= $detail['seats']; ?></p>
          <p>Jumlah Tiket : <?= $detail['ticket']; ?></p>
          <p>total : Rp. <?= $detail['total_priece']; ?></p>
        </div>
      </div>
      <div class="barcode row mx-2 d-flex justify-content-center p-3">
        <img src="<?= base_url('assets/img/'); ?>download.png" class="" style="background-image: none; width:300px; height:300px;">
        <p class="text-center">Kode Booking <span>25432</span></p>
      </div>
      <div class="d-flex justify-content-center my-2">
        <a href="#"><i class="fa-solid fa-download pe-2"></i>Download</a>
      </div>
      <p>.</p>
  </div>
</div>