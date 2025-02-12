// document.addEventListener("DOMContentLoaded", function() {
//
//     if (/^\/immeubles\/.+/.test(window.location.pathname)){
//         document.getElementById('btnIndexApp').addEventListener('click', function () {
//             //buttons
//             var btnChauff = document.getElementById('btnChauff');
//             var btnEaux = document.getElementById('btnEaux');
//             var btnGaz = document.getElementById('btnGaz');
//             var btnElec = document.getElementById('btnElec');
//             //template
//             var saisieChauffage = document.getElementById('saisieChauffage');
//             var saisieEau = document.getElementById('saisieEau');
//             var saisieGaz = document.getElementById('saisieGaz');
//             var saisieElec = document.getElementById('saisieElec');
//
//
//             //traitement
//             saisieChauffage.style.display = 'block';
//             saisieEau.style.display = 'none';
//             saisieGaz.style.display = 'none';
//             saisieElec.style.display = 'none';
//
//             btnChauff.addEventListener('click', function() {
//                 btnChauff.className = 'nav-link active';
//                 btnEaux.className = 'nav-link';
//                 btnGaz.className = 'nav-link';
//                 btnElec.className = 'nav-link';
//
//                 saisieChauffage.style.display = 'block';
//                 saisieEau.style.display = 'none';
//                 saisieGaz.style.display = 'none';
//                 saisieElec.style.display = 'none';
//             });
//
//             btnEaux.addEventListener('click', function() {
//                 btnChauff.className = 'nav-link';
//                 btnEaux.className = 'nav-link active';
//                 btnGaz.className = 'nav-link';
//                 btnElec.className = 'nav-link';
//
//                 saisieChauffage.style.display = 'none';
//                 saisieEau.style.display = 'block';
//                 saisieGaz.style.display = 'none';
//                 saisieElec.style.display = 'none';
//             });
//
//             btnGaz.addEventListener('click', function() {
//                 btnChauff.className = 'nav-link';
//                 btnEaux.className = 'nav-link';
//                 btnGaz.className = 'nav-link active';
//                 btnElec.className = 'nav-link';
//
//                 saisieChauffage.style.display = 'none';
//                 saisieEau.style.display = 'none';
//                 saisieGaz.style.display = 'block';
//                 saisieElec.style.display = 'none';
//             });
//
//             btnElec.addEventListener('click', function() {
//                 btnChauff.className = 'nav-link';
//                 btnEaux.className = 'nav-link';
//                 btnGaz.className = 'nav-link';
//                 btnElec.className = 'nav-link active';
//
//                 saisieChauffage.style.display = 'none';
//                 saisieEau.style.display = 'none';
//                 saisieGaz.style.display = 'none';
//                 saisieElec.style.display = 'block';
//             });
//
//
//         });
//     };
// });
