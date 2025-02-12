
<div  id="saisieElec" style="display: block" >
    @if($client->Elec)
        <div class="card">
            <div class="row">

                <div class="col-10">
                    <h3 style="margin:1rem 2rem">Saisie Electricité</h3>
                </div>
                <div class="col-12" style="width: 90%; margin: 1rem auto">
                    <div class="row">
                        <div class="col-2">
                            <div class="row">
                                <div class="col-12 row">
                                    <h4 class="head_text" style="color: grey">Date du relevé :</h4>
                                    <div class="col-8">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 row mt-2">
                                    <h4 class="head_text" style="color: grey">Date de création:</h4>
                                    <div class="col-8">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-10">
                            <table class="table">
                                <tr>
                                    <th style="color: grey">Frais divers : </th>
                                    <td><input type="number" class="form-control" value="0.00" name="fraisDivers"></td>
                                    <th style="color: grey">Nombre de frais T.R. : </th>
                                    <td><input type="number" class="form-control" value="5.00" name="fraisTR"></td>
                                    <th style="color: grey">Unité des frais annexes : </th>
                                    <td><input type="number" class="form-control" value="0.00" name="fraisAnnexes"></td>
                                </tr>
                                <tr>
                                    <th style="color: grey">Montant de provision : </th>
                                    <td><input type="number" class="form-control" value="0.00" name="provision"></td>
                                    <th style="color: grey" >Clé de répartition provisions : </th>
                                    <td><input type="number" class="form-control" value="0.00" name="repartPro"></td>
    {{--                                <th style="color: grey" >Nombre de quotités : </th>--}}
    {{--                                <td><input type="number" class="form-control" value="0.00" name="quotites" ></td>--}}
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr/>
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <h4 class="head_text" style="color: grey">RefAppTR : </h4>
                                    <div class="col-12">
                                        {{--                                        <input type="text" class="form-control" name="refAppTR" >--}}
                                        <select class="form-control refAppTR" name="refAppTR" id="refAppCliEau">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <h4 class="head_text" style="color: grey">RefAppCli : </h4>
                                    <div class="col-12">
                                        <select class="form-control refAppCli" name="refAppCli" >

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <h4 class="head_text" style="color: grey">Nombre de compteur: </h4>
                                <div class="col-12">
                                    <input type="number" class="form-control" value="" name="nbCptElec" id="nbCptElec">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="elec">
                        <table class="table" id="tableElec">
                            <thead>
                            <tr>
                                <th scope="col">No.Cpteur</th>
                                <th scope="col">Num. Cpt.</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Situation</th>
                                <th scope="col">Anc. Idx.</th>
                                <th scope="col">Nv. Idx.</th>
                                <th scope="col">Différence</th>
                                {{--                                                <th scope="col">Actif</th>--}}
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Aucune saisie pour les compteurs électriques
        </div>
    @endif
</div>
