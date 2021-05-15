<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture Rapide</title>

    <style>
        .center{
            text-align: center;
        }
        footer {
            position: fixed;
            bottom: -10px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            /*background-color: #03a9f4;
            color: white;
            text-align: center;*/
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            {{--=====================--PARTIE QUI SWITCH--=====================--}}
            <div class="offset-md-2 col-lg-8 col-xlg-9 col-md-12 section" id="section_facture">
                <div class="card">
                    <div class="card-header">
                        <table width="100%">
                            <tbody>
                            <td class="text-left" width="50%">
                                <img src="{{$base_64_image_garage}}" width="120" alt="LOGO">

                            </td>
                            <td>
                                <h5 style="font-weight: normal;text-align: center">
                                    Mécanique Générale-Electricité-Tôlerie-Peinture-Climatisation <br/>
                                    Scanner-Programmation-Installation de GPS et Alarme <br/>
                                    Tél : 05 44 09 03 /09 46 78 49 / 05 02 37 38
                                </h5>
                            </td>
                            </tbody>
                        </table>

                        <div style="border: 3px solid black;margin-top: 8px">
                            <h3 style="text-align: center">{{$titre}}</h3>
                        </div>
                    </div>

                    <div class="card-body" style="margin-top: 35px">
                        <table>
                            <tbody>
                                <tr>
                                    <td> Date : {{$date_facture}} </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td> Client(e) : {{$nom_client}} </td>
                                    <td> Marque : {{$marque}} </td>
                                </tr>
                                <tr>
                                    <td> Model : {{$model}} </td>
                                    <td> Immatriculation : {{$immatriculation}} </td>
                                </tr>
                            </tbody>
                        </table>

                        <br/><br/>
                        <div class="py-4">
                                <table border="1" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="center">DESIGNATION</th>
                                            <th class="center">Quantite</th>
                                            <th class="center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="le_corps_de_la_table_facture">
                                        @foreach($liste_objet as $item_objet)
                                            <tr>
                                                <td class="center"> {{$item_objet->objet}}</td>
                                                <td class="center"> {{$item_objet->quantite}} FCFA</td>
                                                <td class="center"> {{$item_objet->etat}} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <br/><br/>
        <p style="text-align: left">
            Sauf omission de notre part, les pièces sur-citées ont été changées ou réparées sur le véhicule sur mentionné.
            <br/><br/>
            NB : tout défaut lié aux travaux  effectués devra être signalé dans les 24 heures suivant la livraison du véhicule afin que notre équipe puisse y parer au plus vite possible.
            <br/><br/>
            Toute notre équipe vous remercie pour la confiance renouvelée.

        </p>
        <br/><br/>
        <h3 class="text-right" style="float: right"> <u>Le Responsable clients</u> </h3>


{{--        FOOTER--}}
        <footer>
            <h6 style="text-align:center;font-weight:normal">
                GARAGE SION_ YOPOUGON MAROC CARREFOUR KIMI<br/> INFOLINE : 07 59 49 25 79 / 07 09 46 78 46
            </h6>
        </footer>
    </div>
</body>
</html>



