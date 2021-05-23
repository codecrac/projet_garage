@extends('includes')

@section('content')

    <div class="container-fluid">
        {!! \Illuminate\Support\Facades\Session::get('notification','') !!}
        <div class="row">
            <!-- Column -->
{{--            ======================INFORMATIONS CLIENTS=====================--}}
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <h3 class="text-uppercase text-decoration-underline pb-4 pt-4">NOUVEAU VERSEMENT</h3>

                <form method="post" action="{{route('enregistrer_versement_facture',[$versements_facture->id])}}">
                    <div class="card-body">
                        <label>Date *</label>
                        <input type="date" name="date_versement" max="<?=date('Y-m-d')?>" class="form-control" value required>
                        <br/>
                        <label>Montant *</label>
                        <input type="number" name="montant" min="5" max="{{$versements_facture->reste_a_payer}}" class="form-control" required value>
                        <br/>
                        <label>Mode de paiement *</label>
                        <select name="mode_de_paiement" class="form-control" required >
                            <option value>Choississez le mode de paiement</option>
                            <option value="ESPECE">ESPECE</option>
                            <option value="CHEQUE">CHEQUE</option>
                            <option value="MOBILE MONEY">MOBILE MONEY</option>

                        </select>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <h3 class="text-center">
                            @csrf
                            <input type="submit" class="btn btn-primary" name="enregistrer_versement" value="Enregistrer le versement">
                        </h3>
                    </div>
                </form>
            </div>
            <!-- Column -->
{{--            ======================INFORMATIONS VEHICULES=====================--}}
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <p>
                            <b>Client(e) :</b>{{$versements_facture->vehicule->client->nom}}
                        </p>
                        <p>
                            <b>Date et immatriculation :</b> {{$versements_facture->date}} | {{ $versements_facture->vehicule->immatriculation}}
                        </p>
                        <p>
                            <b> Montant :</b> {{$versements_facture->total_a_payer}} FCFA
                        </p>
                        <p>
                            <b> Verser :</b> {{$versements_facture->total_versements}} FCFA
                        </p>
                        <p>
                            <b> Reste à payer :</b> {{$versements_facture->reste_a_payer}} FCFA
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <h3 class="text-uppercase pb-4 pt-4">HISTORIQUE DES VERSEMENTS</h3>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Mode de paiement</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach($liste_versement as $item_versement)
                                <tr>
                                    <td> {{$item_versement->date_versement }} </td>
                                    <td> {{ $item_versement->montant }} F </td>
                                    <td> {{ $item_versement->mode_de_paiement }} </td>
                                    <td>
                                        @if(\Illuminate\Support\Facades\Auth::user()->supprimer =='true')
                                            <form method="post" action="{{route('supprimer_versement_facture',[$versements_facture->id,$i++])}}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger text-white">Supprimer le versement</button>
                                            </form>
                                        @else
                                            <i class="text-danger" style="font-size: 10px">Vous n'etes pas autoriser <br/>a effectuer des suppressions</i>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Mode de paiement</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
@endsection

