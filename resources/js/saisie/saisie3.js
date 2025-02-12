// document.addEventListener("DOMContentLoaded", function() {
//     if (!/^\/immeubles\/.+/.test(window.location.pathname)) return;
//
//     var codeCli = window.location.pathname.split('/')[2];
//     var refAppTR = document.getElementsByClassName('refAppTR');
//     var refAppCli = document.getElementsByClassName('refAppCli');
//
//     axios.get('/ajax/saisieClientAjax', { params: { codeCli: codeCli } })
//         .then(function(response) {
//             var data = response.data;
//
//             // create option in the select RefAppTR and RefAppCli
//             data.appartements.forEach(function(appartement) {
//                 Array.from(refAppTR).forEach(function(element) {
//                     var optionTR = document.createElement('option');
//                     optionTR.value = appartement.RefAppTR;
//                     optionTR.text = appartement.RefAppTR;
//                     element.appendChild(optionTR);
//                 });
//
//                 Array.from(refAppCli).forEach(function(element) {
//                     var optionCli = document.createElement('option');
//                     optionCli.value = appartement.RefAppTR;
//                     optionCli.text = appartement.RefAppCli;
//                     element.appendChild(optionCli);
//                 });
//             });
//
//
//             document.querySelector('option[value="1"]')?.setAttribute('selected', 'selected');
//             var refAppTRSelected = parseInt(document.querySelector('option[selected]').value);
//             var selectedAppartement = data.appartements.find(app => app.RefAppTR === refAppTRSelected);
//
//             //initialise les tableaux first affichage
//             if(data.cli_eaus.length > 0){
//
//                 var nbCptEauFroid = document.getElementById('nbCptEauFroid');
//                 var nbCptEauChaud = document.getElementById('nbCptEauChaud');
//                 var tableEauFroide = document.getElementById('tableEauFroide');
//                 var tableEauChaude = document.getElementById('tableEauChaude');
//                 var typeRelEau = data.cli_eaus.length > 0  ? data.cli_eaus[0].TypRlv : '';
//                 var tableEauParam = document.getElementById('tableEauParam');
//
//                 nbCptEauFroid.value = data.appartements[0].rel_eau_apps[0] ? data.appartements[0].rel_eau_apps[0].NbCptFroid : 0;
//                 nbCptEauChaud.value = data.appartements[0].rel_eau_apps[0] ? data.appartements[0].rel_eau_apps[0].NbCptChaud : 0;
//                 populateTable(tableEauFroide, nbCptEauFroid.value, 'eauFroide', typeRelEau, data.appartements[0]);
//                 populateTable(tableEauChaude, nbCptEauChaud.value, 'eauChaude', typeRelEau, data.appartements[0]);
//
//                 nbCptEauFroid.addEventListener('change', function() {
//                     var tbodyEauFroide = tableEauFroide.querySelector('tbody');
//                     var nbTrEauFroide = tbodyEauFroide.children.length;
//                     if (parseInt(this.value) < nbTrEauFroide) {
//                         for (var i = nbTrEauFroide; i > parseInt(this.value); i--) {
//                             tbodyEauFroide.removeChild(tbodyEauFroide.children[i - 1]);
//                         }
//                     }else{
//                         AddLigneEmpty(tableEauFroide, this.value, 'eauFroide');
//                     }
//
//                 });
//
//                 nbCptEauChaud.addEventListener('change', function() {
//                     var tbodyEeauChaude = tableEauChaude.querySelector('tbody');
//                     var nbTrEauChaude = tbodyEeauChaude.children.length;
//                     if (parseInt(this.value) < nbTrEauChaude) {
//                         for (var i = nbTrEauChaude; i > parseInt(this.value); i--) {
//                             tbodyEeauChaude.removeChild(tbodyEeauChaude.children[i - 1]);
//                         }
//                     }else{
//                         AddLigneEmpty(tableEauChaude, this.value, 'eauChaude');
//                     }
//
//                 });
//
//                 if (selectedAppartement) {
//
//                     nbCptEauFroid.value = selectedAppartement.rel_eau_apps[0] ? NbCptFroid : 0;
//                     nbCptEauChaud.value = selectedAppartement.rel_eau_apps[0]? NbCptChaud : 0;
//                     // nbCptGaz.value = 0;
//                     // nbCptElec.value = 0;
//
//                     populateTable(tableEauFroide, nbCptEauFroid.value, 'eauFroide', typeRelEau, selectedAppartement);
//                     populateTable(tableEauChaude, nbCptEauChaud.value, 'eauChaude', typeRelEau, selectedAppartement);
//                     // populateTable(tableGaz, nbCptGaz.value, 'gaz', null, selectedAppartement);
//                     // populateTable(tableElec, nbCptElec.value, 'elec', null, selectedAppartement);
//                 }
//
//                 let isReadOnly = true;
//
//                 const inputsEauParam = tableEauParam.querySelectorAll('input');
//                 const inputsEauFroide = tableEauFroide.querySelectorAll('input');
//                 const inputsEauChaude = tableEauChaude.querySelectorAll('input');
//
//                  const setReadOnly = (readonly) => {
//                      inputsEauParam.forEach(input => {
//                          input.readOnly = readonly;
//                      });
//                      inputsEauFroide.forEach(input => {
//                          input.readOnly = readonly;
//                      });
//                      inputsEauChaude.forEach(input => {
//                          input.readOnly = readonly;
//                      });
//                  };
//
//                 setReadOnly(isReadOnly);
//
//                 document.addEventListener('keydown', (event) => {
//                     if (event.key === '(') {
//                         isReadOnly = !isReadOnly;
//
//                         inputsEauParam.forEach(input => {
//                             input.readOnly = false;
//                         });
//                         inputsEauFroide.forEach(input => {
//                             input.readOnly = false;
//                         });
//                         inputsEauChaude.forEach(input => {
//                             input.readOnly = false;
//                         });
//
//                         alert('Les paramètres sont maintenant éditables !');
//                     };
//
//                     if (event.key === '§') {
//                         inputsEauParam.forEach(input => {
//                             input.readOnly = true;
//                         });
//                         inputsEauFroide.forEach(input => {
//                             input.readOnly = false;
//                         });
//                         inputsEauChaude.forEach(input => {
//                             input.readOnly = false;
//                         });
//
//                         alert('La saisie est maintenant éditables !');
//                     }
//
//                 });
//
//             }else{
//                 console.log( 'pas de releve eau');
//             }
//             if(data.clichaufs.length > 0){
//                 console.log(data.clichaufs[0].TypRlv);
//                 var nbRad = document.getElementById('nbRad');
//                 var fraisDiv = document.getElementById('fraisDiv');
//                 var nbFraisTR = document.getElementById('nbFraisTR');
//                 var pctFraisAnn = document.getElementById('pctFraisAnn');
//                 var appQuot = document.getElementById('appQuot');
//                 const tableChauff = document.getElementById('tableChauff');
//                 const table = document.getElementById('tableChauffParam');
//                 var typeRelChauf = data.clichaufs.length > 0 ? data.clichaufs[0].TypRlv : '';
//
//                 nbRad.value = data.appartements[0].rel_chauf_apps[0] ? data.appartements[0].rel_chauf_apps[0].NbRad : 0;
//                 fraisDiv.value = data.appartements[0].rel_chauf_apps[0] ? data.appartements[0].rel_chauf_apps[0].FraisDiv : 0;
//                 nbFraisTR.value = data.appartements[0].rel_chauf_apps[0] ? data.appartements[0].rel_chauf_apps[0].NbFraisTR : 0;
//                 pctFraisAnn.value = data.appartements[0].rel_chauf_apps[0] ? data.appartements[0].rel_chauf_apps[0].PctFraisAnn : 0;
//                 appQuot.value = data.appartements[0].rel_chauf_apps[0] ? data.appartements[0].rel_chauf_apps[0].AppQuot : 0;
//
//                 populateTable(tableChauff, nbRad.value, 'chauff', typeRelChauf, data.appartements[0]);
//
//                 nbRad.addEventListener('change', function() {
//                     var tbody = tableChauff.querySelector('tbody');
//                     var nbTr = tbody.children.length;
//                     if (parseInt(this.value) < nbTr) {
//                         for (var i = nbTr; i > parseInt(this.value); i--) {
//                             tbody.removeChild(tbody.children[i - 1]);
//                         }
//                     }else{
//                         AddLigneEmpty(tableChauff, this.value, 'chauff');
//                     }
//                 });
//
//
//                 if (selectedAppartement) {
//                     console.log(selectedAppartement);
//                     nbRad.value = selectedAppartement.rel_chauf_apps[0] ? NbRad : 0;
//                     populateTable(tableChauff, nbRad.value, 'chauff', typeRelChauf, selectedAppartement);
//                 }
//
//                 let isReadOnly = true;
//
//                 const inputs = table.querySelectorAll('input');
//                 const inputsChauff = tableChauff.querySelectorAll('input');
//
//                 const setReadOnly = (readonly) => {
//                     inputs.forEach(input => {
//                         input.readOnly = readonly;
//                     });
//                     inputsChauff.forEach(input => {
//                         input.readOnly = readonly;
//                     });
//                 };
//
//                 setReadOnly(isReadOnly);
//
//                 document.addEventListener('keydown', (event) => {
//                     if (event.key === '(') {
//                         isReadOnly = !isReadOnly;
//                         inputs.forEach(input => {
//                             input.readOnly = false;
//                         });
//                         inputsChauff.forEach(input => {
//                             input.readOnly = true;
//                         });
//
//                         alert('Les paramètres sont maintenant éditables !');
//                     }
//
//                     if (event.key === '§') {
//
//                         inputsChauff.forEach(input => {
//                             input.readOnly = false;
//                         });
//                         inputs.forEach(input => {
//                             input.readOnly = true;
//                         });
//
//                         alert('La saisie est maintenant éditables !');
//                     }
//
//                 });
//
//
//
//             }else {
//                 console.log( 'pas de releve chauffage');
//             }
//
//
//             Array.from(refAppTR).forEach(function(element) {
//                 element.addEventListener('change', function() {
//                     Array.from(refAppCli).forEach(function(refAppCliElement) {
//                         refAppCliElement.querySelector(`option[value="${element.value}"]`).selected = true;
//                     });
//                     updateSelectedAppartement(data, this.value);
//
//                 });
//             });
//
//             Array.from(refAppCli).forEach(function(element) {
//                 element.addEventListener('change', function() {
//                     Array.from(refAppTR).forEach(function(refAppTRElement) {
//                         refAppTRElement.querySelector(`option[value="${element.value}"]`).selected = true;
//                     });
//                     updateSelectedAppartement(data, this.value);
//                 });
//             });
//
//
//
//
//         })
//         .catch(function(error) {
//             console.log(error);
//         });
//
//
//         document.addEventListener('keydown', (event) => {
//             if (event.key === '+') {
//                 const dateRlv = document.getElementsByClassName('dateRlv');
//                 console.log(dateRlv);
//                 for (let i = 0; i < dateRlv.length; i++) {
//                     const optionExists = Array.from(dateRlv[i].options).some(option => option.value === createDate.value);
//                     if (!optionExists) {
//                         const option = document.createElement('option');
//                         option.value = createDate.value;
//                         option.text = new Date(createDate.value).toLocaleDateString('fr-FR');
//                         dateRlv[i].appendChild(option);
//
//                         const storedDatas = JSON.parse(sessionStorage.getItem('datas')) || [];
//                         if (!storedDatas.includes(createDate.value)) {
//                             storedDatas.push(createDate.value);
//                             sessionStorage.setItem('datas', JSON.stringify(storedDatas));
//                         }
//                     }
//                 }
//             }
//         });
//
//     function updateSelectedAppartement(data, refAppTRSelected) {
//         var selectedAppartement = data.appartements.find(app => app.RefAppTR === parseInt(refAppTRSelected));
//         if (selectedAppartement) {
//             if(data.cli_eaus.length > 0){
//                 console.log(selectedAppartement);
//                 nbCptEauFroid.value = selectedAppartement.rel_eau_apps[0]?.NbCptFroid || 0;
//                 nbCptEauChaud.value = selectedAppartement.rel_eau_apps[0]?.NbCptChaud || 0;
//                 fraisDiv.value = selectedAppartement.rel_eau_apps[0] ? selectedAppartement.rel_eau_apps[0].FraisDiv : 0;
//                 nbFraisTR.value = selectedAppartement.rel_eau_apps[0] ? selectedAppartement.rel_eau_apps[0].NbFraisTR : 0;
//                 pctFraisAnn.value = selectedAppartement.rel_eau_apps[0] ? selectedAppartement.rel_eau_apps[0].PctFraisAnn : 0;
//
//                 var typeRelEau = data.cli_eaus.length > 0  ? data.cli_eaus[0].TypRlv : '';
//                 populateTable(tableEauFroide, nbCptEauFroid.value, 'eauFroide', typeRelEau, selectedAppartement);
//                 populateTable(tableEauChaude, nbCptEauChaud.value, 'eauChaude', typeRelEau, selectedAppartement);
//             }
//
//             if(data.clichaufs.length > 0){
//                 nbRad.value = selectedAppartement.rel_chauf_apps[0]?.NbRad || 0;
//                 var typeRelChauf = data.clichaufs.length > 0 ? data.clichaufs[0].TypRlv : '';
//
//                 populateTable(tableChauff, nbRad.value, 'chauff', typeRelChauf, selectedAppartement);
//
//                 fraisDiv.value = selectedAppartement.rel_chauf_apps[0] ? selectedAppartement.rel_chauf_apps[0].FraisDiv : 0;
//                 nbFraisTR.value = selectedAppartement.rel_chauf_apps[0] ? selectedAppartement.rel_chauf_apps[0].NbFraisTR : 0;
//                 pctFraisAnn.value = selectedAppartement.rel_chauf_apps[0] ? selectedAppartement.rel_chauf_apps[0].PctFraisAnn : 0;
//                 appQuot.value = selectedAppartement.rel_chauf_apps[0] ? selectedAppartement.rel_chauf_apps[0].AppQuot : 0;
//             }
//
//
//
//             // fraisDiv.value = data.appartements[0].rel_chauf_apps[0] ? data.appartements[0].rel_chauf_apps[0].FraisDiv : 0;
//             // nbFraisTR.value = data.appartements[0].rel_chauf_apps[0] ? data.appartements[0].rel_chauf_apps[0].NbFraisTR : 0;
//             // pctFraisAnn.value = data.appartements[0].rel_chauf_apps[0] ? data.appartements[0].rel_chauf_apps[0].PctFraisAnn : 0;
//             // appQuot.value = data.appartements[0].rel_chauf_apps[0] ? data.appartements[0].rel_chauf_apps[0].AppQuot : 0;
//
//
//             // nbCptGaz.value = 0;
//             // nbCptElec.value = 0;
//             // populateTable(tableGaz, nbCptGaz.value, 'gaz', null, selectedAppartement);
//             // populateTable(tableElec, nbCptElec.value, 'elec', null, selectedAppartement);
//         }
//     }
//
//     function populateTable(table, count, type, typeRel, selectedAppartement) {
//         var tbody = table.querySelector('tbody');
//         for (var i = 1; i <= parseInt(count); i++) {
//             axios.get('/ajax/saisieRelAjax', {
//                 params: {
//                     codeCli: codeCli,
//                     refAppTR: selectedAppartement.RefAppTR,
//                     type: type,
//                     typeRel: typeRel,
//                     num: i,
//
//                 }
//             })
//                 .then(function(response) {
//
//                     var datas = [];
//                     var nbTd = 0;
//                     if(type === 'chauff') {
//                         if(typeRel === 'VISU'){
//                             datas = ['NumRad', 'NumCal', 'TypCal', 'Statut', 'Sit', 'Coef', 'NvIdx', '', ''];
//                         }else{
//                             datas = ['', 'Numcal', '', '', '', 'Coef', 'Nvidx', '', ''];
//                         }
//
//                         nbTd = 9;
//                     }else if(type === 'eauFroide' || type === 'eauChaude') {
//                         datas = ['NoCpt', 'NumCpt', 'Statut', 'Sit', 'NvIdx', '', ''];
//                         nbTd = 7;
//                     }else if(type === 'gaz') {
//
//                     }else if(type === 'elec') {
//
//                     }
//
//                     var tr = document.createElement('tr');
//                     for (var j = 0; j < nbTd; j++) {
//                         var index = 0;
//                         var td = document.createElement('td');
//                         var input = document.createElement('input');
//                         input.style.width = '80%';
//                         input.className = 'form-control';
//                         // trouver une solution car pas de NumRad pour les eau froide et eau chaude
//                         input.id = `${type}_${response.data.num}_${j}`;
//                         input.name = `${type}_${response.data.num}_${j}`;
//                         // add readonly in the input
//                         input.readOnly = true;
//                         if(response.data) {
//                             if(response.data.rel){
//                                 if(response.data.rel[datas[j]]){
//                                     if(j === 0 ){
//                                         input.value = datas[j] === '' ? response.data.num : response.data.rel[datas[j]];
//                                     }else{
//                                         input.value = response.data.rel[datas[j]];
//                                     }
//
//                                 }
//                             }else{
//                                 input.value = '';
//
//                             }
//                         }
//                         td.appendChild(input);
//                         tr.appendChild(td);
//                     }
//                     tbody.appendChild(tr);
//                 })
//                 .catch(function(error) {
//                     console.log(error);
//                 });
//         }
//     }
//
//     function AddLigneEmpty(table, count, type) {
//         var tbody = table.querySelector('tbody');
//
//         var nbTd = 0;
//         if(type === 'chauff') {
//             nbTd = 9;
//         }else if(type === 'eauFroide' || type === 'eauChaude') {
//             nbTd = 7;
//         }else if(type === 'gaz') {
//
//         }else if(type === 'elec') {
//
//         }
//
//         var nbLigne = count - tbody.children.length;
//         for (var i = 1; i <= nbLigne; i++) {
//             var tr = document.createElement('tr');
//             for (var j = 0; j < nbTd; j++) {
//                 var index = 0;
//                 var td = document.createElement('td');
//                 var input = document.createElement('input');
//                 input.style.width = '80%';
//                 input.className = 'form-control';
//                 // trouver une solution car pas de NumRad pour les eau froide et eau chaude
//                 input.id = `${type}_${tbody.children.length + i}_${j}`;
//                 input.name = `${type}_${tbody.children.length + i}_${j}`;
//                 input.value = '';
//                 td.appendChild(input);
//                 tr.appendChild(td);
//             }
//             tbody.appendChild(tr);
//         }
//
//
//     }
// });
