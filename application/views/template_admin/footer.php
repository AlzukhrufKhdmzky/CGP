<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>js/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/chart-bar-demo.js"></script>

<!-- my js -->
<script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var toggleTds = document.querySelectorAll('.toggle-td');

    toggleTds.forEach(function(td) {
      var fullText = td.innerText;
      var toggleLink = document.createElement('span');
      toggleLink.className = 'toggle-link';
      toggleLink.innerText = 'Show More';
      td.innerText = '';

      td.appendChild(toggleLink);
      td.insertAdjacentHTML('beforeend', fullText);

      // Event listener untuk toggle teks saat tautan diklik
      toggleLink.addEventListener('click', function() {
        td.classList.toggle('collapsed');
        if (td.classList.contains('collapsed')) {
          toggleLink.innerText = 'Show More';
        } else {
          toggleLink.innerText = 'Show Less';
        }
      });
    });
  });
</script>

</body>

</html>