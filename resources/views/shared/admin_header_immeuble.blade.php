<div class="card mb-3 border-primary-subtle">
    <div class="card-header text-bg-primary row">
        <div class="col-10">
            <i class="fa-regular fa-building me-3"></i>
            {{ str_pad($client->Codecli, 5, '0', STR_PAD_LEFT) . ' - ' . $client->nom }}
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <button id="btnApparts" class="nav-link " >Appartement</button>
        </li>
        <li class="nav-item">
            <button id="btnDetailImmeuble" class="nav-link " >Détail</button>
        </li>
        <li class="nav-item">
            <button id="btnDocumentsImmeuble" class="nav-link" >Documents</button>
        </li>
        <li class="nav-item">
            <button id="btnFactureImmeuble" class="nav-link" >Factures</button>
        </li>
        <li class="nav-item">
            <button id="btnRDVImmeuble" class="nav-link">Rendez-vous</button>
        </li>
        <li class="nav-item">
            <button id="btnRapport" class="nav-link">Rapport</button>
        </li>
        <li class="nav-item">
            <button  id="btnIndexApp" class="nav-link"> Saisie</button>
        </li>

    </ul>
    <div class="card-body">
         <div class="row">
            <div class="col-4 col-md-3 d-flex">
                <div class="px-3 my-auto">
                    <i class="fa-regular fa-box-open-full text-primary fa-lg"></i>
                </div>
                <div>
                    <div>{{ $client->gerantImms->get(0)->codegerant }}</div>
                    <div>{{ $client->gerant }} </div>

                </div>

            </div>
            <div class="col-6 col-md-3 d-flex">
                <div class="px-3 my-auto">
                    <i class="fa-duotone fa-map-location-dot text-primary fa-lg"></i>
                </div>

                <div>
                    {{ $client->rue }}<br> {{ $client->codepost }} {{ $client->codePostelbs->get(0)->Localite }}
                </div>
            </div>
            <div class="col-1 col-md-2 ">
                @php
                    $chauType = $client->clichaufs->get(0);
                    $eauType = $client->cliEaus->get(0);
                    if (isset($chauType->TypRlv) && $chauType->TypRlv == 'VISU') {
                        $chauIcon = 'eye';
//                        echo '<i class="fa-regular fa-eye"></i>';
                    } elseif (isset($chauType->TypRlv) && $chauType->TypRlv == 'GPRS') {
                        $chauIcon = 'wifi';
//                        echo '<i class="fa-regular fa-wifi"></i>';
                    } elseif (isset($chauType->TypRlv) && $chauType->TypRlv == 'RADIO') {
                        $chauIcon = 'walkie-talkie';
//                        echo '<i class="fa-regular fa-walkie-talkie"></i>';
                    } else {
                        $chauIcon = '';
//                        echo '';
                    }

                    if (isset($eauType->TypRlv) && $eauType->TypRlv == 'VISU') {
                        $eauIcon = 'eye';
//                        echo '<i class="fa-regular fa-eye"></i>';
                    } elseif (isset($eauType->TypRlv) && $eauType->TypRlv == 'GPRS') {
                        $eauIcon = 'wifi';
//                        echo '<i class="fa-regular fa-wifi"></i>';
                    } elseif (isset($eauType->TypRlv) && $eauType->TypRlv == 'RADIO') {
                        $eauIcon = 'walkie-talkie';
//                        echo '<i class="fa-regular fa-walkie-talkie"></i>';
                    } else {
//                        echo '';
                        $eauIcon = '';
                    }

                @endphp
                <div class="col-4 col-md-3  d-flex h-100">

                    @if( $chauIcon != '')
                        <div class="bg-warning rounded-circle d-flex mx-1 my-auto" style="height: 25px; width: 25px;"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top"><i class="fa-regular fa-{{ $chauIcon }} mx-auto my-auto"></i></div>
                    @endif
                    @if( $eauIcon != '')
                        <div class="bg-info rounded-circle d-flex mx-1 my-auto" style="height: 25px; width: 25px;"><i class="fa-regular fa-{{ $eauIcon }} my-auto mx-auto"></i></div>
                    @endif

                </div>
            </div>
{{--             <div class="col-2 col-md-2">--}}
{{--                 --}}{{-- Calculer la somme totale de NbRad --}}
{{--                 @php--}}
{{--                     $totalNbRad = $client->relChaufApps->sum('NbRad');--}}
{{--                 @endphp--}}

{{--                    @if($totalNbRad > 0)--}}
{{--                        <div type="button" class="btn btn-primary">--}}
{{--                            Nombre de Radiateur:  <span class="badge text-bg-danger">{{ $totalNbRad }}</span>--}}
{{--                        </div>                  @endif--}}
{{--             </div>--}}

             <div class="col-2 col-md-2 ">
                @if($nbImmAbsent > 0)
                    <div type="button" class="btn btn-primary">
                        Nombre d'Absent:  <span class="badge text-bg-danger">{{ $nbImmAbsent }}</span>
                    </div>
                @endif
            </div>

             <div class="col-2">
                 <a href="{{ route('admin.client.modifier', $client->Codecli) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
             </div>
        </div>

    </div>
</div>
