<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clichauf;
use App\Models\CliEau;
use App\Models\Client;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DonneesGeneraleController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $month = '01';
        $clients = Client::whereRaw('RIGHT(dernierreleve, 2) = ?', [$month])->with('codePostelbs', 'events')->orderBy('nom')->get();

        return view('documents.listeSDC.listeSdcPdf', compact('clients', 'month'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function donneeGeneraleUpdate(Request $request, string $codeCli)
{
    $donneeGenerale = $request->donneeGenerale;
    $client = Client::where('Codecli', $codeCli)->first();

    if ($client) {
        $clientId = $client->id;
    } else {
        $clientId = null;
    }

    switch ($donneeGenerale) {
        case 'chauff':
            //$cliChauff = Clichauf::where('Codecli', $codeCli)->get();

            Clichauf::updateOrCreate(
                ['Codecli' => $codeCli],
                [
                    'client_id' => $clientId,
                    'Codecli' => $codeCli,
                    'PctPrive' => $request->PctPrive,
                    'PctCom' => $request->PctCom,
                    'Consom' => $request->Consom,
                    'ConsPrive' => $request->ConsPrive,
                    'Quotite' => $request->Quotite,
                    'TypCal' => $request->TypCal,
                    'TypRlv' => $request->TypRlv,
                    'FraisTR' => $request->FraisTR
                ],
            );

            $message = true;
            break;
        case 'eau':

            CliEau::updateOrCreate(
                ['Codecli' => $codeCli],
                [
                    'client_id' => $clientId,
                    'Codecli' => $codeCli,
                    'PrxFroid' => $request->PrxFroid,
                    'PrxChaud' => $request->PrxChaud,
                    'TypCpt' => $request->TypCpt,
                    'FraisTR' => $request->FraisTR,
                    'FraisAnn' => $request->FraisAnn,
                    'Consom' => $request->Consom,
                    'Unite' => $request->Unite,
                    'SupChaud' => $request->SupChaud,
                    'Periode' => $request->Periode,
                    'UnitAnn' => $request->UnitAnn,
                    'TypCal' => $request->TypCal,
                    'ChaudChf' => $request->ChaudChf,
                    'EauSol' => $request->EauSol,
                    'TypRlv' => $request->TypRlv,


                ],
            );

            $message = true;
            break;
        case 'Gaz':

            $message = false;
            break;
        case 'Elec':

            $message = false;
            break;
        case 'Prov':

            $message = false;
            break;
        default:
            $message = false;
            break;
    }

    if($message == false)
        return redirect()->back()->with('error', 'Erreur lors de la modification des données générales');
    else {
        return redirect()->back()->with('success', 'Données générales modifiées avec succès');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
