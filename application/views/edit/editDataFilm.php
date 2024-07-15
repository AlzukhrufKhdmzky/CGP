<div class="main">
  <div class="layout mb-4">
    <div class="col-6">
      <div class="card">
        <h2 class="mb-3 p-2 text-center">Update data film</h2>
        <form method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $filmId['id_film']; ?>">
          <div class="modal-body">
            <div class="mb-4 mx-2">
              <label for="judul" class="form-label">Judul film</label>
              <input type="text" class="form-control" name="judul" readonly value="<?= $filmId['judul']; ?>">
            </div>

            <div class="mb-4 mx-2">
              <label for="genre" class="form-label">Genre</label>
              <select class="form-select" name="genre" aria-label="Default select example" required>
                <option value="<?= $filmId['id_genre']; ?>" selected><?= $filmId['genre']; ?></option>
                <?php foreach ($genre as $g) : ?>
                  <option value="<?= $g['id_genre']; ?>"><?= $g['genre']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-4 mx-2">
              <label for="produser" class="form-label">Produser</label>
              <input type="text" class="form-control" name="produser" placeholder="produser" value="<?= $filmId['produser']; ?>">
              <span class="text-danger font-italic"><?= form_error('produser') ?></span>
            </div>

            <div class="mb-4">
              <input type="date" class="form-control" name="releasedDate" placeholder="released date" value="<?= $filmId['tanggal_rilis']; ?>">
              <span class="text-danger font-italic"><?= form_error('releasedDate') ?></span>
            </div>


            <div class="mb-4">
              <input type="number" class="form-control" name="durasi" placeholder="durasi" value="<?= $filmId['durasi']; ?>">
              <span class="text-danger font-italic"><?= form_error('durasi') ?></span>
            </div>

            <div class="mb-4 mx-2">
              <label for="rating" class="form-label">Rating</label>
              <select class="form-select" name="rating" required aria-label="Default select example">
                <option value="<?= $filmId['id_rating']; ?>" selected><?= $filmId['rating']; ?></option>
                <?php foreach ($rating as $rt) : ?>
                  <option value="<?= $rt['id_rating'] ?>"><?= $rt['rating']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3 mx-2">
              <label for="sinopsis" class="form-label">sinopsis</label>
              <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3"><?= $filmId['sinopsis']; ?></textarea>
              <span class="text-danger font-italic"><?= form_error('sinopsis') ?></span>
            </div>

            <div class="mb-3 mx-2">
              <label for="image" class="form-label">Image</label>
              <div class="col-sm-3">
                <img src="<?= base_url('assets/img/') . $filmId['img']; ?>" class="img-thumbnail">
              </div>
              <input type="text" class="form-control" id="image" name="image" value="<?= $filmId['img']; ?>" readonly>
            </div>
          </div>
          <div class="modal-footer m-2">
            <button type="button" class="btn btn-dark me-3"><a href="<?= base_url('DataFilm'); ?>" class="text-decoration-none text-light">Close</a></button>
            <button type="submit" name="submit" class="btn btn-dark">Edit data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>