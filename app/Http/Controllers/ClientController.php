<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Visite;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function enregistrer_client(Request $request){
        $donnees_formulaire = $request->all();

//        =============ENREGISTRER LE CLIENT
        $nom = $donnees_formulaire['nom'];
        $telephone = $donnees_formulaire['telephone'];
        $email = $donnees_formulaire['email'];
        $localisation = $donnees_formulaire['localisation'];
        $localisation_interieur = $donnees_formulaire['localisation_interieur'];
        if($localisation_interieur!=null){
            $localisation = $localisation_interieur;
        }

        $created_at = date("Y-m-d");
        $updated_at = date("Y-m-d") ;

        $le_client = new Client();
        $le_client->nom = $nom;
        $le_client->telephone = $telephone;
        $le_client->email = $email;
        $le_client->localisation = $localisation;
        $le_client->created_at = $created_at;
        $le_client->updated_at = $updated_at;

        if($le_client->save()){
            echo "enregistrement client effectuer <br/>";
        }

//        =============ENREGISTRER LE vehicule

        $id_client = $le_client->id;
        $marque = $donnees_formulaire['marque'];
        $model = $donnees_formulaire['model'];
        $annee = $donnees_formulaire['annee'];
        $energie = $donnees_formulaire['energie'];
        $immatriculation = $donnees_formulaire['immatriculation'];
        $numero_chassis = $donnees_formulaire['numero_chassis'];


        $le_vehicule = new Vehicule();
        $le_vehicule->id_client = $id_client;
        $le_vehicule->id_marque = $marque;
        $le_vehicule->id_model = $model;
        $le_vehicule->annee = $annee;
        $le_vehicule->energie = $energie;
        $le_vehicule->immatriculation = $immatriculation;
        $le_vehicule->numero_chassis = $numero_chassis;


        if($le_vehicule->save()){
            echo "enregistrement le_vehicule effectuer <br/>";
        }

//        =============ENREGISTRER LA VISITE
        $id_vehicule = $le_vehicule->id;
        $motif_garage = $donnees_formulaire['motif_garage'];
        $date_visite_technique = $donnees_formulaire['date_visite_technique'];
        $date_prochaine_visite_technique = $donnees_formulaire['date_prochaine_visite_technique'];

        $la_visite = new Visite();
        $la_visite->id_vehicule = $id_vehicule;
        $la_visite->id_client = $id_client;
        $la_visite->date = $date_visite_technique;
        $la_visite->date_prochaine_visite = $date_prochaine_visite_technique;
        $la_visite->motif = $motif_garage;


        if($la_visite->save()){
            echo "enregistrement LE VISITE effectuer <br/>";
            $id_visite = $la_visite->id;
           return redirect()->route('editer_vehicule',[$id_vehicule,$id_visite]);
        }

//        dd($donnees_formulaire);
    }

    public function modifier_client(Request $request,$id_client){
        $donnees_formulaire = $request->all();

//        =============ENREGISTRER LE CLIENT
        $nom = $donnees_formulaire['nom'];
        $telephone = $donnees_formulaire['telephone'];
        $email = $donnees_formulaire['email'];
        $localisation = $donnees_formulaire['localisation'];
        $localisation_interieur = $donnees_formulaire['localisation_interieur'];
        if($localisation_interieur!=null){
            $localisation = $localisation_interieur;
        }
        $updated_at = date("Y-m-d") ;

        $le_client = Client::findorfail($id_client);
        $le_client->nom = $nom;
        $le_client->telephone = $telephone;
        $le_client->email = $email;
        $le_client->localisation = $localisation;
        $le_client->updated_at = $updated_at;

        if($le_client->save()){
            echo "enregistrement client effectuer <br/>";
           return redirect()->route('editer_client',[$id_client]);
        }

//        dd($donnees_formulaire);
    }

    public function supprimer_client($id_client){
        $le_client = Client::findorfail($id_client);
        if ($le_client->delete()){
            return redirect()->route('liste_client');
        }else{
            echo "echec";
        }
    }

}
