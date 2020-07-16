
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

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">

    <script src="https://kit.fontawesome.com/4e3c5501e7.js" crossorigin="anonymous"></script>

    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

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
        <a href="index3.html" class="brand-link">
            <span class="brand-image-xl logo-xs"> <center> <h1> Clinica </h1> </center> </span>
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

                        <!--<ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/citas" class="nav-link ">
                                    <i class="fas fa-clipboard-list nav-icon"></i>                                 
                                    <p>Listado de citas</p>
                                </router-link>
                            </li>
                        </ul>-->
                    </li>

                    

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

    

    <router-view></router-view>
    <vue-progress-bar></vue-progress-bar>


    
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
