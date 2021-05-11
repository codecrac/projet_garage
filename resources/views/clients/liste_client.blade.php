@extends('includes')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Nom complet</th>
                            <th class="border-top-0">Telephone</th>
                            <th class="border-top-0">Localisation</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($les_clients as $client)
                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->nom}}</td>
                            <td>{{$client->telephone}}</td>
                            <td>{{$client->localisation}}</td>
                            <td>
                                <input type="checkbox" onchange="toggle_garde_fou({{$client->id}})">
                                <div class="row garde_fou" id="garde_fou_{{$client->id}}">
                                    <a href="{{route('editer_client',[$client->id])}}" class="mt-2 mt-1 mb-1 btn btn-primary">Editer</a>
                                    <br/>
                                    <a href="{{route('liste_vehicules_client',[$client->id])}}" class="btn btn-success">Vehicules</a>
                                </div>
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

