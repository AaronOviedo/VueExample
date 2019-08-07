<template>
    <div class="container">
        <form action="" v-on:submit.prevent="newDonation()">
            <div class="form-group">
                <label for="benefactor" class="p-4 pr-5">Benefactor</label>
                <select name="benefactor" id="benefactor" class='form-control' v-model="benefactor_id">
                    <option v-for="benefactor in benefactors" :key="benefactor.id" value="">{{benefactor.name}}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="donator" class="p-4 pr-5">Donador</label>
                <select name="donator" id="donator" class='form-control' v-model="donator_id">
                    <option v-for="donator in donators" :key="donator.id" value="">{{donator.name}}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sum" class="p-4 pr-5">Monto</label>
                <input type="number" name="sum" id="sum" class='form-control p-3' v-model="sum">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
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
                    console.log(result)
                })
                .catch(e => {
                    console.log('Error')
                })
            }
        }
    }
</script>
