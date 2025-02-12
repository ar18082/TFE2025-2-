<div id="detailProvision">
    <div class="container" style="background-color: white; margin: 2rem auto">
        <form>
            <div class="row">
                {{-- encodage appartement --}}
                <div>
                    <input type="checkbox" id="encodageAppartement" name="encodageAppartement">
                    <label for="encodageAppartement">Encodage Appartement</label>
                </div>
                {{-- montant global reparti --}}
                <div>
                    <input type="checkbox" id="montantGlobalReparti" name="montantGlobalReparti">
                    <label for="montantGlobalReparti">Montant Global Reparti</label>
                </div>
                {{-- montant global reparti sur les quotités --}}
                <div>
                    <input type="checkbox" id="montantGlobalRepartiQuotites" name="montantGlobalRepartiQuotites">
                    <label for="montantGlobalRepartiQuotites">Montant Global Reparti sur les Quotités</label>
                </div>
                {{-- montant global reparti sur une autre cle de répartition --}}
                <div>
                    <input type="checkbox" id="montantGlobalRepartiAutreCle" name="montantGlobalRepartiAutreCle">
                    <label for="montantGlobalRepartiAutreCle">Montant Global Reparti sur une Autre Clé de Répartition</label>
                </div>
            </div>
        </form>
    </div>
    <style>
        .table-input {
            width: 100%;
            border: none;
            background-color: transparent;
        }
    </style>

    <form class="mt-4" method="POST" action="{{route('decompte.infoAppart')}}">
        @csrf
        <div class="row">
            <div class="3">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
            <div class="col-12">
                <table class="table table-bordered" id="tableProvision">
                    <thead>
                    <th>RefAppTR</th>
                    <th>RefAppCli</th>
                    <th>Quotité</th>
                    <th>Rad.</th>
                    <th>Cpt Eau Froide</th>
                    <th>Cpt Eau Chaude</th>
                    <th>Gaz</th>
                    <th>Elec</th>
                    <th>Provision</th>

                    </thead>
                    <tbody>
                    @foreach($client->appartements as $key => $appartement)
                        <tr>
                            <td><input type="text" id="{{$key . '_a'}}" readonly class="table-input"  name="{{'refAppTR_'.$key}}" value="{{$appartement->RefAppTR = $key + 1 ? $appartement->RefAppTR : $key + 1 }}">
                                <input type="hidden" name="codeCli" value="{{$appartement->Codecli}}">
                            </td>
                            <td><input type="text" id="{{$key . '_b'}}"  class="table-input" name="{{'refAppCli_'. $key}}" readonly value="{{$appartement->RefAppCli}}"></td>
                            <td><input type="text" id="{{$key . '_c'}}"  class="table-input" name="{{'Quot_'. $key}}" readonly value="{{$client->relChaufApps->isNotEmpty() ? $client->relChaufApps->first()->AppQuot : ''}}"></td>
                            <td><input type="text" id="{{$key . '_d'}}"  class="table-input" name="{{'NbRad_'. $key}}" readonly value="{{$appartement->relChaufApps->isNotEmpty() ? $appartement->relChaufApps->first()->NbRad : ''}}"></td>
                            <td><input type="text" id="{{$key . '_e'}}" class="table-input" name="{{'NbCptFroid_'. $key}}" readonly  value="{{$appartement->relEauApps->isNotEmpty() ? $appartement->relEauApps->first()->NbCptFroid : ''}}" ></td>
                            <td><input type="text" id="{{$key . '_f'}}" class="table-input" name="{{'NbCptChaud_'. $key}}" readonly value="{{$appartement->relEauApps->isNotEmpty() ? $appartement->relEauApps->first()->NbCptChaud  : ''}}" ></td>
                            <td><input type="text" id="{{$key . '_g'}}" class="table-input" name="{{'Gaz_'. $key}}" readonly ></td>
                            <td><input type="text" id="{{$key . '_h'}}" class="table-input" name="{{'Elec_'. $key}}" readonly></td>
                            <td><input type="text" id="{{$key . '_i'}}" class="table-input" name="{{'Provision_'. $key}}"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
