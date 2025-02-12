import { infoParam } from './saisieParametres.js';
const btnChauff = document.getElementById('btnChauff');
const btnEaux = document.getElementById('btnEaux');
const btnGaz = document.getElementById('btnGaz');
const btnElec = document.getElementById('btnElec');
const title = document.getElementById('title');

title.innerText = 'Chauffage';

const buttons = [
    { btn: btnChauff, text: 'Chauffage' },
    { btn: btnEaux, text: 'Eau' },
    { btn: btnGaz, text: 'Gaz' },
    { btn: btnElec, text: 'Electricité' }
];

buttons.forEach(({ btn, text }) => {
    btn.addEventListener('click', function() {
        buttons.forEach(({ btn }) => btn.className = 'nav-link');
        btn.className = 'nav-link active';
        title.innerText = text;

        const refAppTR = document.getElementById('refAppTR');
        const refAppCli = document.getElementById('refAppCli');
        // const optionsTR = refAppTR.querySelectorAll('option');
        // const options = refAppCli.querySelectorAll('option');
        const codeCli = parseInt(window.location.pathname.split('/')[2]);
        const refAppTRValue = "1";
        // optionsTR.forEach(option => {
        //     option.removeAttribute('selected');
        //     if (option.value === refAppTRValue) {
        //         option.setAttribute('selected', 'selected');
        //
        //     }
        // });
        //
        // options.forEach(option => {
        //     option.removeAttribute('selected');
        //     if (option.value === refAppTRValue) {
        //         option.setAttribute('selected', 'selected');
        //     }
        // });

        infoParam(codeCli, refAppTRValue, text.toLowerCase());

    });
});


