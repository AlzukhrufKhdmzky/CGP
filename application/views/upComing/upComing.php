<div class="container1">
  <!-- section now playing -->
  <section id="film" class="film pt-0 text-center">
    <h2 class="text-center">Up Coming</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mx-3 mt-4">
      <?php foreach ($film as $f) : ?>
        <div class="col">
          <div class="card shadow">
            <a href="<?= base_url('home/upComingDetail/') . $f['id_film']; ?>"><img src="<?= base_url('assets/img/') . $f['img']; ?> " class="card-img-top"></a>
            <div class="card-body text-center">
              <h5 class="card-title"><?= $f['judul']; ?></h5>
              <p class="card-text">-- <?= $f['rating']; ?> --</p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <!-- end section now playing -->
</div>