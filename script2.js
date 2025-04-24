/* side nav */
const menuToggle = document.querySelector('.menu-toggle');
const sidebar = document.querySelector('.sidebar');

menuToggle.addEventListener('click', () => {
  menuToggle.classList.toggle('is-active'); 
  sidebar.classList.toggle('is-active'); 
});

const activeLink = localStorage.getItem("activeLink");
if (activeLink) {
  $(`.menu a[href="${activeLink}"]`).addClass("is-active");
}

$(".menu a").click(function () {
  $(".menu a").removeClass("is-active");
  $(this).addClass("is-active");
  localStorage.setItem("activeLink", $(this).attr("href"));
});


  
/* show file */
function showSelectedFile() {
			const inputFile = document.getElementById("machine-image");
			const fileName = inputFile.files[0].name;
			const selectedFileNameElement = document.getElementById("selected-file-name");
			selectedFileNameElement.textContent = fileName;
		}
// prevent enter
    const editableCells = document.querySelectorAll('.editable');

  
    editableCells.forEach(cell => {
      cell.addEventListener('keydown', function(event) {
      
        if (event.key === 'Enter') {
          event.preventDefault(); 
        }
      });
    });   
    // update button
    function updateRow(productId) {
      var rowId = "row-" + productId;
      var row = document.getElementById(rowId);
    
      var soort = row.querySelector(".soort").innerText;
      var merk = row.querySelector(".merk").innerText;
      var model = row.querySelector(".model").innerText;
      var prijs = row.querySelector(".prijs").innerText;
      var gewicht = row.querySelector(".gewicht").innerText;
      var bouwjaar = row.querySelector(".bouwjaar").innerText;
      var aandrijving = row.querySelector(".aandrijving").innerText;
      var aankoopdag = row.querySelector(".aankoopdag").innerText;
      var hoeveelheid = row.querySelector(".hoeveelheid").innerText;
    
      var data = {
        id: productId,
        soort: soort,
        merk: merk,
        model: model,
        prijs: prijs,
        gewicht: gewicht,
        bouwjaar: bouwjaar,
        aandrijving: aandrijving,
        aankoopdag: aankoopdag,
        hoeveelheid: hoeveelheid
      };
    
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "update_machine.php", true);
      xhr.setRequestHeader("Content-Type", "application/json");
    
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          console.log(xhr.responseText);
         
        }
      };
    
      xhr.send(JSON.stringify(data));
    }
/* addmachine form validatie */

const priceInput = document.querySelector('input[name="Prijs"]');
const weightInput = document.querySelector('input[name="Gewicht"]');
const yearInput = document.querySelector('input[name="Bouwjaar"]');

priceInput.addEventListener('input', restrictToNumbers);
weightInput.addEventListener('input', restrictToNumbers);
yearInput.addEventListener('input', restrictToNumbers);

function restrictToNumbers(event) {
  const input = event.target;
  input.value = input.value.replace(/[^0-9]/g, '');
}
  yearInput.addEventListener('input', restrictToFourDigitNumbers);

  function restrictToFourDigitNumbers(event) {
    const input = event.target;
    input.value = input.value.replace(/[^0-9]/g, ''); 
    input.value = input.value.slice(0, 4); 
  }