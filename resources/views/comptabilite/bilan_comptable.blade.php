@extends('includes')

@section('content')

    <div class="row">

        {{--            ======================BILAN D'AUJOURDHUI=====================--}}
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-uppercase pb-4 pt-4">BILAN GENERAL</h3>
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
                                        <th class="border-top-0">Mois/Annee</th>
                                        <th class="border-top-0">Entree</th>
                                        <th class="border-top-0">Depenses</th>
                                        <th class="border-top-0">Benefice</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=0;  @endphp
                                    @foreach($bilan as $item_flux_de_mois)
                                    <tr>
                                        <td><?=++$i?></td>
                                        <td>{{$item_flux_de_mois->mois_a_afficher}}</td>
                                        <td>{{$item_flux_de_mois->total_entree}} FCFA</td>
                                        <td>{{$item_flux_de_mois->total_depense}} FCFA</td>
                                        <td>{{$item_flux_de_mois->total_entree - $item_flux_de_mois->total_depense }} FCFA</td>
                                        <td>
                                            <a href="{{route('details_flux_argent_du_mois',[$item_flux_de_mois->mois_a_afficher])}}" class="mt-2 mt-1 mb-1 btn btn-primary">Details</a>
                                        </td>
                                    </tr>
                                    {{--<tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item_flux_de_mois[0]}}</td>
                                    </tr>--}}
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
    </div>
@endsection

