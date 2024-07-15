<div class="main">
  <div class="layout mb-4">
    <div class="col-6">
      <div class="card">
        <h2 class="mb-3 p-2 text-center">Update data tiket</h2>
        <form method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="id_tiket" value="<?= $tiketById['id_tiket']; ?>">
          <div class="modal-body">
            <div class="mb-4 mx-2">
              <input type="text" class="form-control" name="judul" value="<?= $tiketById['id_film']; ?>" readonly>
            </div>

            <div class="mb-4 mx-2">
              <span>-- Lokasi --</span>
              <div class="form-check">
                <?php foreach ($lokasi as $l) : ?>
                  <input class="form-check-input" type="checkbox" name="checkbox_field[]" value="<?= $l; ?>" id="check" style="width: 20px; height:20px;">
                  <label class="form-check-label" for="check"><?= $l; ?></label><br>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="mb-4 mx-2">
              <select class="form-select mt-3" name="studio" aria-label="Default select example" required>
                <option selected><?= $tiketById['studio']; ?></option>
                <?php foreach ($studio as $s) : ?>
                  <option value="<?= $s; ?>"><?= $s; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-4 mx-2">
              <select class="form-select mt-3" name="jmlhTiket" aria-label="Default select example" required>
                <option selected><?= $tiketById['jumlah_tiket']; ?></option>
                <?php foreach ($jumlahTiket as $j) : ?>
                  <option value="<?= $j; ?>"><?= $j; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="modal-footer m-2">
            <button type="button" class="btn btn-dark me-3"><a href="<?= base_url('Datatiket'); ?>" class="text-decoration-none text-light">Close</a></button>
            <button type="submit" name="submit" class="btn btn-dark">Edit data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>