@extends('base')

@section('title', 'Immeubles - ' . str_pad($client->Codecli, 5, '0', STR_PAD_LEFT) . ' - ' . $client->nom)

@section('content')

    {{-- modifier la condition un if $user->role == admin --}}
    @if(Auth::check() && Auth::user()->role === 'admin')
        @include("shared.admin_header_immeuble")
    @else
        @include("shared.header_immeuble")
    @endif
    @if($appartements->isEmpty())
        <div id="importClients">
            <h2>Import Clients</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form id="importForm" action="{{ route('documents.clients.import') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-8 row">
                    <div class="form-group mb-3">
                        <label for="file">Choisir fichier Excel </label>
                        <input type="file" class="form-control" id="file" name="file" required>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" id="submit_Import" class="btn btn-primary m-4">Importer</button>
                        <a href="{{route('documents.downloadExcelFormCreateApps', $client->id)}}"
                           class="btn btn-primary m-4">Exporter fichier vierge</a>

                    </div>
                </div>
            </form>
            <form id="form_storeApp" action="{{ route('storeAppartement') }}" method="POST"
                  style="display: {{ session('success') ? 'block' : 'none' }};">
                @csrf
                <div class="col-8 row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nbr_Appartement">Nombre d'appartements</label>
                            <input type="text" class="form-control" id="nbr_Appartement" name="nbr_Appartement"
                                   value="{{ session('result')['nbr_app'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nbr_Quot">Nbr Quotités</label>
                            <input type="text" class="form-control" id="nbr_Quot" name="nbr_Quot"
                                   placeholder="Nbr Quotités">
                        </div>
                        <div class="form-group">
                            <label for="NomProp">Nom propriétaire</label>
                            <input type="text" class="form-control" id="NomProp" name="NomProp"
                                   placeholder="Nom Propriétaire">
                        </div>
                        <div class="form-group">
                            <label for="NomLoc">Nom locataire</label>
                            <input type="text" class="form-control" id="NomLoc" name="NomLoc"
                                   placeholder="Nom locataire">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nbr_radiateur">Nbr Radiateur</label>
                            <input type="text" class="form-control" id="nbr_radiateur" name="nbr_radiateur"
                                   value="{{session('result')['nbr_calorimetre']?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="nbr_ComptEC">Nbr Compteur EC</label>
                            <input type="text" class="form-control" id="nbr_ComptEC" name="nbr_ComptEC"
                                   value="{{session('result')['nbr_compt_eau_c']?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="nbr_ComptEF">Nbr Compteur EF</label>
                            <input type="text" class="form-control" id="nbr_ComptEF" name="nbr_ComptEF"
                                   value="{{session('result')['nbr_compt_eau_f']?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="nbr_Int">Nbr d'intégrateur</label>
                            <input type="text" class="form-control" id="nbr_Int" name="nbr_Int"
                                   placeholder="Nbr d'intégrateur">
                        </div>
                    </div>

                    <div class="col-12 text-end mb-4">
                        <input type="hidden" name="Codecli" value="{{session('result')->codecli ?? ''}}">
                        <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>

    @else
        <div id="appartTitle">
            <div class="bg-primary rounded-1 row mx-1 mx-md-5 mb-2 text-light d-none d-md-flex ">
                <div class="col-lg-2 col-md-2 fw-bold py-2">
                    Code appartement
                </div>
                <div class="col-lg-2 col-md-2 fw-bold py-2">
                    Propriétaire
                </div>
                <div class="col-lg-2 col-md-2 fw-bold py-2">
                    Occupant actuel
                </div>
                <div class="col-lg-2 col-md-2 fw-bold py-2">
                    Compteur
                </div>
                <div class="col-lg-4  col-md-4 fw-bold py-2">

                </div>

            </div>
        </div>

    @endif

    @php
        $bg_card_index = 0;
    @endphp
    @foreach($appartements as $appartement)
        @php
            $bg_card_index++;
            if ($bg_card_index % 2 == 0) {
                $bg_card = 'bg-white';
            } else {
                $bg_card = 'bg-light';
            }
            $relApp = $relApps->where('RefAppTR', $appartement->RefAppTR)->last();

        @endphp

        @include('immeubles.modalImmeubles')
        @include('immeubles.modalImages', ['numSerie' => false, 'value' => ''])
        @include('immeubles.AppartImmeubles')
    @endforeach

    @include('immeubles.detailImmeubles')
    @include('documents.documentsImmeubles.listeDocClient')
    @include('immeubles.facturesImmeuble')
    @include('calendar.event.eventImmeuble')
    @include('immeubles.rapportImmeuble')
    @include('immeubles.addIndexImmeuble')




    {{ $appartements->links() }}




    <script>
        function submitForm(id) {
            document.getElementById('absentForm_' + id).submit();
            console.log('absentForm_' + id);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>

        // Wait for the DOM to be fully loaded before initializing the chart
        document.addEventListener('DOMContentLoaded', function() {

            var btnChartSimple = document.getElementById('btnChartSimple');
            var btnChartLine = document.getElementById('btnChartLine');
            var btnChartPie = document.getElementById('btnChartPie');
            // var clichaufsConsom = document.getElementById('clichaufs-Consom');
            // console.log(clichaufsConsom);
            // if(clichaufsConsom){
            //     clichaufsConsom.value;
            // }else{
            //     clichaufsConsom = 0;
            // }
            //
            // if(cliEausConsom.value !== null ? cliEausConsom.value: 0);
            // var cliEausConsom = document.getElementById('cliEaus-Consom').value;
            var cliGaz = 0;
            var cliElectricite = 0;



            let chartType = 'bar';
            let chartInstance = null;

            const colors = [

                'rgba(54, 162, 235, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 206, 86, 0.2)',

            ];

            const borderColors = [

                'rgba(54, 162, 235, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 206, 86, 0.2)',
            ];

            function updateChart(type) {
                chartType = type;
                const ctx = document.getElementById('detailChart').getContext('2d');

                // Destroy the existing chart instance if it exists
                if (chartInstance) {
                    chartInstance.destroy();
                }

                // Create a new chart instance
                chartInstance = new Chart(ctx, {
                    type: type,
                    data: {
                        labels: ['Chauffage', 'Eau', 'Gaz', 'Electricité'],
                        datasets: [{
                            label: 'Consommations',
                            data: [/*clichaufsConsom, cliEausConsom,*/ cliGaz, cliElectricite],
                            backgroundColor: colors,
                            borderColor: borderColors,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            updateChart(chartType);

            btnChartSimple.addEventListener('click', function() {


                updateChart('bar');
            });
            btnChartLine.addEventListener('click', function() {


                updateChart('line');
            });
            btnChartPie.addEventListener('click', function() {


                updateChart('pie');
                console.log(chartType);
            });


        });
    </script>



@endsection
