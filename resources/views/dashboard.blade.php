@extends('includes')

@section('content')
{{--                <!-- ============================================================== -->--}}
<div class="row justify-content-center">
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <a href="{{route('visites_en_approche')}}">
                <h3 class="box-title">VISITE TECHNIQUE PREVUES DANS LA SEMAINES</h3>
            </a>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash"><canvas width="67" height="30"
                                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-success">{{sizeof($date_visite_en_approche)}}</span></li>

            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <a href="{{route('liste_vehicules_garage')}}"> <h3 class="box-title">Voitures dans le garage<br/>.</h3> </a>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash3"><canvas width="67" height="30"
                                                     style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-info">{{$nombre_voitures_dans_le_garage}}</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <a href="{{route('liste_client')}}">
                <h3 class="box-title">Nombre de clients <br/>.</h3>
            </a>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash2"><canvas width="67" height="30"
                                                     style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-purple">{{$nombre_client}}</span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <a href="{{route('classement_frequence_clients')}}">
                <h3 class="box-title">Classement frequence clients <br/>.</h3>
            </a>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash"><canvas width="67" height="30"
                                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                <li class="ms-auto"><span class="counter text-success">{{sizeof($date_visite_en_approche)}}</span></li>

            </ul>
        </div>
    </div>
</div>
{{--                <!-- ============================================================== -->--}}
@endsection
