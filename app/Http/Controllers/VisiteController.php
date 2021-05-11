<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller
{
    public function changer_etat_visite(Request $request,$id_vehicule,$id_visite){
        $donnees_formulaire = $request->all();

        $etat = $donnees_formulaire['etat_travaux'];
        $le_vehicule = Visite::findorfail($id_vehicule);

        $le_vehicule->etat = $etat;

        if($le_vehicule->save()){
            return redirect()->route("editer_vehicule",[$id_vehicule,$id_visite]);
        }else{
            echo "pb";
        }
    }

    public function modifier_informations_voitures(Request $request,$id_vehicule,$id_visite){
        $donnees_formulaire = $request->all();

        $marque = $donnees_formulaire['marque'];
        $model = $donnees_formulaire['model'];
        $annee = $donnees_formulaire['annee'];
        $energie = $donnees_formulaire['energie'];
        $immatriculation = $donnees_formulaire['immatriculation'];
        $numero_chassis = $donnees_formulaire['numero_chassis'];


        $le_vehicule = Vehicule::findorfail($id_vehicule);

        $le_vehicule->id_marque = $marque;
        $le_vehicule->id_model = $model;
        $le_vehicule->annee = $annee;
        $le_vehicule->energie = $energie;
        $le_vehicule->immatriculation = $immatriculation;
        $le_vehicule->numero_chassis = $numero_chassis;


        if($le_vehicule->save()){
            return redirect()->route("editer_vehicule",[$id_vehicule,$id_visite]);
        }else{
            echo "pb";
        }
    }

    public function modifier_etat_des_lieux(Request $request,int $id_vehicule,int $id_visite){
        $df = $request->all();
        $la_visite = Visite::find($id_visite);
        if($la_visite==null){
            $la_visite = new Visite();
            $la_visite->id_vehicule = $id_vehicule;
        }

        $date_visite = $df['date_visite_technique'];
        $date_prochaine_visite = $df['date_prochaine_visite_technique'];
        $motif_garage = $df['motif_garage'];

        $liste_objet = [];
        $nombre_objet = sizeof($df['objet']);
        for ($i=0;$i<$nombre_objet;$i++){
            $objet = $df['objet'][$i];
            $quantite = $df['quantite'][$i];
            $etat = $df['etat'][$i];
            $observation = $df['observation'][$i];

            $objet = [
                'objet' => $objet,
                'quantite' => $quantite,
                'etat' => $etat,
                'observation' => $observation
            ];

            array_push($liste_objet,$objet);
        }
        $etat_des_lieux =json_encode($liste_objet);


        $la_visite->date = $date_visite;
        $la_visite->date_prochaine_visite = $date_prochaine_visite;
        $la_visite->motif = $motif_garage;
        $la_visite->etat_des_lieux = $etat_des_lieux;
        if($la_visite->save()){
            $id_visite = $la_visite->id;
            return redirect()->route("editer_vehicule",[$id_vehicule,$id_visite]);
        }else{
            echo "pb";
        }
    }

    public function modifier_travaux_effectues(Request $request,int $id_vehicule,int $id_visite){
        $df = $request->all();
        $la_visite = Visite::find($id_visite);
        if($la_visite==null){
            $la_visite = new Visite();
            $la_visite->id_vehicule = $id_vehicule;
        }

        $liste_objet = [];
        $nombre_objet = sizeof($df['objet']);
        for ($i=0;$i<$nombre_objet;$i++){
            $objet = $df['objet'][$i];
            $quantite = $df['quantite'][$i];
            $etat = $df['etat'][$i];

            $objet = [
                'objet' => $objet,
                'quantite' => $quantite,
                'etat' => $etat,
            ];

            array_push($liste_objet,$objet);
        }
        $travaux =json_encode($liste_objet);
        $la_visite->travaux = $travaux;
        if($la_visite->save()){
            $id_visite = $la_visite->id;
            return redirect()->route("editer_vehicule",[$id_vehicule,$id_visite]);
        }else{
            echo "pb";
        }
    }

    public function modifier_facture(Request $request,int $id_vehicule,int $id_visite){
        $df = $request->all();
        $la_visite = Visite::find($id_visite);
        if($la_visite==null){
            $la_visite = new Visite();
            $la_visite->id_vehicule = $id_vehicule;
        }

        $liste_objet = [];
        $main_doeuvre = $df['main_doeuvre'];
        $total_travaux = $df['total_travaux'];

        $nombre_objet = sizeof($df['objet']);
        $nombre_objet = sizeof($df['objet']);
        for ($i=0;$i<$nombre_objet;$i++){
            $objet = $df['objet'][$i];
            if(!empty($objet)){
                $prix_unitaire = $df['prix_unitaire'][$i];
                $quantite_pour_facture = $df['quantite_pour_facture'][$i];
                $prix_total = $df['prix_total'][$i];

                $objet = [
                    'objet' => $objet,
                    'prix_unitaire' => $prix_unitaire,
                    'quantite_pour_facture' => $quantite_pour_facture,
                    'prix_total' => $prix_total,
                ];

                array_push($liste_objet,$objet);
            }
        }
        $facture =json_encode($liste_objet);

        $la_visite->factures = $facture;
        $la_visite->main_doeuvre = $main_doeuvre;
        $la_visite->total_travaux = $total_travaux;

        if($la_visite->save()){
            $id_visite = $la_visite->id;
            $notif = "<div class='alert alert-primary text-center'> Enregistrement effectuer avec succes </div>";
        }else{
            $notif = "<div class='alert alert-danger'> Echec de l'operation </div>";
        }
        return redirect()->route("editer_vehicule",[$id_vehicule,$id_visite])->with('notification',$notif);
    }
}
