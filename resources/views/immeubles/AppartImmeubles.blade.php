<div class=" appartContent row mx-1 mx-md-5 mb-2 rounded-1 {{ $bg_card }}" >
    <a href="{{ route('immeubles.showAppartement', [$client->Codecli, $appartement->RefAppTR] ) }}" class="text-decoration-none rounded-1 col-6 col-lg-2 col-md-2 position-relative my-auto order-1 order-md-1 ">
        <div class="rounded-1 col-6 col-lg-2 col-md-2 position-relative my-auto order-1 order-md-1 ">
            {{ str_pad($appartement->RefAppTR, 4, '0', STR_PAD_LEFT) }}
        </div>
    </a>
    <a href="{{ route('immeubles.showAppartement', [$client->Codecli, $appartement->RefAppTR] ) }}" class="text-decoration-none rounded-1 col-6 col-lg-2 col-md-2 position-relative my-auto order-1 order-md-1 ">
        <div class="rounded-1 col-6 col-lg-2 col-md-2 position-relative my-auto order-3 order-md-2  fw-bold">
            <i class="fa-regular fa-key me-2 text-primary ms-3 ms-md-0"></i>{{ $relApp->ProprioCd ?? '' }}
        </div>
    </a>
    <a href="{{ route('immeubles.showAppartement', [$client->Codecli, $appartement->RefAppTR] ) }}" class="text-decoration-none rounded-1 col-6 col-lg-2 col-md-2 position-relative my-auto order-1 order-md-1 ">
        <div class="rounded-1 col-6 col-lg-2 col-md-2 position-relative my-auto order-5 order-md-3 fw-bold">
            <i class="fa-regular fa-user-group-simple me-2 text-primary ms-3 ms-md-0"></i>{{ $relApp->LocatCd ?? '' }}
        </div>
    </a>
    <div class="rounded-1 col-6 col-lg-2 col-md-2 position-relative my-auto order-2 order-md-4 pt-2 pt-md-0">
        @php
            $nbChauf = $client->relChaufApps->where('RefAppTR', $appartement->RefAppTR)->last();
            $nbEau = $client->relEauApps->where('RefAppTR', $appartement->RefAppTR)->last();
            //                var_dump($nbChauf);
        @endphp

        <div class="col-12 d-flex font-monospace fs-6">
            @if( isset($nbChauf->NbRad) && $nbChauf->NbRad != 0)
                <div class="bg-warning rounded-circle d-flex mx-1 text-center" style="height: 25px; width: 25px;"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top">
                    <span class="my-auto mx-auto fw-bold">{{ $nbChauf->NbRad  }}</span>
                </div>
            @endif

            @if( isset($nbEau->NbCptChaud) && $nbEau->NbCptChaud != 0)
                <div class="bg-danger rounded-circle d-flex mx-1" style="height: 25px; width: 25px;">
                    <span class="my-auto mx-auto fw-bold">{{ $nbEau->NbCptChaud }} </span>
                </div>
            @endif
            @if( isset($nbEau->NbCptFroid) && $nbEau->NbCptFroid != 0)
                <div class="bg-info rounded-circle d-flex mx-1" style="height: 25px; width: 25px;">
                    <span class="my-auto mx-auto fw-bold">{{ $nbEau->NbCptFroid  }}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="rounded-1 col-5 col-lg-4 col-md-4 col-sm-6 position-relative my-auto order-4 order-md-5 row">
        <div class="col-5 col-md-4 form-check my-auto">
            <form method="POST" action="{{ route('immeubles.storeAbsent', [$client->Codecli, $appartement->RefAppTR] ) }}" id="absentForm_{{ $client->Codecli }}_{{ $appartement->RefAppTR }}">
                @csrf
                <input type="hidden" name="Codecli" id="codeCli_{{ $client->Codecli }}" value="{{ $client->Codecli }}">
                <input type="hidden" name="Appartement_id" id="appartement_id_{{ $appartement->id }}" value="{{ $appartement->id }}">
                <input type="hidden" name="RefAppTR" id="RefAppTR_{{ $appartement->RefAppTR }}" value="{{ $appartement->RefAppTR }}">
                <input class="form-check-input" type="checkbox" value="1" id="flexCheckAbsent_{{ $client->Codecli }}_{{ $appartement->RefAppTR }}" name="is_absent" @if(count($appartement->Absent) > 0 && $appartement->Absent[count($appartement->Absent)-1]->is_absent == '1') checked @endif onchange="submitForm('{{ $client->Codecli }}_{{ $appartement->RefAppTR }}')">
                <label class="form-check-label" for="flexCheckAbsent_{{ $client->Codecli }}_{{ $appartement->RefAppTR }}">
                    Absent
                </label>
            </form>
        </div>
        <div class="col-7 col-md-8 text-end row container_button_action">
            <!-- Button trigger modal -->
            <div class="col-5 col-lg-4 col-md-5 order-1 button_action">
                <button type="button" class="btn btn-primary" id="note_{{ $appartement->id }}" data-bs-toggle="modal" data-bs-target="#appModal_{{$appartement->id}}">
                    Notes
                </button>
            </div>

            <div class="col-3 order-2 col-lg-2 col-md-3 button_action">

                <button type="button" data-bs-toggle="modal" data-bs-target="#Modal_img_{{$appartement->id}}" class="btn btn-primary"><i class="fa-regular fa-file-image"></i></button>
            </div>


        </div>
    </div>

</div>
