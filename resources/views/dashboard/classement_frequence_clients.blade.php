@extends('includes')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                        <tr>
                            <th class="border-top-0">Client</th>
                            <th class="border-top-0">Telephone</th>
                            <th class="border-top-0" id="ordonner">Frequence</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($les_clients as $item_client)
                        <tr>
                            <td>{{$item_client->nom}}</td>
                            <td>{{$item_client->telephone}}</td>
                            <td>{{sizeof($item_client->visites)}} Visites</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            // alert('dkd')
            //cliquer (2fois) sur frequence pour ordonner par ordre descendant
            window.setTimeout( $('#ordonner').click(), 500 );
            window.setTimeout( $('#ordonner').click(), 500 );
        })
    </script>
@endsection
