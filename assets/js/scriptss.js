var passwordInput = document.getElementById("password1");
var togglePassword = document.getElementById("toggle-password");

togglePassword.addEventListener("click", function () {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    togglePassword.innerHTML = '<i class="bi bi-eye"></i>';
  } else {
    passwordInput.type = "password";
    togglePassword.innerHTML = '<i class="bi bi-eye-slash"></i>';
  }
});

var passwordInput2 = document.getElementById("password2");
var confPass = document.getElementById("toggle-confpass");

confPass.addEventListener("click", function () {
  if (passwordInput2.type === "password") {
    passwordInput2.type = "text";
    confPass.innerHTML = '<i class="bi bi-eye"></i>';
  } else {
    passwordInput2.type = "password";
    confPass.innerHTML = '<i class="bi bi-eye-slash"></i>';
  }
});


// Kursi Bioskop


