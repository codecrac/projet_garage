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
                                <h3 class="box-title">Total Depenses</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <li>
                                        <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                        </div>
                                    </li>
                                    <li class="ms-auto"><span class="counter text-danger">400 FCFA</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Total Recette</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <li>
                                        <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                        </div>
                                    </li>
                                    <li class="ms-auto"><span class="counter text-success">1400 FCFA</span></li>
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
                                    <li class="ms-auto"><span class="counter text-info">1000 FCFA</span></li>
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
                                        <th class="border-top-0">Depenses</th>
                                        <th class="border-top-0">Recette</th>
                                        <th class="border-top-0">Benefice</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php for ($i=0;$i<=16;$i++): ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?=$i?>/2015</td>
                                        <td>5000 FCFA</td>
                                        <td>46000 FCFA</td>
                                        <td>41000 FCFA</td>
                                        <td>
                                            <a href="#" class="mt-2 mt-1 mb-1 btn btn-primary">Details</a>
                                        </td>
                                    </tr>
                                    <?php endfor; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
    </div>
@endsection

