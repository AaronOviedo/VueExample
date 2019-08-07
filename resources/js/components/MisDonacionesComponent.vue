<template>
    <div class="container">
        <div class="col-md-15 float-right">
            <h1 class="col-5 mr-2">Total: </h1>
            <h1 class="col-5 ">{{ total }}</h1>
        </div>
        <el-table class="col-9" :data="donaciones" width='100%'>
            <el-table-column prop="nombre" label="Nombre" width="200px"/>
            <el-table-column prop="monto" label="Monto" width="100px"/>
            <el-table-column prop="created_at" label="Fecha" width="400px"/>
        </el-table>
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
                this.total = result.data.total
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
