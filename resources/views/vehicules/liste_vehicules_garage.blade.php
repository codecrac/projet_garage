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
                                        <th class="border-top-0">Immatriculation</th>
                                        <th class="border-top-0">Marque & Model</th>
                                        <th class="border-top-0">Travaux</th>
                                        <th class="border-top-0">Proprietaire</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; ?>
                                    @foreach($les_visites_pas_sur_rendu as $item_visite)
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td>{{$item_visite->vehicule->immatriculation}}</td>
                                        <td>{{$item_visite->vehicule->id_marque}} | {{$item_visite->vehicule->id_model}} </td>
                                        <td><button type="button" class="btn btn-success"> {{sizeof($item_visite->vehicule->visites)}}</button></td>
                                        <td>{{$item_visite->vehicule->client->nom}} | {{$item_visite->vehicule->client->telephone}}</td>
                                        <td>

                                             <input type="checkbox" onchange="toggle_garde_fou(<?=$i?>)">
                                             <div class="row garde_fou" id="garde_fou_<?=$i?>">
                                                 <a href="{{route('editer_vehicule',[1])}}" class="mt-2 mt-1 mb-1 btn btn-primary">Nouvelle visite</a>
                                                 <br/>
                                                 <!-- Button trigger modal -->

                                                 <!-- Button trigger modal -->
                                                 <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?=$i?>">
                                                     Historique
                                                 </button>

                                                 <!-- Modal -->
                                                 <div class="modal fade" id="exampleModal_<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                     <div class="modal-dialog">
                                                         <div class="modal-content">
                                                             <div class="modal-header">
                                                                 <h5 class="modal-title" id="exampleModalLabel">Historique voiture 768 DH 473</h5>
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
                                                                           $historique_visites = $item_visite->vehicule->visites;
                                                                     @endphp
                                                                     @foreach($historique_visites as $item_visite)
                                                                         <tr>
                                                                             <td><?=$j++?></td>
                                                                             <td>{{$item_visite->date}}</td>
                                                                             <td>{{$item_visite->etat}}</td>
                                                                             <td>
                                                                                 <a href="{{route('editer_vehicule',[$item_visite->vehicule->id,$item_visite->id])}}" class="mt-2 mt-1 mb-1 btn btn-primary"> + </a>
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

