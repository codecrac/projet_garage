 <!DOCTYPE html>
    <html dir="ltr" lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords"
              content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
        <meta name="description"
              content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
        <meta name="robots" content="noindex,nofollow">
        <title>Garage pro</title>
        <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('template/plugins/images/favicon.png')}}">
        <!-- Custom CSS -->
        <link href="{{asset('template/plugins/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('template/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}">
        <!-- Custom CSS -->
        <link href="{{asset('template/css/style.min.css')}}" rel="stylesheet">


        <link href="{{asset('css/mon_style.css')}}" rel="stylesheet">
        <link href="{{asset('css/datatable.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/selectize.min.css')}}"/>

        @yield('style')
    </head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}"aria-expanded="false">
                            <i class="far fa-home" aria-hidden="true"></i>
                            <span class="hide-menu">Tableau de bord</span>
                        </a>
                    </li>
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('nouveau_client')}}"aria-expanded="false">
                            <i class="far fa-clock" aria-hidden="true"></i>
                            <span class="hide-menu">Nouveau client</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('liste_client')}}"
                           aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="hide-menu">Liste des clients</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('devis_rapide')}}"
                           aria-expanded="false">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span class="hide-menu">Devis rapide</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('liste_facture')}}"
                           aria-expanded="false">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span class="hide-menu">Reglement de Factures</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('nouveau_vehicule')}}"
                           aria-expanded="false">
                            <i class="fa fa-font" aria-hidden="true"></i>
                            <span class="hide-menu">Nouveau véhicule</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('liste_vehicules_garage')}}"
                           aria-expanded="false">
                            <i class="fa fa-font" aria-hidden="true"></i>
                            <span class="hide-menu">Voitures dans le garage</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('nouveau_flux')}}"
                           aria-expanded="false">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            <span class="hide-menu">Recette et Depense</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('bilan_par_mois')}}"
                           aria-expanded="false">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            <span class="hide-menu">Bilan Hebdomadaire</span>
                        </a>
                    </li>
                  {{--  <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{asset('template/blank.html')}}"
                           aria-expanded="false">
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span class="hide-menu">Stock de materiaux</span>
                        </a>
                    </li>--}}
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('register')}}"
                           aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="hide-menu">Nouvel Utilisateur</span>
                        </a>
                    </li>
                </ul>

            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $titre }}
                </h2>
            </x-slot>
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid p-4">
            @yield("content")
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        </x-app-layout>

        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center"> 2021 © yves_and_michael - Droits Sous Licence <a
                href="https://devs.matradition.ci/">Voir le site web</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('template/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('template/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/js/app-style-switcher.js')}}"></script>
<script src="{{asset('template/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('template/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('template/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('template/js/custom.js')}}"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="{{asset('template/plugins/bower_components/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('template/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('template/js/pages/dashboards/dashboard1.js')}}"></script>


{{--<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>--}}
<script src="{{asset('js/datatable.min.js')}}"></script>
<script type="application/javascript">
    $( document ).ready(function() {
        fermer_tous_les_garde_fou();
        $('.datatable').DataTable();

        $('.searchable-select').selectize({
            sortField: 'text'
        });
    });
</script>
<script src="{{asset('js/selectize.min.js')}}"></script>
<script src="{{asset('js/mes_fonctions.js')}}"></script>

@yield('script')

</body>

</html>
