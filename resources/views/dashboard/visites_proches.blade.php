@extends('includes')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                        <tr>
                            <th class="border-top-0">Date</th>
                            <th class="border-top-0">Immatriculation</th>
                            <th class="border-top-0">Motif precedent</th>
                            <th class="border-top-0">Proprietaire</th>
                            <th class="border-top-0">Telephone</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($les_visites as $item_visite)
                        <tr>
                            <td>{{date('d-m-Y',strtotime($item_visite->date))}}</td>
                            <td>{{$item_visite->vehicule->immatriculation}}</td>
                            <td>{{$item_visite->motif}}</td>
                            <td>{{$item_visite->vehicule->client->nom}}</td>
                            <td>{{$item_visite->vehicule->client->telephone}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

