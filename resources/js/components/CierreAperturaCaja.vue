<template>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Caja</h1>
                    </div>
                
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Caja</a></li>
                            <li class="breadcrumb-item active">Caja de cajas</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 ">
                    
                        <!-- Tarjeta del modal -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Caja de cajas</h3>
                            </div>
                            <!-- /.Cuerpo de la tarjeta -->
                            <div class="card-body table-responsive p-0">
                                <!-- Tabla que despliega la informaci+on de los usuarios registrados -->
                                <table class="table table-hover" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Caja</th>
                                        <th>Pago</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="caja in caja_caja" :key="caja.id">
                                        <td>{{caja.id}}</td>
                                        <td>{{caja.id_caja}}</td>
                                        <td>{{caja.caja}}</td>
                                        <td>
                                            <button @click="modal_editar_caja(caja.id)" class="btn btn-warning"> <i class="fas fa-pen"></i> </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>


<script>
    export default {
        name: "User",
        data(){
            return{
                editMode : false,
                pacientes : {},
                cajas_editar: {},
                doctores: {},
                cajas: {}
            }
        },
        methods:{
            //funcion para editar losd atos de un ususario
            actualizarcaja(){
                //Se obtienen los campos del formulario
                var fecha = document.getElementById("fecha");
                var total = document.getElementById("total");
                var detalles = document.getElementById("detalles");
                var tipo = document.getElementById("tipo");

                this.cajas_editar.fecha = fecha.value;
                this.cajas_editar.total = total.value;
                this.cajas_editar.detalles = detalles.value;
                this.cajas_editar.tipo = tipo.value;
                

                //Se hace una peticion para editar los datos, asi como se manda los datos a traves de un objeto de javascript
                axios.post('api/actualizarcajas', this.cajas_editar )
                .then((response)=>{
                    //Si todo salio correctamente se despliega un peuqño mensaje
                    Fire.$emit('despuesActualizar');
                    $('#modalcaja').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'caja actualizado correctamente'
                    });

                    console.log(response);
                })
                .catch(() => {
                    this.$Progress.fail();
                });


            },
            //Metodo que permite obtener los datos de los cajas registrados
            cargarcajas(){

                // Hace una peticion a la tabla pacientes a traves del controllador de PacientesController
                axios.get('api/obtenercajas').then(({data}) => {
                    this.cajas = data
                })

                axios.get('api/obtenerDoctores').then(({data}) => {
                    this.doctores = data
                })
            },
        },
        created(){  
            if(this.$props.tipo == '2' || this.$props.tipo == '3' ){
                this.$router.push('noacceso') 
            }
            this.cargarcajas();
            Fire.$on('despuesActualizar',() => this.cargarcajas());
        }
    }
</script>

<style scoped>

</style>

