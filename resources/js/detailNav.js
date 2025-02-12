document.addEventListener("DOMContentLoaded", function() {

    if (/^\/immeubles\/.+/.test(window.location.pathname)) {
        document.getElementById('btnDetailImmeuble').addEventListener('click', function () {

            //button
            var btnDetailChart = document.getElementById('btnDetailChart');
            var btnDetailChauff = document.getElementById('btnDetailChauff');
            var btnDetailEau = document.getElementById('btnDetailEau');
            var btnDetailGaz = document.getElementById('btnDetailGaz');
            var btnDetailElec = document.getElementById('btnDetailElec');
            var btnDetailProvision = document.getElementById('btnDetailProvision');
            var btnDefinition = document.getElementById('btnDefinition');
            var btnDetailInfoAppart = document.getElementById('btnDetailInfoAppart');

            //content
            var detailChauff = document.getElementById('detailChauff');
            var detailEau = document.getElementById('detailEau');
            var detailGaz = document.getElementById('detailGaz');
            var detailElec = document.getElementById('detailElec');
            var detailProvision = document.getElementById('detailProvision');
            var detailChartContent = document.getElementById('detailChartContent');
            var definitionContent = document.getElementById('definitionContent');
            var infoAppart = document.getElementById('infoAppart');


            btnDefinition.style.backgroundColor = '#023c7b';
            btnDefinition.style.color = '#fff';

            btnDetailChart.style.backgroundColor = '#fff';
            btnDetailChart.style.color = 'black'

            btnDetailChauff.style.backgroundColor = '#fff';
            btnDetailChauff.style.color = 'black'

            btnDetailEau.style.backgroundColor = '#fff';
            btnDetailEau.style.color = 'black';

            btnDetailGaz.style.backgroundColor = '#fff';
            btnDetailGaz.style.color = 'black';

            btnDetailElec.style.backgroundColor = '#fff';
            btnDetailElec.style.color = 'black';

            btnDetailProvision.style.backgroundColor = '#fff';
            btnDetailProvision.style.color = 'black';

            btnDetailInfoAppart.style.backgroundColor = '#fff';
            btnDetailInfoAppart.style.color = 'black';

            definitionContent.style.display = 'block';
            detailChartContent.style.display = 'none';
            detailChauff.style.display = 'none';
            detailEau.style.display = 'none';
            detailGaz.style.display = 'none';
            detailElec.style.display = 'none';
            detailProvision.style.display = 'none';
            infoAppart.style.display = 'none';

            btnDefinition.addEventListener('click', function () {
                btnDefinition.style.backgroundColor = '#023c7b';
                btnDefinition.style.color = '#fff';

                btnDetailChart.style.backgroundColor = '#fff';
                btnDetailChart.style.color = 'black';

                btnDetailChauff.style.backgroundColor = '#fff';
                btnDetailChauff.style.color = 'black';

                btnDetailEau.style.backgroundColor = '#fff';
                btnDetailEau.style.color = 'black';

                btnDetailGaz.style.backgroundColor = '#fff';
                btnDetailGaz.style.color = 'black';

                btnDetailElec.style.backgroundColor = '#fff';
                btnDetailElec.style.color = 'black';

                btnDetailProvision.style.backgroundColor = '#fff';
                btnDetailProvision.style.color = 'black';

                btnDetailInfoAppart.style.backgroundColor = '#fff';
                btnDetailInfoAppart.style.color = 'black';

                definitionContent.style.display = 'block';
                detailChartContent.style.display = 'none';
                detailChauff.style.display = 'none';
                detailEau.style.display = 'none';
                detailGaz.style.display = 'none';
                detailElec.style.display = 'none';
                detailProvision.style.display = 'none';
                infoAppart.style.display = 'none';
            });

            btnDetailChart.addEventListener('click', function () {
                btnDetailChart.style.backgroundColor = '#023c7b';
                btnDetailChart.style.color = '#fff';

                btnDefinition.style.backgroundColor = '#fff';
                btnDefinition.style.color = 'black';

                btnDetailChauff.style.backgroundColor = '#fff';
                btnDetailChauff.style.color = 'black';

                btnDetailEau.style.backgroundColor = '#fff';
                btnDetailEau.style.color = 'black';

                btnDetailGaz.style.backgroundColor = '#fff';
                btnDetailGaz.style.color = 'black';

                btnDetailElec.style.backgroundColor = '#fff';
                btnDetailElec.style.color = 'black';

                btnDetailProvision.style.backgroundColor = '#fff';
                btnDetailProvision.style.color = 'black';

                btnDetailInfoAppart.style.backgroundColor = '#fff';
                btnDetailInfoAppart.style.color = 'black';

                detailChartContent.style.display = 'block';
                definitionContent.style.display = 'none';
                detailChauff.style.display = 'none';
                detailEau.style.display = 'none';
                detailGaz.style.display = 'none';
                detailElec.style.display = 'none';
                detailProvision.style.display = 'none';
                infoAppart.style.display = 'none';
            });


            btnDetailChauff.addEventListener('click', function () {
                btnDetailChart.style.backgroundColor = '#fff';
                btnDetailChart.style.color = 'black';

                btnDefinition.style.backgroundColor = '#fff';
                btnDefinition.style.color = 'black';

                btnDetailChauff.style.backgroundColor = '#023c7b';
                btnDetailChauff.style.color = '#fff';

                btnDetailEau.style.backgroundColor = '#fff';
                btnDetailEau.style.color = 'black';

                btnDetailGaz.style.backgroundColor = '#fff';
                btnDetailGaz.style.color = 'black';

                btnDetailElec.style.backgroundColor = '#fff';
                btnDetailElec.style.color = 'black';

                btnDetailProvision.style.backgroundColor = '#fff';
                btnDetailProvision.style.color = 'black';

                btnDetailInfoAppart.style.backgroundColor = '#fff';
                btnDetailInfoAppart.style.color = 'black';

                detailChartContent.style.display = 'none';
                definitionContent.style.display = 'none';
                detailChauff.style.display = 'block';
                detailEau.style.display = 'none';
                detailGaz.style.display = 'none';
                detailElec.style.display = 'none';
                detailProvision.style.display = 'none';
                infoAppart.style.display = 'none';


            });


            btnDetailEau.addEventListener('click', function () {
                btnDetailChart.style.backgroundColor = '#fff';
                btnDetailChart.style.color = 'black';

                btnDefinition.style.backgroundColor = '#fff';
                btnDefinition.style.color = 'black';

                btnDetailEau.style.backgroundColor = '#023c7b';
                btnDetailEau.style.color = '#fff';

                btnDetailChauff.style.backgroundColor = '#fff';
                btnDetailChauff.style.color = 'black';

                btnDetailGaz.style.backgroundColor = '#fff';
                btnDetailGaz.style.color = 'black';

                btnDetailElec.style.backgroundColor = '#fff';
                btnDetailElec.style.color = 'black';

                btnDetailProvision.style.backgroundColor = '#fff';
                btnDetailProvision.style.color = 'black';

                btnDetailInfoAppart.style.backgroundColor = '#fff';
                btnDetailInfoAppart.style.color = 'black';

                detailEau.style.display = 'block';
                detailChauff.style.display = 'none';
                definitionContent.style.display = 'none';
                detailGaz.style.display = 'none';
                detailElec.style.display = 'none';
                detailProvision.style.display = 'none';
                detailChartContent.style.display = 'none';
                infoAppart.style.display = 'none';


            });

            btnDetailGaz.addEventListener('click', function () {
                btnDetailChart.style.backgroundColor = '#fff';
                btnDetailChart.style.color = 'black';

                btnDefinition.style.backgroundColor = '#fff';
                btnDefinition.style.color = 'black';

                btnDetailGaz.style.backgroundColor = '#023c7b';
                btnDetailGaz.style.color = '#fff';

                btnDetailChauff.style.backgroundColor = '#fff';
                btnDetailChauff.style.color = 'black';

                btnDetailEau.style.backgroundColor = '#fff';
                btnDetailEau.style.color = 'black';

                btnDetailElec.style.backgroundColor = '#fff';
                btnDetailElec.style.color = 'black';

                btnDetailProvision.style.backgroundColor = '#fff';
                btnDetailProvision.style.color = 'black';

                btnDetailInfoAppart.style.backgroundColor = '#fff';
                btnDetailInfoAppart.style.color = 'black';

                detailGaz.style.display = 'block';
                definitionContent.style.display = 'none';
                detailChauff.style.display = 'none';
                detailEau.style.display = 'none';
                detailElec.style.display = 'none';
                detailProvision.style.display = 'none';
                detailChartContent.style.display = 'none';
                infoAppart.style.display = 'none';
            });

            btnDetailElec.addEventListener('click', function () {
                btnDetailChart.style.backgroundColor = '#fff';
                btnDetailChart.style.color = 'black';

                btnDefinition.style.backgroundColor = '#fff';
                btnDefinition.style.color = 'black';

                btnDetailElec.style.backgroundColor = '#023c7b';
                btnDetailElec.style.color = '#fff';

                btnDetailChauff.style.backgroundColor = '#fff';
                btnDetailChauff.style.color = 'black';

                btnDetailEau.style.backgroundColor = '#fff';
                btnDetailEau.style.color = 'black';

                btnDetailGaz.style.backgroundColor = '#fff';
                btnDetailGaz.style.color = 'black';

                btnDetailProvision.style.backgroundColor = '#fff';
                btnDetailProvision.style.color = 'black';

                btnDetailInfoAppart.style.backgroundColor = '#fff';
                btnDetailInfoAppart.style.color = 'black';

                detailElec.style.display = 'block';
                definitionContent.style.display = 'none';
                detailChauff.style.display = 'none';
                detailGaz.style.display = 'none';
                detailEau.style.display = 'none';
                detailProvision.style.display = 'none';
                detailChartContent.style.display = 'none';
                infoAppart.style.display = 'none';
            });

            btnDetailProvision.addEventListener('click', function () {
                btnDetailProvision.style.backgroundColor = '#023c7b';
                btnDetailProvision.style.color = '#fff';

                btnDefinition.style.backgroundColor = '#fff';
                btnDefinition.style.color = 'black';

                btnDetailChart.style.backgroundColor = '#fff';
                btnDetailChart.style.color = 'black';

                btnDetailChauff.style.backgroundColor = '#fff';
                btnDetailChauff.style.color = 'black';

                btnDetailEau.style.backgroundColor = '#fff';
                btnDetailEau.style.color = 'black';

                btnDetailGaz.style.backgroundColor = '#fff';
                btnDetailGaz.style.color = 'black';

                btnDetailElec.style.backgroundColor = '#fff';
                btnDetailElec.style.color = 'black';

                btnDetailInfoAppart.style.backgroundColor = '#fff';
                btnDetailInfoAppart.style.color = 'black';

                detailProvision.style.display = 'block';
                definitionContent.style.display = 'none';
                detailChauff.style.display = 'none';
                detailGaz.style.display = 'none';
                detailElec.style.display = 'none';
                detailEau.style.display = 'none';
                detailChartContent.style.display = 'none';
                infoAppart.style.display = 'none';
            });

            btnDetailInfoAppart.addEventListener('click', function () {
                btnDetailInfoAppart.style.backgroundColor = '#023c7b';
                btnDetailInfoAppart.style.color = '#fff';

                btnDefinition.style.backgroundColor = '#fff';
                btnDefinition.style.color = 'black';

                btnDetailChart.style.backgroundColor = '#fff';
                btnDetailChart.style.color = 'black';

                btnDetailChauff.style.backgroundColor = '#fff';
                btnDetailChauff.style.color = 'black';

                btnDetailEau.style.backgroundColor = '#fff';
                btnDetailEau.style.color = 'black';

                btnDetailGaz.style.backgroundColor = '#fff';
                btnDetailGaz.style.color = 'black';

                btnDetailElec.style.backgroundColor = '#fff';
                btnDetailElec.style.color = 'black';

                btnDetailProvision.style.backgroundColor = '#fff';
                btnDetailProvision.style.color = 'black';

                infoAppart.style.display = 'block';
                definitionContent.style.display = 'none';
                detailChauff.style.display = 'none';
                detailGaz.style.display = 'none';
                detailElec.style.display = 'none';
                detailEau.style.display = 'none';
                detailProvision.style.display = 'none';
                detailChartContent.style.display = 'none';
            });




            //button for update data detail immeuble
            var edit = document.getElementsByClassName('edit');
            var btnSubmitFormDetail = document.getElementsByClassName('btnSubmitFormDetail');
            var inputDetail = document.getElementsByClassName('inputDetail');
            var submitEauSolidaire = document.getElementById('submitEauSolidaire');
            var removeEauSolidaire = document.getElementById('removeEauSolidaire');
            // var inputCheckbox = document.getElementsByTagName('input').type = 'checkbox';




            submitEauSolidaire.disabled = true;
            removeEauSolidaire.disabled = true;
            for (var k = 0; k < inputDetail.length; k++) {
                inputDetail[k].setAttribute('readonly', 'true');


            }
            // for(var f = 0; f < inputCheckbox.length; f++) {
            //     inputCheckbox[f].disabled = true;
            // }


           for (var i = 0; i < edit.length; i++) {
                edit[i].addEventListener('click', function () {
                    submitEauSolidaire.disabled = false;
                    removeEauSolidaire.disabled = false;
                    for (var j = 0; j < btnSubmitFormDetail.length; j++) {
                        btnSubmitFormDetail[j].style.display = 'block';
                        edit[j].style.display = 'none';
                    }

                    for (var k = 0; k < inputDetail.length; k++) {
                        inputDetail[k].removeAttribute('readonly');

                    }

                    // for(var f = 0; f < inputCheckbox.length; f++) {
                    //     inputCheckbox[f].disabled = false;
                    // }
                });
           }

        });

        var submitEauSolidaire = document.getElementById('submitEauSolidaire');
        var eauSolidairelibelle = document.getElementById('eauSolidairelibelle');
        var eauSolidairenbHecto = document.getElementById('eauSolidairenbHecto');
        var eauSolidaireprix = document.getElementById('eauSolidaireprix');
        var tableEauSolidaire = document.getElementById('tableEauSolidaire').getElementsByTagName('tbody')[0];
        submitEauSolidaire.addEventListener('click', function () {
            eauSolidaireprix = eauSolidaireprix.value
            eauSolidairelibelle = eauSolidairelibelle.value
            eauSolidairenbHecto = eauSolidairenbHecto.value

            var tr = document.createElement('tr');
            for (var i = 0; i < 3; i++) {
                var td = document.createElement('td');
                var input = document.createElement('input');
                input.setAttribute('type', 'text');
                input.setAttribute('class', 'inputDetail');
                input.setAttribute('readonly', 'true');
                if (i === 0) {
                    input.setAttribute('name', 'eauSolidairelibelle_' + i);
                    input.value = eauSolidairelibelle;
                } else if (i === 1) {
                    input.setAttribute('name', 'eauSolidairenbHecto_' +i);
                    input.value = eauSolidairenbHecto;
                } else {
                    input.setAttribute('name', 'eauSolidaireprix_' + i);
                    input.value = eauSolidaireprix;
                }
                td.appendChild(input);
                tr.appendChild(td);
                tableEauSolidaire.appendChild(tr);
            }

            console.log(eauSolidaireprix.value);
            // eauSolidairelibelle.value= '';
            // eauSolidairenbHecto.value='';

        });

    }
});

