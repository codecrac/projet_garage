@extends('includes')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h3>Marques</h3>
                <br/>
                <form class="form-horizontal form-material" method="post" action="{{route('enregistrer_liste_de_marque')}}" enctype="multipart/form-data">
                    {!! \Illuminate\Support\Facades\Session::get('notification',"") !!}
                    <input type="file" name="fichier_marque" required />
                    <br/>
                    @csrf
                    <input type="submit" value="Mettre a jour la liste des marques" class="btn btn-success">
                </form>
            </div>


            <div class="col-md-6">
                <h3>Modeles</h3>
                <br/>
                <form class="form-horizontal form-material" method="post" action="{{route('enregistrer_vehicule')}}" enctype="multipart/form-data">
                    {!! \Illuminate\Support\Facades\Session::get('notification',"") !!}
                    <input type="file" name="marque" required />
                    <br/>
                    <input type="submit" value="Mettre a jour la liste des marques" class="btn btn-success">
                </form>
            </div>
        </div>

    </div>
@endsection
