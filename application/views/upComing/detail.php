<div class="container bg-light shadow col-md-8 col-11">
  <div class="main-content">
    <div class="content-header border-bottom">
      <h3 class="p-3 text-center"><?= $filmId['judul']; ?></h3>
    </div>
    <div class="roww">
      <div class="poster">
        <a href="<?= base_url('home/trailler/') . $filmId['id_film']; ?>"><img src="<?= base_url('assets/img/') . $filmId['img']; ?>" class="img-fluid"></a>
      </div>
      <div class="buy">
        <div class="d-flex">
          <p class="me-2"><i class="fa-regular fa-clock pe-1"></i><?= $filmId['durasi']; ?> Minutes |</p>
          <p class="me-2"><?= $filmId['rating']; ?> |</p>
          <p><?= $filmId['genre']; ?></p>
        </div>
        <h5>Released date</h5>
        <p><?= date('d F Y', strtotime($filmId['tanggal_rilis'])); ?></p>
        <h5>Produser</h5>
        <p><?= $filmId['produser']; ?></p>
        <h5>Sinopsis</h5>
        <p><?= $filmId['sinopsis']; ?></p>
      </div>
    </div>
  </div>
</div>