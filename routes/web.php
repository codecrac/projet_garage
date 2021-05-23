<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ComptabiliteController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\VisiteController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class,'welcome'])->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    /*|--------------------------------------------------------------------------
    | FRONTEND
    |--------------------------------------------------------------------------*/
//###############################UTILISATEUR
//###############################UTILISATEUR
    Route::get('gestion_utilisateur', [FrontController::class, 'gestion_utilisateur'])->name('gestion_utilisateur');
    Route::delete('supprimer_utilisateur/{id_utilisateur}', [UserProfileController::class, 'supprimer_utilisateur'])->name('supprimer_utilisateur');
//###############################CLIENT
//###############################CLIENT
    Route::get('nouveau_client', [FrontController::class, 'nouveau_client'])->name('nouveau_client');
    Route::get('liste_client', [FrontController::class, 'liste_client'])->name('liste_client');
    Route::get('editer_client/{id_client}', [FrontController::class, 'editer_client'])->name('editer_client');
//###############################VOITURES
//###############################VOITURES
    Route::get('nouveau-vehicule', [FrontController::class, 'nouveau_vehicule'])->name('nouveau_vehicule');
    Route::get('liste_vehicules_client/{id_client}', [FrontController::class, 'liste_vehicules_client'])->name('liste_vehicules_client');
    Route::get('liste_vehicules_garage', [FrontController::class, 'liste_vehicules_garage'])->name('liste_vehicules_garage');
    Route::get('editer_vehicule/{id_vehicule}/{id_visite?}', [FrontController::class, 'editer_vehicule'])->name('editer_vehicule');
    Route::get('get-model/{nom_model}', [FrontController::class, 'get_model'])->name('get_model');
//<===================================================================================>
    Route::get('devis-rapide', [FrontController::class, 'devis_rapide'])->name('devis_rapide');
    Route::get('liste_facture', [FrontController::class, 'liste_facture'])->name('liste_facture');
    Route::get('versements_facture/{id_visite}', [FrontController::class, 'versements_facture'])->name('versements_facture');
//<===================================================================================>
    Route::get('nouveau-flux', [FrontController::class, 'nouveau_flux'])->name('nouveau_flux');
    Route::get('bilan-par-mois', [FrontController::class, 'bilan_par_mois'])->name('bilan_par_mois');
    Route::get('details_flux_argent_du_mois/{mois_a_afficher}', [FrontController::class, 'details_flux_argent_du_mois'])->name('details_flux_argent_du_mois');


    Route::get('/dashboard', [FrontController::class, 'dashboard'])->name('dashboard');
    Route::get('visites_en_approche', [FrontController::class, 'visites_en_approche'])->name('visites_en_approche');
    Route::get('classement_frequence_clients', [FrontController::class, 'classement_frequence_clients'])->name('classement_frequence_clients');
    Route::get('fete_danniverssaire', [FrontController::class, 'fete_danniverssaire'])->name('fete_danniverssaire');

    /*|--------------------------------------------------------------------------
    | BACKEND
    |--------------------------------------------------------------------------*/
//============CLIENTS
    Route::post('enregistrer-client', [ClientController::class, 'enregistrer_client'])->name('enregistrer_client');
    Route::post('modifier-client/{id_client}', [ClientController::class, 'modifier_client'])->name('modifier_client');
    Route::get('supprimer_client/{id_client}', [ClientController::class, 'supprimer_client'])->name('supprimer_client');

//###############################VISITE#############################
    Route::post('changer_etat_visite/{id_vehicule}/{id_visite}', [VisiteController::class, 'changer_etat_visite'])->name('changer_etat_visite');
    Route::post('modifier-informations-voitures/{id_vehicule}/{id_visite}', [VisiteController::class, 'modifier_informations_voitures'])->name('modifier_informations_voitures');
    Route::post('modifier-etat_des_lieux/{id_vehicule}/{id_visite}', [VisiteController::class, 'modifier_etat_des_lieux'])->name('modifier_etat_des_lieux');
    Route::post('modifier-travaux_effectues/{id_vehicule}/{id_visite}', [VisiteController::class, 'modifier_travaux_effectues'])->name('modifier_travaux_effectues');
    Route::post('modifier_facture/{id_vehicule}/{id_visite}', [VisiteController::class, 'modifier_facture'])->name('modifier_facture');

//###############################VEHICULES#############################
    Route::post('enregistrer-vehicules', [VehiculeController::class, 'enregistrer_vehicule'])->name('enregistrer_vehicule');
    Route::delete('supprimer-vehicule/{id_vehicule}/{id_client}', [VehiculeController::class, 'supprimer_vehicule'])->name('supprimer_vehicule');


//###############################COMPTABILITE#############################
    Route::post('enregistrer_flux_argent', [ComptabiliteController::class, 'enregistrer_flux_argent'])->name('enregistrer_flux_argent');
    Route::post('enregistrer_versement_facture/{id_visite}', [ComptabiliteController::class, 'enregistrer_versement_facture'])->name('enregistrer_versement_facture');
    Route::delete('supprimer_versement_facture/{id_visite}/{index_versement}', [ComptabiliteController::class, 'supprimer_versement_facture'])->name('supprimer_versement_facture');


//###############################PDF#############################
    Route::post('devis_rapide_pdf', [PdfController::class, 'devis_rapide_pdf'])->name('devis_rapide_pdf');
    Route::get('etat_des_lieux_visite_pdf/{id_visite}', [PdfController::class, 'etat_des_lieux_visite_pdf'])->name('etat_des_lieux_visite_pdf');
    Route::get('travaux_visite_pdf/{id_visite}', [PdfController::class, 'travaux_visite_pdf'])->name('travaux_visite_pdf');
    Route::get('facture_visite_pdf/{id_visite}', [PdfController::class, 'facture_visite_pdf'])->name('facture_visite_pdf');


});
