@extends('includes')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                        <tr>
                            <td>#</td>
                            <th class="border-top-0">Date prochaine visite</th>
                            <th class="border-top-0">Proprietaire</th>
                            <th class="border-top-0">Telephone</th>
                            <th class="border-top-0">Immatriculation</th>
                            <th class="border-top-0">Motif precedent</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=0; @endphp
                        @foreach($les_visites as $item_visite)
                        <tr>
                            <td>{{$i++}}</td>
                            <td > <span style="padding: 2px;background-color: orange;color: white">{{date('d-m-Y',strtotime($item_visite->date_prochaine_visite))}}</span> </td>
                            <td>{{$item_visite->vehicule->client->nom}}</td>
                            <td>{{$item_visite->vehicule->client->telephone}}</td>
                            <td>{{$item_visite->vehicule->immatriculation}}</td>
                            <td>{{$item_visite->motif}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

