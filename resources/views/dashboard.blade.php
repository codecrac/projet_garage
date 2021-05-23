@extends('includes')

@section('style')
<style>
    .blink {
        animation: blink-animation 1s steps(5, start) infinite;
        -webkit-animation: blink-animation 1s steps(5, start) infinite;
    }
    @keyframes blink-animation {
        to {
            visibility: hidden;
        }
    }
    @-webkit-keyframes blink-animation {
        to {
            visibility: hidden;
        }
    }
</style>
@endsection

@section('content')
{{--                <!-- ============================================================== -->--}}
<div class="row justify-content-center">
    <div class="row">
        <hr/>
            <h4 class="text-center">PREVUES DANS LES 10 PROCHAINS JOURS </h4>
        <hr/>
    </div>
    <br/><br/>
    <div class="col-lg-6 col-md-12">
        <div class="white-box analytics-info">
            <a href="{{route('visites_en_approche')}}">
                <h3 class="box-title">VISITES TECHNIQUES <br/>.</h3>
            </a>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash"><canvas width="67" height="30"
                                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                @if(sizeof($date_visite_en_approche) > 0)
                    <li class="ms-auto">
                        <span class="counter text-success blink" style="padding: 15px;background-color: red;color: white !important;">
                             {{sizeof($date_visite_en_approche)}}
                        </span>
                    </li>
                @endif

            </ul>
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="white-box analytics-info">
            <a href="{{route('fete_danniverssaire')}}">
                <h3 class="box-title text-uppercase"> Fête d'anniversaire</h3>
            </a>
            <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                    <div id="sparklinedash">
                        .<br/>
                        <canvas width="67" height="30"
                                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                    </div>
                </li>
                @if(sizeof($date_visite_en_approche) > 0)
                    <li class="ms-auto blink" style="padding: 15px;background-color: red;color: white !important;">
                        <span class="counter">{{sizeof($liste_anniversaire)}}</span>
                    </li>
                @endif

            </ul>
        </div>
    </div>
    {{--    #========================================================--}}
    <div class="row">
        <hr/>
            <h4 class="text-center"> STATISTIQUES GENERALES </h4>
        <hr/>
    </div>
    <br/><br/>
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <a href="{{route('liste_vehicules_garage')}}"> <h3 class="box-title  text-uppercase">Voitures dans le garage<br/>.</h3> </a>
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
            <a href="{{route('classement_frequence_clients')}}">
                <h3 class="box-title text-uppercase">Classement frequence clients <br/>.</h3>
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
            <a href="{{route('liste_client')}}">
                <h3 class="box-title  text-uppercase">Nombre de clients <br/>.</h3>
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
    @if(\Illuminate\Support\Facades\Auth::user()->creer_utilisateurs =='true')
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <a href="{{route('liste_client')}}">
                    <h3 class="box-title  text-uppercase">Nombre d'administrateur <br/>.</h3>
                </a>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash2"><canvas width="67" height="30"
                                                         style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-purple">{{$nombre_utilisateur}}</span></li>
                </ul>
            </div>
        </div>
    @endif

</div>
{{--                <!-- ============================================================== -->--}}
@endsection
