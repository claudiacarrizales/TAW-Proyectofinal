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
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>150</h3>

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
                                            <h3>53<sup style="font-size: 20px">%</sup></h3>

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
                                            <h3> 44 </h3>

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
                                            <h3>65</h3>

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
        name: "Dashboard"
    }
</script>

<style scoped>

</style>
