<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Visite;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function enregistrer_vehicule(Request $request){
            $donnees_formulaire = $request->all();

//        =============ENREGISTRER LE vehicule
        $id_client = $donnees_formulaire['id_client'];
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
            $la_visite->date = $date_visite_technique;
            $la_visite->date_prochaine_visite = $date_prochaine_visite_technique;
            $la_visite->motif = $motif_garage;


            if($la_visite->save()){
                $notif = "<div class='alert alert-primary text-center'> Enregistrement effectuer avec succes </div>";
            }
            else{
                $notif = "<div class='alert alert-danger'> Echec de l'operation </div>";
            }

            return redirect()->route('nouveau_vehicule')->with("notification",$notif);

//        dd($donnees_formulaire);
        }

    public function supprimer_vehicule($id_vehicule,$id_client){
        $le_vehicule = Vehicule::findorfail($id_vehicule);


        if($le_vehicule->delete()){
            $notif = "<div class='alert alert-primary text-center'> Enregistrement effectuer avec succes </div>";
        }
        else{
            $notif = "<div class='alert alert-danger'> Echec de l'operation </div>";
        }
        return redirect()->route('liste_vehicules_client',[$id_client])->with('notification',$notif);
    }
}
