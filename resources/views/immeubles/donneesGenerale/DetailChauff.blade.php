<div id="detailChauff" style="border: 1px solid white">
    @if($client->clichaufs->count() > 0)
        <form action="{{route('admin.donneeGeneraleUpdate', $client->Codecli)}}" method="POST">
            @csrf
            @php($clichauf = $client->clichaufs->get(0))
            <div class="row " style="margin-left: 1rem">
                <h2 class="m-4">Données Générale</h2>
                <div class="col-6 row" >
                    <div class="col-1" ></div>
                    <div class="form-check col-3" >
                        <input class="form-check-input inputDetail" type="radio" name="pourcentage" id="pourcentage">
                        <label class="form-check-label" for="pourcentage">
                            Sur pourcentage
                        </label>
                    </div>

                    <div class="col-6 row">
                        <div class="mb-3 col-12 row">
                            <label for="PctPrive" class="form-label col-6">Pourcentage Privé : </label>
                            <input type="text"  id="PctPrive" name="PctPrive" class="col-6 inputDetail" value="{{$clichauf->PctPrive?? ''}}" >
                        </div>
                        <div class="mb-3 col-12 row">
                            <label for="PctCom" class="form-label col-6">Pourcentage Commun : </label>
                            <input type="text"  id="PctCom" name="PctCom" class="col-6 inputDetail" value="{{$clichauf->PctCom ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="col-6 row">
                    <div class="col-1" ></div>
                    <div class="form-check col-3" >
                        <input class="form-check-input inputDetail" type="radio" name="montant" id="montant">
                        <label class="form-check-label" for="montant">
                            Sur montant
                        </label>
                    </div>
                    <div class="col-6 row">
                        <div class="mb-3 col-12 row">
                            <label for="consommationPrive" class="form-label col-6">Montant privé : </label>
                            <input type="text"  id="consommationPrive" name="consommationPrive" class="col-6 inputDetail" value="{{$clichauf->ConsPrive ?? number_format(($clichauf->Consom / 100) *  $clichauf->PctPrive, 2)}}">
                        </div>
                        <div class="mb-3 col-12 row">
                            <label for="consommationCommun" class="form-label col-6">Montant commun : </label>
                            <input type="text"  id="consommationCommun" name="consommationCommun" class="col-6 inputDetail" value="{{$clichauf->ConsCom ?? number_format( ($clichauf->Consom /100) * $clichauf->PctCom,2)}}">
                        </div>
                    </div>
                </div>
                <div class="col-6 row mt-4">
                    <div class="col-1" ></div>

                </div>
                <div class="col-12 row mt-4">
                    <div class="col-4 row">
                        <label for="quotite" class="form-label col-4">Quotité : </label>
                        <input type="text"  id="quotite" name="quotite" class="col-6 inputDetail" value="{{$clichauf->Quotite != null ? $clichauf->Quotite : '0' }}">
                    </div>
                    <div class="col-4 row">
                        <label for="typeCalo" class="form-label col-4">Type de Calorimètres : </label>
                        <select id="typeCalo" name="typeCalo" class="col-6 inputDetail" >
                            <option value="RFC EV" {{$clichauf->TypCal == "RFC EV" ? 'selected' : ''}}>RFC EV</option>
                            <option value="ELECT" {{$clichauf->TypCal == "ELECT" ? 'selected' : ''}}>ELECT</option>
                            <option value="CPT INT" {{$clichauf->TypCal == "CPT INT" ? 'selected' : ''}}>CPT INT</option>
                            <option value="CALO" {{$clichauf->TypCal == "CALO" ? 'selected' : ''}}>CALO</option>
                        </select>
{{--                                            <input type="text"  id="typeCalo" name="typeCalo" class="col-6 inputDetail" value="{{$clichauf->TypCal}}">--}}
                    </div>
                    <div class="col-4 row mt-2">
                        <label for="TypRlv" class="form-label col-4">Type de relevé : </label>
                        <select id="TypRlv" name="TypRlv" class="col-6 inputDetail" >
                            <option value="VISU" {{$clichauf->TypRlv == "VISU" ? 'selected' : ''}}>VISU</option>
                            <option value="GPRS" {{$clichauf->TypRlv == "GPRS" ? 'selected' : ''}}>GPRS</option>
                            <option value="RADIO" {{$clichauf->TypRlv == "RADIO" ? 'selected' : ''}}>RADIO</option>
                        </select>
{{--                                            <input type="text"  id="TypRlv" name="TypRlv" class="col-6 inputDetail" value="{{$clichauf->TypRlv}}">--}}
                    </div>

                </div>
            </div>
            <div class="row " style="margin-left: 1rem">
                <h2 class="m-4">Données des relevés</h2>
                <div class="col-6 row mt-4">
                    <div class="col-1" ></div>
                    <div class="col-6 row" >
                        <label for="Consom" class="form-label col-6">Consommation : </label>
                        <input type="text"  id="Consom" name="Consom" class="col-6 inputDetail" value="{{$clichauf->Consom}}">
                    </div>
                </div>
                <div class="col-6"></div>
                <div class="col-12 row mt-4">
                    <div class="col-4 row" style="margin-left: 3.8rem">
                        <label for="FraisAnn" class="form-label col-4 " style="margin-right: 1.2rem">Total des frais annexes : </label>
                        <input type="text"  id="FraisAnn" name="FraisAnn" class="col-6 inputDetail" value="{{$clichauf->FraisAnn}}">
                    </div>
                    <div class="col-1" ></div>
                    <div class="col-5 row">
                        <label for="UniteAnn" class="form-label col-6">Nombre d'unités pour le calcul des frais annexes : </label>
                        <input type="text"  id="UniteAnn" name="UniteAnn" class="col-6 inputDetail" value="{{$clichauf->UniteAnn}}">
                    </div>
                    <div class="col-3" ></div>
                </div>
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
                        <input type="text"  id="FraisTR" name="FraisTR" class="col-6 inputDetail" value="{{number_format($clichauf->FraisTR,4)}}">
                    </div>
                </div>
            </div>
            <input type="hidden" name="donneeGenerale" value="chauff">
            <button type="button" class="btn btn-primary edit" id="edit" style="margin: 1rem 0 1rem 1rem">Modifier</button>
            <button type="submit" class="btn btn-primary btnSubmitFormDetail" id="btnSubmitFormDetail" style="display: none">Enregistrer</button>
        </form>

        <script>

            var checkboxPourcentage = document.getElementById('pourcentage');
            var checkboxMontant = document.getElementById('montant');
            var inputPctPrive = document.getElementById('PctPrive');
            var inputPctCom = document.getElementById('PctCom');
            var inputConsommationPrive = document.getElementById('consommationPrive');
            var inputConsommationCommun = document.getElementById('consommationCommun');
            var inputConsommation = document.getElementById('Consom');



            checkboxPourcentage.addEventListener('change', function() {
                if (checkboxPourcentage.checked) {
                    inputConsommationPrive.disabled = true;
                    inputConsommationCommun.disabled = true;
                    inputPctPrive.disabled = false;
                    inputPctCom.disabled = false;

                    if(checkboxMontant.checked){
                        checkboxMontant.checked = false;
                        inputConsommationPrive.disabled = true;
                        inputConsommationCommun.disabled = true;
                    }

                    inputPctPrive.addEventListener('change', function() {
                        inputPctCom.value = 100 - inputPctPrive.value;
                        inputConsommationCommun.value = (inputConsommation.value / 100) * inputPctCom.value;
                        inputConsommationPrive.value = (inputConsommation.value / 100) * inputPctPrive.value;
                    });

                    inputPctCom.addEventListener('change', function() {
                        inputPctPrive.value = 100 - inputPctCom.value;
                        inputConsommationCommun.value = (inputConsommation.value / 100) * inputPctCom.value;
                        inputConsommationPrive.value = (inputConsommation.value / 100) * inputPctPrive.value;
                    });
                }


            });

            checkboxMontant.addEventListener('change', function() {
                if (checkboxMontant.checked) {
                    inputPctPrive.disabled = true;
                    inputPctCom.disabled = true;
                    inputConsommationPrive.disabled = false;
                    inputConsommationCommun.disabled = false;

                    if(checkboxPourcentage.checked){
                        checkboxPourcentage.checked = false;
                        inputPctPrive.disabled = true;
                        inputPctCom.disabled = true;

                    }

                    inputConsommationPrive.addEventListener('change', function() {
                        inputConsommationCommun.value = inputConsommation.value - inputConsommationPrive.value;
                        inputPctPrive.value = Math.round((inputConsommationPrive.value / inputConsommation.value) * 100);
                        inputPctCom.value = 100 - inputPctPrive.value;
                    });

                    inputConsommationCommun.addEventListener('change', function() {
                        inputConsommationPrive.value = inputConsommation.value - inputConsommationCommun.value;
                        inputPctCom.value = Math.round((inputConsommationCommun.value / inputConsommation.value) * 100);
                        inputPctPrive.value = 100 - inputPctCom.value;
                    });
                }
            });
        </script>
    @else
        <div class="alert alert-danger" role="alert">
            Aucune donnée générale pour le chauffage
        </div>
    @endif


</div>

