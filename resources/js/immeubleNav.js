document.addEventListener("DOMContentLoaded", function() {

    if (/^\/immeubles\/.+/.test(window.location.pathname)) {

        //button
        var btnApparts = document.getElementById('btnApparts');
        var btnDetailImmeuble = document.getElementById('btnDetailImmeuble');
        var btnDocumentsImmeuble = document.getElementById('btnDocumentsImmeuble');
        var btnFactureImmeuble = document.getElementById('btnFactureImmeuble');
        var btnRDVImmeuble = document.getElementById('btnRDVImmeuble');
        var btnRapport = document.getElementById('btnRapport');
        var btnIndexApp = document.getElementById('btnIndexApp');

        //import
         var importClients = document.getElementById('importClients');
        // appart
        var appartContent = document.getElementsByClassName('appartContent');
        var appartTitle = document.getElementById('appartTitle');

        //detail
        var detailImmeuble = document.getElementById('detailImmeuble');

        // document
        var documentImmeuble = document.getElementById('documentImmeuble');

        // facture
        var factureImmeuble = document.getElementById('factureImmeuble');

        //rdv
        var rdvImmeuble = document.getElementById('rdvImmeuble');

        // rapport
        var rapportImmeuble = document.getElementById('rapportImmeuble');

        // index
        var contentSaisie = document.getElementById('contentSaisie');






        btnApparts.style.backgroundColor = '#023c7b';
        btnApparts.style.color = '#fff'
        if(appartTitle == null){

            importClients.style.display = 'block';
        }else{
            appartTitle.style.display = 'block';
        }

        for (var i = 0; i < appartContent.length; i++) {
            appartContent[i].style.display = 'flex';
        }




        btnApparts.addEventListener('click', function() {
            btnApparts.style.backgroundColor = '#023c7b';
            btnApparts.style.color = '#fff';

            btnDetailImmeuble.style.backgroundColor = '#fff';
            btnDetailImmeuble.style.color = 'black';


            btnRDVImmeuble.style.backgroundColor = '#fff';
            btnRDVImmeuble.style.color = 'black';

            btnDocumentsImmeuble.style.backgroundColor = '#fff';
            btnDocumentsImmeuble.style.color = 'black';

            btnFactureImmeuble.style.backgroundColor = '#fff';
            btnFactureImmeuble.style.color = 'black';

            documentImmeuble.style.display = 'none';
            documentImmeuble.style.backgroundColor = '#fff';

            btnRapport.style.backgroundColor = '#fff';
            btnRapport.style.color = 'black';

            btnIndexApp.style.backgroundColor = '#fff';
            btnIndexApp.style.color = 'black';



            if(appartTitle == null){

                importClients.style.display = 'block';
            }else{
                appartTitle.style.display = 'block';
            }

            for (var i = 0; i < appartContent.length; i++) {
                appartContent[i].style.display = 'flex';
            };

            detailImmeuble.style.display = 'none';
            documentImmeuble.style.display = 'none';
            factureImmeuble.style.display = 'none';
            rdvImmeuble.style.display = 'none';
            rapportImmeuble.style.display = 'none';
            contentSaisie.style.display = 'none';


        });


        btnDetailImmeuble.addEventListener('click', function() {
            btnDetailImmeuble.style.backgroundColor = '#023c7b';
            btnDetailImmeuble.style.color = '#fff';


            btnRDVImmeuble.style.backgroundColor = '#fff';
            btnRDVImmeuble.style.color = 'black';

            btnDocumentsImmeuble.style.backgroundColor = '#fff';
            btnDocumentsImmeuble.style.color = 'black';

            btnApparts.style.backgroundColor = '#fff';
            btnApparts.style.color ='black';

            btnFactureImmeuble.style.backgroundColor = '#fff';
            btnFactureImmeuble.style.color = 'black';

            btnRapport.style.backgroundColor = '#fff';
            btnRapport.style.color = 'black';

            btnIndexApp.style.backgroundColor = '#fff';
            btnIndexApp.style.color = 'black';




            if(appartTitle == null){
                importClients.style.display = 'none';
            }else{
                appartTitle.style.display = 'none';
                for (var i = 0; i < appartContent.length; i++) {
                    appartContent[i].style.display = 'none';
                };
            }

            detailImmeuble.style.display = 'block';
            documentImmeuble.style.display = 'none';
            factureImmeuble.style.display = 'none';
            rdvImmeuble.style.display = 'none';
            rapportImmeuble.style.display = 'none';
            contentSaisie.style.display = 'none';




        });


        btnDocumentsImmeuble.addEventListener('click', function() {
            btnDocumentsImmeuble.style.backgroundColor = '#023c7b';
            btnDocumentsImmeuble.style.color = '#fff';

            btnRDVImmeuble.style.backgroundColor = '#fff';
            btnRDVImmeuble.style.color = 'black';

            btnDetailImmeuble.style.backgroundColor = '#fff';
            btnDetailImmeuble.style.color = 'black';

            btnApparts.style.backgroundColor = '#fff';
            btnApparts.style.color ='black';

            btnFactureImmeuble.style.backgroundColor = '#fff';
            btnFactureImmeuble.style.color = 'black';

            btnRapport.style.backgroundColor = '#fff';
            btnRapport.style.color = 'black';

            btnIndexApp.style.backgroundColor = '#fff';
            btnIndexApp.style.color = 'black';




            if(appartTitle == null){
                importClients.style.display = 'none';
            }else{
                appartTitle.style.display = 'none';
                for (var i = 0; i < appartContent.length; i++) {
                    appartContent[i].style.display = 'none';
                };
            }

            detailImmeuble.style.display = 'none';
            documentImmeuble.style.display = 'block';
            factureImmeuble.style.display = 'none';
            rdvImmeuble.style.display = 'none';
            rapportImmeuble.style.display = 'none';
            contentSaisie.style.display = 'none';


        });

        btnFactureImmeuble.addEventListener('click', function() {
            btnFactureImmeuble.style.backgroundColor = '#023c7b';
            btnFactureImmeuble.style.color = '#fff';

            btnDocumentsImmeuble.style.backgroundColor = '#fff';
            btnDocumentsImmeuble.style.color = 'black';

            btnRDVImmeuble.style.backgroundColor = '#fff';
            btnRDVImmeuble.style.color = 'black';

            btnDetailImmeuble.style.backgroundColor = '#fff';
            btnDetailImmeuble.style.color = 'black';

            btnApparts.style.backgroundColor = '#fff';
            btnApparts.style.color ='black';

            btnRapport.style.backgroundColor = '#fff';
            btnRapport.style.color = 'black';

            btnIndexApp.style.backgroundColor = '#fff';
            btnIndexApp.style.color = 'black';



            if(appartTitle == null){
                importClients.style.display = 'none';
            }else{
                appartTitle.style.display = 'none';
                for (var i = 0; i < appartContent.length; i++) {
                    appartContent[i].style.display = 'none';
                };
            }

            detailImmeuble.style.display = 'none';
            documentImmeuble.style.display = 'none';
            factureImmeuble.style.display = 'block';
            rdvImmeuble.style.display = 'none';
            rapportImmeuble.style.display = 'none';
            contentSaisie.style.display = 'none';

        });

        btnRDVImmeuble.addEventListener('click', function() {
            btnDetailImmeuble.style.backgroundColor = '#fff';
            btnDetailImmeuble.style.color = 'black';

            btnApparts.style.backgroundColor = '#fff';
            btnApparts.style.color ='black';

            btnFactureImmeuble.style.backgroundColor = '#fff';
            btnFactureImmeuble.style.color = 'black';

            btnRDVImmeuble.style.backgroundColor = '#023c7b';
            btnRDVImmeuble.style.color = '#fff';

            btnDocumentsImmeuble.style.backgroundColor = '#fff';
            btnDocumentsImmeuble.style.color = 'black';

            btnRapport.style.backgroundColor = '#fff';
            btnRapport.style.color = 'black';

            btnIndexApp.style.backgroundColor = '#fff';
            btnIndexApp.style.color = 'black';




            if(appartTitle == null){
                importClients.style.display = 'none';
            }else{
                appartTitle.style.display = 'none';
                for (var i = 0; i < appartContent.length; i++) {
                    appartContent[i].style.display = 'none';
                };
            }
            rapportImmeuble.style.display = 'none';
            detailImmeuble.style.display = 'none';
            documentImmeuble.style.display = 'none';
            factureImmeuble.style.display = 'none';
            rdvImmeuble.style.display = 'block';
            contentSaisie.style.display = 'none';



        });

        btnRapport.addEventListener('click', function() {
            btnRapport.style.backgroundColor = '#023c7b';
            btnRapport.style.color = '#fff';

            btnDetailImmeuble.style.backgroundColor = '#fff';
            btnDetailImmeuble.style.color = 'black';

            btnApparts.style.backgroundColor = '#fff';
            btnApparts.style.color ='black';

            btnFactureImmeuble.style.backgroundColor = '#fff';
            btnFactureImmeuble.style.color = 'black';

            btnRDVImmeuble.style.backgroundColor = '#fff';
            btnRDVImmeuble.style.color ='black';

            btnDocumentsImmeuble.style.backgroundColor = '#fff';
            btnDocumentsImmeuble.style.color = 'black';

            btnIndexApp.style.backgroundColor = '#fff';
            btnIndexApp.style.color = 'black';




            if(appartTitle == null){
                importClients.style.display = 'none';
            }else{
                appartTitle.style.display = 'none';
                for (var i = 0; i < appartContent.length; i++) {
                    appartContent[i].style.display = 'none';
                };
            }

            detailImmeuble.style.display = 'none';
            documentImmeuble.style.display = 'none';
            factureImmeuble.style.display = 'none';
            rdvImmeuble.style.display = 'none';
            rapportImmeuble.style.display = 'block';
            contentSaisie.style.display = 'none';



        });
        btnIndexApp.addEventListener('click', function() {

            btnIndexApp.style.backgroundColor = '#023c7b';
            btnIndexApp.style.color = '#fff';

            btnDetailImmeuble.style.backgroundColor = '#fff';
            btnDetailImmeuble.style.color = 'black';

            btnApparts.style.backgroundColor = '#fff';
            btnApparts.style.color ='black';

            btnFactureImmeuble.style.backgroundColor = '#fff';
            btnFactureImmeuble.style.color = 'black';

            btnRDVImmeuble.style.backgroundColor = '#fff';
            btnRDVImmeuble.style.color ='black';

            btnDocumentsImmeuble.style.backgroundColor = '#fff';
            btnDocumentsImmeuble.style.color = 'black';

            btnRapport.style.backgroundColor = '#fff';
            btnRapport.style.color = 'black';



            if(appartTitle == null){
                importClients.style.display = 'none';
            }else{
                appartTitle.style.display = 'none';
                for (var i = 0; i < appartContent.length; i++) {
                    appartContent[i].style.display = 'none';
                };
            }

            detailImmeuble.style.display = 'none';
            documentImmeuble.style.display = 'none';
            factureImmeuble.style.display = 'none';
            rdvImmeuble.style.display = 'none';
            rapportImmeuble.style.display = 'none';
            contentSaisie.style.display = 'block';



        });


    }

});
