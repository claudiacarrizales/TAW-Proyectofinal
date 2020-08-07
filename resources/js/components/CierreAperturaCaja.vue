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
                                        <th>Total</th>
                                        <th>Fecha apertura</th>
                                        <th>Fecha cierre</th>
                                        <th>Status</th>
                                        <th>Cerrar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="caja in cajas" :key="caja.id">
                                        <td>{{caja.id}}</td>
                                        <td>{{caja.total}}</td>
                                        <td>{{caja.f_apertura}}</td>
                                        <td>{{caja.f_cierre}}</td>
                                        <td><span v-if="caja.f_cierre==null" class="badge badge-success">Abierta</span>
                                            <span v-else class="badge badge-danger">Cerrada</span>                                            
                                        </td>
                                        <td>
                                            <button v-if="caja.f_cierre==null" @click="actualizarcaja(caja.id)" class="btn btn-warning"> <i class="fas fa-lock"></i> <b>¿Cerrar caja? </b></button>
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
            actualizarcaja(id){
                swal.fire({
                    title: 'Cerrar caja',
                    text: "¿Estás seguro que quieres Cerrar la caja?" ,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.value) {
                        //Se hace una peticion para editar los datos, asi como se manda los datos a traves de un objeto de javascript
                        axios.post('api/actualizarcajas', {id:id})
                        .then((response)=>{
                            //Si todo salio correctamente se despliega un peuqño mensaje
                            Fire.$emit('despuesActualizar');
                            toast.fire({
                                type: 'success',
                                title: 'caja actualizado correctamente'
                            });
                        })
                        .catch(() => {
                            this.$Progress.fail();
                        });
                    }
                })
            },
            //Metodo que permite obtener los datos de los cajas registrados
            cargarcajas(){

                // Hace una peticion a la tabla pacientes a traves del controllador de PacientesController
                axios.get('api/obtenercajas').then(({data}) => {
                    this.cajas = data
                })
            },
        },
        props: {
            tipo: String
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

