<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppareilController;
use App\Http\Controllers\Admin\AppartementMaterielController;
use App\Http\Controllers\Admin\AvisPassageTextController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ColorTechnicienController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DonneesGeneraleController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FileStorageController;
use App\Http\Controllers\Admin\MaterielController;
//use App\Http\Controllers\Admin\PiecesController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\StatusTechnicienController;
use App\Http\Controllers\Admin\SyncController;
use App\Http\Controllers\Admin\TechnicienController;
use App\Http\Controllers\Admin\TemplateDocumentController;
//use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\TypeErreurController;
use App\Http\Controllers\Admin\TypeEventController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AppartementsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CartographyController;
use App\Http\Controllers\CentraleController;
use App\Http\Controllers\ConvertisseurGoogleAgendaController;
use App\Http\Controllers\DecompteController;
use App\Http\Controllers\FacturationsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImmeublesController;
use App\Http\Controllers\ListeSDCController;
use App\Http\Controllers\MailContentController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\SendMailController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\XmlController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    //    return view('dashboard');
    return redirect()->route('immeubles.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/property/{Codecli_id}/appartement/{appartement_id}/{type}/{numCal}', [PropertyController::class, 'showReleve'])->name('admin.property.showReleve');
Route::get('admin/client/{client}/modifier', [ClientController::class, 'edit'])->name('admin.client.modifier');
Route::put('admin/client/', [ClientController::class, 'update'])->name('admin.client.update');

//->middleware(['auth', 'verified', 'role:admin'])
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AdminController::class, 'migrationRelChaufToReleve'])->name('index');
    Route::get('/client/geocodeClient', [ClientController::class, 'geocodeClient'])->name('client.geocodeClient');
    Route::post('/donneeGenerale/{codecli}', [DonneesGeneraleController::class, 'donneeGeneraleUpdate'])->name('donneeGeneraleUpdate');
    Route::resource('typeErreur', TypeErreurController::class)->except(['show']);
    Route::resource('contact', ContactController::class)->except(['show']);
    Route::resource('user', UserController::class)->except(['show']);
    Route::resource('file_storage', FileStorageController::class)->except(['show']);
    Route::get('/convertisseurAgenda', [ConvertisseurGoogleAgendaController::class, 'convertisseurAgenda'])->name('convertisseurAgenda');

// Techniciens
    Route::resource('technicien', technicienController::class)->except(['show']);
    Route::resource('statusTechnicien', StatusTechnicienController::class)->except(['show']);
    Route::resource('couleurTechnicien', ColorTechnicienController::class)->except(['show']);
    route::get('/techniciensAjax', [TechnicienController::class, 'techniciensAjax'])->name('techniciensAjax');
    Route::get('/createAbsenceTechnicien/{id}', [TechnicienController::class, 'createAbsenceTechnicien'])->name('createAbsenceTechnicien');
    Route::post('/storeAbsenceTechnicien', [TechnicienController::class, 'storeAbsenceTechnicien'])->name('storeAbsenceTechnicien');

//Events
    Route::resource('event', EventController::class)->except(['show']);
    Route::post('/event/createEvent', [EventController::class, 'create'])->name('createEvent');
    Route::get('/eventReleveGeneraux', [EventController::class, 'eventReleveGeneraux'])->name('eventReleveGeneraux');
    Route::get('/eventSecondPassage', [EventController::class, 'eventSecondPassage'])->name('eventSecondPassage');
    Route::get('/eventTroisiemePassage', [EventController::class, 'eventTroisiemePassage'])->name('eventTroisiemePassage');
    Route::resource('typeEvent', TypeEventController::class)->except(['show']);
    Route::get('/event/appartementsAjax/{id}', [EventController::class, 'appartementsAjax'])->name('appartementsAjax');
    Route::post('/ordreEvent', [EventController::class, 'ordreEvent'])->name('ordreEvent');
    Route::get('/ShowEventImmeublesAjax', [EventController::class, 'ShowEventImmeublesAjax'])->name('ShowEventImmeublesAjax');

// avis de passage text
    route::resource('avisPassageText', AvisPassageTextController::class)->except(['show']);
    route::post('/avisPassageText/{id}', [AvisPassageTextController::class, 'update'])->name('update');


// appareil matériels
    Route::post('/appareil/{id}', [ AppareilController::class, 'updateAppareil'])->name('appareil_update');
    Route::resource('materiel', MaterielController::class)->except(['show']);
    Route::resource('appareil', AppareilController::class)->except(['show']);


    Route::get('/regen', [AdminController::class, 'quickRegen'])->name('quickregen');

    // group sync
    Route::prefix('sync')->name('sync.')->group(function () {
        Route::get('/', [SyncController::class, 'index'])->name('index');
        Route::get('/contact', [SyncController::class, 'popContact'])->name('contact');
        Route::get('/client', [SyncController::class, 'popClient'])->name('client');
        Route::get('/appartement', [SyncController::class, 'popAppartement'])->name('appartement');
        Route::get('/gerantimm', [SyncController::class, 'popGerantImm'])->name('gerantImm');
        Route::get('/relapp', [SyncController::class, 'popRelApp'])->name('relapp');
        Route::get('/codepostelb', [SyncController::class, 'popCodePostelb'])->name('codepostelb');
        Route::get('/relclients_codepostelbs', [SyncController::class, 'popRelClientsPosteCode'])->name('relclients_codepostelbs');
        Route::get('/cli_chauff', [SyncController::class, 'popCliChauff'])->name('cli_chauff');
        Route::get('/cli_eau', [SyncController::class, 'popCliEau'])->name('cli_eau');
        Route::get('/relradchf', [SyncController::class, 'popRelradChf'])->name('relradchf');
        Route::get('/relradeau', [SyncController::class, 'popRelradEau'])->name('relradeau');
        Route::get('/relchaufapp', [SyncController::class, 'popRelChaufApp'])->name('relchaufapp');
        Route::get('/releauapp', [SyncController::class, 'popRelEauApp'])->name('releauapp');
        Route::get('/relchauf', [SyncController::class, 'popRelChauf'])->name('relchauf');
        Route::get('/releauc', [SyncController::class, 'popRelEauC'])->name('releauc');
        Route::get('/releauf', [SyncController::class, 'popRelEauF'])->name('releauf');
    });

    //    Route::get('/sync', [SyncController::class, 'PopContact'])->name('sync');
});


Route::prefix('documents')->name('documents.')->middleware(['auth', 'verified'])->group(function () {

    Route::post('/BonDeRouteAjax', [TemplateDocumentController::class, 'BonDeRouteAjax'])->name('BonDeRouteAjax');
    Route::post('/printBonDeRouteAjax', [TemplateDocumentController::class, 'printBonDeRouteAjax'])->name('printBonDeRouteAjax');

    Route::get('/listeDocument/{type}', [TemplateDocumentController::class, 'listeDocument'])->name('listeDocument');
    Route::get('/searchDocument/{type}', [TemplateDocumentController::class, 'searchDocument'])->name('searchDocument');

    Route::get('/listeSDC', [ListeSDCController::class, 'index'])->name('listeSDC');
    Route::get('/showListeSDC/{id}', [ListeSDCController::class, 'showListeSDC'])->name('showListeSDC');
    Route::get('/printListeSDC/{id}', [ListeSDCController::class, 'printListeSDC'])->name('printListeSDC');
    Route::get('/downloadListeSDC/{id}', [ListeSDCController::class, 'downloadListeSDC'])->name('downloadListeSDC');
    Route::post('listeSDC/store', [ListeSDCController::class, 'store'])->name('listeSDC.store');

    Route::get('/showDocument/{id}', [TemplateDocumentController::class, 'showDocument'])->name('showDocument');
    Route::get('/editDocument/{id}', [TemplateDocumentController::class, 'editDocument'])->name('editDocument');
    Route::post('/updateDocument', [TemplateDocumentController::class, 'updateDocument'])->name('updateDocument');
    Route::get('/deleteDocument/{id}', [TemplateDocumentController::class, 'deleteDocument'])->name('deleteDocument');

    Route::get('/showFeuilleFrais', [TemplateDocumentController::class, 'showFeuilleFrais'])->name('showFeuilleFrais');

    //Route::get('/sendMail', [SendMailController::class, 'index'])->name('sendMail');
    Route::post('/sendMail', [SendMailController::class, 'send'])->name('sendMail');

    Route::get('/printBonDeRoute/{id}', [TemplateDocumentController::class, 'printBonDeRoute'])->name('printBonDeRoute');
    Route::get('/downloadPdfBonDeRoute/{id}', [TemplateDocumentController::class, 'downloadPdfBonDeRoute'])->name('downloadPdfBonDeRoute');
    Route::get('/downloadPdfAvisDePassage/{id}', [TemplateDocumentController::class, 'downloadPdfAvisDePassage'])->name('downloadPdfAvisDePassage');
    Route::get('/downloadPdfFormCreateApps/{id}', [TemplateDocumentController::class, 'downloadPdfFormCreateApps'])->name('downloadPdfFormCreateApps');
    Route::get('/downloadCsvFormCreateApps/{id}', [TemplateDocumentController::class, 'downloadCsvFormCreateApps'])->name('downloadCsvFormCreateApps');
    Route::get('/downloadExcelFormCreateApps/{id}', [TemplateDocumentController::class, 'downloadExcelFormCreateApps'])->name('downloadExcelFormCreateApps');
    Route::get('/printAvisDePassage/{id}', [TemplateDocumentController::class, 'printAvisDePassage'])->name('printAvisDePassage');


    Route::get('/showRapport/{id}',  [TemplateDocumentController::class, 'showRapport'])->name('showRapport');
    Route::post('/createRapport', [TemplateDocumentController::class, 'createRapport'])->name('createRapport');
    Route::get('/editRapport/{id}', [TemplateDocumentController::class, 'editRapport'])->name('editRapport');
    Route::get('/deleteRapport/{id}/{created_at}', [TemplateDocumentController::class, 'deleteRapport'])->name('deleteRapport');
    Route::get('/import-clients', [TemplateDocumentController::class, 'showImportForm'])->name('clients.import.form');
    Route::post('/import-clients', [TemplateDocumentController::class, 'import'])->name('clients.import');

    Route::get('/showChauffage', [TemplateDocumentController::class, 'showChauffage'])->name('showChauffage');

});

Route::prefix('centrales')->name('centrales.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [CentraleController::class, 'index'])->name('index');
    Route::get('/liste/{id}', [CentraleController::class, 'centrale'])->name('centrale');
    Route::get('/detail/{id}', [CentraleController::class, 'detail'])->name('detail');
});

Route::get('/test/generateXmlFile', [XmlController::class, 'generateXmlFile'])->name('generateXmlFile');
Route::post('/test/parserXmlFile', [XmlController::class, 'parserXmlFile'])->name('parserXmlFile');
Route::get('/test/testParser', [XmlController::class, 'testerParser'])->name('testParser');


Route::prefix('immeubles')->name('immeubles.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [ImmeublesController::class, 'index'])->name('index');
    Route::get('/{id}', [ImmeublesController::class, 'show'])->name('show');


    //  public function showAppartement($appartement_id, $immeuble_id, $client_id) - name showAppartement
    Route::get('/{Codecli_id}/appartement/{appartement_id}', [ImmeublesController::class, 'showAppartement'])->name('showAppartement');
    Route::post('/{Codecli_id}/appartement/{appartement_id}', [ImmeublesController::class, 'storeNote'])->name('storeNote');
    Route::post('/{Codecli_id}/appartement/absent/{appartement_id}', [ImmeublesController::class, 'storeAbsent'])->name('storeAbsent');
    Route::get('/{Codecli_id}/appartement/{appartement_id}/{type}/{numCal}', [ImmeublesController::class, 'showReleve'])->name('showReleve');

    Route::resource('file_storage', ImmeublesController::class)->except(['show']);

    Route::get('/{Codecli}/appartement/{appartement_id}/edit', [AppartementsController::class, 'edit'])->name('PropertyEdit');
    Route::post('/{Codecli}/appartement/{appartement_id}/update', [AppartementsController::class, 'update'])->name('PropertyUpdate');
    Route::post('/{Codecli}/appartement/{appartement_id}/DetailUpdate', [AppartementsController::class, 'DetailUpdate'])->name('DetailUpdate');
    Route::post('/{Codecli_id}/appartement/{appartement_id}/AddIndex', [AppareilController::class, 'addIndex'])->name('AddIndex');

});
Route::get('/property/{Codecli}/appartement/{appartement_id}/edit', [AppartementsController::class, 'edit'])->name('PropertyEdit');
Route::post('/property/{Codecli}/appartement/{appartement_id}', [AppartementsController::class, 'update'])->name('PropertyUpdate');
Route::post('/property/{Codecli}/appartement/{appartement_id}/Detail', [AppartementsController::class, 'store'])->name('PropertyStore');
Route::post('immeubles/store', [AppartementsController::class, 'storeAppartement'])->name('storeAppartement');


Route::get('/searchByNameOrCodecli', [ImmeublesController::class, 'searchClientByNameOrCodecli'])->name('searchClientByNameOrCodecli');
Route::get('/searchByCPOrLocalite', [ImmeublesController::class, 'searchClientByCPOrLocalite'])->name('searchClientByCPOrLocalite');
Route::get('/searchByStreet', [ImmeublesController::class, 'searchClientByStreet'])->name('searchClientByStreet');
Route::get('/searchByTypeInter', [EventController::class, 'searchEventByTypInter'])->name('searchEventByTypInter');
Route::get('/searchEventByTechniciens', [TechnicienController::class, 'searchEventByTechniciens'])->name('searchEventByTechniciens');
route::get('/searchByMateriel', [MaterielController::class, 'searchByMateriel'])->name('searchByMateriel');

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/cartography', [CartographyController::class, 'index'])->name('cartography.index');
Route::get('/cartography/Technicien', [CartographyController::class, 'cartographyTechnicien'])->name('cartography.cartographyTechnicien');
Route::get('/cartography/getEventsCartography', [CartographyController::class, 'getEventsCartography'])->name('cartography.getEventsCartography');
Route::get('/cartography/getEventTimeline', [CartographyController::class, 'getEventTimeline'])->name('cartography.getEventTimeline');
Route::get('event/eventAjax', [EventController::class, 'eventAjax'])->name('event.eventAjax');
Route::get('event/eventAjaxNoDate', [EventController::class, 'eventAjaxNoDate'])->name('event.eventAjaxNoDate');
Route::post('event/update_eventAjax', [EventController::class, 'updateEventAjax'])->name('update_eventAjax');
Route::post('event/updateTime_eventAjax', [EventController::class, 'updateTimeEventAjax'])->name('updateTime_eventAjax');
Route::post('event/updateAllDay_eventAjax', [EventController::class, 'UpdateAllDay'])->name('updateAllDay_eventAjax');


Route::prefix('ajax')->name('ajax')->group(function () {
    Route::post('/getAppartements', [ImmeublesController::class, 'getAppartements'])->name('.getAppartements');
    Route::get('/form-part/{type}', [AjaxController::class, 'getFormMaterielType']);
    Route::get('/form-part-genre/{genre}', [AjaxController::class, 'getFormMaterielGenre']);
    Route::get('/form-part-commu/{commu}', [AjaxController::class, 'getFormMaterielCommu']);
    Route::get('/form-part-model', [AjaxController::class, 'getFormModel']);
    Route::get('/form-part-commu-sontex', [AjaxController::class, 'getFormCommuSontex']);
    Route::get('/form-part-commu-sontex2', [AjaxController::class, 'getFormCommuSontex2']);
    Route::get('/form-part-dim', [AjaxController::class, 'getFormDimension']);
    Route::get('/user', function () {
        return Auth::user();
    });
    //Route::post('/postTechniciensCheckedAjax', [TechnicienController::class, 'postTechniciensCheckedAjax'])->name('.postTechniciensCheckedAjax');
    Route::post('/eventTimelineAjax', [EventController::class, 'eventTimelineAjax'])->name('.eventTimelineAjax');
    Route::get('/saisieClientAjax', [DecompteController::class, 'saisieClientAjax'])->name('.saisieClientAjax');
    Route::get('/saisieParamAjax', [DecompteController::class, 'saisieParamAjax'])->name('.saisieParamAjax');
    Route::get('/saisieRelAjax', [DecompteController::class, 'saisieRelAjax'])->name('.saisieRelAjax');

});

Route::prefix('appartementMateriel')->name('appartementMateriel')->group(function(){
    Route::get('/', [AppartementMaterielController::class, 'index'])->name('.index');
    Route::get('/create', [AppartementMaterielController::class, 'create'])->name('.create');
    Route::post('/store', [AppartementMaterielController::class, 'store'])->name('.store');
    Route::get('/edit/{id}', [AppartementMaterielController::class, 'edit'])->name('.edit');
    Route::post('/update/{id}', [AppartementMaterielController::class, 'update'])->name('.update');
    Route::get('/delete/{id}', [AppartementMaterielController::class, 'destroy'])->name('.destroy');

});

Route::prefix('decompte')->name('decompte')->group(function(){
    Route::get('/', [DecompteController::class, 'index'])->name('.index');
    Route::post('/storeChauff', [DecompteController::class, 'storeChauff'])->name('.storeChauff');
    Route::post('/storeEaux', [DecompteController::class, 'storeEaux'])->name('.storeEaux');
    Route::post('/infoAppart', [DecompteController::class, 'infoAppart'])->name('.infoAppart');
    Route::get('/edit/{id}', [DecompteController::class, 'edit'])->name('.edit');
    Route::post('/update/{id}', [DecompteController::class, 'update'])->name('.update');
    Route::get('/delete/{id}', [DecompteController::class, 'destroy'])->name('.destroy');

});





Route::post('/getTypeErreur', [AppareilController::class, 'appareilTypeErreur'])->name('.getTypeErreur');

Route::post('/property/store', [PropertyController::class, 'store'])->name('store');


Route::get('facturation/tri', [FacturationsController::class, 'index'])->name('facturation.index');
Route::get('facturation/listeFactures', [FacturationsController::class, 'listeFacture'])->name('facturation.listeFactures');
Route::get('facturation/detailFacture/{id}', [FacturationsController::class, 'detailFacture'])->name('facturation.detailFacture');
Route::get('facturation/generateFacture', [FacturationsController::class, 'generateFacture'])->name('facturation.generateFacture');
Route::post('facturation/resultTriAjax', [FacturationsController::class, 'resultTriAjax'])->name('resultTriAjax');

Route::resource('mailContents', MailContentController::class)->except('show');

Route::get('/test', [TemplateDocumentController::class, 'test'])->name('test');


require __DIR__.'/auth.php';

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
