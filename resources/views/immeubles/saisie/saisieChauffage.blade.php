
<div  id="saisieChauffage" style="display: block" >
    @if($client->clichaufs->count() > 0)
        <div class="card">
            <div class="row">
                <div class="col-10">
                    <h3 style="margin:1rem 2rem">Saisie Chauffage</h3>
                </div>
                <div class="col-12" style="width: 90%; margin: 1rem auto">
                    <form method="POST" action="{{route('decompte.storeChauff')}}">
                        @csrf
                        <div class="row">
                            @include('immeubles.saisie.saisieHeader')
                            @include('immeubles.saisie.saisieParam')


                            <div class="chauff col-12" >
                                <table class="table"  id="tableChauff">
                                    <thead>
                                    <tr>
                                        <th scope="col">Rad.</th>
                                        <th scope="col">No. Cal</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Situation</th>
                                        <th scope="col">Coef.</th>
                                        <th scope="col">Anc. Idx.</th>
                                        <th scope="col">Nv. Idx.</th>
                                        <th scope="col">Différence</th>
                                        <th scope="col">Actif</th>
                                    </tr>
                                    </thead>
                                    <tbody >

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Aucune saisie pour le chauffage
        </div>
    @endif
</div>

