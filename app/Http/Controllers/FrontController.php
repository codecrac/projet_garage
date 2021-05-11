<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Visite;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function dashboard(){
        $titre = "Tableau de bord";
        return view('dashboard',compact('titre'));
    }
//========================================CLIENT===========================
    public function nouveau_client(){
        $titre = "Nouveau Client";
        return view('clients.nouveau_client',compact('titre'));
    }
    public function liste_client(){
        $titre = "Liste des Clients";
        $les_clients = Client::all();

        return view('clients.liste_client',compact('titre','les_clients'));
    }
    public function editer_client(int $id_client){
        $titre = "Editer un Client";
        $le_client = Client::findorfail($id_client);
        return view('clients.editer_client',compact('titre','le_client'));
    }
//=================VOITURES
    public function nouveau_vehicule(){
        $titre = "Nouveau vehicule";
        $les_clients = Client::all();
        return view('vehicules.nouveau_vehicule',compact('titre','les_clients'));
    }
    public function liste_vehicules_garage(){
        $titre = "Liste vehicules dans le garage";
        $les_voitures = Vehicule::all();
        return view('vehicules.liste_vehicules_garage',compact('titre','les_voitures'));
    }
    public function liste_vehicules_client(int $id_client){
        $titre = "Liste vehicules client";
        $le_client = Client::findorfail($id_client);
        $les_vehicules = $le_client->vehicules;
        return view('vehicules.liste_vehicules_client',compact('titre','le_client','les_vehicules'));
    }
    public function editer_vehicule(int $id_vehicule,$id_visite=null){
        $titre = "Gestion du vehicule";
        $infos_vehicule = Vehicule::findorfail($id_vehicule);
        if($id_visite!=null){
            $infos_visite = Visite::findorfail($id_visite);
        }else{
            $infos_visite = new Visite();
            $infos_visite->id="-1";
            $infos_visite->etat="Non demarrer";
            $infos_visite->date="";
            $infos_visite->motif="";
        }

        return view('vehicules.editer_vehicule',compact('titre','id_visite','infos_vehicule','infos_visite'));
    }
//=================devis_rapide
    public function devis_rapide(){
        $titre = "Devis rapide";
        return view('devis_facture.devis_rapide',compact('titre'));
    }
//=================COMPTABILITE
    public function nouveau_flux()
    {
        $titre = "FLUX ENTRANT ET SORTANT";
        return view('comptabilite.nouveau_flux', compact('titre'));
    }
    public function bilan_par_mois(){
        $titre = "FLUX ENTRANT ET SORTANT";
        return view('comptabilite.bilan_comptable',compact('titre'));
    }
}
