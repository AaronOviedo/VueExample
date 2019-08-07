<template>
    <div class="container">
        <form action="" v-on:submit.prevent="newDonation()">
            <div class="form-group">
                <label for="benefactor" class="p-4 pr-5">Benefactor</label>
                <el-select name="benefactor" id="benefactor" clearable class='row' v-model="benefactor_id" placeholder="Elegir un benefactor">
                    <el-option v-for="benefactor in benefactors" :key="benefactor.id" v-bind:value="benefactor.id" :label="benefactor.name"/>
                </el-select>
            </div>

            <div class="form-group">
                <label for="donator" class="p-4 pr-5">Donador</label>
                <el-select name="donator" id="donator" class='row' v-model="donator_id" placeholder="Elegir un donador">
                    <el-option v-for="donator in donators" :key="donator.id" v-bind:value="donator.id" :label="donator.name"/>
                </el-select>
            </div>

            <div class="form-group">
                <label for="sum" class="p-4 pr-5">Monto</label>
                <input type="number" name="sum" id="sum" class='row p-3' v-model="sum">
            </div>

            <div class="form-group">
                <el-button type="primary" native-primary="submit">Donar</el-button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                benefactor_id: '',
                donator_id: '',
                sum: '',
                benefactors: [],
                donators: []
            }
        },

        mounted() {
            console.log('Component mounted.')
            axios.get('/donators')
            .then(result => {
                if(result.data.code == 200){
                    console.log(result.data.message)
                    this.donators = result.data.data
                }else{
                    console.log(result.data.message)
                }
            }).catch(e=>{
                console.log('Error in donators')
            })

            axios.get('/benefactors')
            .then(result => {
                if(result.data.code == 200){
                    console.log(result.data.message)
                    this.benefactors = result.data.data
                }else{
                    console.log(result.data.message)
                }
            }).catch(e=>{
                console.log('Error in benefactors')
            })
        },
        methods:{
            newDonation(){
                axios.post('/donate', {
                    benefactor: this.benefactor_id,
                    donator: this.donator_id,
                    sum: this.sum
                })
                .then(result => {
                    if(result.data.code == 201)
                        console.log(result.data.message)
                    else
                        console.log('Error de server')
                })
                .catch(e => {
                    console.log('Error')
                })
            }
        }
    }
</script>
