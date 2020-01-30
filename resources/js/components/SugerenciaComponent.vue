<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <div class="card">
                <div class="card-header text-center bg-info text-white">Fecha de publicacion: {{sugerencia.created_at}}</div>

                <div class="card-body bg-light">
                    <input v-if="editMode" type="text" class="form-control" name="" v-model="sugerencia.description">
                    <p v-else >{{sugerencia.description}}</p>
                </div>

                <div class="card-footer text-muted bg-light">
                    <div class="row">
                        <div v-if="editMode" class="col-md-6">
                            <button type="button" class="btn btn-success btn-block" v-on:click="onClickUpdate()">
                                Guardar Cambios
                            </button>
                        </div>
                        <div v-else class="col-md-6">
                            <button type="button" class="btn btn-info btn-block" v-on:click="onClickEdit()">Editar</button>
                        </div>
                        
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger btn-block" v-on:click="onClickDelete()">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['sugerencia'],
        data(){
            return {
                editMode:false
            };
        },
        mounted() {
            console.log('Component Sugerencia.');
        },
        methods:{
            onClickDelete(){
                axios.delete(`sugerencia/${this.sugerencia.id}`)
                    .then(() => {
                        this.$emit('delete');
                    });
                },
            onClickEdit(){
                this.editMode=true;
            },
            onClickUpdate(){
                const params= {
                    description: this.sugerencia.description
                };
                axios.put(`sugerencia/${this.sugerencia.id}`,params)
                    .then((response) => {
                        this.editMode=false;
                        const sugerencia=response.data;
                        this.$emit('update',this.sugerencia);
                    });

            }
        }
    }
</script>
