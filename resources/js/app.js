import './bootstrap';

import Alpine from 'alpinejs';

import './appartementNav.js';
import './propertyForm';
import './changeDate.js';
import './search.js';
import './event.js';
import './facture.js';
import './google-maps.js';
import './calendar.js';
import './typeErreur.js';
import './formMateriel.js';
import './immeubleNav.js';
import './detailNav.js';
import './assigneMateriel.js';
import './timeline.js';
import './EventImmeuble.js';
import './mailContents.js';
import './saisie/saisie.js';





window.Alpine = Alpine;

Alpine.start();

// const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
// const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))



// Filter Compteurs eaux
// document.addEventListener('DOMContentLoaded', function() {
//     var dropdownItems = document.querySelectorAll('#eautype li a');
//     var inputField = document.getElementById('eautype');
//     var form = document.getElementById('filterform');
//
//     dropdownItems.forEach(function(item) {
//         item.addEventListener('click', function(e) {
//             e.preventDefault();
//             var inputValue = this.getAttribute('data-input');
//             inputField.value = inputValue;
//             form.submit(); // Soumet le formulaire
//         });
//     });
// });


document.addEventListener('DOMContentLoaded', function() {
    var dropdownItemsEau = document.querySelectorAll('#eautype_ul li a');
    var inputFieldEau = document.getElementById('eautype');
    var dropdownItemsChauf = document.querySelectorAll('#chauftype_ul li a');
    var inputFieldChauf = document.getElementById('chauftype');
    var form = document.getElementById('filterform'); // Assurez-vous que c'est le bon ID de formulaire

    var updateInputAndSubmit = function(inputField, value) {
        inputField.value = value;
        form.submit();
    };

    dropdownItemsEau.forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            updateInputAndSubmit(inputFieldEau, this.getAttribute('data-input'));
        });
    });

    dropdownItemsChauf.forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            updateInputAndSubmit(inputFieldChauf, this.getAttribute('data-input'));
        });
    });
});
