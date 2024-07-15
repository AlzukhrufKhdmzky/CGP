<div class="container bg-light shadow col-md-8 col-11">
  <div class="main-content">
    <div class="row3 p-2 m-2 border-bottom border-opacity-25">
      <h4 class="p-4">Detail Pemesanan</h4>
      <div id="detail-pemesanan"></div>
      <!-- form untuk menampilkan detail pemesanan dan untuk mengirimkan data ke database -->
      <form action="<?= base_url('seat/index/') . $tiket['id_film']; ?>" method="post">
        <input type="hidden" value="<?= $detail['id']; ?>" name="id">
        <input type="hidden" value="<?= $tiket['id_film']; ?>" name="id_film">
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" name="judul" class="form-control" id="judul" readonly value="<?= $tiket['judul']; ?>">
        </div>
        <div class="d-flex">
          <div class="mb-3 me-3">
            <label for="studio" class="form-label">Studio</label>
            <input type="text" class="form-control" id="studio" name="studio" readonly value="<?= $tiket['studio']; ?>">
          </div>
          <div class="mb-3 me-3">
            <label for="jumlahTiket" class="form-label">Jumlah Tiket</label>
            <input type="text" class="form-control" id="jumlah_tiket" name="jumlahTiket" readonly value="<?= $detail['select']; ?>" required>
          </div>
          <div class="mb-3 ">
            <label for="lokasi" class="form-label">lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" readonly value="<?= $detail['lks']; ?>">
          </div>
        </div>
        <div class="d-flex">
          <div class="mb-3 col-3 me-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="text" class="form-control" id="tanggal" name="date" readonly value="<?= $detail['tgl']; ?>">
          </div>
          <div class="mb-3 col-2">
            <label for="jamTayang" class="form-label">Jam Tayang</label>
            <input type="text" class="form-control" id="jamTayang" name="time" readonly value="<?= $detail['jam']; ?>">
          </div>

        </div>
        <div class="d-flex border-bottom">
          <div class="mb-3 col-3 me-3">
            <label for="totalHarga" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="totalHarga" name="totalHarga" readonly value="<?= $detail['harga']; ?>">
          </div>
          <div class="mb-3 col-3">
            <label for="seatNumber" class="form-label">seats number</label>
            <input type="text" class="form-control" id="selected_seats" name="selected_seats" readonly>
          </div>
        </div>

        <!-- select seat -->
        <div class="row3 border-bottom border-opacity-25">
          <h5 class="pt-3 text-center">Select seats</h5>
          <div class="container d-flex justify-content-center">
            <div id="seat_container"></div> <!-- menampilkan pilihan bangku dari Javascript -->
          </div>
        </div>

        <!-- button -->
        <div class="row3 border-bottom border-opacity-25">
          <div class="button mb-3 ms-2">
            <a class="me-2 btn text-light w-100" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" style="background-color: rgb(90, 51, 14);">Buy now</a>
          </div>
        </div>
        <!-- end button -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Payment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="<?= base_url('seat/index/') . $tiket['id_film']; ?>" method="post">
                <div class="modal-body">
                  <div class="mb-3">
                    <input type="text" class="form-control" name="nameCard" placeholder="name on card">
                  </div>
                  <div class="mb-3">
                    <input type="number" class="form-control" name="cardNumber" placeholder="card number">
                  </div>
                  <select class="form-select" aria-label="Default select example" required>
                    <option selected>-- Methode Payment</option>
                    <option value="BCA">BCA</option>
                    <option value="BRI">BRI</option>
                    <option value="BNI">BNI</option>
                    <option value="BTN">BTN</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Continue</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- end Modal -->
      </form>
    </div>
  </div>
</div>