<div class="col-12" style="margin: 0 0 1rem 0">
    <div class="row">
        <div class="col-4">
            <label for="fraisDiv" style="color: grey; margin-right: 0; padding-right: 0">Frais divers : </label>
            <input type="number" class="form-control" value="" name="fraisDiv" id="fraisDiv">
        </div>
        <div class="col-4">
            <label for="nbFraisTR" style="color: grey">Nombre de frais T.R. : </label>
            <input type="number" class="form-control" value="" name="nbFraisTR" id="nbFraisTR">
        </div>
        <div class="col-4">
            <label for="pctFraisAnn" style="color: grey">Unité des frais annexes : </label>
            <input type="number" class="form-control" value="" name="pctFraisAnn" id="pctFraisAnn">
        </div>
        <div class="col-4">
            <label for="provision" style="color: grey">Montant de provision : </label>
            <input type="number" class="form-control" value="" name="provision" id="provision">
        </div>
        <div class="col-4">
            <label for="repartProv" style="color: grey" >Clé de répartition provisions : </label>
            <input type="number" class="form-control" value="0.00" name="repartProv">

        </div>
        <div class="col-4 paramChauff">
            <label for="appQuot" style="color: grey" >Nombre de quotités : </label>
            <input type="number" class="form-control" value="" name="appQuot" id="appQuot">
        </div>
        <div class="col-12  paramChauff">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <lavel  for="nbRad" style="color: grey">Nombre de radiateurs : </lavel>
                    <input type="number" class="form-control" value="" name="nbRad" id="nbRad" >
                </div>
                <div class="col-4"></div>
            </div>

        </div>
        <div class="col-12 " id="paramEau">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4">
                    <label for="nbCptEauFroid" style="color: grey">Nombre de compteur eau froide : </label>
                    <input type="number" class="form-control" value="" name="nbCptEauFroid" id="nbCptEauFroid">
                </div>
                <div class="col-4">
                    <label for="nbCptEauChaud" style="color: grey" >Nombre de compteur eau chaude : </label>
                    <input type="number" class="form-control" value="" name="nbCptEauChaud" id="nbCptEauChaud">
                </div>
                <div class="col-2"></div>
            </div>

        </div>

    </div>
</div>
<hr/>

<script>
    const paramChauff = document.querySelectorAll('.paramChauff');
    const paramEau = document.getElementById('paramEau');
    var test = 1;

    if(test === 0){
        paramChauff.forEach(function (el) {
            el.style.display = 'none';
        });
        paramEau.style.display = 'block';
    }else{
        paramChauff.forEach(function (el) {
            el.style.display = 'block';
        });
        paramEau.style.display = 'none';
    }

</script>

