/* Table date  */
$(document).ready(function () {
  var today = new Date();
  var days = [
    "Zondag",
    "Maandag",
    "Dinsdag",
    "Woensdag",
    "Donderdag",
    "vrijdag",
    "Zaterdag",
  ];
  var dayOfWeek = days[today.getUTCDay()];
  var tableRows = $("table tr td:first-child");

  tableRows.each(function () {
    if ($(this).text() === dayOfWeek) {
      $(this).parent().addClass("today");
    }
  });
});

document.addEventListener("DOMContentLoaded", function (e) {
  /* Form valdatie*/

  const form = document.querySelector("form");
  form.addEventListener("submit", (e) => {
    const password = document.getElementById("password");
    if (password.value.length < 8) {
      password.setCustomValidity("Password must be at least 8 characters long");
    } else {
      password.setCustomValidity("");
    }

    const confirmPassword = document.getElementById("confirmPassword");

    form.addEventListener("submit", function (e) {
      if (password.value !== confirmPassword.value) {
        e.preventDefault();
      }
    });
    if (!form.checkValidity()) {
      e.preventDefault();
    }
    form.classList.add("was-validated");
  });
  /* oogje */
  const passwordToggle = document.querySelector(".password-toggle");
  const passwordField = document.querySelector("#password");

  passwordToggle.addEventListener("click", function () {
    if (passwordField.type === "password") {
      passwordField.type = "text";
      passwordToggle.classList.remove("fa-eye-slash");
      passwordToggle.classList.add("fa-eye");
    } else {
      passwordField.type = "password";
      passwordToggle.classList.remove("fa-eye");
      passwordToggle.classList.add("fa-eye-slash");
    }
  });

  const passwordConfirmToggle = document.querySelector(
    ".passwordConfirm-toggle"
  );
  const passwordConfirmField = document.querySelector("#confirmPassword");

  passwordConfirmToggle.addEventListener("click", function () {
    if (passwordConfirmField.type === "password") {
      passwordConfirmField.type = "text";
      passwordConfirmToggle.classList.remove("fa-eye-slash");
      passwordConfirmToggle.classList.add("fa-eye");
    } else {
      passwordConfirmField.type = "password";
      passwordConfirmToggle.classList.remove("fa-eye");
      passwordConfirmToggle.classList.add("fa-eye-slash");
    }
  });
});
