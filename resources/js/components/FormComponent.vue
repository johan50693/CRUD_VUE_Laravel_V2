<template>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-info text-white">Lista de sugerencias</div>
                <div class="card-body bg-light">
                    
                    <form action="" v-on:submit.prevent="newSugerencia()">
                        <div class="form-group">
                            <label for="content">Nueva Sugerencia: </label>
                            <input id="content" type="text" class="form-control" name="content" v-model="description" >
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                description:''
            }
        },
        mounted() {
            console.log('Component Form.');
        },
        methods:{
            newSugerencia(){
                const params={
                    description: this.description
                };

                this.description='';
                axios.post('sugerencia',params)
                        .then((response) => {
                            const sugerencia=response.data;
                            this.$emit('new',sugerencia);
                        });
            }
        }
    }
</script>
