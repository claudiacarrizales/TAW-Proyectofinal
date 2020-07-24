<template>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Alergias</h1>
                    </div>
                
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Alergias</a></li>
                            <li class="breadcrumb-item active"> Listado de alergias </li>
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
                                <h3 class="card-title"> Lista de alergias registrados </h3>

                                <div class="card-tools">
                                    <button class="btn btn-success" @click="nuevaAlergiaModal"> <i class="fas fa-bug"></i> Crear nueva alergia </button>

                                </div>
                            </div>
                            <!-- /.Cuerpo de la tarjeta -->
                            <div class="card-body table-responsive p-0">
                                <!-- Tabla que despliega la informaci+on de los usuarios registrados -->
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Administración</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="alergia in alergias" :key="alergia.id">
                                        
                                        <td>{{alergia.id}}</td>
                                        <td>{{alergia.nombre}}</td>
                                        <td>{{alergia.tipo}}</td>
                                        
                                        <td>
                                        <button @click="modalEditarAlergia(alergia.id)" class="btn btn-warning"> <i class="fas fa-pen"></i> </button>
                                        <button @click="eliminarAlergia(alergia.id)" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
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

            <!-- Modal -->
            <div class="modal fade" id="modalAlergia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 v-show="!modoedicion" class="modal-title" id="exampleModalLongTitle">Agregar nuevo medicamento</h5>
                            <h5 v-show="modoedicion" class="modal-title" id="exampleModalLongTitle">Actualizar datos del medicamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="modoedicion ? actualizarAlergia() : crearAlergia()" >
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Tipo:</label>
                                <input type="text" id="tipo" name="tipo" class="form-control" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-ban"></i> Cerrar</button>
                            <button v-show="modoedicion" type="submit" class="btn btn-success"> <i class="fas fa-pen"></i> Actualizar</button>
                            <button v-show="!modoedicion" type="submit" class="btn btn-primary"> <i class="fas fa-plus"></i> Registrar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
    export default {
        name: "alergias",
        data(){
            return {
                modoedicion: false,
                alergias: {},
                alergias_editar: {},

                alergias_editar: {
                    id: '',
                    nombre: '',
                    tipo: ''
                }
                
            }
            
        },
        methods:{

            //Metodo que permite obtener los datos de las alergias registradas
            cargaralergias(){
                
                // Hace una peticion a la tabla diseases en la base de datos a traves de la ruta
                axios.get('api/obteneralergias')
                    .then(({data}) => {
                        this.alergias = data;
                    });
            },

            nuevaAlergiaModal(){

                this.modoedicion = false;

                var nombre = document.getElementById("nombre");
                var tipo = document.getElementById("tipo");

                nombre.value = "";
                tipo.value = "";

                $('#modalAlergia').modal('show');
            },

            crearAlergia() {

                var nombre = document.getElementById("nombre");
                var tipo = document.getElementById("tipo");

                if(nombre.value == "" || tipo.value == "" )
                {

                    toast.fire({
                        type: 'error',
                        title: 'Llene todos los campos del formulario'
                    });

                }else{


                    axios.post('api/registrarAlergia', {nombre: nombre.value, tipo: tipo.value})
                    .then((response)=>{
                        
                        //Si la respuesta responde todo bien
                        //Se ejecuta la animacion de la barrita
                        this.cargaralergias();

                        //Una pequeña alerta en la esquina
                        toast.fire({
                            type: 'success',
                            title: 'Alergia creada correctamente'
                        });
                        this.$Progress.finish();

                        //El modal que contiene el formulario desaparece
                        $('#modalAlergia').modal('hide');

                        nombre.value = "";
                        tipo.value = "";

                    }).catch(function (error) {
                        // Maneja el error si la peticion no se llevo a cabo correctamente
                        this.$Progress.fail();
                        console.log(error);
                    })


                }

            },

            modalEditarAlergia(id){
                this.modoedicion = true;
                var nombre = document.getElementById("nombre");
                var tipo = document.getElementById("tipo");
                //Obitene los datos del usuario a eliminar
                for(var i=0; i < this.alergias.length; i++){
                    if( this.alergias[i].id == id){
                        this.alergias_editar = this.alergias[i];
                    }
                }
                nombre.value = this.alergias_editar.nombre;
                tipo.value = this.alergias_editar.tipo;
                $('#modalAlergia').modal('show');
            },

            actualizarAlergia() {

                var nombre = document.getElementById("nombre");
                var tipo = document.getElementById("tipo");

                this.alergias_editar.nombre = nombre.value;
                this.alergias_editar.tipo = tipo.value;

                axios.post('api/actualizarAlergia', this.alergias_editar )
                .then((response)=>{
                    
                    this.cargaralergias();

                    $('#modalAlergia').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Alergia actualizada correctamente'
                    });
                })
                .catch(() => {
                    toast.fire({
                        type: 'success',
                        title: 'Error al actualizar la alergia'
                    });
                });




            },

            eliminarAlergia(id)  {
                swal.fire({
                    title: '¿Eliminar alergia?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'Cacelar',
                }).then((result) => {
                    if (result.value) {

                        axios.delete('api/eliminarAlergia/'+id).then((response)=>{
                            
                            //Pequeña alerta que confirma la eliminacion del usuario
                            swal.fire(
                                'Registro de alergia eliminado',
                                'El registro ha sido eliminado',
                                'success'
                            )

                            this.cargaralergias();

                        }).catch(function (error) {
                            // Maneja el error si la peticion no se llevo a cabo correctamente
                            swal.fire(
                                'Error al eliminar',
                                'El registro no se ha podido eliminar',
                                'error'
                            )
                        })
                    }
                })
            }


        },
        created(){
            this.cargaralergias();
        }
    }
</script>

<style scoped>

</style>
