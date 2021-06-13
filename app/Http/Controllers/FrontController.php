<?php

namespace App\Http\Controllers;

use App\Models\BilanComptable;
use App\Models\Client;
use App\Models\FluxArgent;
use App\Models\Licence;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\User;
use App\Models\Vehicule;
use App\Models\Visite;
use Carbon\Carbon;
use Illuminate\Http\Request;

//PDF
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Http;
use Matrix\Exception;
use NumberFormatter;

class FrontController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function verification_licence(){
        //recup le code licence

        $la_licence = Licence::first();
           $code_licence = $la_licence->code_licence;
        if($code_licence == null ){
            die("formulaire de renseignement de licence");
        }else{
            $nom_de_domaine = "https://ladde.000webhostapp.com/garage-licence/verification.php";
            $parametres = [
                "code_licence" => "$code_licence"
            ];
            $req = Http::get($nom_de_domaine,$parametres);
            $reponse = json_decode( $req->body() );

            if($reponse->licence_valide){
                return redirect()->route("licence_ok");
            }else{
                dd($reponse->message);
            }

        }


    }

    public function dashboard(){


#===============================LICENCE#===============================

        $la_licence = Licence::first();
        $code_licence = $la_licence->code_licence;
        if($code_licence == null ){
            return redirect()->route("dashboard");
        }else{
            $nom_de_domaine = "https://ladde.000webhostapp.com/garage-licence/verification.php";
            $parametres = [
                "tableau_de_bord_utilise_licence" => "$code_licence"
            ];
            $req = Http::get($nom_de_domaine,$parametres);
            $reponse = json_decode( $req->body() );

            if(!$reponse->licence_valide){
                return redirect()->route("dashboard");
            }

        }

#===============================MARQUE ET MODELE#===============================

        $tableau_marque = [ 'Bmw','Daewoo','Ford','Holden','Honda','Hyundai',
                            'Isuzu','Kia','Lexus','Mazda','Mitsubishi','Nissan',
                            'Peugeot','Subaru','Suzuki','Toyota','Volkswagen',
                            'Renault','Mercedes','Opel','Audi','Citroën','Acura',
                            'Alfa Romeo','Alpine','Aston-Martin','Bentley','Bugatti',
                            'Cadillac','Chery','Chrysler','Dacia','Fiat','Gaz',
                            'Hafei','Jeep','Land Rover','Lexus','Lincoln','Mazda',
                            'Mercedes-Benz','Mitsubishi','Nissan','Porshe','Volvo'];
        ;

//        $tableau_marque = [ 'Kia'];
        $model_marque = [
            'Kia'=>['Sorento','Sportage','Seltos','Mohave','Rio','Forte','Optima','K5','Cadenza','Stinger','K900','Soul','Niro','Seltos','Telluride','Sedona'],
            'Bmw'=>['X1','X2','X2 M35i','Serie 3 Berline','M3 Competition Berline','Serie 8 coupé'],
        ];


        foreach ($tableau_marque as $item_marque):
            $la_marque = new Marque();
            $la_marque->constructeur = $item_marque;

            $present = Marque::where('constructeur','=',$item_marque)->get();
            if(sizeof($present) <1){
                $la_marque->save();
            }

            if(isset($model_marque[$item_marque])){
                foreach ($model_marque[$item_marque] as $item_modele):
                    $model_present = Modele::where('modele','=',$item_modele)->get();
                    if(sizeof($model_present) <1) {
                        $le_modele = new Modele();
                        $le_modele->modele = $item_modele;
                        $le_modele->marque_parente = $item_marque;
                        $le_modele->save();
                    }
                endforeach;
            }
        endforeach;
#===============================#$anniversaire===============================
// start range 10 days ago
        $start = date('z') + 1 - 10;
// end range 10 days from now
        $end = date('z') + 1 + 10;
        $liste_anniversaire = Client::whereRaw("DAYOFYEAR(date_naissance) BETWEEN $start AND $end")->get();
#===============================#date_prochaine_visite===============================

        $today= date('Y-m-d');
        $dans_10_jour = date("Y-m-d", strtotime("+10 day"));
        $date_visite_en_approche = Visite::where('date_prochaine_visite','>=',$today)
            ->where('date_prochaine_visite','<=',$dans_10_jour)->get();
#===============================#===============================
        $nombre_voitures_dans_le_garage = Visite::where('etat','!=','rendu')->count();
        $nombre_client = Client::count();
        $nombre_utilisateur = User::count();
        $titre = "Tableau de bord";
        return view('dashboard',compact('titre','date_visite_en_approche','nombre_client','liste_anniversaire','nombre_voitures_dans_le_garage','nombre_utilisateur'));
    }


    public function classement_frequence_clients(){
        $les_clients = Client::all();
        $titre = "FREQUENCE CLIENT";
        return view('dashboard.classement_frequence_clients',compact('titre','les_clients'));
    }

    public function fete_danniverssaire(){
        $les_clients = Client::all();
        $titre = "FETE D'ANNIVERSSAIRE";

// start range 10 days ago
        $start = date('z') + 1 - 10;
// end range 10 days from now
        $end = date('z') + 1 + 10;
        $les_clients = Client::whereRaw("DAYOFYEAR(date_naissance) BETWEEN $start AND $end")->get();

        return view('dashboard.fete_danniverssaire',compact('titre','les_clients'));
    }

    public function visites_en_approche(){
        $today= date('Y-m-d');
        $dans_10_jour = date("Y-m-d", strtotime("+10 day"));
        $les_visites = Visite::where('date_prochaine_visite','>=',$today)->where('date_prochaine_visite','<=',$dans_10_jour)
            ->orderBy('date_prochaine_visite','ASC')->get();
//        dd($dans_10_jour,$date_visite_en_approche);
        $titre = "LISTE DES VISTES PREVUES DANS LES 10 PROCHAINS JOURS";
        return view('dashboard.visites_proches',compact('titre','les_visites'));
    }
//========================================CLIENT===========================
    public function nouveau_client(){
        $titre = "Nouveau Client";

        $tableau_annee = array();
        for($i = 0; $i < 30; $i++)
            $tableau_annee[] = date("Y", strtotime('-'. $i .' years'));
        $liste_marque = Marque::all();
        $liste_modele = Modele::all();
        return view('clients.nouveau_client',compact('titre','tableau_annee','liste_marque','liste_modele'));
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
        $tableau_annee = array();
        for($i = 0; $i < 30; $i++)
            $tableau_annee[] = date("Y", strtotime('-'. $i .' years'));
        $les_clients = Client::all();
        $liste_marque = Marque::all();
        $liste_modele = Modele::all();
        return view('vehicules.nouveau_vehicule',compact('titre','tableau_annee','les_clients','liste_modele','liste_marque'));
    }
    public function liste_vehicules_garage(){
        $titre = "Liste vehicules dans le garage";
//        $les_voitures = Vehicule::all();
        $les_visites_pas_sur_rendu = Visite::where('etat','!=','rendu')->get();
        return view('vehicules.liste_vehicules_garage',compact('titre','les_visites_pas_sur_rendu'));
    }
    public function liste_vehicules_client(int $id_client){
        $titre = "Liste vehicules client";
        $le_client = Client::findorfail($id_client);
        $les_vehicules = $le_client->vehicules;
        return view('vehicules.liste_vehicules_client',compact('titre','le_client','les_vehicules'));
    }
    public function editer_vehicule(int $id_vehicule,$id_visite=null){

        $tableau_annee = array();
        for($i = 0; $i < 30; $i++)
            $tableau_annee[] = date("Y", strtotime('-'. $i .' years'));

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
        $liste_marque = Marque::all();
        $liste_modele = Modele::all();
        return view('vehicules.editer_vehicule',compact('titre','id_visite','infos_vehicule','infos_visite','tableau_annee','liste_marque','liste_modele'));
    }

    public function get_model($nom_model){
        $listes = Modele::where('marque_parente','=',$nom_model)->get();
        $liste_modele = [];
        foreach ($listes as $item_model){
            $liste_modele[] = $item_model['modele'];
        }
        return $liste_modele;
    }
//=================devis_rapide
    public function devis_rapide(){

        $titre = "Devis rapide";
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
        $total_entree = FluxArgent::where("flux",'=','entree')->sum('montant');
        $total_sortie = FluxArgent::where("flux",'=','sortie')->sum('montant');
        return view('comptabilite.bilan_comptable',compact('titre','bilan','total_entree','total_sortie'));
    }

    public function details_flux_argent_du_mois($mois_a_afficher){
        $titre = "HISTORIQUE DES FLUX DU MOIS : $mois_a_afficher";
        $total_entree = FluxArgent::where("date_hebdo",'=',$mois_a_afficher)->where("flux",'=','entree')->sum('montant');
        $total_sortie = FluxArgent::where("date_hebdo",'=',$mois_a_afficher)->where("flux",'=','sortie')->sum('montant');
        $bilan_du_mois = FluxArgent::where('date_hebdo','=',$mois_a_afficher)->get();
        return view('comptabilite.bilan_comptable_du_mois',compact('titre','bilan_du_mois','mois_a_afficher','total_entree','total_sortie'));
    }


    #=============================
    public function gestion_utilisateur(){
        $titre = "GESTION DES UTILISATEURS";
        $liste_utilisateur = User::all();
        return view('liste_utilisateurs',compact('liste_utilisateur'));
    }
}
