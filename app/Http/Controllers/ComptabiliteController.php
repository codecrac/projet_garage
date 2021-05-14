<?php

namespace App\Http\Controllers;

use App\Models\BilanComptable;
use App\Models\FluxArgent;
use App\Models\Visite;
use Illuminate\Http\Request;

class ComptabiliteController extends Controller
{
    public function enregistrer_flux_argent(Request $request){
        $df = $request->except('token');

        $date_hebdo = date('m-Y',strtotime($df['date']));


        $le_flux = new FluxArgent();
        $le_flux->date = $df['date'];
        $le_flux->date_hebdo = $date_hebdo;
        $le_flux->montant = $df['montant'];
        $le_flux->motif = $df['motif'];
        $le_flux->flux = $df['flux'];
        $le_flux->id_vehicule_concerner = $df['id_vehicule_concerner'];



        if($le_flux->save()){

            $date_hebdo = date('m-Y',strtotime($df['date']));
            $bilan = BilanComptable::find($date_hebdo);
            if($bilan == null){
                $bilan = new BilanComptable();
                $bilan->mois_reference = $date_hebdo;
                $bilan->mois_a_afficher = $date_hebdo;
                $bilan->total_depense = 0;
                $bilan->total_entree = 0;
            }

            if($le_flux->flux !='entree'){
                $bilan->total_depense += $le_flux->montant;
            }else{
                $bilan->total_entree += $le_flux->montant;
            }
            $bilan->save();

            $notif = "<div class='alert alert-primary text-center'> Enregistrement effectuer avec succes </div>";
        }else{
            $notif = "<div class='alert alert-danger'> Echec de l'operation </div>";
        }
        return redirect()->route('nouveau_flux')->with('notification',$notif);
    }

    public function enregistrer_versement_facture(Request $request, $id_visite)
    {

        $la_visite = Visite::findorfail($id_visite);


        $notif = "<div class='alert alert-danger'> Echec de l'operation </div>";


        $df = $request->all();
        $date_versement = $df['date_versement'];
        $montant = $df['montant'];
        $mode_de_paiement = $df['mode_de_paiement'];

        //le flux entrant
        $date_hebdo = date('m-Y',strtotime($date_versement));
        $le_flux = new FluxArgent();
        $le_flux->date = $date_versement;
        $le_flux->date_hebdo = $date_hebdo;
        $le_flux->montant = $montant;
        $le_flux->motif = "Versement pour reparation du vehicule ".$la_visite->vehicule->immatriculation." deposé le ". $la_visite->date;
        $le_flux->flux = "entree";
        $le_flux->id_vehicule_concerner = $la_visite->id_vehicule;

        if($le_flux->save()){
//   FIN le flux entrant

            //LE BILAN COMPTABLE
            $date_hebdo = date('m-Y',strtotime($date_versement));
            $bilan = BilanComptable::find($date_hebdo);
            if($bilan == null){
                $bilan = new BilanComptable();
                $bilan->mois_reference = $date_hebdo;
                $bilan->mois_a_afficher = $date_hebdo;
                $bilan->total_depense = 0;
                $bilan->total_entree = 0;
            }

            $bilan->total_entree += $le_flux->montant;
            if($bilan->save()){
                // FIN LE BILAN COMPTABLE

                //LE VERSEMENT
                $le_versement = [
                    'date_versement'=>$date_versement,
                    'montant'=>$montant,
                    'mode_de_paiement'=>$mode_de_paiement,
                    'id_flux_entree'=>$le_flux->id,
                    'mois_reference_bilan'=>$bilan->mois_a_afficher,
                ];

                $liste_versement = json_decode($la_visite->versements);

                if($liste_versement ==null){
                    $liste_versement =[];
                }

                array_push($liste_versement,$le_versement);
                $la_visite->versements = $liste_versement;
                $la_visite->total_versements += $df['montant'];
                $la_visite->reste_a_payer -= $df['montant'];

                if($la_visite->save()){
                    $notif = "<div class='alert alert-primary text-center'> Enregistrement effectuer avec succes </div>";
                }
            }

        }
        return redirect()->route('versements_facture',[$id_visite])->with('notification',$notif);


    }

    public function supprimer_versement_facture($id_visite,$index_versement){
        $la_visite = Visite::findorfail($id_visite);
        $liste_versement = json_decode($la_visite->versements);
        $le_versement = $liste_versement[$index_versement];

            //EFFACER LE FLUX
            $id_flux_entree = $le_versement->id_flux_entree;
            $mois_reference_bilan = $le_versement->mois_reference_bilan;
//            dd($id_flux_entree);
            $le_flux = FluxArgent::find($id_flux_entree);

            $notif = "<div class='alert alert-danger'> Echec de l'operation </div>";
            if($le_flux->delete()){
                //METTRE A JOUR[RETIRER LE MONTANT DU FLUX] LE BILAN
//                dd($mois_reference_bilan);
                $bilan = BilanComptable::find($mois_reference_bilan);
                $bilan->total_entree -= $le_versement->montant;
                if($bilan->save()){

                    //EFFACER LE VERSEMENT
                    array_splice($liste_versement,$index_versement,1);

                    $la_visite->total_versements = $la_visite->total_versements - $le_versement->montant;
                    $la_visite->reste_a_payer = $la_visite->reste_a_payer + $le_versement->montant;
                    $la_visite->versements = $liste_versement;
                    if($la_visite->save()){
                        $notif = "<div class='alert alert-primary text-center'> Enregistrement effectuer avec succes </div>";
                    }
                }
            }else{
                $notif = "<div class='alert alert-danger'> Echec de l'operation </div>";
            }
        return redirect()->route('versements_facture',[$id_visite])->with('notification',$notif);
    }

}
