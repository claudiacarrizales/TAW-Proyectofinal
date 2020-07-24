<template>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                       
                                        <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{totalUsuarios}}</h3>

                                            <p>Usuarios</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                            <span class="iconify" data-icon="fa:user"></span>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>{{ totalenfermedades }}</h3>

                                            <p>Enfermedades</p>
                                        </div>
                                        <div class="icon">
                                            <span class="iconify" data-icon="mdi:bacteria" data-inline="false"></span>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3> {{ totalpacientes }} </h3>

                                            <p>Pacientes</p>
                                        </div>
                                        <div class="icon">
                                            <span class="iconify" data-icon="medical-icon:i-outpatient" data-inline="false"></span>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3> {{totalcitas}} </h3>

                                            <p>Citas</p>
                                        </div>
                                        <div class="icon">
                                            <span class="iconify" data-icon="ant-design:calendar-filled" data-inline="false"></span>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Dashboard",

        data(){

            return {
                totalUsuarios : 0,
                totalcitas : 0,
                totalenfermedades : 0,
                totalpacientes : 0
            }
            

        },

        created() {
            this.obtenerDatos();
        },

        methods: {
            obtenerDatos() {
                
                axios.get("/api/totalusuarios").then(resp => { this.totalUsuarios = resp.data });
                axios.get("/api/totalcitas").then(resp => { this.totalcitas = resp.data });
                axios.get("/api/totalenfermedades").then(resp => { this.totalenfermedades = resp.data });
                axios.get("/api/totalpacientes").then(resp => { this.totalpacientes = resp.data });

            }
        
        }
    
    }
</script>

<style scoped>

</style>
