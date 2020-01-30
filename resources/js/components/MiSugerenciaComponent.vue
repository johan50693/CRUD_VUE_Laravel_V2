<template>
    <div class="container">
        <form-component @new="addSugerencia">
            
        </form-component>
        <br>
        <sugerencia-component v-for="(sugerencia, index) in sugerencias" :key="sugerencia.id" 
                                :sugerencia="sugerencia" @delete="deleteSugerencia(index)" @update="updateSugerencia(index, ...arguments)">
            
        </sugerencia-component>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                sugerencias:[]
            }
        },

        mounted() {

            axios.get('sugerencia')
                .then((response) => {
                     this.sugerencias=response.data;
                });
        },
        methods:{
            addSugerencia(sugerencia){
                this.sugerencias.push(sugerencia);
            },
            deleteSugerencia(index){
                this.sugerencias.splice(index,1);
            },
            updateSugerencia(index,sugerencia){
                this.sugerencias[index]=sugerencia;
                // this.sugerencias.splice(index,1);
            }
        }
    }
</script>
