<template>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Radiografias compartidas</h1>
                    </div>
                
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Radiografias compartidas</a></li>
                            <li class="breadcrumb-item active"> Lista de radiografias compartidas </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="container">
                <div class="row justify-content-center">


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Lista de radiografias compartidas </h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Medico que comparte</th>
                                        <th>Comentario</th>
                                        <th>Administracion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="radiografia in radiografias" :key="radiografia.id">
                                        <td>
                                            <a :href="'http://142.93.49.246/images/'+radiografia.ruta" target="_blank">
                                                <img :src="'/images/'+radiografia.ruta" style="width:100px;">
                                            </a>
                                        </td>
                                        <td>
                                            {{radiografia.nombreMedico + " " + radiografia.apellidoMedico}}
                                        </td>
                                        <td>{{radiografia.comentario}}</td>
                                        <td>
                                            <button @click="abrirModalComentario(radiografia.id_usuario_archivo)" class="btn btn-primary btn-block"> <i class="fas fa-comment"></i> Dejar comentario</button>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="comentarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Registrar/Editar comentario </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="guardarComentario()" >
                                    
                                    <div class="form-group">
                                        <label>Comentario: </label>
                                        
                                        <textarea id="observaciones_ta" class="form-control" rows='3'> </textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary"> <i class="fas fa-comment-medical"></i> Guardar </button>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
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
        name: "Radiografias",
        data(){
            return {
                image:'',
                radiografias: {},
                asociados : [],
                radiografia: {}
            }
        },
        methods:{

            //Metodo que permite obtener los datos de las medicamentos registradas
            cargarRadiografias(){
                
                axios.get('api/obtenerRadiografiasCompartidas/'+this.$props.id)
                .then(({data}) => {
                    this.radiografias = data;
                });

                axios.get('api/obtenerMedicosAsociados').then(({data}) => {
                    this.asociados = data;
                })

            },

            abrirModalComentario(id)  {

                console.log("Id de la radiografia abierta " + id);
                $('#comentarioModal').modal('show');

                var comentario_actual = document.getElementById("observaciones_ta");

                for(var i = 0; i < this.radiografias.length; i++ ){
                    if(this.radiografias[i].id_usuario_archivo == id){
                        this.radiografia = this.radiografias[i];
                        comentario_actual.value= this.radiografias[i].comentario;
                        break;
                        
                    }
                }
                
                console.log(this.radiografia);
                
            },

            guardarComentario(){
                var comentario_actual = document.getElementById("observaciones_ta");

                axios.post('api/guardarComentarioRadiografia', {id: this.radiografia.id_usuario_archivo , comentario: comentario_actual.value})
                    .then((response)=>{

                        console.log(response);

                        //Una pequeña alerta en la esquina
                        toast.fire({
                            type: 'success',
                            title: 'Comentario guardado'
                        });

                        //El modal que contiene el formulario desaparece
                        $('#comentarioModal').modal('hide');

                        this.cargarRadiografias();

                    }).catch(function (error) {
                        console.log(error);
                    })
            }
        },
        props: {
            tipo: String,
            id: String
        },
        created(){
            if(this.$props.tipo == '2' || this.$props.tipo == '4'){
                this.$router.push('noacceso') 
            }
            this.cargarRadiografias();
        }
    }
</script>

<style scoped>

</style>
