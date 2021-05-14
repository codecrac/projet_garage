@extends('includes')

@section('content')
    <div class="row">
        {!! \Illuminate\Support\Facades\Session::get('notification',"") !!}
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="datatable table text-nowrap table-bordered">
                        <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Client</th>
                            <th class="border-top-0">Immatriculation</th>
                            <th class="border-top-0">Marque & Model </th>
                            <th class="border-top-0">Coût</th>
                            <th class="border-top-0">Versements</th>
                            <th class="border-top-0">Reste a payer</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i =0; ?>
                        @foreach($liste_visite as $item_visite)
                        <tr>
                            <td><?=$i++?></td>
                            <td>{{$item_visite->vehicule->client->nom}}</td>
                            <td>{{$item_visite->vehicule->immatriculation}}</td>
                            <td>{{$item_visite->vehicule->id_marque}} | {{$item_visite->vehicule->id_model}} </td>
                            <td> {{$item_visite->total_a_payer}} FCFA</td>
                            <td> {{$item_visite->total_versements}} FCFA</td>
                            <td> {{$item_visite->reste_a_payer}} FCFA</td>
                            <td>
                                <a href="{{route('versements_facture',[$item_visite->id])}}" class="mt-2 mt-1 mb-1 btn btn-primary">Versements</a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

