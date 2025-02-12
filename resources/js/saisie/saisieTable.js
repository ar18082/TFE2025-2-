
export function saisieTable (codeCli, refAppTR, type, typeRel) {
    var tableSaisie = document.getElementById('tableSaisie');
    var thead = tableSaisie.querySelector('thead');
    var tbody = tableSaisie.querySelector('tbody');
    var tr = document.createElement('tr');
    var th = document.createElement('th');
    var td = document.createElement('td');
    var input = document.createElement('input');

    axios.get('/ajax/saisieRelAjax', {
        params: {
            'codeCli'  : codeCli,
            'refAppTR' : refAppTR,
            'type'     : type,
            'typeRel'  : typeRel
        }
    })
    .then(response => {
        var responseData = response.data;
        console.log(responseData.length);
        var nbTd = 0;
        // Remove all child elements from thead
        while (thead.firstChild) {
            thead.removeChild(thead.firstChild);
        }
        // Remove all child elements from tbody
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }
        if(type === 'chauffage'){
            if(typeRel === 'VISU') {
                var indexResponse = ['NumRad', 'NumCal', 'TypCal', 'Statut', 'Sit', 'Coef', 'NvIdx', '', ''];
                var tableTitre = ['Num. Radiateur', 'Num. Calorimètre', 'Type Calo.', 'Statut', 'Situation', 'Coefficient', 'Ancien Index', 'Nouvel Index', 'Différence'];
                nbTd = 9;
                for(var i = 0; i < nbTd; i++){
                    th = document.createElement('th');
                    th.setAttribute('scope', 'col');
                    th.innerText = tableTitre[i];
                    thead.appendChild(th);
                }

                for(var i = 0; i < responseData.length; i++){
                    tr = document.createElement('tr');
                    tbody.appendChild(tr);
                    for(var j = 0; j < nbTd; j++){
                        td = document.createElement('td');
                        if(j === 3){
                            input = document.createElement('select');
                            input.setAttribute('name', indexResponse[j]);
                            var options = ['OK', 'A remplacer', 'A enlever'];
                            for(var k = 0; k < options.length; k++){
                                var option = document.createElement('option');
                                option.value = options[k];
                                option.innerText = options[k];
                                input.appendChild(option);
                            }
                            td.appendChild(input);
                            tr.appendChild(td);
                        }else if (j === 6 ){
                            input = document.createElement('input');
                            input.setAttribute('type', 'text');
                            input.setAttribute('name', 'AncIdx');
                            input.setAttribute('class', 'inputTableSaisie');
                            input.setAttribute('readonly', 'readonly');
                            input.value =  parseFloat(responseData[i][indexResponse[j]]);
                            td.appendChild(input);
                            tr.appendChild(td);
                        }else if (j === 7 ){
                            input = document.createElement('input');
                            input.setAttribute('type', 'text');
                            input.setAttribute('name', 'NvIdx');
                            input.value = 0;
                            td.appendChild(input);
                            tr.appendChild(td);
                        } else if(j === 8){
                            var diff = responseData[i][indexResponse[7]] - responseData[i][indexResponse[6]];
                            input = document.createElement('input');
                            input.setAttribute('type', 'text');
                            input.setAttribute('name', 'diff');
                            input.setAttribute('class', 'inputTableSaisie');
                            input.value = diff;
                            td.appendChild(input);
                            tr.appendChild(td);
                        }else {
                            input = document.createElement('input');
                            input.setAttribute('type', 'text');
                            input.setAttribute('name', indexResponse[j]);
                            input.setAttribute('class', 'inputTableSaisie');
                            input.setAttribute('readonly', 'readonly');
                            input.value = responseData[i][indexResponse[j]];
                            td.appendChild(input);
                            tr.appendChild(td);
                        }
                    }
                }

                tableSaisie.appendChild(thead);
                tableSaisie.appendChild(tbody);

            }else if(typeRel === 'RADIO' || typeRel === 'GPRS'){
                console.log('radio ou gprs');
            }
        }



    })
        .catch(error => console.error(error));


}
