<template>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Pacientes</h1>
                    </div>
                
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Pacientes</a></li>
                            <li class="breadcrumb-item active">Lista de pacientes</li>
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
                                <h3 class="card-title">Lista de pacientes</h3>

                                <div class="card-tools">
                                    <button class="btn btn-success" @click="modalNuevoPaciente"> <i class="fas fa-user-injured"></i> Registrar paciente </button>

                                </div>
                            </div>
                            <!-- /.Cuerpo de la tarjeta -->
                            <div class="card-body table-responsive p-0">
                                <!-- Tabla que despliega la informaci+on de los usuarios registrados -->
                                <table class="table table-hover" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Edad</th>
                                        <th>Altura</th>
                                        <th>Peso</th>
                                        <th>Sexo</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="paciente in pacientes" :key="paciente.id">
                                        <td>{{paciente.id}}</td>
                                        <td>{{paciente.nombre}}</td>
                                        <td>{{paciente.apellido}}</td>
                                        <td>{{paciente.edad}}</td>
                                        <td>{{paciente.altura}}</td>
                                        <td>{{ paciente.peso }}</td>
                                        <td>{{paciente.sexo}}</td>
                                        <td>{{paciente.fecha_nacimiento}}</td>

                                        <td>
                                        <button @click="modal_editar_usuario(paciente.id)" class="btn btn-warning"> <i class="fas fa-pen"></i> </button>
                                        <button @click="eliminarUsuario(paciente.id)" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
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
            <div class="modal fade" id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 v-show="!editMode" class="modal-title" id="exampleModalLongTitle">Registrar paciente</h5>
                            <h5 v-show="editMode" class="modal-title" id="exampleModalLongTitle">Actualizar paciente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editMode ? actualizarUsuario() : crearUsuario()" >
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" id="nombre" name="nombre"  class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Apellido:</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" >
                            </div>


                            <div class="form-group">
                                <label>Edad:</label>
                                <input type="number" id="edad" name="edad" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Altura:</label>
                                <input type="number" step=".01" id="altura" name="altura" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Peso:</label>
                                <input type="number" step=".01" id="peso" name="peso" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Sexo:</label>
                                <select class="form-control" name="sexo" id="sexo">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Fecha de Nacimiento:</label>
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-ban"></i> Cerrar</button>
                            <button v-show="editMode" type="submit" class="btn btn-success"> <i class="fas fa-edit"></i> Actualizar</button>
                            <button v-show="!editMode" type="submit" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Registrar</button>
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
        name: "User",
        data(){
            return{
                editMode : false,
                pacientes : {},
                pacientes_editar: {},
                doctores: {}

            }
        },
        methods:{

            //funcion para editar losd atos de un ususario
            actualizarUsuario(){
                //Se obtienen los campos del formulario
                var nombre = document.getElementById("nombre");
                var apellido = document.getElementById("apellido");
                var edad = document.getElementById("edad");
                var altura = document.getElementById("altura");
                var peso = document.getElementById("peso");
                var sexo = document.getElementById("sexo");
                var fecha_nacimiento = document.getElementById("fecha_nacimiento");

                this.pacientes_editar.nombre = nombre.value;
                this.pacientes_editar.apellido = apellido.value;
                this.pacientes_editar.edad = edad.value;
                this.pacientes_editar.altura = altura.value;
                this.pacientes_editar.peso = peso.value;
                this.pacientes_editar.sexo = sexo.value;
                this.pacientes_editar.fecha_nacimiento = fecha_nacimiento.value;
                

                //Se hace una peticion para editar los datos, asi como se manda los datos a traves de un objeto de javascript
                axios.post('api/actualizarPaciente', this.pacientes_editar )
                .then((response)=>{
                    //Si todo salio correctamente se despliega un peuqño mensaje
                    Fire.$emit('despuesActualizar');
                    $('#modalPaciente').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'Paciente actualizado correctamente'
                    });

                    console.log(response);
                })
                .catch(() => {
                    this.$Progress.fail();
                });


            },

            modal_editar_usuario(id){
                this.editMode = true;

                //Obitene los datos del usuario a eliminar
                for(var i=0; i < this.pacientes.length; i++){
                    if( this.pacientes[i].id == id){
                        this.pacientes_editar = this.pacientes[i];
                    }
                }
                
                //Se obtienen los campos del formulario
                var nombre = document.getElementById("nombre");
                var apellido = document.getElementById("apellido");
                var edad = document.getElementById("edad");
                var altura = document.getElementById("altura");
                var peso = document.getElementById("peso");
                var sexo = document.getElementById("sexo");
                var fecha_nacimiento = document.getElementById("fecha_nacimiento");

                //Limpia los campos del formulario
                nombre.value = "";
                apellido.value = "";
                edad.value = "";
                altura.value = "";
                peso.value = "";
                sexo.value = "";
                fecha_nacimiento.value = "";

                
                //Abre el modal para esta vez para editar los datos
                $('#modalPaciente').modal('show');

                //Llena los campos con los del usuario a editar
                
                nombre.value = this.pacientes_editar.nombre;
                apellido.value = this.pacientes_editar.apellido;
                edad.value = this.pacientes_editar.edad;
                altura.value = this.pacientes_editar.altura;
                peso.value = this.pacientes_editar.peso;
                sexo.value = this.pacientes_editar.sexo;
                fecha_nacimiento.value = this.pacientes_editar.fecha_nacimiento;
                
            },

            modalNuevoPaciente(){
                this.editMode = false;

                var nombre = document.getElementById("nombre");
                var apellido = document.getElementById("apellido");
                var edad = document.getElementById("edad");
                var altura = document.getElementById("altura");
                var peso = document.getElementById("peso");
                var sexo = document.getElementById("sexo");
                var fecha_nacimiento = document.getElementById("fecha_nacimiento");

                nombre.value = "";
                apellido.value = "";
                edad.value = "";
                altura.value = "";
                peso.value = "";
                sexo.value = "";
                fecha_nacimiento.value = "";

                $('#modalPaciente').modal('show');
            },

            eliminarUsuario(id){

                var paciente_eliminar;
                for(var i=0; i < this.pacientes.length; i++){
                    if( this.pacientes[i].id == id){
                        paciente_eliminar = this.pacientes[i];
                    }
                }

                swal.fire({
                    title: 'Eliminar paciente',
                    text: "¿Estás seguro que quieres eliminar al paciente " + paciente_eliminar.nombre + " " + paciente_eliminar.apellido + " ?" ,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.value) {

                        axios.delete('api/eliminarPaciente/'+id).then((response)=>{
                            
                            //Pequeña alerta que confirma la eliminacion del usuario
                            swal.fire(
                                'Paciente eliminado',
                                'El paciente ha sido eliminado',
                                'success'
                            )

                            Fire.$emit('despuesEliminar');

                        }).catch(function (error) {
                            // Maneja el error si la peticion no se llevo a cabo correctamente
                            swal.fire(
                                'Error al eliminar',
                                'El paciente no se ha podido eliminar',
                                'error'
                            )
                        })
                    }
                })
            },

            //Metodo que permite obtener los datos de los pacientes registrados
            cargarPacientes(){

                // Hace una peticion a la tabla pacientes a traves del controllador de PacientesController
                axios.get('api/obtenerPacientes').then(({data}) => {
                    this.pacientes = data
                })

                axios.get('api/obtenerDoctores').then(({data}) => {
                    this.doctores = data
                })

            },

            crearUsuario(){
                

                //Realiza una peticion de tipo post a la ruta registrarUsuarios que se encarga de guardar los datos pasados por medio del formulario del modal

                //Se obtienen los campos del formulario
                var nombre = document.getElementById("nombre");
                var apellido = document.getElementById("apellido");
                var edad = document.getElementById("edad");
                var altura = document.getElementById("altura");
                var peso = document.getElementById("peso");
                var sexo = document.getElementById("sexo");
                var fecha_nacimiento = document.getElementById("fecha_nacimiento");

                console.log(nombre.value);

                //Valida que el formulario tenga todos los datos
                if( nombre.value == "" || apellido.value == "" || edad.value == "" || altura.value == "" || peso.value == ""
                    || sexo.value == "" || fecha_nacimiento.value == "" ){
                    //Si no es asi aparece un pequeño mensaje de error
                    toast.fire({
                            type: 'error',
                            title: 'Llene todos los datos'
                        });
                }else{
                    this.$Progress.start();
                    axios.post('api/registrarPaciente', {nombre: nombre.value, apellido: apellido.value, edad: edad.value , altura: altura.value, peso: peso.value, sexo: sexo.value ,fecha_nacimiento: fecha_nacimiento.value })
                    .then((response)=>{
                        
                        //Si la respuesta responde todo bien
                        //Se ejecuta la animacion de la barrita
                        Fire.$emit('despuesCrear');

                        //Una pequeña alerta en la esquina
                        toast.fire({
                            type: 'success',
                            title: 'Usuario creado correctamente'
                        });
                        this.$Progress.finish();

                        //El modal que contiene el formulario desaparece
                        $('#modalPaciente').modal('hide');

                        nombre.value = "";
                        apellido.value = "";
                        edad.value = "";
                        altura.value = "";
                        peso.value = "";
                        sexo.value = "";
                        fecha_nacimiento.value = "";

                    }).catch(function (error) {
                        // Maneja el error si la peticion no se llevo a cabo correctamente
                        this.$Progress.fail();
                        console.log(error);
                    })

                }

            }
        },
        props: {
            tipo: String
        },
        created(){
            
            if(this.$props.tipo == '4' || this.$props.tipo == '3' ){
                this.$router.push('noacceso') 
            }

            this.cargarPacientes();
            Fire.$on('despuesCrear',() => this.cargarPacientes());
            Fire.$on('despuesEliminar',() => this.cargarPacientes());
            Fire.$on('despuesActualizar',() => this.cargarPacientes());
        }
    }
</script>

<style scoped>

</style>

