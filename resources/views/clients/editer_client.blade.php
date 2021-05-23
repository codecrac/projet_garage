@extends('includes')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
{{--            ======================INFORMATIONS CLIENTS=====================--}}
            <div class="offset-md-2 col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('liste_client')}}" class="btn btn-default text-black">RETOUR</a>
                        <br>
                        <h3 class="text-uppercase pb-4 pt-4">INFORMATIONS CLIENT</h3>
                        <form class="form-horizontal form-material" method="post" action="{{route('modifier_client',[$le_client->id])}}">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Nom complet  <i class="text-danger">*</i> </label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="Johnathan Doe"
                                           class="form-control p-0 border-0" name="nom" required value="{{$le_client->nom}}"> </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Telephone  <i class="text-danger">*</i></label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="123 456 7890" name="telephone" class="form-control p-0 border-0" value="{{$le_client->telephone}}">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Email </label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="email" placeholder="johnathan@admin.com" name="email"
                                           class="form-control p-0 border-0" name="example-email"
                                           id="example-email" value="{{$le_client->email}}">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-sm-12">Lieu d'habitation <i class="text-danger">*</i></label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none p-0 border-0 form-control-line" id="localisation_client" name="localisation"
                                            onchange="changer_localisation_client()">
                                        <option value="{{$le_client->localisation}}"> {{$le_client->localisation}}</option>
                                        <option value="interieur">Interieur du pays</option>
                                        <option>Cocody</option>
                                        <option>Abobo</option>
                                        <option>Yopoungon</option>
                                        <option>Marcory</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 border-bottom p-0">
                                    <input type="text" placeholder="Preciser le lieu a l'interieur" class="form-control p-0 border-0" id="localisation_interieur" name="localisation_interieur">
                                </div>

                                <div class="row m-4">
                                        <div class="col-md-4 text-left">
                                            <!-- Button trigger modal -->
                                        @if(\Illuminate\Support\Facades\Auth::user()->supprimer == 'true')
                                            <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalSuppression">
                                                Supprimer
                                            </button>
                                        @else
                                            <i class="text-danger"> Vous n'etes pas autoriser a effectuer des suppression </i>
                                        @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalSuppression" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">SUPPRESION CLIENT</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Voulez-vous confirmer la suppression du client "<b>{{$le_client->nom}}</b>" et de toutes les informations le concernant ? </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a class="btn btn-danger text-white" href="{{route('supprimer_client',[$le_client->id])}}">OUI</a>
                                                                </div>
                                                                <div class="col-6 ">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-8 text-center">
                                            @csrf
                                            <button class="btn btn-success">Enregistrer</button>
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

