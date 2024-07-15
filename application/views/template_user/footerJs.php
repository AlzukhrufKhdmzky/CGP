<!-- my js -->
<script src="<?= base_url('assets/'); ?>js/scriptss.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script>
  // seat.js

  window.addEventListener('DOMContentLoaded', function() {
    var jumlahTiket = parseInt(document.getElementById('jumlah_tiket').value);
    var selectedSeatsContainer = document.getElementById('selected_seats');
    var seats = [];
    var selectedSeats = [];

    // Generate kursi-kursi
    for (var i = 1; i <= 40; i++) {
      seats.push({
        id: i,
        selected: false
      });
    }

    // Fungsi untuk memperbarui tampilan kursi
    function updateSeats() {
      var seatContainer = document.getElementById("seat_container");
      seatContainer.innerHTML = "";

      for (var i = 0; i < seats.length; i++) {
        var seat = seats[i];
        var seatElement = document.createElement("div");
        seatElement.className = "seat";
        seatElement.setAttribute("data-id", seat.id);

        if (seat.selected) {
          seatElement.classList.add("selected");
        }

        seatElement.addEventListener("click", function() {
          var seatId = parseInt(this.getAttribute("data-id"));

          // Jika kursi sudah terpilih, hapus dari daftar terpilih
          if (selectedSeats.includes(seatId)) {
            selectedSeats = selectedSeats.filter(function(id) {
              return id !== seatId;
            });
            this.classList.remove("selected");
          }
          // Jika kursi belum terpilih dan jumlah terpilih masih kurang dari jumlah tiket,
          // tambahkan ke daftar terpilih
          else if (selectedSeats.length < jumlahTiket) {
            selectedSeats.push(seatId);
            this.classList.add("selected");
          }
          // Tampilkan nomor kursi yang dipilih
          showSelectedSeats();
        });

        seatContainer.appendChild(seatElement);
      }
    }

    // Fungsi untuk menampilkan nomor kursi yang dipilih
    function showSelectedSeats() {
      selectedSeatsContainer.value = selectedSeats.join(', ');
    }

    // Panggil fungsi untuk pertama kali
    updateSeats();
  });
</script>
</body>

</html>