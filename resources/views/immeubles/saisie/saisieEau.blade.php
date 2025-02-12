
<div  id="saisieEau" style="display: block" >
    @if($client->cliEaus->count() > 0)
        <div class="card">
            <div class="row">
                <div class="col-10">
                    <h3 style="margin:1rem 2rem">Saisie Eau chaude et froide</h3>
                </div>
                <div class="col-12" style="width: 90%; margin: 1rem auto">
                    <form method="POST" action="{{route('decompte.storeEaux')}}">
                        @csrf
                        <div class="row">
                            @include('immeubles.saisie.saisieHeader')
                            @include('immeubles.saisie.saisieParam')

                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-2">
                                <h3 style="margin:1rem 2rem">Eau froide</h3>
                            </div>
                            <div class="eauFroide col-10">
                                <table class="table" id="tableEauFroide">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Num. Cpt.</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Situation</th>
                                        <th scope="col">Anc. Idx.</th>
                                        <th scope="col">Nv. Idx.</th>
                                        <th scope="col">Différence</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                            <div class="col-2">
                                <h3 style="margin:1rem 2rem">Eau chaude</h3>
                            </div>
                            <div class="eauChaude col-10">
                                <table class="table" id="tableEauChaude">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Num. Cpt.</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Situation</th>
                                        <th scope="col">Anc. Idx.</th>
                                        <th scope="col">Nv. Idx.</th>
                                        <th scope="col">Différence</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Aucune saisie pour les eaux
        </div>
    @endif
</div>

