<div class="container bg-light shadow col-md-8 col-11">
  <div class="main-content" style="height: 500px;">
    <h2 class="p-4"><?= $title; ?></h2>
    <?= validation_errors(); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?= base_url('assets/img/profile/') . $user['img']; ?>" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $user['nama']; ?></h5>
            <p class="card-text"><?= $user['email']; ?></p>
            <p class="card-text"><small class="text-body-secondary">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
          </div>
        </div>
      </div>
    </div>
    <div class="button">
      <button class="w-25" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Edit profile</button>
    </div>
  </div>
</div>


<!-- Modal Edit profile -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="<?= base_url('Home/myProfile'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit my profile</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" readonly value="<?= $user['email']; ?>">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Full name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?= $user['nama']; ?>">
          </div>
          <div class="mb-3">
            <div class="col-sm-2">Picture</div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/profile/') . $user['img']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <input class="form-control" type="file" name="image">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="button modal-footer ">
          <button type="submit" class="text-light" style="background-color: rgb(90, 51, 14);">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>