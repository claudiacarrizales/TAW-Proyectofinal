<template>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Enfermedades</h1>
                    </div>
                
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Enfermedades</a></li>
                            <li class="breadcrumb-item active"> Listado de enfermedades </li>
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
                                <h3 class="card-title"> Lista enfermedades registradas </h3>

                                <div class="card-tools">
                                    <button class="btn btn-success" @click="newModal"> <i class="fas fa-user-plus"></i> Crear nuevo registro </button>

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
                                        <th>Causa</th>
                                        <th>Administración</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="enfermedad in enfermedades" :key="enfermedad.id">
                                        
                                        <td>{{enfermedad.id}}</td>
                                        <td>{{enfermedad.nombre}}</td>
                                        <td>{{enfermedad.tipo}}</td>
                                        <td>{{enfermedad.causa}}</td>
                                        
                                        <td>
                                        <button @click="modal_editar_usuario(enfermedad.id)" class="btn btn-warning"> <i class="fas fa-pen"></i> </button>
                                        <button @click="eliminarUsuario(enfermedad.id)" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
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
            <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 v-show="!editMode" class="modal-title" id="exampleModalLongTitle">Agregar usuario</h5>
                            <h5 v-show="editMode" class="modal-title" id="exampleModalLongTitle">Actualizar usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editMode ? actualizarUsuario() : crearUsuario()" >
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" name="name" id="name" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Apellido:</label>
                                <input id="lastName" type="text" name="lastName" class="form-control" >
                            </div>


                            <div class="form-group">
                                <label>Correo:</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Tipo de usuario:</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="1">Administrador</option>
                                    <option value="2">Medico</option>
                                    <option value="3">Medico asociado</option>
                                    <option value="4">Secretaria</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label v-show="!editMode">Contraseña: </label>
                                <input v-show="!editMode" type="password" name="password" id="password" class="form-control" >
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button v-show="editMode" type="submit" class="btn btn-success">Actualizar</button>
                            <button v-show="!editMode" type="submit" class="btn btn-primary">Registrar</button>
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
        name: "Enfermedades",
        data(){
            return {
                editMode: false,
                enfermedades: {},
                enfermedad_editar: {},
            }
            

        },
        methods:{

            //Metodo que permite obtener los datos de las enfermedades registradas
            cargarEnfermedaes(){
                
                // Hace una peticion a la tabla diseases en la base de datos a traves de la ruta
                axios.get('api/obtenerEnfermedades')
                    .then(({data}) => {
                        this.enfermedades = data.data
                        console.log(data);
                    });

                    /*.then(function (response) {
                        // handle success
                        console.log(response);
                        this.enfermedades = response.data;
                    })*/
            },
            newModal(){
                this.editMode = false;
                var nombre = document.getElementById("name");
                var apellido = document.getElementById("lastName");
                var tipo = document.getElementById("type");
                var correo = document.getElementById("email");
                var contrasena = document.getElementById("password");

                nombre.value = "";
                apellido.value = "";
                tipo.value = "1";
                correo.value = "";
                contrasena.value = "";

                $('#modalUsuario').modal('show');
            }


        },
        created(){

            this.cargarEnfermedaes();
        }
    }
</script>

<style scoped>

</style>
