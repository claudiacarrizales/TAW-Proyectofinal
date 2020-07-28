
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Clinica </title>

    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">

    <script src="https://kit.fontawesome.com/4e3c5501e7.js" crossorigin="anonymous"></script>

    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    

    <nav class="main-header navbar navbar-light nav-flat" style="background: linear-gradient(to right, #6190e8, #a7bfe8);">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <div class="btn-group">
        <h4> Bienvenid@: <b> {{Auth::user()->name}} </b> </h4>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar control-sidebar-light  sidebar-light-primary " style="background: linear-gradient(to right, #6190e8, #a7bfe8);">

        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="{{asset('photos/logo.png')}}" alt="Opcion medica" class="brand-image ">
            <span class="brand-text font-weight-light" id="branlogo" >Opción médica</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <router-link to="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Panel de control
                            </p>
                        </router-link>
                    </li>

                    @if( Auth::user()->tipo == '1' )
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Usuarios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/users" class="nav-link ">
                                    <i class="fas fa-clipboard-list nav-icon"></i>
                                    <p>Lista de usuarios</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if( Auth::user()->tipo == '2' || Auth::user()->tipo == '1' )
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="fas fa-bacterium nav-icon"></i>
                            <p>
                                Enfermedades
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/enfermedades" class="nav-link ">
                                    <i class="fas fa-bacterium nav-icon"></i>                                 
                                    <p>Lista de enfermedades</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if( Auth::user()->tipo == '4' ||  Auth::user()->tipo == '2' || Auth::user()->tipo == '1')
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                        <i class="fas fa-hospital-user nav-icon"></i>
                            <p>
                                Pacientes
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/pacientes" class="nav-link ">
                                    <i class="fas fa-clipboard-list nav-icon"></i>                                 
                                    <p>Lista de pacientes</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if( Auth::user()->tipo == '4' ||  Auth::user()->tipo == '2' || Auth::user()->tipo == '1')
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="fas fa-calendar-alt nav-icon"></i>
                            <p>
                                Citas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        
                        
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/agendarcita" class="nav-link ">
                                    <i class="fas fa-calendar-plus nav-icon"></i>
                                    <p>Agendar cita</p>
                                </router-link>
                            </li>
                        </ul>
                        
                        @if( Auth::user()->tipo == '2' || Auth::user()->tipo == '1')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/citas" class="nav-link ">
                                    <i class="fas fa-clipboard-list nav-icon"></i>                                 
                                    <p>Listado de citas</p>
                                </router-link>
                            </li>
                        </ul>
                        @endif
                        
                    </li>
                    @endif

                    @if( Auth::user()->tipo == '2' || Auth::user()->tipo == '1')
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="fas fa-pills nav-icon"></i>
                            <p>
                                Medicamentos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/medicamentos" class="nav-link ">
                                    <i class="fas fa-clipboard-list nav-icon"></i>                                 
                                    <p>Lista de medicamentos</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if( Auth::user()->tipo == '2' || Auth::user()->tipo == '1')
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="fas fa-allergies nav-icon"></i>
                            <p>
                                Alergias
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/alergias" class="nav-link ">
                                    <i class="fas fa-clipboard-list nav-icon"></i>                                 
                                    <p>Lista de alergias</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    @endif
                    
                    <!--PAGOS-->
                    @if( Auth::user()->tipo == '4' || Auth::user()->tipo == '1')
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="fas fa-money-bill-wave nav-icon"></i>
                            <p>
                                Pagos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/pagos" class="nav-link ">
                                <i class="fas fa-clipboard-list nav-icon"></i>                            
                                    <p>Lista de pagos</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    @endif

                    <!--CAJA DE PAGOS-->
                    @if( Auth::user()->tipo == '4' || Auth::user()->tipo == '1')
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="fas fa-cash-register nav-icon"></i>
                            <p>
                                Caja
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/cajas" class="nav-link ">
                                <i class="fas fa-clipboard-list nav-icon"></i>                            
                                    <p>Lista de caja</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    @endif

                    <!-- <li class="nav-item">
                        <router-link to="/profile" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                            
                            <p>
                                Editar perfil
                            </p>
                        </router-link>
                    </li> -->



                    <li class="nav-item">
                        <a  class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Cerrar Sesión
                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    
    
    <router-view :tipo="'{{Auth::user()->tipo}}'" :id="'{{Auth::user()->id}}'"></router-view>
    <vue-progress-bar></vue-progress-bar>


    
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
