<div id="infoAppart">
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
                <table class="table table-bordered" id="tableInfoApp">
                    <thead>
                        <th>RefAppTR</th>
                        <th>RefAppCli</th>
                        <th>Propriétaire</th>
                        <th>Locataire</th>
                        <th>Quotité</th>
                        <th>Rad.</th>
                        <th>Cpt Eau Froide</th>
                        <th>Cpt Eau Chaude</th>
                        <th>Gaz</th>
                        <th>Elec</th>

                    </thead>
                    <tbody>
                        @foreach($client->appartements as $key => $appartement)
                            <tr>
                                <td><input type="text" id="{{$key . '_a'}}"  class="table-input"  name="{{'refAppTR_'.$key}}" value="{{$appartement->RefAppTR = $key + 1 ? $appartement->RefAppTR : $key + 1 }}">
                                    <input type="hidden" name="codeCli" value="{{$appartement->Codecli}}">
                                </td>
                                <td><input type="text" id="{{$key . '_b'}}"  class="table-input" name="{{'refAppCli_'. $key}}" value="{{$appartement->RefAppCli}}"></td>
                                <td><input type="text" id="{{$key . '_c'}}"  class="table-input" name="{{'prop_'. $key}}" value="{{$client->gerant}}"></td>
                                <td><input type="text" id="{{$key . '_d'}}"  class="table-input" name="{{'loc_'. $key}}" value="{{ $appartement->relApps->isNotEmpty() ? $appartement->relApps->first()->LocatCd : '' }}"></td>
                                <td><input type="text" id="{{$key . '_e'}}"  class="table-input" name="{{'Quot_'. $key}}" value="{{$client->relChaufApps->isNotEmpty() ? $client->relChaufApps->first()->AppQuot : ''}}"></td>
                                <td><input type="text" id="{{$key . '_f'}}"  class="table-input" name="{{'NbRad_'. $key}}" value="{{$appartement->relChaufApps->isNotEmpty() ? $appartement->relChaufApps->first()->NbRad : ''}}"></td>
                                <td><input type="text" id="{{$key . '_g'}}" class="table-input" name="{{'NbCptFroid_'. $key}}"  value="{{$appartement->relEauApps->isNotEmpty() ? $appartement->relEauApps->first()->NbCptFroid : ''}}" ></td>
                                <td><input type="text" id="{{$key . '_h'}}" class="table-input" name="{{'NbCptChaud_'. $key}}"  value="{{$appartement->relEauApps->isNotEmpty() ? $appartement->relEauApps->first()->NbCptChaud  : ''}}" ></td>
                                <td><input type="text" id="{{$key . '_i'}}" class="table-input" name="{{'Gaz_'. $key}}" ></td>
                                <td><input type="text" id="{{$key . '_j'}}" class="table-input" name="{{'Elec_'. $key}}"></td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>

<script>
    document.querySelectorAll('.table-input').forEach(input => {
        input.addEventListener('keydown', function(event) {
            let idParts = event.target.id.split('_');
            let row = parseInt(idParts[0]);
            let col = idParts[1].charCodeAt(0);

            if (event.keyCode === 38) { // Up arrow
                row = row > 0 ? row - 1 : 0;
            } else if (event.keyCode === 40) { // Down arrow
                row = row < document.querySelectorAll('#tableInfoApp tr').length - 2 ? row + 1 : row;
            } else if (event.keyCode === 37) { // Left arrow
                col = col > 97 ? col - 1 : col;
            }else if ( event.keyCode === 39) { // Right arrow
                col = col < 106 ? col + 1 : col;
            }

            document.getElementById(`${row}_${String.fromCharCode(col)}`).focus();
        });
    });
</script>
