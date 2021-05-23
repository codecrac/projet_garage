@extends('includes')

@section('style_complementaire')
    <style>
        .active{
            border: 2px solid red;
        }
        #chargement_en_cours{
            display: none;
            color: red;
        }
    </style>
@endsection

@section('content')


    <!--************a cloner*************-->
    <!--************a cloner*************-->
    <!--************a cloner*************-->
    <!--************a cloner*************-->
    <div class="hidden" style="display: none">
        <table>
            <tbody>
            <tr id="la_ligne_etat_des_lieux">
                <td>
                    <input class="form-control" autocomplete="off" list="liste_objet" type="text" name="objet[]" required/>
                </td>
                <td>
                    <input class="form-control quantite" autocomplete="off"  type="number" name="quantite[]" required />
                </td>
                <td>
                    <select class="form-control etat" type="number" name="etat[]" required>
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                    </select>
                </td>
                <td>
                    <input  class="form-control observation" autocomplete="off"  type="text" name="observation[]" required/>
                </td>
            </tr>
            <tr id="la_ligne_fiche">
                <td>
                    <input class="form-control" autocomplete="off" list="liste_objet_fiche" type="text" name="objet[]" required/>
                </td>
                <td>
                    <input class="form-control quantite" autocomplete="off"  type="number" name="quantite[]" required />
                </td>
                <td>
                    <input class="form-control" autocomplete="off" list="liste_etat_fiche" type="text" name="etat[]" required/>
                </td>
            </tr>
            <tr id="la_ligne_facture">
                <td>
                    <input class="form-control" type="text" name="objet[]"/>
                </td>
                <td>
                    <input class="form-control prix_unitaire " type="text" name="prix_unitaire[]"  required/>
                </td>
                <td>
                    <input class="form-control quantite_pour_facture" type="text" name="quantite_pour_facture[]"  required/>
                </td>
                <td>
                    <input readonly class="form-control prix_total" type="text" name="prix_total[]" required/>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--************//a cloner*************-->
    <!--************//a cloner*************-->
    <!--************//a cloner*************-->

{{--=============================DATA LIST=============================--}}
<datalist id="liste_objet">
    <option value="Crick[manivelle]">
    <option value="Clé de roue">
    <option value="Enjoliver">
    <option value="Bouchons de roue">
    <option value="Pieces du vehicules">
    <option value="Rétroiviseur exterieur">
    <option value="Rétroiviseur interieur">
    <option value="Feu d'aille">
    <option value="Feu arriere">
    <option value="Phare">
    <option value="Pare-brise arriere">
    <option value="Pare-brise avant">
    <option value="Signe distinctif">
    <option value="Climatisation">
    <option value="Check moteur">
    <option value="Abs">
    <option value="Airbag">
</datalist>

<datalist id="liste_objet_fiche">
    <option value="Rotule">
    <option value="Biellette de crémaillère">
    <option value="Embout de crémaillère">
    <option value="Bras de suspension">
    <option value="Amortisseur arrière">
    <option value="Robot avant">
    <option value="Silentbloc de barre stabilisatrice arrière">
    <option value="Silentbloc de tirant arrière">
    <option value="Disque de roue avant">
    <option value="Tambour arrière">
    <option value="KIT de garniture arrière">
    <option value="Câble de frein à main">
    <option value="Soufflet de crémaillère">
    <option value="Etrier">
    <option value="Electricité">
    <option value="Parallélisme et réglage de phare">
</datalist>

<datalist id="liste_etat_fiche">
    <option value="changé">
    <option value="Reparé">
</datalist>
{{--=============================DATA LIST=============================--}}


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <td class="btn btn-dark section_info option">
                            <a onclick="changer_section('section_info')"> <button class="btn btn-dark"> INFORMATIONS </button></a>
                        </td>
                        <td class="section_etat_des_lieux option">
                            <a onclick="changer_section('section_etat_des_lieux')"> <button class="btn btn-dark"> ETATS DES LIEUX </button> </a>
                        </td>
                        <td class="section_fiche option">
                            <a onclick="changer_section('section_fiche')">
                                <button class="btn btn-dark"> TRAVAUX EFFECTUES </button>
                            </a>
                        </td>
                        <td class="section_facture option">
                            <a  onclick="changer_section('section_facture')">
                                <button class="btn btn-dark"> DEVIS/FACTURES </button>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- Column -->
            {!! \Illuminate\Support\Facades\Session::get('notification',"") !!}
{{--            ======================ETAT AVANCEMENT TRAVAUX=====================--}}
            <div class="col-md-2">
                <h3>Etat des travaux</h3>
                <form method="post" action="{{route('changer_etat_visite',[$infos_vehicule->id,$infos_visite->id])}}">
                    <select class="form-select shadow-none p-0 border-0 form-control-line" name="etat_travaux">
                        <option>{{$infos_visite->etat}}</option>
                        <option value="Non Debuter">Non Debuter</option>
                        <option value="En cours">En cours</option>
                        <option value="Terminer">Terminer</option>
                        <option value="rendu">rendu</option>
                    </select>
                    <br/>
                    @csrf
                    <button class="btn btn-success">Enregistrer</button>
                </form>
            </div>

{{--=====================--PARTIE QUI SWITCH--=====================--}}

{{--            ======================INFORMATIONS VEHICULES=====================--}}
            <div class="col-lg-8 col-xlg-9 col-md-12 section" id="section_info" >
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('liste_vehicules_client',[$infos_vehicule->id_client])}}" class="btn btn-default text-black">RETOUR</a>
                        <br>
                            <h3 class="text-uppercase pb-4 pt-4">INFORMATIONS VEHICULE</h3>
                        <form class="form-horizontal form-material" method="post" action="{{route('modifier_informations_voitures',[$infos_vehicule->id,$infos_visite->id])}}">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Marque</label>
                                    <div class="col-md-12 border-bottom p-0">

                                        <datalist id="liste_marque">
                                            @foreach( $liste_marque as $item_marque )
                                                <option value="{{$item_marque->constructeur}}"> {{$item_marque->constructeur}} </option>
                                            @endforeach
                                        </datalist>

                                        <input type="text" list="liste_marque" id="marque_choisie" name="marque" autocomplete="off" class="form-control p-0 border-0" value="{{$infos_vehicule->id_marque}}" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="example-email" class="col-md-12 p-0">Model</label>
                                    <div class="col-md-12 border-bottom p-0">

                                        <datalist id="liste_modele">
                                        </datalist>

                                        <div class="col-md-12 border-bottom p-0">
                                            <span id="chargement_en_cours" style="color: red"> Chargement des suggestions de model</span>
                                            <input type="text" list="liste_modele" id="input_modele" value="{{$infos_vehicule->id_model}}" autocomplete="off"  placeholder="Entrer un Modele" name="model" class="form-control p-0 border-0" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="example-email" class="col-md-12 p-0">Annee</label>
                                    <div class="col-md-12 border-bottom p-0">
{{--                                        <input type="text" placeholder="2018" max="17" min="17" value="{{$infos_vehicule->annee}}" class="form-control p-0 border-0" name="annee">--}}
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="annee">
                                            <option value="{{$infos_vehicule->annee}}"> {{$infos_vehicule->annee}} </option>
                                            @foreach( $tableau_annee as $item_annee )
                                                <option value="{{$item_annee}}"> {{$item_annee}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="example-email" class="col-md-12 p-0">Energie</label>
                                    <div class="col-md-12 border-bottom p-0">
{{--                                        <input type="text" placeholder="Gasoil" max="17" min="17"value="{{$infos_vehicule->energie}}" class="form-control p-0 border-0" name="energie">--}}
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="energie">
                                            <option valuw="{{$infos_vehicule->energie}}"> {{$infos_vehicule->energie}} </option>
                                            <option value="essence"> Essence </option>
                                            <option value="diesel"> Diesel </option>
                                            <option value="hybride"> Hybride </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Immatriculation</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="00JKHDJKD" class="form-control p-0 border-0" name="immatriculation" value="{{$infos_vehicule->immatriculation}}">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">No de Chassis</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="12354578909090905" max="17" min="17" class="form-control p-0 border-0" name="numero_chassis" value="{{$infos_vehicule->numero_chassis}}">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        @csrf
                                        <button class="btn btn-success">Enregistrer information</button>
                                    </div>
                                </div>
                                {{--<div class="row py-2">
                                    <input class="form-control btn btn-info" type="submit" name="telecharger_en_pdf" value="Telecharger en pdf">
                                </div>--}}
                            </form>
                    </div>
                </div>
            </div>
{{--            ======================ETAT DES LIEUX=====================--}}
{{--            ======================ETAT DES LIEUX=====================--}}
{{--            ======================ETAT DES LIEUX=====================--}}
            <div class="col-lg-8 col-xlg-9 col-md-12 section" id="section_etat_des_lieux">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('liste_vehicules_client',[1])}}" class="btn btn-default text-black">RETOUR</a>
                        <br>
                        <div class="row">
                            <div class="col-md-5">
                                <h3 class="text-uppercase pb-4 pt-4"> ETAT DES LIEUX</h3>
                            </div>
                            <div class="col-md-7">
                                <h3 class="text-uppercase pb-4 pt-4">
                                    @if($infos_visite->etat_des_lieux!=null)
                                        <a class="form-control btn btn-info text-white" target="_blank" href="{{route('etat_des_lieux_visite_pdf',[$infos_visite->id])}}" > Telecharger Etat des lieux</a>
                                    @endif
                                </h3>
                            </div>
                        </div>

                            <form class="form-horizontal form-material" method="post" action="{{route('modifier_etat_des_lieux',[$infos_vehicule->id,$infos_visite->id])}}">

                                <div class="row">
                                    <label>Immatriculation</label><br/>
                                    <input class="form-control" type="text" name="immatriculation" value="{{$infos_vehicule->immatriculation}}" required/>
                                    <br/>

                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Date visite</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                @if($infos_visite!=null)
                                                <input type="date" placeholder="123 456 7890" required class="form-control p-0 border-0" name="date_visite_technique" value="{{$infos_visite->date}}">
                                                @else
                                                    <input type="date" placeholder="123 456 7890" required class="form-control p-0 border-0" name="date_visite_technique">
                                                @endif
                                            </div>
                                        </div>
                                </div>

                                <div class="py-4">
                                    <table class="table table-bordered">
                                        <thead>
                                        <th>Désignation</th>
                                        <th>Quantite</th>
                                        <th>Etat</th>
                                        <th>Observation</th>
                                        </thead>

                                        <tbody id="le_corps_de_la_table_etat_des_lieux">
                                            @if($infos_visite->etat_des_lieux ==null)
                                               <tr>
                                            <td>
                                                <input class="form-control" autocomplete="off" list="liste_objet" type="text" name="objet[]" required/>
                                            </td>
                                            <td>
                                                <input class="form-control quantite" autocomplete="off"  type="number" name="quantite[]" required />
                                            </td>
                                            <td>
                                                <select class="form-control etat" type="number" name="etat[]" required>
                                                    <option value="Present">Present</option>
                                                    <option value="Absent">Absent</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input  class="form-control observation" autocomplete="off"  type="text" name="observation[]" />
                                            </td>
                                        </tr>
                                            @else
                                                @php
                                                    $liste_objet = json_decode($infos_visite->etat_des_lieux);
                                                    $i=0;
                                                    foreach ($liste_objet as $item_objet):
                                                @endphp
                                                  <tr>
                                                    <td>
                                                        <input class="form-control" autocomplete="off" list="liste_objet" value="{{$item_objet->objet}}" type="text" name="objet[]"/>
                                                    </td>
                                                    <td>
                                                        <input class="form-control quantite" autocomplete="off"  type="number" value="{{$item_objet->quantite}}" name="quantite[]" required />
                                                    </td>
                                                    <td>
                                                        <select class="form-control etat" type="number" name="etat[]" required>
                                                            <option value="Present">{{$item_objet->etat}}</option>
                                                            <option value="Present">Present</option>
                                                            <option value="Absent">Absent</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input  class="form-control observation" autocomplete="off"  type="text" name="observation[]" value="{{$item_objet->observation}}" required/>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                    endforeach;
                                                @endphp
                                            @endif
                                        </tbody>
                                    </table>


                                    <div class="col-12 text-center">
                                        <a class="btn btn-info" onclick="addNewRow('etat_des_lieux')">+</a>
                                        <a class="btn btn-danger" onclick="removeLastRow('etat_des_lieux')">-</a>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Kilometrage</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder="123" class="form-control p-3" name="kilometrage" value="{{$infos_visite->kilometrage}}">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Niveau de Carburant</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder="123" class="form-control p-3" name="niveau_carburant" value="{{$infos_visite->niveau_carburant}}">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Motif garage</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea rows="5" class="form-control p-0 border" name="motif_garage">{{$infos_visite->motif}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Date prochaine viste technique</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="date" placeholder="123 456 7890" class="form-control p-0 border-0" name="date_prochaine_visite_technique" value="{{$infos_visite->date_prochaine_visite}}">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-sm-12 text-center">
                                        @csrf
                                        <button class="btn btn-success">Enregistrer ETAT DES LIEUX</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
{{--            ======================FICHE TECHNIQUE [TRAVAUX]=====================--}}
{{--            ======================FICHE TECHNIQUE [TRAVAUX]=====================--}}
{{--            ======================FICHE TECHNIQUE [TRAVAUX]=====================--}}
            <div class="col-lg-8 col-xlg-9 col-md-12 section" id="section_fiche">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('liste_vehicules_client',[1])}}" class="btn btn-default text-black">RETOUR</a>
                        <br>

                        <div class="row">
                            <div class="col-md-5">
                                <h3 class="text-uppercase pb-4 pt-4"> TRAVAUX EFFECTUES</h3>
                            </div>
                            <div class="col-md-7">
                                <h3 class="text-uppercase pb-4 pt-4">
                                    @if($infos_visite->travaux!=null)
                                        <a class="form-control btn btn-info text-white" target="_blank" href="{{route('travaux_visite_pdf',[$infos_visite->id])}}" > Telecharger la fiche technique</a>
                                    @endif
                                </h3>
                            </div>
                        </div>


                        <div class="row">
                            <label>Immatriculation</label><br/>
                            <input class="form-control" type="text" name="immatriculation" placeholder="YU 908 848" required/>
                            <br/>
                            <label>Date</label><br/>
                            @if($infos_visite!=null)
                            <input class="form-control" type="date" name="date_facture" value="{{$infos_visite->date}}" readonly/>
                            @else
                                <input type="date" placeholder="123 456 7890" required class="form-control p-0 border-0" name="date_visite_technique">
                            @endif
                        </div>

                        <form class="form-horizontal form-material" method="post" action="{{route('modifier_travaux_effectues',[$infos_vehicule->id,$infos_visite->id])}}">

                        <div class="py-4">
                                <table class="table table-bordered">
                                    <thead>
                                    <th>Désignation</th>
                                    <th>Quantite</th>
                                    <th>Etat</th>
                                    </thead>

                                    <tbody id="le_corps_de_la_table_fiche">
                                    @if($infos_visite->travaux ==null)
                                        <tr>
                                        <td>
                                            <input class="form-control" autocomplete="off" list="liste_objet_fiche" type="text" name="objet[]" required/>
                                        </td>
                                        <td>
                                            <input class="form-control quantite" autocomplete="off"  type="number" name="quantite[]" required />
                                        </td>
                                        <td>
                                            <input class="form-control" autocomplete="off" list="liste_etat_fiche" type="text" name="etat[]" required/>
                                        </td>
                                    </tr>
                                    @else
                                        @php
                                            $liste_objet = json_decode($infos_visite->travaux);
                                            $i=0;
                                            foreach ($liste_objet as $item_objet):
                                        @endphp
                                        <tr>
                                            <td>
                                                <input class="form-control" autocomplete="off" list="liste_objet" value="{{$item_objet->objet}}" type="text" name="objet[]" required/>
                                            </td>
                                            <td>
                                                <input class="form-control quantite" autocomplete="off"  type="number" value="{{$item_objet->quantite}}" name="quantite[]" required />
                                            </td>
                                            <td>
                                                <select class="form-control etat" type="number" name="etat[]" required>
                                                    <option value="Present">{{$item_objet->etat}}</option>
                                                    <option value="Present">Changé</option>
                                                    <option value="Absent">Retiré</option>
                                                </select>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                            endforeach;
                                        @endphp
                                    @endif
                                    </tbody>
                                </table>
                                <div class="col-12 text-center">
                                    <a class="btn btn-info" onclick="addNewRow('fiche')">+</a>
                                    <a class="btn btn-danger" onclick="removeLastRow('fiche')">-</a>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-sm-12 text-center">
                                    @csrf
                                    <button class="btn btn-success">Enregistrer fiche technique</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
{{--            ======================FACTURES=====================--}}
{{--            ======================FACTURES=====================--}}
{{--            ======================FACTURES=====================--}}
            <div class="col-lg-8 col-xlg-9 col-md-12 section" id="section_facture">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('liste_vehicules_client',[1])}}" class="btn btn-default text-black">RETOUR</a>
                        <br>
                        <div class="row">
                            <div class="col-md-5">
                                <h3 class="text-uppercase pb-4 pt-4">
                                    FACTURES
                                </h3>
                            </div>
                            <div class="col-md-5">
                                <h3 class="text-uppercase pb-4 pt-4">
                                    @if($infos_visite->factures!=null)
                                        <a class="form-control btn btn-info text-white" target="_blank" href="{{route('facture_visite_pdf',[$infos_visite->id])}}" > Telecharger facture en pdf </a>
                                    @endif
                                </h3>
                            </div>
                        </div>
                        <form class="form-horizontal form-material" method="post" action="{{route('modifier_facture',[$infos_vehicule->id,$infos_visite->id])}}">
                        <div class="row">
                                <label>Immatriculation</label><br/>
                                <input class="form-control" type="text" name="immatriculation" placeholder="YU 908 848" readonly/>
                                <br/>
                                <label>Date</label><br/>
                                @if($infos_visite!=null)
                                    <input class="form-control" type="date" name="date_visite_technique" value="{{$infos_visite->date}}" required/>
                                @else
                                    <input type="date" placeholder="123 456 7890" required class="form-control p-0 border-0" name="date_visite_technique">
                                @endif
                            </div>
                            <div class="py-4">
                                <table class="table table-bordered">
                                    <thead>
                                    <th>DESIGNATION</th>
                                    <th>Prix unitaire</th>
                                    <th>Quantite</th>
                                    <th>Montant</th>
                                    </thead>

                                    <tbody id="le_corps_de_la_table_facture">
                                    @if($infos_visite->factures==null)
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" autocomplete="off" name="objet[]" required/>
                                            </td>
                                            <td>
                                                <input class="form-control prix_unitaire" type="number" name="prix_unitaire[]" id="prix_unitaire_0" onkeyup="calcul_prix_total_ditem('0')"  required/>
                                            </td>
                                            <td>
                                                <input class="form-control quantite_pour_facture" type="number" name="quantite_pour_facture[]" id="quantite_pour_facture_0" onkeyup="calcul_prix_total_ditem('0')" required />
                                            </td>
                                            <td>
                                                <input readonly class="form-control prix_total" type="number" name="prix_total[]" id="prix_total_0" onkeyup="calcul_prix_total_ditem('0')"  required/>
                                            </td>
                                        </tr>
                                    @else
                                        @php
                                            $liste_facture = json_decode($infos_visite->factures);
                                            $i=0;
                                            foreach ($liste_facture as $item_facture):
                                        @endphp
                                        <tr>
                                        <td>
                                            <input class="form-control" type="text" name="objet[]" value="{{$item_facture->objet}}"/>
                                        </td>
                                        <td>
                                            <input value="{{$item_facture->prix_unitaire}}" class="form-control prix_unitaire" type="number" name="prix_unitaire[]" id="prix_unitaire_{{$i}}" onkeyup="calcul_prix_total_ditem({{$i}})"  onchange="calcul_prix_total_ditem({{$i}})" required/>
                                        </td>
                                        <td>
                                            <input value="{{$item_facture->quantite_pour_facture}}" class="form-control quantite_pour_facture" type="number" name="quantite_pour_facture[]" id="quantite_pour_facture_{{$i}}" onkeyup="calcul_prix_total_ditem({{$i}})"  onchange="calcul_prix_total_ditem({{$i}})"required />
                                        </td>
                                        <td>
                                            <input value="{{$item_facture->prix_total}}" readonly class="form-control prix_total" type="number" name="prix_total[]" id="prix_total_{{$i}}" onkeyup="calcul_prix_total_ditem({{$i}})"  onchange="calcul_prix_total_ditem({{$i}})" required/>
                                        </td>
                                    </tr>
                                        @php
                                          $i++;
                                            endforeach;
                                        @endphp
                                    @endif
                                    </tbody>
                                </table>
                                <div class="col-12 text-center">
                                    <a class="btn btn-info" onclick="addNewRow_facture()">+</a>
                                    <a class="btn btn-danger" onclick="removeLastRow_facture()">-</a>
                                </div>

                                <div class="container">
                                    <div class="col-md-8">
                                        <div>
                                            <label>Total</label>
                                            <input readonly class="form-control" type="number" name="total_travaux" value="{{$infos_visite->total_travaux}}" id="grand_total_input" />
                                            <br/>
                                            <label>Main doeuvre</label>
                                            <input class="form-control" type="number" name="main_doeuvre" id="main_doeuvre" value="{{$infos_visite->main_doeuvre}}" onkeyup="ajout_de_main_doeuvre()" onchange="ajout_de_main_doeuvre()" />
                                            <br/>
                                            <label>Grand total</label>
                                            <input readonly class="form-control" type="number" required id="reste_a_payer" value="{{$infos_visite->main_doeuvre + $infos_visite->total_travaux}}" />
                                            <br/>
                                        </div>

                                        <div class="row py-2">
                                            @csrf
                                            <input class="form-control btn btn-success" type="submit" name="enregistrer_facture" value="Enregistrer la facture">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Column -->
        </div>
    </div>

@endsection

@section('script')
    <script>
        changer_section('section_etat_des_lieux');

        $("#marque_choisie").on("keyup", function(event) {
            var _this = $(this);
            var value = _this.val();
            if(value!=''){
                $("#chargement_en_cours").css('display','block');
                $.ajax({
                    url: "/get-model/"+value,
                    success: function(liste_modele) {
                        $("#liste_modele").empty();
                        for (var i in liste_modele) {
                            $("<option/>").html(liste_modele[i]).appendTo("#liste_modele");
                        }
                    }
                });
                $("#chargement_en_cours").css('display','none');
            }
        });

        $("#marque_choisie").on("change", function(event) {
            var _this = $(this);
            var value = _this.val();

            if(value!='') {
                $("#chargement_en_cours").css('display','block');
                $.ajax({
                    url: "/get-model/" + value,
                    success: function (liste_modele) {
                        $("#liste_modele").empty();
                        for (var i in liste_modele) {
                            $("<option/>").html(liste_modele[i]).appendTo("#liste_modele");
                        }
                    }
                });
                $("#chargement_en_cours").css('display','none');
            }
        });
    </script>
@endsection
