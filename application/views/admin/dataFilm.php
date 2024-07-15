<!-- main -->
<div class="main">
  <div class="layout-content">
    <!-- Button trigger modal -->
    <div class="button mb-4">
      <a href="#" class="button btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new film</a>
    </div>

    <div class="error bg-light mx-4 ps-2 col-md-6 shadow rounded-1">
      <small class="text-danger"><?= validation_errors(); ?></small>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <?= $this->upload->display_errors(); ?>


    <!-- table -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mx-2">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables FIlm</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th scope="col">No</th>
                <th>Judul</th>
                <th>Genre</th>
                <th>Produser</th>
                <th>Tanggal rilis</th>
                <th>Rating</th>
                <th>Durasi</th>
                <th>Sinopsis</th>
                <th>Image</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($film as $f) : ?>
                <tr>
                  <td scope="row" class="text-center"><?= $i; ?></td>
                  <td><?= $f['judul']; ?></td>
                  <td><?= $f['genre']; ?></td>
                  <td><?= $f['produser']; ?></td>
                  <td><?= $f['tanggal_rilis']; ?></td>
                  <td class="text-center"><?= $f['rating']; ?></td>
                  <td><?= $f['durasi']; ?> Minutes</td>
                  <td class="toggle-td"><?= $f['sinopsis']; ?></td>
                  <td><img src="<?= base_url('assets/img/') . $f['img']; ?>" style="height: 80px; width:60px;"></td>
                  <td>
                    <a href="<?= base_url('datafilm/edit/') . $f['id_film']; ?>" class="text-decoration-none text-dark"><i class="fa-sharp fa-solid fa-file-pen pe-2"></i>Edit</a>
                    <a href="<?= base_url('datafilm/delete/') . $f['id_film']; ?>" class="text-decoration-none text-dark"><i class="fa-solid fa-trash pe-2"></i>Delete</a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- end table -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Film</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?= base_url('DataFilm'); ?>" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="mb-4">
                  <input type="text" class="form-control" name="judul" placeholder="judul film">
                </div>

                <div class="mb-4">
                  <select class="form-select" name="genre" aria-label="Default select example">
                    <option value="">-- Genre --</option>
                    <?php foreach ($genre as $g) : ?>
                      <option value="<?= $g['id_genre']; ?>"><?= $g['genre']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-4">
                  <input type="text" class="form-control" name="produser" placeholder="produser">
                </div>
                <div class="mb-4">
                  <input type="date" class="form-control" name="releasedDate" placeholder="released date">
                </div>

                <div class="mb-4">
                  <input type="number" class="form-control" name="durasi" placeholder="durasi">
                </div>

                <div class="mb-4">
                  <select class="form-select" name="rating" aria-label="Default select example">
                    <option value="">-- Rating --</option>
                    <?php foreach ($rating as $r) : ?>
                      <option value="<?= $r['id_rating']; ?>"><?= $r['rating']; ?></option>

                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3" placeholder="sinopsis"></textarea>
                </div>

                <div class="mb-3">
                  <label for="judul" class="form-label">Image</label>
                  <input type="file" class="form-control" id="judul" name="image">
                </div>
                <div class="mb-3">
                  <label for="video" class="form-label">Video Trailler</label>
                  <input type="file" class="form-control" id="video" name="video">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>