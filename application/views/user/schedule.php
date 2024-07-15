<div class="container bg-light shadow col-md-8 col-11">
  <div class="main-content">
    <div class="roww">
      <div class="poster">
        <a href="#"><img src="<?= base_url('assets/img/') . $filmId['img']; ?>" class="img-fluid"></a>
      </div>
      <div class="buy">
        <h3><?= $filmId['judul']; ?></h3>
        <div class="d-flex">
          <p class="me-2"><i class="fa-regular fa-clock pe-1"></i><?= $filmId['durasi']; ?> Minutes |</p>
          <p class="me-2"><?= $filmId['rating']; ?> |</p>
          <p><?= $filmId['genre']; ?></p>
        </div>
        <div class="harga">
          <p>Rp <?= $harga; ?></p>
        </div>
      </div>
    </div>

    <div class="rowww row p-2 border-bottom mb-5">
      <form action="<?= base_url('Seat/index/') . $filmId['id_film']; ?>" method="post">
        <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
        <input type="hidden" name="harga" value="<?= $harga; ?>">
        <div class=" location mb-4">
          <h5>Lokasi</h5>
          <select name="lokasi" required>
            <option selected class=" text-center">-- Lokasi --</option>
            <?php foreach ($lokasi as $l) : ?>
              <option value="<?= $l; ?>"><?= $l; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="tanggal mb-4">
          <h5>Tangal</h5>
          <select name="tanggal" required>
            <option selected class=" text-center">-- Tanggal --</option>
            <?php foreach ($tanggal as $t) : ?>
              <option value="<?= $t; ?>"><?= $t; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="jamTayang mb-4">
          <h5>Jam Tayang</h5>
          <select name="jamTayang">
            <option selected class=" text-center">-- Jam --</option>
            <?php foreach ($jam as $jm) : ?>
              <option value="<?= $jm; ?>"><?= $jm; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="select mb-4">
          <h5>Select tiket</h5>
          <select name="selectTiket" id="jumlah_tiket" class="text-center">
            <option selected>-- Jumlah Tiket --</option>
            <?php foreach ($jmlhTiket as $jmlt) : ?>
              <option value="<?= $jmlt; ?>"><?= $jmlt; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="button">
          <button type="submit">Continue</button>
        </div>
      </form>
    </div>


    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
          <form action="<?= base_url('Seat'); ?>" method="post">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Select tickets</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <select class="form-select" name="jumlahTiket" id="jumlahTiket" aria-label="Default select example">
                <option selected>-- Select --</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="3">4</option>
                <option value="3">5</option>
              </select>
            </div>
            <div class="modal-footer">
              <a href="<?= base_url('seat'); ?>" class="nav-link"> </a>
              <button type="submit">Continue</button>
              <button type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div> -->
  </div>
</div>