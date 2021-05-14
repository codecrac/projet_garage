@extends('includes')

@section('content')

    <div class="row">

        {{--            ======================BILAN D'AUJOURDHUI=====================--}}
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-uppercase pb-4 pt-4">HISTORIQUE DU MOIS DE : {{$mois_a_afficher}}</h3>
                    <div class="row">

                        <div class="col-lg-4 col-md-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Total Recette</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <li>
                                        <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                        </div>
                                    </li>
                                    <li class="ms-auto"><span class="counter text-success">{{$total_entree}} FCFA</span></li>
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
                                    <li class="ms-auto"><span class="counter text-danger">{{$total_sortie}} FCFA</span></li>
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
                                    <li class="ms-auto"><span class="counter text-info">{{$total_entree - $total_sortie}} FCFA</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="white-box">
                            <div class="table-responsive">
                                <table class="datatable table text-nowrap ">
                                    <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
{{--                                        <th class="border-top-0">Mois/Annee</th>--}}
                                        <th class="border-top-0">Flux</th>
                                        <th class="border-top-0">Montant</th>
                                        <th class="border-top-0">Motif</th>
{{--                                        <th class="border-top-0">Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=0;  @endphp

                                    @foreach($bilan_du_mois as $item_flux)
                                        <tr class="p-2">
                                            <td>{{$item_flux->date}}</td>
{{--                                            <td>{{$item_flux->date_hebdo}}</td>--}}
                                            <td> <span class="btn btn-{{$item_flux->flux=='entree'?'success' : 'danger'}}">{{$item_flux->flux}}</span></td>
                                            <td>{{$item_flux->montant}}</td>
                                            <td>{{$item_flux->motif}}</td>
{{--                                            <td>{{$item_flux->vehicule != null ? $item_flux->vehicule->immatriculation : 'Aucun'}}</td>--}}
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
    </div>
@endsection

