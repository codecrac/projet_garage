@extends('includes')

@section('content')
    {!! \Illuminate\Support\Facades\Session::get('notification','') !!}
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Nom complet</th>
                            <th class="border-top-0">comptabilite</th>
                            <th class="border-top-0">supprimer</th>
                            <th class="border-top-0">creer utilisateur</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=0; @endphp
                        @foreach($liste_utilisateur as $item_utilisateur)
                            @if(\Illuminate\Support\Facades\Auth::user()->id != $item_utilisateur->id)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item_utilisateur->name}}</td>
                                    <td> {{$item_utilisateur->comptabilite=='true' ? 'Oui' : 'Non'  }} </td>
                                    <td> {{$item_utilisateur->supprimer=='true' ? 'Oui' : 'Non'  }} </td>
                                    <td> {{$item_utilisateur->creer_utilisateur=='true' ? 'Oui' : 'Non'  }} </td>
                                    <td>
                                        @if(\Illuminate\Support\Facades\Auth::user()->supprimer == 'true')
                                            <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalSuppression_{{$item_utilisateur->id}}">
                                                Supprimer
                                            </button>
                                            <!-- Modal SUPPRESSION-->
                                            <div class="modal fade" id="modalSuppression_{{$item_utilisateur->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">SUPPRESSION UTILISATEUR : {{$item_utilisateur->name}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                                 <span>Voulez-vous confirmer la suppression du vehicule <br/>
                                                                     <b>{{$item_utilisateur->name}}</b> <br/>
                                                                     et de toutes les informations le concernant ? </span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <form method="post" action="{{route('supprimer_utilisateur',[$item_utilisateur->id])}}">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger text-white">OUI</button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-6 ">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @else
                                            <i class="text-danger" style="font-size: 10px"> Vous n'etes pas autoriser <br/>a effectuer des suppression </i>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

