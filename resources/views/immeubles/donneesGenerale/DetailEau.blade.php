<div  id="detailEau">
    @php($cliEaus = $client->cliEaus->get(0))
    @if($cliEaus)
        @if($client->cliEaus->count() > 0)
            <form action="{{route('admin.donneeGeneraleUpdate', $client->Codecli)}}" method="POST">
                @csrf


                <div class="row " style="margin: 1rem auto; border: 1px solid white; width: 90%">
                    <h2 class="m-4">Données Générale</h2>
                    <div class="col-6 row" >
                        <div class="col-1" ></div>
                        <div class="col-11 row">
                            <div class="mb-3 col-12 row">
                                <label for="TypCpt" class="form-label col-6">Type de compteur : </label>
                                <select id="TypCpt" name="TypCpt" class="col-6 inputDetail" >
                                    <option value="CPT EAU FR" {{$cliEaus->TypCpt == "CPT EAU FR" ? 'selected' : ''}}>CPT EAU FR</option>
                                    <option value="CPT" {{$cliEaus->TypCpt == "CPT" ? 'selected' : ''}}>CPT</option>
                                    <option value="CPT EAU CH" {{$cliEaus->TypCpt == "CPT EAU CH" ? 'selected' : ''}}>CPT EAU CH</option>
                                    <option value="CPT DIGI F" {{$cliEaus->TypCpt == "CPT DIGI F" ? 'selected' : ''}}>CPT DIGI F</option>
                                    <option value="CPT DIGI C" {{$cliEaus->TypCpt == "CPT DIGI C" ? 'selected' : ''}}>CPT DIGI C</option>
                                    <option value="CPT DIGI" {{$cliEaus->TypCpt == "CPT DIGI" ? 'selected' : ''}}>CPT DIGI</option>
                                    <option value="CPT EAU" {{$cliEaus->TypCpt == "CPT EAU" ? 'selected' : ''}}>CPT EAU</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-6 row mt-2"  >
                        <div class="col-1" ></div>
                        <div class="col-11 row">
                            <div class="mb-3 col-12 row">
                                <label for="Unite" class="form-label col-6">Unité de mesure : </label>
                                <label for="Unite" class="form-label col-3"> <input type="checkbox" class="inputDetail" id="checkboxM"  name="Unite"{{$cliEaus->Unite > 0 ? 'checked' : '' }}> m³ </label>
                                <label for="Unite" class="form-label col-3"> <input type="checkbox" class="inputDetail" id="checkboxHL" name="Unite" {{$cliEaus->Unite == 0 ? 'checked' : '' }}> h/l </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 row ">
                        <div class="col-1" ></div>
                        <div class="col-6 row">
                            <label for="TypRlv" class="form-label col-4">Type de relevé : </label>
                            <select id="TypRlv" name="TypRlv" class="col-8 inputDetail" >
                                <option value="VISU" {{$cliEaus->TypRlv == "VISU" ? 'selected' : ''}}>VISU</option>
                                <option value="GPRS" {{$cliEaus->TypRlv == "GPRS" ? 'selected' : ''}}>GPRS</option>
                                <option value="RADIO" {{$cliEaus->TypRlv == "RADIO" ? 'selected' : ''}}>RADIO</option>
                            </select>
                            {{--                    <input type="text"  id="TypRlv" name="TypRlv" class="col-6 inputDetail" value="{{$clichauf->TypRlv}}">--}}
                        </div>
                    </div>
                </div>
                <div class="row" style="margin: 1rem auto; border: 1px solid white; width: 90%; padding-bottom: 1rem">
                    <h2 class="m-4">Données des relevés</h2>
                    <div class="col-6 row mt-2"  >
                        <div class="col-1" ></div>
                        <div class="col-11 row">
                            <div class="mb-3 col-11">
                                <label for="Unite" class="form-label">
                                    <input type="checkbox" class="inputDetail" name="Unite" id="checkboxUnite">
                                    Prix du h/l d'eau froide
                                    <input type="text" id="inputPrxFroid" class="inputDetail" name="PrxFroid" style="margin-left: 1rem">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 row mt-2">
                        <div class="col-1" ></div>
                        <div class="col-12 row" >
                            <label for="Consom" class="form-label">
                                <input type="checkbox" class="inputDetail"  id="checkboxConso">
                                Consommation
                                <input type="text"  id="inputConsom" name="Consom" class="col-4 inputDetail" style="margin-bottom: 1rem" value="{{$cliEaus->Consom}}">
                            </label>

                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-8 row mt-4">
                        <div class="col-6 row" style="margin-left: 3.8rem">
                            <label for="ChaudChf" class="form-label col-4 " style="margin-right: 1.2rem">Chauffage de l'eau : </label>
                            <input type="text"  id="ChaudChf" name="ChaudChf" class="col-6 inputDetail" value="{{$cliEaus->ChaudChf}}">
                        </div>
                        <div class="col-5 row">
                            <label for="Unite" class="form-label"><input type="checkbox" name="Unite inputDetail"> Retirer le chauffage eau chaude du chauffage</label>
                        </div>

                    </div>
                    <div class="col-4 row mt-4">
                        <div class="col-1" ></div>
                        <div class="col-11 row" >
                            <label for="typcalc" class="form-label col-3" style="margin-right: 0.8rem">Type de calcul:  </label>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input inputDetail" type="checkbox" value="PU" id="typcalcPU" name="typcalc" {{$cliEaus->typcalc == 'PU' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="PU">
                                       Eau chaude + eau froide
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input inputDetail" type="checkbox" value="MT" id="typcalcMT" name="typcalc" {{$cliEaus->typcalc == 'MT' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="MT">
                                        Total Eau + chauffage de l'eau
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input type="checkbox" id="typcalcEauSol" class="inputDetail" name="EauSol" {{$cliEaus->EauSol > 0 ? 'checked' : ''}}>
                                    <label for="EauSol" class="form-label">Eau solidaire : </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8  mt-4" style="border: 1px solid white; padding: 1rem;" id="contentEauSol">
                        <div class="row">
                            <div class="col-12 row">
                                <div class="form-check col-4">
                                    <label for="eauSolidairelibelle" class="form-label">Libellé : </label>
                                    <input type="text"  id="eauSolidairelibelle" name="eauSolidairelibelle" class="inputDetail" value="">
                                </div>
                                <div class="form-check col-4">
                                    <label for="eauSolidairenbHecto" class="form-label ">Jusqu'à  : </label>
                                    <input type="text"  id="eauSolidairenbHecto" name="eauSolidairenbHecto" class="inputDetail " value="">
                                </div>
                                <div class="form-check col-4">
                                    <label for="eauSolidaireprix" class="form-label ">Prix : </label>
                                    <input type="text"  id="eauSolidaireprix" name="eauSolidaireprix" value="" class="inputDetail">
                                </div>
                            </div>
                            <div class="col-12 row" style="margin:0 2rem;">
                                <button type="button" class="btn btn-secondary col-12" style="width: 4rem; height: 3rem; margin-right: 1rem" id="submitEauSolidaire">+</button>
                                <button type="button" class="btn btn-secondary col-12" style="width: 4rem; height: 3rem" id="removeEauSolidaire">-</button>
                            </div>
                            <div class="col-12">
                                <table class="table table-bordered" id="tableEauSolidaire">
                                    <thead>
                                    <tr>
                                        <th>Libellé</th>
                                        <th>Jusqu'à  </th>
                                        <th>Prix</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 row mt-4">
                        <div class="col-1" ></div>
                        <div class="col-6 row" >
                            <label for="FraisAnn" class="form-label col-6">Total des frais annexes : </label>
                            <input type="text"  id="FraisAnn" name="FraisAnn" class="col-6 inputDetail" value="{{$cliEaus->FraisAnn}}">
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-6 row mt-4">
                        <div class="col-1" ></div>
                        <div class="col-11 row" >
                            <label for="UnitAnn" class="form-label col-6">Nombre d'unité pour le calcul des frais annexes : </label>
                            <input type="text"  id="UnitAnn" name="UnitAnn" class="col-6 inputDetail" value="{{$cliEaus->UnitAnn}}">
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-6 row mt-4">
                        <div class="col-1" ></div>
                        <div class="col-11 row" >
                            <label for="libFrAnn" class="form-label col-3" style="margin-right: 0.8rem">Libellé frais annexes : </label>
                            <input type="text"  id="libFrAnn" name="libFrAnn" class="col-8 inputDetail" value="">
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-6 row mt-4">
                        <div class="col-1" ></div>
                        <div class="col-6 row" >
                            <label for="FraisTR" class="form-label col-6">Frais T.R. : </label>
                            <input type="text"  id="FraisTR" name="FraisTR" class="col-6 inputDetail" value="{{$cliEaus->FraisTR}}">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="donneeGenerale" value="eau">
                <button type="button" class="btn btn-primary edit" id="edit" style="margin: 1rem 0 1rem 1rem">Modifier</button>
                <button type="submit" class="btn btn-primary btnSubmitFormDetail" id="btnSubmitFormDetail" style="display: none">Enregistrer</button>
            </form>
        @else
            <div class="alert alert-danger" role="alert">
                Aucune donnée générale pour les eaux
            </div>
        @endif
    @endif
</div>
<script>
    var checkboxM = document.getElementById('checkboxM');
    var checkboxHL = document.getElementById('checkboxHL');
    var typcalcPU = document.getElementById('typcalcPU');
    var typcalcMT = document.getElementById('typcalcMT');
    var typcalcEauSol = document.getElementById('typcalcEauSol');
    var checkboxUnite = document.getElementById('checkboxUnite');
    var checkboxConso = document.getElementById('checkboxConso');
    var inputPrxFroid = document.getElementById('inputPrxFroid');
    var inputConsom = document.getElementById('inputConsom');



    checkboxUnite.addEventListener('change', function() {
        if (checkboxUnite.checked) {
            checkboxConso.checked = false;
            inputPrxFroid.disabled = false;
            inputConsom.disabled = true;
        } else {
            inputPrxFroid.disabled = true;
            inputConsom.disabled = false;
        }
    });

    checkboxConso.addEventListener('change', function() {
        if (checkboxConso.checked) {
            checkboxUnite.checked = false;
            inputConsom.disabled = false;
            inputPrxFroid.disabled = true;
        } else {
            inputConsom.disabled = true;
            inputPrxFroid.disabled = false;
        }
    });

    typcalcPU.addEventListener('change', function() {
        if (typcalcPU.checked) {
            typcalcMT.checked = false;
            typcalcEauSol.checked = false;


        }
    });
    typcalcMT.addEventListener('change', function() {
        if (typcalcMT.checked) {
            typcalcPU.checked = false;
            typcalcEauSol.checked = false;

        }
    });

    typcalcEauSol.addEventListener('change', function() {
        if (typcalcEauSol.checked) {
            typcalcPU.checked = false;
            typcalcMT.checked = false;

        }else{

        }
    });
    checkboxM.addEventListener('change', function() {
        if (checkboxM.checked) {
            checkboxHL.checked = false;
        }
    });
    checkboxHL.addEventListener('change', function() {
        if (checkboxHL.checked) {
            checkboxM.checked = false;
        }
    });

</script>

