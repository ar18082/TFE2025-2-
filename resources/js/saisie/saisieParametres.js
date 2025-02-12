import { saisieTable } from './saisieTable.js';
export function infoParam(codeCli, refAppTR, type){

    axios.get('/ajax/saisieParamAjax', {
        params: {
            'codeCli'  : codeCli,
            'refAppTR' : refAppTR,
            'type'     : type
        }
    })
        .then(response =>{
            const data = response.data;
            console.log(data);


            const paramChauff = document.querySelectorAll('.paramChauff');
            const paramEau = document.getElementById('paramEau');

            var fraisDiv = document.getElementById('fraisDiv');
            var nbFraisTR = document.getElementById('nbFraisTR');
            var pctFraisAnn = document.getElementById('pctFraisAnn');



            if(type === 'eau'){
                paramChauff.forEach(function (el) {
                    el.style.display = 'none';
                });
                paramEau.style.display = 'block';
                fraisDiv.value = data.rel_eau_apps[0].FraisDiv;
                nbFraisTR.value = data.rel_eau_apps[0].NbFraisTR;
                pctFraisAnn.value = data.rel_eau_apps[0].PctFraisAnn;
                document.getElementById('nbCptEauFroid').value = data.rel_eau_apps[0].NbCptFroid;
                document.getElementById('nbCptEauChaud').value = data.rel_eau_apps[0].NbCptChaud;

            }else if (type === 'chauffage'){
                console.log(data.clichaufs[0].TypRlv)
                paramChauff.forEach(function (el) {
                    el.style.display = 'block';
                });
                paramEau.style.display = 'none';
                fraisDiv.value = data.rel_chauf_apps[0].FraisDiv;
                nbFraisTR.value = data.rel_chauf_apps[0].NbFraisTR;
                pctFraisAnn.value = data.rel_chauf_apps[0].PctFraisAnn;
                document.getElementById('appQuot').value = data.rel_chauf_apps[0].AppQuot;
                document.getElementById('nbRad').value = data.rel_chauf_apps[0].NbRad;


                // appel à la fonction saisieTable pour afficher les données dans le tableau
                saisieTable(codeCli, refAppTR, type, data.clichaufs[0].TypRlv);

            }


        })
        .catch(error => console.error(error));
}
