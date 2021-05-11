@extends('includes')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
{{--            ================ENTREES==========--}}
            <div class="col-md-6">
                <h3 class="text-uppercase text-decoration-underline pb-4 pt-4">Entrees d'Argent</h3>
                <form class="form-horizontal form-material">
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Date  <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="date" value="<?=date('Y-m-d')?>" class="form-control p-0 border-0" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Montant  <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" placeholder="45000" class="form-control p-0 border-0" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Motif  <i class="text-danger">*</i></label>
                        <div class="col-md-12 border-bottom p-0">
                            <textarea type="text" placeholder="Lorem ipsum dhfsd sfuhsdk" class="form-control p-0 border-0"></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Vehicule concerné</label>
                        <select class="form-select shadow-none p-0 border-0 form-control-line searchable-select">
                            <option></option>
                            <option>767 HU 478</option>
                            <option>HU 767 478</option>
                            <option>CM 767 478</option>
                        </select>
                    </div>
                </form>
            </div>
{{--            ===========``=====SORTIE==========--}}
            <div class="col-md-6">
                <h3 class="text-uppercase text-decoration-underline pb-4 pt-4">Sorties d'Argent</h3>
                <form class="form-horizontal form-material">
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Date  <i class="text-danger">*</i> </label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="date" value="<?=date('Y-m-d')?>" class="form-control p-0 border-0" required>
                        </div>
                    </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Montant  <i class="text-danger">*</i> </label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="45000" class="form-control p-0 border-0" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Motif  <i class="text-danger">*</i></label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea type="text" placeholder="Lorem ipsum dhfsd sfuhsdk" class="form-control p-0 border-0"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Vehicule concerné</label>
                            <select class="form-select shadow-none p-0 border-0 form-control-line searchable-select">
                                <option></option>
                                <option>767 HU 478</option>
                                <option>HU 767 478</option>
                                <option>CM 767 478</option>
                            </select>
                        </div>
                </form>
            </div>
            <!-- Column ``-->
{{--            ======================BILAN D'AUJOURDHUI=====================--}}
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-uppercase pb-4 pt-4">BILAN D'AUJOURD'HUI</h3>
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
            <!-- Column -->
        </div>
    </div>
@endsection

