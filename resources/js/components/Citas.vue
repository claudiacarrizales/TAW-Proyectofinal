<template>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Citas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Citas</a></li>
                            <li class="breadcrumb-item active"> Listado de citas </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> <b> Citas de hoy </b> </h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Detalles</th>
                                            <th>Paciente</th>
                                            <th>Doctor</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="cita in citashoy" :key="cita.id">
                                            <td>{{cita.id}}</td>
                                            <td>{{cita.fecha}}</td>
                                            <td>{{cita.hora}}</td>
                                            <td>{{cita.detalles}}</td>
                                            <td>{{cita.nombre + " " + cita.apellido}}</td>
                                            <td>{{cita.nombredoctor + " " + cita.apellidodoctor}}</td>
                                            <td>
                                                <button @click="abrirMostrarPagina(cita.id)" class="btn btn-success"> <i class="fas fa-eye"></i> </button>
                                                <button class="btn btn-danger"> <i class="fas fa-file-pdf"></i> </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> <b> Otras citas </b> </h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Detalles</th>
                                            <th>Paciente</th>
                                            <th>Doctor</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="cita in citas" :key="cita.id">
                                            <td>{{cita.id}}</td>
                                            <td>{{cita.fecha}}</td>
                                            <td>{{cita.hora}}</td>
                                            <td>{{cita.detalles}}</td>
                                            <td>{{cita.nombre + " " + cita.apellido}}</td>
                                            <td>{{cita.nombredoctor + " " + cita.apellidodoctor}}</td>
                                            <td>
                                                <button @click="abrirMostrarPagina(cita.id)" class="btn btn-success"> <i class="fas fa-eye"></i> </button>
                                                <button class="btn btn-danger"> <i class="fas fa-file-pdf"></i> </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "lista_citas",
        data(){
            return {
                citas: {},
                citashoy: {}
            }
        },
        methods:{
            abrirMostrarPagina(id){
                console.log("Abrir la cita con id " + id);
                //this.$router.push('mostrarcita');
                //this.$props
                this.$router.push({ name: 'mostrarcita', params: {id: id}})
            },
            cargarcitas(){

                if( this.$props.tipo == '2' ){

                    axios.get('api/obtnerCitas/'+this.$props.id)
                    .then(({data}) => {
                        this.citas = data;
                        console.log(data);
                    });

                    axios.get('api/obtenerCitasHoy/'+this.$props.id)
                    .then(({data}) => {
                        this.citashoy = data;
                        console.log(data);
                    });

                }else{
                    axios.get('api/obtnerCitas/0')
                    .then(({data}) => {
                        this.citas = data;
                        console.log(data);
                    });

                    axios.get('api/obtenerCitasHoy/0')
                    .then(({data}) => {
                        this.citashoy = data;
                        console.log(data);
                    });
                }
                
            }
        },
        props: {
            tipo: String,
            id: String
        },
        created(){
            if(this.$props.tipo == '4' || this.$props.tipo == '3' ){
                this.$router.push('noacceso') 
            }
            this.cargarcitas();
            console.log("ID del usuario " + this.$props.id);
        }
    }
</script>

<style scoped>

</style>
