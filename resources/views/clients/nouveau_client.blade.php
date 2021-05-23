@extends('includes')

@section('content')

    <div class="container-fluid">
        <form class="form-horizontal form-material" method="post" action="{{route('enregistrer_client')}}">
        <div class="row">
            <!-- Column -->
{{--            ======================INFORMATIONS CLIENTS=====================--}}
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <h3 class="text-uppercase text-decoration-underline pb-4 pt-4">INFORMATIONS CLIENT</h3>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Nom complet  <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="Johnathan Doe" class="form-control p-0 border-0" name="nom" required> </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Telephone  <i class="text-danger">*</i></label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="123 456 7890" class="form-control p-0 border-0" name="telephone" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="example-email" class="col-md-12 p-0">Email </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="email" placeholder="johnathan@admin.com" class="form-control p-0 border-0" name="email" id="example-email">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-sm-12">Lieu d'habitation <i class="text-danger">*</i></label>
                        <div class="col-sm-12 border-bottom">
                            <select class="form-select shadow-none p-0 border-0 form-control-line searchable-select" id="localisation_client"
                                    onchange="changer_localisation_client()" name="localisation" required>
                                <option value></option>

                                <option value="interieur">Interieur du pays</option>
                                <option>Cocody</option>
                                <option>Abobo</option>
                                <option>Yopougon</option>
                                <option>Marcory</option>
                            </select>
                        </div>
                        <div class="col-sm-12 border-bottom p-0">
                            <input type="text" placeholder="Preciser le lieu a l'interieur" class="form-control p-0 border-0" name="localisation_interieur" id="localisation_interieur">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Date de naissance <i class="text-danger">*</i></label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="date" max="{{date('Y-m-d')}}" placeholder="123 456 7890" class="form-control p-0 border-0" name="date_naissance">
                        </div>
                    </div>
            </div>
            <!-- Column -->
{{--            ======================INFORMATIONS VEHICULES=====================--}}
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-uppercase pb-4 pt-4">INFORMATIONS VEHICULE</h3>


                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Marque</label>
                            <div class="col-md-12 border-bottom p-0">

                                <datalist id="liste_marque">
                                    @foreach( $liste_marque as $item_marque )
                                        <option value="{{$item_marque->constructeur}}"> {{$item_marque->constructeur}} </option>
                                    @endforeach
                                </datalist>

                                <input type="text" list="liste_marque" id="marque_choisie" name="marque" autocomplete="off" class="form-control p-0 border-0" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Model</label>
                            <div class="col-md-12 border-bottom p-0">

                                <datalist id="liste_modele">
                                </datalist>

                                <div class="col-md-12 border-bottom p-0">
                                    <span id="chargement_en_cours" style="color: red"> Chargement des suggestions de model</span>
                                    <input type="text" list="liste_modele" id="input_modele" autocomplete="off"  placeholder="Entrer un Modele" name="model" class="form-control p-0 border-0" required>
                                </div>
                            </div>
                        </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Immatriculation</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="00JKHDJKD" class="form-control p-0 border-0" name="immatriculation">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">No de Chassis</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="12354578909090905" max="17" min="17" class="form-control p-0 border-0" name="numero_chassis">
                                </div>
                            </div>

                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Annee</label>
                            <div class="col-md-12 border-bottom p-0">
{{--                                <input type="text" placeholder="2018" max="17" min="17" class="form-control p-0 border-0" name="annee">--}}
                                <select class="form-select shadow-none p-0 border-0 form-control-line" name="annee">
                                    <option value> Choisissez l'annee </option>
                                    @foreach( $tableau_annee as $item_annee )
                                        <option value="{{$item_annee}}"> {{$item_annee}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Energie</label>
                            <div class="col-md-12 border-bottom p-0">
                                <select class="form-select shadow-none p-0 border-0 form-control-line" name="energie">
                                    <option value> Choisissez l'energie </option>
                                    <option value="essence"> Essence </option>
                                    <option value="diesel"> Diesel </option>
                                    <option value="hybride"> Hybride </option>
                                </select>
                            </div>
                        </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Motif garage</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea rows="5" class="form-control p-0 border" name="motif_garage"></textarea>
                                </div>
                            </div>


                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Date de la visite</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="date" max="{{date('Y-m-d')}}" placeholder="123 456 7890" class="form-control p-0 border-0" name="date_visite_technique">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Date prochaine viste technique</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="date" placeholder="123 456 7890" class="form-control p-0 border-0" name="date_prochaine_visite_technique">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    @csrf
                                    <button class="btn btn-success">Enregistrer</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        </form>
    </div>
@endsection


@section('script')
    <script>
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
