@extends('includes')

@section('content')

    <div class="container-fluid">
        <form class="form-horizontal form-material" method="post" action="{{route('enregistrer_vehicule')}}">
        {!! \Illuminate\Support\Facades\Session::get('notification',"") !!}
        <div class="row">
            <!-- Column -->
{{--            ======================INFORMATIONS CLIENTS=====================--}}
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <h3 class="text-uppercase text-decoration-underline pb-4 pt-4">CLIENT</h3>

                    <div class="form-group mb-4">
                        <label class="col-sm-12">Choisissez le client<i class="text-danger">*</i></label>
                        <div class="col-sm-12 border-bottom">
                            <select class="form-select shadow-none p-0 border-0 form-control-line searchable-select" name="id_client">
                                <option></option>
                                @foreach($les_clients as $item_client)
                                    <option value="{{$item_client->id}}"> {{$item_client->nom}} </option>
                                @endforeach
                            </select>
                            <br/>
                            <a href="{{asset("nouveau_client")}}"> Nouveau client ? / je ne trouve pas le client</a>
                        </div>
                    </div>
                </div>
            <!-- Column -->
{{--            ======================INFORMATIONS VEHICULES=====================--}}
            <div class="col-lg-8 col-xlg-9 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-uppercase pb-4 pt-4">INFORMATIONS VEHICULE</h3>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Marque</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <select class="form-select shadow-none p-0 border-0 form-control-line" name="marque" required>
                                        <option>Choisissez une marque</option>

                                        <option>Kia</option>
                                        <option>Wolksagen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Model</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <select class="form-select shadow-none p-0 border-0 form-control-line" name="model" required>
                                        <option>Choisissez un Model</option>

                                        <option>sportage</option>
                                        <option>un model</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Annee</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="12354578909090905"  required class="form-control p-0 border-0" name="annee">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Energie</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="12354578909090905" max="17" min="17"  required class="form-control p-0 border-0" name="energie">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Immatriculation</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="00JKHDJKD" class="form-control p-0 border-0"  required name="immatriculation">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">No de Chassis</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="12354578909090905" max="17" min="17" class="form-control p-0 border-0" required name="numero_chassis">
                                </div>
                            </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Date de la visite</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="date" placeholder="123 456 7890" class="form-control p-0 border-0" name="date_visite_technique" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Motif garage</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea rows="5" class="form-control p-0 border" name="motif_garage" required></textarea>
                                </div>
                            </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Date prochaine viste </label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="date" placeholder="123 456 7890" class="form-control p-0 border-0"
                                               name="date_prochaine_visite_technique">
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
