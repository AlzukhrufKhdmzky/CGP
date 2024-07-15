<div class="main">
  <div class="layout mb-4">
    <div class="card">
      <div class="card-header">
        <h2>Data Transaksi user</h2>
      </div>
      <div class="card-body">
        <table class="table table-responsive">
          <thead>
            <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Film</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Studio</th>
              <th scope="col">Total ticket</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php $i = 1 ?>
            <?php foreach ($transaksi as $tr) : ?>
              <tr>
                <th scope="row" class="text-center"><?= $i; ?></th>
                <td><?= $tr['nama']; ?></td>
                <td><?= $tr['judul']; ?></td>
                <td class="text-center"><?= $tr['date']; ?></td>
                <td class="text-center"><?= $tr['time']; ?></td>
                <td class="text-center"><?= $tr['studio']; ?></td>
                <td class="text-center"><?= $tr['ticket']; ?></td>
              </tr>
              <?php $i++ ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>