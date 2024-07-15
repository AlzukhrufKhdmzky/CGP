// menu toggle
const sideBar = document.querySelector('.sidebar');
const navBar = document.querySelector('.navbar');
const maIn = document.querySelector('.main');

// Ketika hamburger di klik
document.querySelector('#toggle').onclick = () => {
  sideBar.classList.toggle('active');
  navBar.classList.toggle('active');
  maIn.classList.toggle('active');
};


// membuat chart
// const Chart = document.getElementById('#chart');
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'Jul', 'Augst', 'Sep', 'Okt', 'Nov', 'Des'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

// dropdown
// var dropdownContainer = document.getElementById('dropdown-container');
// var dropdownToggle = dropdownContainer.querySelector('.dropdown-toggle');
// var dropdownMenu = dropdownContainer.querySelector('.dropdown-menu');

// // Tambahkan event listener ke tombol dropdown
// dropdownToggle.addEventListener('click', function () {
//   // Toggle class "show" pada dropdown menu
//   dropdownMenu.classList.toggle('show');
// });

// // Tutup dropdown saat pengguna mengklik di luar dropdown menu
// window.addEventListener('click', function (event) {
//   if (!dropdownContainer.contains(event.target)) {
//     dropdownMenu.classList.remove('show');
//   }
// });
const profileDropdownlist = document.querySelector(".drpdwn-list");
const btn = document.querySelector(".profile-drpdwn-btn");

const toggle = () => profileDropdownlist.classList.toggle('active');

window.addEventListener('click', function (e) {
  // ketika ketik di luar dropdown
  if (!btn.contains(e.target)) profileDropdownlist.classList.remove('active');
});

