<template>
    <div class="container">
        <table class="col-9">
            <th>
                <td class="col-1">Nombre</td>
                <td class="col-2">Monto</td>
                <td class="col-4">Fecha</td>
            </th>
            <tr v-for="donacion in donaciones" :key="donacion.id">
                <td class="col-1">{{donacion.nombre}}</td>
                <td class="col-2">{{donacion.monto}}</td>
                <td class="col-4">{{donacion.created_at}}</td>
                {{total += donacion.monto}}
            </tr>
            <tr>
                <td class="col-4">Total</td>
                <td class="col-4">{{total}}</td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            donaciones: [],
            total: 0
        }
    },

    mounted() {
        axios.get('/myDonations')
        .then(result => {
            console.log(result)
            if(result.data.code == 200){
                this.donaciones = result.data.data
            }else{
                console.log('Error in server')
            }
        })
        .catch(e => {
            console.log('Error')
        })
    },
}
</script>
