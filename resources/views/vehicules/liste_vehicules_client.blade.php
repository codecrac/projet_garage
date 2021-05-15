@extends('includes')

@section('content')
    <div class="row">
        <div class="col-12">
            <h5>Proprietaire : {{$le_client->nom}} ; Telephone : {{$le_client->telephone}} ; Lieu d'Habitation : {{$le_client->localisation}}</h5>
        </div>
        {!! \Illuminate\Support\Facades\Session::get('notification',"") !!}
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="datatable table text-nowrap ">
                        <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Immatriculation</th>
                            <th class="border-top-0">Marque & Model </th>
                            <th class="border-top-0">Travaux</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i =0; ?>
                        @foreach($les_vehicules as $item_vehicule)
                        <tr>
                            <td><?=$i++?></td>
                            <td>{{$item_vehicule->immatriculation}}</td>
                            <td>{{$item_vehicule->id_marque}} | {{$item_vehicule->id_model}} </td>
                            <td><button type="button" class="btn btn-success"> {{sizeof($item_vehicule->visites)}}</button></td>
                            <td>

                                 <input type="checkbox" onchange="toggle_garde_fou(<?=$i?>)">
                                 <div class="row garde_fou" id="garde_fou_<?=$i?>">
                                     <a href="{{route('editer_vehicule',[$item_vehicule->id])}}" class="mt-2 mt-1 mb-1 btn btn-primary">Nouvelle visite</a>
                                     <br/>
                                     <!-- Button trigger modal -->
                                     <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?=$i?>">
                                         Historique
                                     </button>
                                     <!-- Modal HISTORIQUE -->
                                     <div class="modal fade" id="exampleModal_<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Historique voiture
                                                         {{$item_vehicule->immatriculation}}</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <table class="table table-bordered table-striped">
                                                         <thead>
                                                         <th>#</th>
                                                         <th>Date</th>
                                                         <th>Etat</th>
                                                         <th>+</th>
                                                         </thead>
                                                         <tbody>
                                                         @php
                                                             $j=0;
                                                               $historique_visites = $item_vehicule->visites;
                                                         @endphp
                                                         @foreach($historique_visites as $item_visite)
                                                             <tr>
                                                                 <td><?=$j++?></td>
                                                                 <td>{{$item_visite->date}}</td>
                                                                 <td>{{$item_visite->etat}}</td>
                                                                 <td>
                                                                     <a href="{{route('editer_vehicule',[$item_vehicule->id,$item_visite->id])}}" class="mt-2 mt-1 mb-1 btn btn-primary"> + </a>
                                                                 </td>
                                                             </tr>
                                                         @endforeach
                                                         </tbody>
                                                     </table>
                                                 </div>
                                                 <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-md-12 pt-1 text-center">
                                         <!-- Button trigger modal -->
                                         <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modalSuppression_{{$item_vehicule->id}}">
                                             Supprimer
                                         </button>
                                         <!-- Modal SUPPRESSION-->
                                         <div class="modal fade" id="modalSuppression_{{$item_vehicule->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h5 class="modal-title" id="exampleModalLabel">SUPPRESSION voiture {{$item_vehicule->immatriculation}}</h5>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                     </div>
                                                     <div class="modal-body">
                                                         <span>Voulez-vous confirmer la suppression du vehicule <br/>
                                                             <b>{{$item_vehicule->immatriculation}}</b> <br/>
                                                             et de toutes les informations le concernant ? </span>
                                                     </div>
                                                     <div class="modal-footer">
                                                         <div class="row">
                                                             <div class="col-6">
                                                                 <form method="post" action="{{route('supprimer_vehicule',[$item_vehicule->id,$le_client->id])}}">
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

                                     </div>

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

