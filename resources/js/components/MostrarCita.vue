<template>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Cita {{ this.$props.id }} </h1>
                    </div>
                
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Citas</a></li>
                            <li class="breadcrumb-item active">Mostrar cita</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--VISTA DEL ANALISIS CLINICO-->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- general form elements -->
                        <div class="card card-secondary">
                            <div class="card-header card bg-secondary">
                            <h3 class="card-title"><span class="info-box-icon bg-red"><i class="fas fa-user"></i></span><b> Paciente</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form">
                            <div class="card-body">
                                <!--permitira mostrar el nombre del paciente en la vista-->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <label for="exampleInputEmail1">Nombre: </label>
                                        </div>
                                        <div class="col-md-6">
                                            <h5> {{ this.cita.nombre }} </h5>
                                        </div>
                                    </div>
                                </div>
                                <!--permitira mostrar el apellido del paciente en la vista-->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <label for="exampleInputEmail1">Apellido: </label>
                                        </div>
                                        <div class="col-md-6">
                                            <h5> {{ this.cita.apellido }} </h5>
                                        </div>
                                    </div>
                                </div>
                                <!--permitira mostrar la edad del paciente en la vista-->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <label for="exampleInputEmail1">Edad: </label>
                                        </div>
                                        <div class="col-md-6">
                                            <h5> {{ this.cita.edad }}  </h5>
                                        </div>
                                    </div>
                                </div>
                                <!--permitira mostrar la altura del paciente en la vista-->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <label for="exampleInputEmail1">Altura: </label>
                                        </div>
                                        <div class="col-md-6">
                                            <h5> {{ this.cita.altura }}  </h5>
                                        </div>
                                    </div>
                                </div>
                                <!--permitira mostrar el peso del paciente en la vista-->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <label for="exampleInputEmail1">Peso: </label>
                                        </div>
                                        <div class="col-md-6">
                                            <h5> {{ this.cita.peso }}  </h5>
                                        </div>
                                    </div>
                                </div>
                                <!--permitira mostrar el sexo del paciente en la vista-->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <label for="exampleInputEmail1">Sexo: </label>
                                        </div>
                                        <div class="col-md-6">
                                            <h5> {{ this.cita.sexo }} </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <label for="exampleInputEmail1">IMC: </label>
                                        </div>
                                        <div class="col-md-6">
                                            <h5> {{ (this.cita.peso / (this.cita.altura * this.cita.altura)).toFixed(2) }} </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <label for="exampleInputEmail1">Condición: </label>
                                        </div>
                                        <div class="col-md-6">

                                            <span v-if="this.cita.peso / (this.cita.altura * this.cita.altura) < 18.5" class="tag tag-success">
                                                <h5> Peso inferior </h5>
                                            </span>
                                            <span v-else-if="this.cita.peso / (this.cita.altura * this.cita.altura) > 18.5 && this.cita.peso / (this.cita.altura * this.cita.altura) < 24.9 " class="tag tag-success"> 
                                                <h5> Normal </h5>
                                            </span>
                                            <span v-else-if="this.cita.peso / (this.cita.altura * this.cita.altura) > 25.0 && this.cita.peso / (this.cita.altura * this.cita.altura) <  29.9" class="tag tag-success"> 
                                               <h5> Sobrepeso </h5>
                                            </span>
                                            <span v-else-if="this.cita.peso / (this.cita.altura * this.cita.altura) > 30.0" class="tag tag-success"> 
                                                <h5> Obesidad </h5>
                                            </span>

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <!-- /.card-body -->
                            </form>
                        </div>
                    </div>


                    <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="card card-secondary">
                            <div class="card-header card bg-secondary">
                            <h3 class="card-title"><span class="info-box-icon bg-red"><i class="fas fa-user-md"></i></span><b> Análisis clínico</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form">
                            <div class="card-body">
                                <!--SELECCION DE ALERGIS DE LA CITA-->
                                <div class="form-group">
                                    <label>Alergias</label>
                                    <v-select multiple @input="hola" :value="selected" :options="opciones" />
                                </div>

                                <!--SELECCION DE PADECIMIENTO DE LA CITA-->
                                <div class="form-group">
                                    <label>Padecimiento</label>
                                    <v-select multiple @input="agregarPadecimiento" :value="selectedPadecimiento" :options="opcionesPadecimiento" />
                                </div>

                                <!--SELECCION DE MEDICAMENTO DE LA CITA-->
                                <div class="form-group">
                                    <label>Medicamento</label>
                                    <v-select multiple @input="agregarMedicamento" :value="selectedMedicamento" :options="opcionesMedicamento" />
                                </div>
                                <!--OBSERVACIONES APARTADO-->
                                <div class="form-group">
                                    <label>Observaciones</label>
                                   <textarea class="form-control" rows='3'> </textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    

    export default {
        name: "mostrarcita",
        data(){
            return {
                //propiedades del componente
                selected: [],
                opciones: [],
                selectedPadecimiento: [],
                opcionesPadecimiento: [],
                selectedMedicamento: [],
                opcionesMedicamento: [],
                cita: {},
                citashoy: {},
                paciente:{},
                alergias:{}
            }
        },
        methods:{
            hola(args){
                //selección de una alergia de la lista
                console.log( args );
                //guardado de la seleccion
                this.selected = args;
                //inserta la alergia seleccionada a la bd
                var alergiaId=[];
                for(var i=0;i<this.selected.length;i++){
                    //comparando el nombre con el id de la alergia 
                    for(var j=0;j<this.alergias.length;j++){
                        if(this.selected[i]==this.alergias[j].nombre){
                            alergiaId.push(this.alergias[j].id);
                            break;
                        }
                    }
                }
                //pasar el id
                var alergiaInsert={id:this.cita.paciente_id, ids:alergiaId};

                axios.post('api/guardarAlergia', alergiaInsert)
                .then((response)=>{ 
                    toast.fire({
                        type: 'success',
                        title: 'Alergia guardada'
                    });
                    console.log(response);
                })
                .catch(() => {
                    toast.fire({
                        type: 'success',
                        title: 'Error al guardar alergía'
                    });
                });
            },
            agregarPadecimiento(args){
                this.selectedPadecimiento = args;
            },
            agregarMedicamento(args){
                this.selectedMedicamento = args;
            },
            guardarAlergia(){
                console.log("DATOS DE LAS ALERGIAS");
                console.log(this.cita.paciente_id);
                //para no eliminar las alergias que ya estaan seleccionadas en las citas
                
            },
            obtenerDatosCita(){

                axios.get('api/obtenerDatosCita/'+this.$props.id)
                .then(({data}) => {
                    this.cita = data[0];
                    console.log("datos de la cita");
                    console.log(this.cita);

                    axios.get('api/obteneralergiasPaciente/'+this.cita.paciente_id)
                    .then(({data}) => {
                        console.log(data);  
                        for(var i=0; i < data.length; i++){
                            this.selected.push(data[i].nombre);
                        }
                    });


                });
                //obtener los datos de la tabla en este caso el nmbre de alergias
                axios.get('api/obteneralergias')
                .then(({data}) => {
                    //this.opciones = data;
                    this.alergias=data;
                    for(var i=0; i < data.length; i++){
                        this.opciones.push(data[i].nombre);
                    }
                });
                
                //obtener los datos de la tabla en este caso el nmbre del padecimiento
                axios.get('api/obtenerEnfermedades')
                .then(({data}) => {
                    //this.opciones = data;
                    for(var i=0; i < data.length; i++){
                        this.opcionesPadecimiento.push(data[i].nombre);
                    }
                });
                //obtener los datos de la tabla en este caso el nmbre del medicamento
                axios.get('api/obtenermedicamentos')
                .then(({data}) => {
                    //this.opciones = data;
                    for(var i=0; i < data.length; i++){
                        this.opcionesMedicamento.push(data[i].nombre);
                    }
                });

            }
        },
        props: {
            id: Number
        },
        created(){
            console.log("ID de la cita " + this.$props.id);
            this.obtenerDatosCita();
            this.guardarAlergia();
        }
    }
</script>


<style scoped>
  
</style>
