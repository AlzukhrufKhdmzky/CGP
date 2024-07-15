<div class="container1">
  <!-- section hero -->
  <?= $this->session->flashdata('message'); ?>
  <section id="home" class="home">
    <div id="carouselExampleSlidesOnly" class="hero carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="slide-img carousel-item active">
          <img src="<?= base_url('assets/'); ?>img/poster-spiderman.jpeg">
        </div>
        <div class="slide-img carousel-item">
          <img src="<?= base_url('assets/'); ?>img/poster-lc-fastX.jpg">
        </div>
        <div class="slide-img carousel-item">
          <img src="<?= base_url('assets/'); ?>img/poster-lc-hamka.jpg">
        </div>
      </div>
    </div>

    <div class="card-iklan">
      <div class="iklan">
        <h1>Iklan 1</h1>
      </div>
      <div class="iklan">
        <h1>Iklan 2</h1>
      </div>
      <div class="iklan">
        <h1>Iklan 3</h1>
      </div>
    </div>
  </section>
  <!-- end section hero -->

  <!-- section about us -->
  <section id="about" class="about">
    <h2 class="d-flex justify-content-center">About us</h2>
    <p class="px-5 text-center">Bioskop CGP merupakan tempat untuk menonton film yang nyaman dan harga yang murah, di lengkapi fasilitas seperti caffe, tempat makan, musholla, dan masih banyak lainnya. sangat cocok untuk nonton bersama familiy, teman, dan partner.</p>
  </section>
  <!-- end section about us -->

  <!-- section now playing -->
  <section id="film" class="film">
    <h2 class="text-center">Now playing</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mx-3 mt-4">
      <?php foreach ($film as $f) : ?>
        <div class="col">
          <div class="card shadow h-100">
            <a href="<?= base_url('home/detail/') . $f['id_film']; ?>"><img src="<?= base_url('assets/img/') . $f['img']; ?> " class="card-img-top"></a>
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

  <!-- section Contact us -->
  <!-- <section id="contact" class="contact">
    <h2>Contac Us</h2>
    <div class="row">
      <p>Kontak Kami</p>
      <ul>
        <li>instagram</li>
        <li>instagram</li>
      </ul>
    </div>
  </section> -->
  <!-- end section Contact us -->
</div>