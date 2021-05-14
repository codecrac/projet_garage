<?php

namespace App\Http\Controllers;

use App\Models\BilanComptable;
use App\Models\Client;
use App\Models\FluxArgent;
use App\Models\Vehicule;
use App\Models\Visite;
use Carbon\Carbon;
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
    public function liste_facture(){
        $titre = "liste des factures";
        $liste_visite = Visite::all();
        return view('devis_facture.liste_facture',compact('titre','liste_visite'));
    }
    public function versements_facture($id_visite){
        $titre = "liste des versement";
        $versements_facture = Visite::findorfail($id_visite);

        $liste_versement = json_decode($versements_facture->versements);
        if($versements_facture->versements ==null){
            $liste_versement =[];
        }
        return view('devis_facture.versements_facture',compact('titre','versements_facture','liste_versement'));
    }
//=================COMPTABILITE
    public function nouveau_flux()
    {
        $titre = "FLUX ENTRANT ET SORTANT";
        $les_vehiclues = Vehicule::all();
        $today = date("Y-m-d");
        $total_entree_aujourdhui = FluxArgent::where("date",'=',$today)->where("flux",'=','entree')->sum('montant');
        $total_sortie_aujourdhui = FluxArgent::where("date",'=',$today)->where("flux",'=','sortie')->sum('montant');
        $flux_aujourdhui = FluxArgent::where("date",'=',$today)->orderby("id",'DESC')->get();
        return view('comptabilite.nouveau_flux', compact('titre','les_vehiclues','total_sortie_aujourdhui','total_entree_aujourdhui','flux_aujourdhui'));
    }
    public function bilan_par_mois(){
        $titre = "HISTORIQUE DES FLUX REGROUPE PAR MOIS";
        $bilan = BilanComptable::all();
//        dd($bilan[0]['mois_a_afficher']);
        return view('comptabilite.bilan_comptable',compact('titre','bilan'));
    }

    public function details_flux_argent_du_mois($mois_a_afficher){
        $titre = "HISTORIQUE DES FLUX DU MOIS : $mois_a_afficher";
        $total_entree = FluxArgent::where("date_hebdo",'=',$mois_a_afficher)->where("flux",'=','entree')->sum('montant');
        $total_sortie = FluxArgent::where("date_hebdo",'=',$mois_a_afficher)->where("flux",'=','sortie')->sum('montant');
        $bilan_du_mois = FluxArgent::where('date_hebdo','=',$mois_a_afficher)->get();
        return view('comptabilite.bilan_comptable_du_mois',compact('titre','bilan_du_mois','mois_a_afficher','total_entree','total_sortie'));
    }
}
