<!-- main -->
<div class="main">
  <div class="layout-content">



    <div class="error bg-light mx-4 ps-2 col-md-6 shadow rounded-1">
      <small class="text-danger"><?= validation_errors(); ?></small>
    </div>
    <?= $this->session->flashdata('message'); ?>

    <!-- table -->
    <div class="row mb-5">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h2>Data tiket</h2>
          </div>
          <!-- Button trigger modal -->
          <div class="button mb-4">
            <a href="#" class="button btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Add data tiket</a>
          </div>
          <div class="card-body">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Studio</th>
                  <th scope="col">Jumlah Tiket</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php $i = 1 ?>
                <?php foreach ($joinTiket as $jt) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $jt['judul']; ?></td>
                    <td> <?= $jt['lokasi']; ?> </td>
                    <td class="text-center"><?= $jt['studio']; ?></td>
                    <td class="text-center"><?= $jt['jumlah_tiket']; ?></td>
                    <td class="d-flex flex-column">
                      <a href="<?= base_url('DataTiket/edit/') . $jt['id_tiket']; ?>" class="text-decoration-none text-dark"><i class="fa-sharp fa-solid fa-file-pen pe-2"></i>Update</a>
                      <a href="<?= base_url('DataTiket/delete/') . $jt['id_tiket']; ?>" class="text-decoration-none text-dark" onclick="alert('Yakin ingin di hapus?')"><i class="fa-solid fa-trash pe-2"></i>Delete</a>
                    </td>
                  </tr>
                  <?php $i++ ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- end table -->



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Data tiket</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?= base_url('DataTiket'); ?>" enctype="multipart/form-data">
              <div class="modal-body">
                <select class="form-select" name="judul" aria-label="Default select example" required>
                  <option selected>-- Judul film --</option>
                  <?php foreach ($tiket as $t) : ?>
                    <option value="<?= $t['id_film']; ?>"><?= $t['judul']; ?></option>
                  <?php endforeach; ?>
                </select>

                <div class="mt-4">
                  <span>-- Lokasi --</span>
                  <div class="form-check">
                    <?php foreach ($lokasi as $l) : ?>
                      <input class="form-check-input" type="checkbox" name="checkbox_field[]" value="<?= $l; ?>" id="check" style="width: 20px; height:20px;">
                      <label class="form-check-label" for="check"><?= $l; ?></label><br>
                    <?php endforeach; ?>
                  </div>
                </div>
                <select class="form-select mt-3" name="studio" aria-label="Default select example" required>
                  <option selected>-- Studio --</option>
                  <?php foreach ($studio as $s) : ?>
                    <option value="<?= $s; ?>"><?= $s; ?></option>
                  <?php endforeach; ?>
                </select>
                <select class="form-select mt-3" name="jmlhTiket" aria-label="Default select example" required>
                  <option selected>-- Jumlah Tiket --</option>
                  <?php foreach ($jumlahTiket as $j) : ?>
                    <option value="<?= $j; ?>"><?= $j; ?></option>
                  <?php endforeach; ?>
                </select>
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