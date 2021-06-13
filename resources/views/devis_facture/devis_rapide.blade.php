@extends('includes')

@section('style_complementaire')
    <style>
        .active{
            border: 2px solid red;
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
            <tr id="la_ligne_facture">
                <td>
                    <input class="form-control" type="text" name="objet[]"   required/>
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
        <option value="Edge">
        <option value="Firefox">
        <option value="Chrome">
        <option value="Opera">
        <option value="Safari">
    </datalist>

    <datalist id="liste_objet_fiche">
        <option value="objet fiche 1">
        <option value="objet fiche 3">
        <option value="objet fiche 5">
    </datalist>

    <datalist id="liste_etat_fiche">
        <option value="changé">
        <option value="Reparé">
    </datalist>
    {{--=============================DATA LIST=============================--}}


    <div class="container-fluid">
        <div class="row">
           {{--=====================--PARTIE QUI SWITCH--=====================--}}
            <div class="offset-md-1 col-lg-9 col-xlg-9 col-md-12 section" id="section_facture">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-uppercase pb-4 pt-4">
                            DEVIS RAPIDE
<!--                            --><?//=$_SERVER["DOCUMENT_ROOT"].'\images\icone_garage.jpg'?>
                        </h3>
                        <form class="form-horizontal form-material" target="_blank" method="post" action="{{route('devis_rapide_pdf')}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nom Complet Client(e)</label><br/>
                                    <input required class="form-control" type="text" name="nom_client" placeholder="YU 908 848" />
                                </div>
                                <div class="col-md-6">
                                    <label>Marque Voiture</label><br/>
                                    <input required class="form-control" type="text" name="marque" />
                                </div>
                                <div class="col-md-6">
                                    <label>Model Voiture</label><br/>
                                    <input required class="form-control" type="text" name="model"/>
                                </div>
                                <div class="col-md-6">
                                    <label>Immatriculation</label><br/>
                                    <input required class="form-control" type="text" name="immatriculation" placeholder="YU 908 848" />
                                </div>
                                <div class="col-md-6">
                                    <label>Date</label><br/>
                                    <input required class="form-control" type="date" name="date_facture" value="<?=date('Y-m-d')?>" />
                                </div>
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
                                    <tr>
                                        <td>
                                            <input class="form-control" type="text" name="objet[]" required/>
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
                                            <input required readonly class="form-control" type="number" name="grand_total" id="grand_total_input" />
                                            <br/>
                                            <label>Main doeuvre</label>
                                            <input required class="form-control" type="number" name="main_doeuvre" id="main_doeuvre" onkeyup="ajout_de_main_doeuvre()" />
                                            <br/>
                                            <label>Grand total</label>
                                            <input required readonly class="form-control" type="number" required name="total_a_payer" id="reste_a_payer" />
                                            <br/>
                                        </div>

                                        <div class="row py-2">
                                            @csrf
                                            <input class="form-control btn btn-success" type="submit" name="telecharger_en_pdf" value="Telecharger en pdf">
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

