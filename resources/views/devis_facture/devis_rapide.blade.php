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
                    <input class="form-control" type="text" name="produit_servces[]"   required/>
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
            <div class="offset-md-2 col-lg-8 col-xlg-9 col-md-12 section" id="section_facture">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-uppercase pb-4 pt-4">DEVIS RAPIDE</h3>
                        <form class="form-horizontal form-material">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nom Complet Client(e)</label><br/>
                                    <input class="form-control" type="text" name="immatriculation" placeholder="YU 908 848" />
                                </div>
                                <div class="col-md-6">
                                    <label>Marque Voiture</label><br/>
                                    <input class="form-control" type="text" name="date_facture" />
                                </div>
                                <div class="col-md-6">
                                    <label>Model Voiture</label><br/>
                                    <input class="form-control" type="text" name="date_facture"/>
                                </div>
                                <div class="col-md-6">
                                    <label>Immatriculation</label><br/>
                                    <input class="form-control" type="text" name="immatriculation" placeholder="YU 908 848" />
                                </div>
                                <div class="col-md-6">
                                    <label>Date</label><br/>
                                    <input class="form-control" type="date" name="date_facture" value="<?=date('Y-m-d')?>" />
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
                                            <input class="form-control" type="text" name="produit_servces[]" required/>
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
                                            <input readonly class="form-control" type="number" name="grand_total" id="grand_total_input" />
                                            <br/>
                                            <label>Main doeuvre</label>
                                            <input class="form-control" type="number" name="main_doeuvre" id="main_doeuvre" onkeyup="ajout_de_main_doeuvre()" />
                                            <br/>
                                            <label>Grand total</label>
                                            <input readonly class="form-control" type="number" required name="reste_a_payer" id="reste_a_payer" />
                                            <br/>
                                        </div>

                                        <div class="row py-2">
                                            <input class="form-control btn btn-success" type="submit" name="relecharger_en_pdf" value="Telecharger en pdf">
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
