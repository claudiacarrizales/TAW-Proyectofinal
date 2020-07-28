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

        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header">Componente para editar el perfil del usuario</div>

                            <div class="card-body">
                                Contenido
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
        name: "mostrarcita",
        data(){
            return {
                cita: {},
                citashoy: {}
            }
        },
        methods:{
            obtenerDatosCita(){

                axios.get('api/obtenerDatosCita/'+this.$props.id)
                .then(({data}) => {
                    this.cita = data;
                    console.log(data);
                });

            }
        },
        props: {
            id: Number
        },
        created(){
            console.log("ID de la cita " + this.$props.id);
            this.obtenerDatosCita();
        }
    }
</script>


<style scoped>

</style>
