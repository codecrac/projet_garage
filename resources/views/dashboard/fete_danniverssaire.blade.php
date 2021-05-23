@extends('includes')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                        <tr>
{{--                            <th class="border-top-0">#</th>--}}
                            <th class="border-top-0">Client</th>
                            <th class="border-top-0">Telephone</th>
                            <th class="border-top-0" id="ordonner"> Jour et mois d'anniverssaire</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @php $i=0; @endphp--}}
                        @foreach($les_clients as $item_client)
                        <tr>
{{--                            <td>{{$i++}}</td>--}}
                            <td>{{$item_client->nom}}</td>
                            <td>{{$item_client->telephone}}</td>
                            <td>
                                <span style="padding: 2px;background-color: orange;color: white">{{date('d-m',strtotime($item_client->date_naissance))}}</span>
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

@section('script')
    <script>
        $(function () {
            // alert('dkd')
            //cliquer (2fois) sur frequence pour ordonner par ordre descendant
            window.setTimeout( $('#ordonner').click(), 500 );
            // window.setTimeout( $('#ordonner').click(), 500 );
        })
    </script>
@endsection
