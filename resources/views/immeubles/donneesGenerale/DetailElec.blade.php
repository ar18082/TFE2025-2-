<div id="detailElec">
    @if($client->Elec)
{{--    <form action="{{route('admin.donneeGeneraleUpdate', $client->Codecli)}}" method="POST">--}}
{{--        @csrf--}}
{{--        @php($cliEaus = $client->cliEaus->get(0))--}}
{{--        <div class="row " style="margin: 1rem auto; border: 1px solid white; width: 90%">--}}
{{--            <h2 class="m-4">Données Générale</h2>--}}
{{--            <div class="col-6 row" >--}}
{{--                <div class="col-1" ></div>--}}
{{--                <div class="col-11 row">--}}
{{--                    <div class="mb-3 col-12 row">--}}
{{--                        <label for="TypCpt" class="form-label col-6">Type de compteur : </label>--}}
{{--                        <input type="text"  id="TypCpt" name="TypCpt" class="col-6" value="{{$cliEaus->TypCpt}}" >--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row" style="margin: 1rem auto; border: 1px solid white; width: 90%; padding-bottom: 1rem">--}}
{{--            <h2 class="m-4">Données des relevés</h2>--}}
{{--            <div class="col-6 row mt-2"  >--}}
{{--                <div class="col-1" ></div>--}}
{{--                <div class="col-11 row">--}}
{{--                    <div class="mb-3 col-11">--}}
{{--                        <label for="Unite" class="form-label"><input type="checkbox" name="Unite"> Prix du kW <input type="text" id="PrxKW"  name="PrxKW" style="margin-left: 1rem"> </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-6 row mt-2">--}}
{{--                <div class="col-1" ></div>--}}
{{--                <div class="col-12 row" >--}}
{{--                    <label for="Consom" class="form-label"><input type="checkbox" name="Consom"> Consommation <input type="text"  id="Consom" name="Consom" class="col-4" style="margin-bottom: 1rem" value="{{$cliEaus->Consom}}"> </label>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-6 row mt-4">--}}
{{--                <div class="col-1" ></div>--}}
{{--                <div class="col-6 row" >--}}
{{--                    <label for="FraisAnn" class="form-label col-6">Total des frais annexes : </label>--}}
{{--                    <input type="text"  id="FraisAnn" name="FraisAnn" class="col-6" value="{{$cliEaus->FraisAnn}}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-6"></div>--}}
{{--            <div class="col-6 row mt-4">--}}
{{--                <div class="col-1" ></div>--}}
{{--                <div class="col-11 row" >--}}
{{--                    <label for="UnitAnn" class="form-label col-6">Nombre d'unité pour le calcul des frais annexes : </label>--}}
{{--                    <input type="text"  id="UnitAnn" name="UnitAnn" class="col-6" value="{{$cliEaus->UnitAnn}}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-6"></div>--}}
{{--            <div class="col-6 row mt-4">--}}
{{--                <div class="col-1" ></div>--}}
{{--                <div class="col-11 row" >--}}
{{--                    <label for="libFrAnn" class="form-label col-3" style="margin-right: 0.8rem">Libellé frais annexes : </label>--}}
{{--                    <input type="text"  id="libFrAnn" name="libFrAnn" class="col-8" value="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-6"></div>--}}
{{--            <div class="col-6 row mt-4">--}}
{{--                <div class="col-1" ></div>--}}
{{--                <div class="col-6 row" >--}}
{{--                    <label for="FraisTR" class="form-label col-6">Frais T.R. : </label>--}}
{{--                    <input type="text"  id="FraisTR" name="FraisTR" class="col-6" value="{{$cliEaus->FraisTR}}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 row" style="margin-top: 1rem" >--}}
{{--                <div class="col-1" ></div>--}}
{{--                <div class="col-10" style="border-bottom: 1px solid black"></div>--}}
{{--            </div>--}}

{{--            <div class="col-10 row" style="margin-top: 1rem" >--}}
{{--                <div  class="col-1" style=" margin-left: -3rem"></div>--}}
{{--                <div class="col-4 row">--}}
{{--                    <label for="nbrKW" class="form-label col-6">Nombre de kW : </label>--}}
{{--                    <input type="text"  id="nbrKW" name="nbrKW" class="col-6" style="height: 2rem">--}}
{{--                </div>--}}
{{--                <div class="col-4 row">--}}
{{--                    <label for="prxTotKW" class="form-label col-6">Prix du kW : </label>--}}
{{--                    <input type="text"  id="prxTotKW" name="prxTotKW" class="col-6" style="height: 2rem">--}}
{{--                </div>--}}
{{--                <div class="col-4 row">--}}
{{--                    <div class="col-12 row">--}}
{{--                        <label for="TotFraisTR" class="form-label col-6">Total frais T.R. </label>--}}
{{--                        <input type="text"  id="TotFraisTR" name="TotFraisTR" class="col-6">--}}
{{--                    </div>--}}
{{--                    <div class="col-12 row">--}}
{{--                        <label for="TotFraisDiv" class="form-label col-6">Total frais divers  </label>--}}
{{--                        <input type="text"  id="TotFraisDiv" name="TotFraisDiv" class="col-6">--}}
{{--                    </div>--}}
{{--                    <div class="col-12 row" style="margin: 1rem 0">--}}
{{--                        <div class="col-12" style="border-bottom: 1px solid black; margin-left: 10.5rem; width: 60%"></div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12 row">--}}

{{--                        <label for="TotFrais" class="form-label col-6">Total frais </label>--}}
{{--                        <input type="text"  id="TotFrais" name="TotFrais" class="col-6">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <input type="hidden" name="donneeGenerale" value="elec">--}}
{{--        <button type="button" class="btn btn-primary edit" id="edit" style="margin: 1rem 0 1rem 1rem">Modifier</button>--}}
{{--        <button type="submit" class="btn btn-primary btnSubmitFormDetail" id="btnSubmitFormDetail" style="display: none">Enregistrer</button>--}}
{{--    </form>--}}
    @else
        <div class="alert alert-danger" role="alert">
            Aucune donnée générale pour l'électricité
        </div>
    @endif

</div>
