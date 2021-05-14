@extends('includes')

@section('content')

    <div class="container-fluid">
        {!! \Illuminate\Support\Facades\Session::get('notification','') !!}
        <div class="row">
            <!-- Column -->

{{--            ======================BILAN D'AUJOURDHUI=====================--}}
            <div class="col-md-12 mt-1">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-uppercase pb-4 pt-4">BILAN D'AUJOURD'HUI</h3>
                        <div class="row">

                            <div class="col-lg-4 col-md-12">
                                <div class="white-box analytics-info">
                                    <h3 class="box-title">Total Recette</h3>
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li>
                                            <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                            </div>
                                        </li>
                                        <li class="ms-auto"><span class="counter text-success">{{$total_entree_aujourdhui}} FCFA</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="white-box analytics-info">
                                    <h3 class="box-title">Total Depenses</h3>
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li>
                                            <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                            </div>
                                        </li>
                                        <li class="ms-auto"><span class="counter text-danger">{{$total_sortie_aujourdhui}} FCFA</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="white-box analytics-info">
                                    <h3 class="box-title">Benefices</h3>
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li>
                                            <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                            </div>
                                        </li>
                                        <li class="ms-auto"><span class="counter text-info">{{$total_entree_aujourdhui - $total_sortie_aujourdhui}} FCFA</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            ================ENTREES==========--}}
{{--            ================ENTREES==========--}}
            <div class="col-md-6">
                <h3 class="text-uppercase text-decoration-underline pb-4 pt-4">Entrees d'Argent</h3>
                <form class="form-horizontal form-material" method="post" action="{{route('enregistrer_flux_argent')}}">
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Date  <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="date" value="<?=date('Y-m-d')?>" class="form-control p-0 border-0" name="date" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Montant  <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="45000" class="form-control p-0 border-0" name="montant" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Motif  <i class="text-danger">*</i></label>
                        <div class="col-md-12 border-bottom p-0">
                            <textarea type="text" placeholder="Lorem ipsum dhfsd sfuhsdk" name="motif" class="form-control p-0 border-0" required></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Vehicule concerné</label>
                        <select class="form-select shadow-none p-0 border-0 form-control-line searchable-select" name="id_vehicule_concerner">
                            <option value>Aucun</option>
                            @foreach($les_vehiclues as $le_vehiclue)
                                <option value="{{$le_vehiclue->id}}">{{$le_vehiclue->immatriculation}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        @csrf
                        <input type="hidden" name="flux" value="entree" required>
                        <button class="btn btn-success">Enregistrer l'entree d'argent</button>
                    </div>
                </form>
            </div>
{{--            ===========``=====SORTIE==========--}}{{--            ===========``=====SORTIE==========--}}
{{--            ===========``=====SORTIE==========--}}{{--            ===========``=====SORTIE==========--}}
            <div class="col-md-6">
                <h3 class="text-uppercase text-decoration-underline pb-4 pt-4">Sorties d'Argent</h3>
                <form class="form-horizontal form-material" method="post" action="{{route('enregistrer_flux_argent')}}">
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Date  <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="date" value="<?=date('Y-m-d')?>" class="form-control p-0 border-0" name="date" required>
                        </div>
                    </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Montant  <i class="text-danger">*</i> </label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="45000" class="form-control p-0 border-0" name="montant" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Motif  <i class="text-danger">*</i></label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea type="text" placeholder="Lorem ipsum dhfsd sfuhsdk" name="motif" required class="form-control p-0 border-0" required></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Vehicule concerné</label>
                            <select class="form-select shadow-none p-0 border-0 form-control-line searchable-select" name="id_vehicule_concerner">
                                <option value>Aucun</option>
                                @foreach($les_vehiclues as $le_vehiclue)
                                    <option value="{{$le_vehiclue->id}}">{{$le_vehiclue->immatriculation}}</option>
                                @endforeach
                            </select>
                        </div>

                    <div class="col-sm-12">
                        @csrf
                        <input type="hidden" name="flux" value="sortie" required>
                        <button class="btn btn-success">Enregistrer la depense</button>
                    </div>
                </form>
            </div>
            <!-- Column ``-->
            <!-- Column -->
{{--            ======================FLUX D'AUJOURDHUI=====================--}}

            <h3 class="p-2 m-2 text-center" style="border: 1px solid black">Transaction d'aujourd'hui</h3>

            <div class="col-md-12 mt-2">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Flux</th>
                            <th>Montant</th>
                            <th>Motif</th>
                            <th>Vehicule</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($flux_aujourdhui as $item_flux)
                        <tr class="p-2">
                            <td>{{$item_flux->date}}</td>
                            <td> <span class="btn btn-{{$item_flux->flux=='entree'?'success' : 'danger'}}">{{$item_flux->flux}}</span></td>
                            <td>{{$item_flux->montant}}</td>
                            <td>{{$item_flux->motif}}</td>
                            <td>{{$item_flux->vehicule != null ? $item_flux->vehicule->immatriculation : 'Aucun'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

