<template>
    <div class="container">
        <form action="" v-on:submit.prevent="newDonation()">
            <div class="form-group">
                <label for="benefactor" class="p-4 pr-5">Benefactor</label>
                <select name="benefactor" id="benefactor" class='form-control'>
                    <option v-for="benefactor in benefactors" :key="benefactor.id" value="">{{benefactor.name}}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="donator" class="p-4 pr-5">Donador</label>
                <select name="donator" id="donator" class='form-control'>
                    <option v-for="benefactor in benefactors" :key="benefactor.id" value="">{{benefactor.name}}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sum" class="p-4 pr-5">Monto</label>
                <input type="number" name="sum" id="sum" class='form-control p-3'>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['benefactors', 'donators'],
        // data(){
        //     return {
        //         benefactors: [{
        //             'id':   1,
        //             'name': 'Aaron'
        //         }, {
        //             'id':   2,
        //             'name': 'test'
        //         }]
        //     }
        // },

        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            newDonation(){
                
            }
        }
    }
</script>
