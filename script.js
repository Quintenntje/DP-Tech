// index image slider

window.onload = rotate;

var theAd = 0;
var adImages = new Array(
  "images/Machines/660SJ.jpg",
  "images/Machines/C500Y.jpg",
  "images/Machines/GLP30TF.jpg",
  "images/Machines/MJP11.5.jpg",
);

function rotate() {
  theAd++;
  if (theAd == adImages.length) {
    theAd = 0;
  }
  document.getElementById("image-cycle").src = adImages[theAd];

  setTimeout(rotate, 3 * 3000);
}

/* nav dropdown */
function showDropdown() {
  document.getElementById("admin-dropdown").classList.toggle("show");
}

window.onclick = function (event) {
  if (!event.target.matches(".account-icon")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};
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
  var tableRows = $("table tr td:first-of-type");

  tableRows.each(function () {
    if ($(this).text() === dayOfWeek) {
      $(this).parent().addClass("today");
    }
  });
});
/* opening uren*/
$(document).ready(function () {
  var today = new Date();
  var days = [
    "Zondag",
    "Maandag",
    "Dinsdag",
    "Woensdag",
    "Donderdag",
    "Vrijdag",
    "Zaterdag",
  ];
  var dayOfWeek = days[today.getUTCDay()];
  var tableRows = $("table tr td:first-of-type");

  tableRows.each(function () {
    if ($(this).text() === dayOfWeek) {
      $(this).parent().addClass("today");
      var currentHour = today.getUTCHours() + 1;
      if (
        $(this).text() === "Zondag" ||
        $(this).text() === "Zaterdag" ||
        currentHour < 7 ||
        currentHour >= 19
      ) {
        $(this).addClass("closed");
      } else {
        $(this).addClass("open");
      }
    }
  });
});

/*  Nav Active  */
const activeLink = localStorage.getItem("activeLink");
if (activeLink) {
  $(`nav a[href="${activeLink}"]`).addClass("active");
}

$("nav a").click(function () {
  $("nav a").removeClass("active");
  $(this).addClass("active");
  localStorage.setItem("activeLink", $(this).attr("href"));
});

document.addEventListener("DOMContentLoaded", function (e) {
  /* Form valdatie*/

  const form = document.getElementById("login-form");
  form.addEventListener("submit", (e) => {
    const password = document.getElementById("password");
    if (password.value.length < 4) {
      password.setCustomValidity("Password must be at least 4 characters long");
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

/* product page postcode validatie */

const postcodeInput = document.querySelector('input[name="postcode"]');
postcodeInput.addEventListener('input', restrictToNumbers);

function restrictToNumbers(event) {
  const input = event.target;
  input.value = input.value.replace(/[^0-9]/g, '');
}