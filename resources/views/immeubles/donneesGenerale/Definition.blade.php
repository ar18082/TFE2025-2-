<div id="definitionContent">
    <div class="row ">
        <div class="col-12 col-md-12  " style="height: auto;"><h2 class="m-3">Définition</h2> </div>
        <div class="col-6 col-md-6 " style="height: 18rem; ">
            <div class="card">
                <div class="card-header">
                    Coordonnées immeuble
                </div>
                <div class="card-body">
                    <div class="col-6 col-md-6 row ">
                        <div class="col-6 col-md-6">
                            <h5 class="card-title"><span style="color: grey">Code immeuble :</span> {{ '  '.$client->Codecli}} </h5>
                        </div>
                        <div class="col-6 col-md-6">
                            <h5 class="card-title"><span style="color: grey">Référence T.R. :</span>{{ '  '.$client->Codecli}} </h5>
                        </div>
                    </div>

                    <h5 class="card-title"><span style="color: grey">Nom :</span> {{ '  '.$client->nom}} </h5>
                    <h5 class="card-title"><span style="color: grey">Rue : </span>{{$client->rue}} </h5>
                    <div class="col-6 col-md-6 row ">
                        <div class="col-6 col-md-6">
                            <h5 class="card-title"><span style="color: grey">Code Pays :</span> {{$client->codepays}}  </h5>
                        </div>
                        <div class="col-6 col-md-6">
                            <h5 class="card-title"><span style="color: grey">Postal :</span> {{$client->codepost . ' ' . $client->codePostelbs[0]->Localite}} </h5>
                        </div>
                    </div>

                    <h5 class="card-title"><span style="color: grey">Langue Décompte :</span>  {{$client->gerantImms[0]->contacts[0]->codLng ?? 'FR'}} </h5>
                    <h5 class="card-title"><span style="color: grey">Téléphone :</span> {{$client->tel}}  </h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6  " style="height: auto;">
            <div class="card">
                <div class="card-header">
                    Remarque
                </div>
                <div class="card-body">
                    <form>
                        <textarea class="form-control" id="remarque" name="remarque" rows="3">{{$client->remarque}}</textarea>
                        <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
                    </form>
                    <div class="mt-4">
                        <h5 class="card-title"> <span style="color: grey">Nombre d'appartements :</span> {{$client->nbAppartement ?? 0}} </h5>
                        <h5 class="card-title" style="color: grey"> Type d'appareil present : </h5>
                        <h5 class="card-title"> {{$client->clichaufs ? 'Chauffage ' : '' }}  </h5>
                        <h5 class="card-title">
                            @if($client->relEauApps && count($client->relEauApps) > 0)
                                @if($client->relEauApps[0]->NbCptFroid > 0)
                                        Eau froide
                                @endif

                            @endif
                        </h5>
                        <h5 class="card-title">
                            @if($client->relEauApps &&  count($client->relEauApps) > 0)

                                @if($client->relEauApps[0]->NbCptChaud > 0)
                                    Eau chaude
                                @endif
                            @endif
                        </h5>
                        <h5 class="card-title">
                            @if(!$client->decompteUnitaire)
                                Decompte unitaire <span style="color: green"><i class="fa-solid fa-circle-check"></i></span>
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6" style="height: auto; position: relative ;top: -6rem">
            <div class="card">
                <div class="card-header">
                    Gérant
                </div>
                <div class="card-body">
                    <h5 class="card-title"><span style="color: grey">Code gérant :</span> {{$client->gerantImms[0]->codegerant}} </h5>
                    <h5 class="card-title"><span style="color: grey">Nom :</span> {{$client->gerant}} </h5>
                    <h5 class="card-title"><span style="color: grey">Rue : </span>{{$client->rueger}} </h5>
                    <div class="col-6 col-md-6 row ">
                        <div class="col-6 col-md-6">
                            <h5 class="card-title"><span style="color: grey">Code Pays :</span> {{$client->codepaysger}}  </h5>
                        </div>
                        <div class="col-6 col-md-6">
                            <h5 class="card-title"><span style="color: grey">Postal :</span> {{$client->codepostger}}  {{$client->codePostelbs[0]->Localite}}</h5>
                        </div>
                    </div>
                    <h5 class="card-title"><span style="color: grey">Téléphone :</span>  {{$client->telger}}</h5>
                    <h5 class="card-title"><span style="color: grey">Mail principal :</span> {{$client->gerantImms[0]->contacts[0]->email1 ?? ''}} </h5>
                    <h5 class="card-title"><span style="color: grey">Mail secondaire :</span> {{$client->gerantImms[0]->contacts[0]->email2 ?? ''}} </h5>
                </div>
            </div>

        </div>
        <div class="col-6 col-md-6  mt-4" style="height: auto;">
            <div class="card">
                <div class="card-header">
                    Date
                </div>
                <div class="card-body">
                    <h5 class="card-title"><span style="color: grey">Date de début de validité : </span>{{\Carbon\Carbon::parse($client->gerantImms[0]->datdeb)->format('d-m-Y')}} </h5>
                    <h5 class="card-title"><span style="color: grey">Date de fin de validité :</span> {{\Carbon\Carbon::parse($client->gerantImms[0]->datfin)->format('d-m-Y')}} </h5>
                    @php
                        function insertSlash($string) {
                            if (strlen($string) == 4) {
                                return substr($string, 0, 2) . '/' . substr($string, 2);
                            }
                            return $string;
                        }
                    @endphp
                    <h5 class="card-title"><span style="color: grey">Date de relevé : </span>{{ insertSlash($client->dernierreleve) }}</h5>
                </div>
            </div>

        </div>
    </div>

</div>
