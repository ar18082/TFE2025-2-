import { infoParam } from './saisieParametres.js';

const codeCli = window.location.pathname.split('/')[2];
const refAppTR = document.getElementById('refAppTR');
const refAppCli = document.getElementById('refAppCli');

axios.get('/ajax/saisieClientAjax', { params: { codeCli } })
    .then(response => {
        const data = response.data;


        //création des options pour les select
        data.appartements.forEach(appartement => {
                const optionTR = document.createElement('option');
                optionTR.className = 'optionTR';
                optionTR.value = appartement.RefAppTR;
                optionTR.text = appartement.RefAppTR;
                refAppTR.appendChild(optionTR);


                const optionCli = document.createElement('option');
                optionCli.value = appartement.RefAppTR;
                optionCli.text = appartement.RefAppCli;
                refAppCli.appendChild(optionCli);

        });

        //selection de l'option par défaut
        refAppTR.querySelector('option[value="1"]')?.setAttribute('selected', 'selected');
        refAppCli.querySelector('option[value="1"]')?.setAttribute('selected', 'selected');

        infoParam(data.Codecli, refAppTR.value, document.getElementById('title').innerText.toLowerCase());


        //ajout de l'event listener pour les select pour la correspondance des options
        refAppTR.addEventListener('change', function() {
            const refAppTRSelected = this.value;
            const optionsTR = refAppTR.querySelectorAll('option');
            const options = refAppCli.querySelectorAll('option');

            optionsTR.forEach(option => {
                if (option.value === refAppTRSelected) {
                    option.setAttribute('selected', 'selected');
                    infoParam(data.Codecli, refAppTRSelected, document.getElementById('title').innerText.toLowerCase());
                } else {
                    option.removeAttribute('selected');
                }
            });

            options.forEach(option => {
                if (option.value === refAppTRSelected) {
                    option.setAttribute('selected', 'selected');
                } else {
                    option.removeAttribute('selected');
                }
            });
        });

        refAppCli.addEventListener('change', function() {
            const refAppCliSelected = this.value;
            const optionsTR = refAppTR.querySelectorAll('option');
            const options = refAppCli.querySelectorAll('option');

            optionsTR.forEach(option => {
                if (option.value === refAppCliSelected) {
                    option.setAttribute('selected', 'selected');
                } else {
                    option.removeAttribute('selected');
                }
            });

            options.forEach(option => {
                if (option.value === refAppCliSelected) {
                    option.setAttribute('selected', 'selected');
                } else {
                    option.removeAttribute('selected');
                }
            });
        });


        // gestion date de relevé
        document.addEventListener('keydown', (event) => {
            const dateRlv = document.getElementById('dateRlv');
            const createDate = document.getElementById('createDate');

            if (event.key === '+') {
                const optionExists = Array.from(dateRlv.options).some(option => option.value === createDate.value);
                if (!optionExists) {

                    const options = dateRlv.options;
                    for (let i = 0; i < options.length; i++) {
                        if (options[i].selected) {
                            options[i].removeAttribute('selected');
                        }
                    }
                    const option = document.createElement('option');
                    option.value = createDate.value;
                    option.text = new Date(createDate.value).toLocaleDateString('fr-FR');
                    option.setAttribute('selected', 'selected');
                    dateRlv.appendChild(option);

                    if(document.getElementById('checkboxDateImmeuble').checked){
                        const storedDatas = JSON.parse(sessionStorage.getItem('datas')) || [];
                        if (!storedDatas.includes(createDate.value)) {
                            storedDatas.push(createDate.value);
                            sessionStorage.setItem('datas', JSON.stringify(storedDatas));
                        }
                        document.getElementById('checkboxDateImmeuble').checked = false;
                    }
                }

            }
            if(event.key === '-'){
                const options = dateRlv.options;
                for (let j = 0; j < options.length; j++) {
                    if (options[j].selected === true) {
                        var confirmDeleteDate = confirm(`Supprimer cette date de relevé ${options[j].text}  ?`);
                        if(confirmDeleteDate) {
                            dateRlv.removeChild(options[j]);
                        }
                    }
                }
            }
        });






    })
    .catch(console.log);
