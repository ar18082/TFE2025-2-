<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use App\Models\Client;
use App\Models\RelChauf;
use App\Models\RelEauC;
use App\Models\RelEauF;
use App\Models\RelRadChf;
use App\Models\RelRadEau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DecompteController extends Controller
{

    public function saisieClientAjax (Request $request)
    {

        $client = Client::where('Codecli', $request->codeCli)
            ->with('appartements')
            ->first();
        return response()->json($client);
    }

    public function saisieParamAjax(Request $request)
    {
        $type = $request->type;
        $param = null;
        if($type == 'chauffage'){
            $param = Client::where('Codecli', $request->codeCli)
                ->with(['clichaufs', 'relChaufApps' => function($query) use ($request) {
                    $query->where('RefAppTR', $request->refAppTR)->orderBy('DatRel', 'desc')->first();
                }])
                ->first();
        }else if($type == 'eau'){
            $param = Client::where('Codecli', $request->codeCli)
                ->with(['cliEaus', 'relEauApps' => function($query) use ($request) {
                    $query->where('RefAppTR', $request->refAppTR)->orderBy('DatRel', 'desc')->first();
                }])
                ->first();
        }

        return response()->json($param);
    }

    public function saisieRelAjax(Request $request)
    {

        $codeCli = $request->codeCli;
        $refAppTR = $request->refAppTR;
        $type = $request->type;
        $typeRel = $request->typeRel;

        switch ($type){
            case 'chauffage' :
                if($typeRel == 'VISU') {
                    $rel = RelChauf::where('Codecli', $codeCli)
                        ->where('RefAppTR', $refAppTR)
                        ->where('DatRel', function ($query) use ($codeCli, $refAppTR) {
                            $query->select(DB::raw('MAX(rc2.DatRel)'))
                                ->from('rel_chaufs as rc2')
                                ->whereColumn('rc2.NumRad', 'rel_chaufs.NumRad')
                                ->where('rc2.Codecli', $codeCli)
                                ->where('rc2.RefAppTR', $refAppTR);
                        })
                        ->get();
                }else {
                    dd('traiter le cas de relRadChf');
                }
                break;
        }


//        switch ($type){
//            case 'chauffage' :
//                if($typeRel == 'VISU'){
//                    $rel = RelChauf::where('Codecli', $codeCli)
//                        ->where('RefAppTR', $refAppTR)
//                        ->orderBy('DatRel', 'desc')
//                        ->first();
//                }else{
//                    // voir avec le parser python pour récupérer et intégrer les datas dans la db
//                    $rel = RelRadChf::where('Codecli', $codeCli)
//                        ->where('RefAppTR', $refAppTR)
//                        ->orderBy('DatRel', 'desc')
//                        ->first();
//
//                }
//                break;
//            case 'eau' :
//                if($typeRel == 'VISU') {
//                    $rel = RelEauF::where('Codecli', $codeCli)
//                        ->where('RefAppTR', $refAppTR)
//                        ->orderBy('DatRel', 'desc')
//                        ->first();
//                }else{
//                    $rel = RelRadEau::where('Codecli', $codeCli)
//                        ->where('RefAppTR', $refAppTR)
//                        ->orderBy('DatRel', 'desc')
//                        ->first();
//                }
//                break;
//            case 'eauChaude' :
//                if($typeRel == 'VISU') {
//                    $rel = RelEauC::where('Codecli', $codeCli)
//                        ->where('RefAppTR', $refAppTR)
//                        ->orderBy('DatRel', 'desc')
//                        ->first();
//                } else {
//                    $rel = RelRadEau::where('Codecli', $codeCli)
//                        ->where('RefAppTR', $refAppTR)
//                        ->orderBy('DatRel', 'desc')
//                        ->first();
//                }
//                break;
//        }
//
//        $datas = [
//            'rel' => $rel,
//            'type' => $type,
//        ];
        return response()->json($rel);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('decompte.index');
    }

    public function storeChauff(Request $request)
    {
        $chauffRequests = collect($request->all())->filter(function ($value, $key) {
            return strpos($key, 'chauff') !== false;
        });

        $parsedKeys = $chauffRequests->keys()->map(function ($key) use ($chauffRequests) {
            // Exemple de parsing: extraire les parties de la clé séparées par des underscores
            $parts = explode('_', $key);
            return [
                'type' => $parts[0] ?? null,
                'numRad' => $parts[1] ?? null,
                'colonne' => $parts[2] ?? null,
                'value' => $chauffRequests[$key],
            ];
        });

        $groupedByNumRad = $parsedKeys->groupBy('numRad')->map(function ($group) {
            return $group->sortBy('numRad', SORT_ASC);
        });
        foreach ($groupedByNumRad as $numRad => $group) {

            if($request->typeRlv == 'VISU') {
                $relchauf = new RelChauf();
                $relchauf->Codecli = $request->codeCli;
                $relchauf->RefAppTR = $request->refAppTR;
                $relchauf->DatRel = $request->dateReleve;

                $relchauf->NumRad = $numRad;
                $relchauf->NumCal = $group[1]['value'];
                $relchauf->TypCal = $group[2]['value'];
                $relchauf->Statut = $group[3]['value'];
                $relchauf->Sit = $group[4]['value'];
                $relchauf->Coef = $group[5]['value'];
                $relchauf->AncIdx = $group[6]['value'];
                $relchauf->NvIdx = $group[7]['value'];
                $relchauf->NvIdx2 = 0;
                $relchauf->created_at = now();
                $relchauf->updated_at = now();
                //$relchauf->save();


            }  else{

                // voir le parser python pour récupérer et intégrer les datas dans la db
                $relchauf = new RelRadChf();
//                $relchauf->Codecli = $request->codeCli;
//                $relchauf->RefAppTR = $request->refAppTR;
//                $relchauf->DatRel = $request->dateReleve;
//                $relchauf->NumCal = $group[1]['value'];
//                $relchauf->TypCal = $group[2]['value'];
//                $relchauf->Statut = $group[3]['value'];
//                $relchauf->Sit = $group[4]['value'];
//                $relchauf->Coef = $group[5]['value'];
//                $relchauf->AncIdx = $group[6]['value'];
//                $relchauf->NvIdx = $group[7]['value'];
//                $relchauf->NvIdx2 = 0;
//                $relchauf->created_at = now();
//                $relchauf->updated_at = now();


            }
        }

        // retour à la page de saisie
        return redirect()->back()->with('success', 'Les données de chauffage ont été enregistrées avec succès');
    }

    public function storeEaux(Request $request)
    {


        $eauChaudeRequests = collect($request->all())->filter(function ($value, $key) {
            return strpos($key, 'eauChaude') !== false;
        });

        $parsedKeys = $eauChaudeRequests->keys()->map(function ($key) use ($eauChaudeRequests) {
            // Exemple de parsing: extraire les parties de la clé séparées par des underscores
            $parts = explode('_', $key);
            return [
                'type' => $parts[0] ?? null,
                'ligne' => $parts[1] ?? null,
                'colonne' => $parts[2] ?? null,
                'value' => $eauChaudeRequests[$key],
            ];
        });

        $groupedEauChaude = $parsedKeys->groupBy('ligne')->map(function ($group) {
            return $group->sortBy('ligne', SORT_ASC);
        });

        $eauFroideRequests = collect($request->all())->filter(function ($value, $key) {
            return strpos($key, 'eauFroide') !== false;
        });

        $parsedKeys = $eauFroideRequests->keys()->map(function ($key) use ($eauFroideRequests) {
            // Exemple de parsing: extraire les parties de la clé séparées par des underscores
            $parts = explode('_', $key);
            return [
                'type' => $parts[0] ?? null,
                'ligne' => $parts[1] ?? null,
                'colonne' => $parts[2] ?? null,
                'value' => $eauFroideRequests[$key],
            ];
        });

        $groupedEauFroide = $parsedKeys->groupBy('ligne')->map(function ($group) {
            return $group->sortBy('ligne', SORT_ASC);
        });


        foreach ($groupedEauChaude as $group) {

            if ($request->typeRlv == 'VISU') {
                $relEauC = new RelEauC();
                $relEauC->Codecli = $request->codeCli;
                $relEauC->RefAppTR = $request->refAppTR;
                $relEauC->DatRel = $request->dateReleve;

                $relEauC->NoCpt = $group[0]['value'];
                $relEauC->NumCpt = $group[1]['value'];
                $relEauC->Statut = $group[2]['value'];
                $relEauC->Sit = $group[3]['value'];
                $relEauC->AncIdx = $group[4]['value'];
                $relEauC->NvIdx = $group[5]['value'];
                $relEauC->NvIdx2 = 0;
                $relEauC->created_at = now();
                $relEauC->updated_at = now();
                //$relEauC->save();

            }else {

                // voir le parser python pour récupérer et intégrer les datas dans la db
                $relRadEau = new RelRadEau();
//                $relchauf->Codecli = $request->codeCli;
//                $relchauf->RefAppTR = $request->refAppTR;
//                $relchauf->DatRel = $request->dateReleve;
//                $relchauf->NumCal = $group[1]['value'];
//                $relchauf->TypCal = $group[2]['value'];
//                $relchauf->Statut = $group[3]['value'];
//                $relchauf->Sit = $group[4]['value'];
//                $relchauf->Coef = $group[5]['value'];
//                $relchauf->AncIdx = $group[6]['value'];
//                $relchauf->NvIdx = $group[7]['value'];
//                $relchauf->NvIdx2 = 0;
//                $relchauf->created_at = now();
//                $relchauf->updated_at = now();
            }
        }

        foreach ($groupedEauFroide as $group) {

            if($request->typeRlv == 'VISU') {
                $relEauF = new RelEauF();
                $relEauF->Codecli = $request->codeCli;
                $relEauF->RefAppTR = $request->refAppTR;
                $relEauF->DatRel = $request->dateReleve;

                $relEauF->NoCpt = $group[0]['value'];
                $relEauF->NumCpt = $group[1]['value'];
                $relEauF->Statut = $group[2]['value'];
                $relEauF->Sit = $group[3]['value'];
                $relEauF->AncIdx = $group[4]['value'];
                $relEauF->NvIdx = $group[5]['value'];
                $relEauF->NvIdx2 = 0;
                $relEauF->created_at = now();
                $relEauF->updated_at = now();
                //$relEauF->save();


            }else{

                // voir le parser python pour récupérer et intégrer les datas dans la db
                $relRadEau = new RelRadEau();
//                $relchauf->Codecli = $request->codeCli;
//                $relchauf->RefAppTR = $request->refAppTR;
//                $relchauf->DatRel = $request->dateReleve;
//                $relchauf->NumCal = $group[1]['value'];
//                $relchauf->TypCal = $group[2]['value'];
//                $relchauf->Statut = $group[3]['value'];
//                $relchauf->Sit = $group[4]['value'];
//                $relchauf->Coef = $group[5]['value'];
//                $relchauf->AncIdx = $group[6]['value'];
//                $relchauf->NvIdx = $group[7]['value'];
//                $relchauf->NvIdx2 = 0;
//                $relchauf->created_at = now();
//                $relchauf->updated_at = now();

            }
        }

        return redirect()->back()->with('success', 'Les données des compteurs d\'eaux ont été enregistrées avec succès');
    }

    public function infoAppart(Request $request)
    {
        dd($request->all());
        $codeCli = $request->codeCli;



        return redirect()->back()->with('success', 'Les données des appartements ont été enregistrées avec succès');
    }
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
