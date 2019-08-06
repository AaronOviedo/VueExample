<template>
    <div class='container'>
        <form action="" v-on:submit.prevent="newDonator()">
            <div class="form-group p-5">
                <div class="form-control m-4 p-1"><label class="mr-5" for="name">Name: </label><input class="rounded" type="text" name="name" id="name" v-model="name" required></div>
                <div class="form-control m-4 p-1"><label class="mr-5" for="email">Email: </label><input class="rounded" type="email" name="email" id="email" v-model="email" required></div>
                <div class="form-control m-4 p-1"><label class="mr-5" for="username">Username: </label><input class="rounded" type="text" name="username" id="username" v-model="username" required></div>
                <div class="form-control m-4 p-1"><label class="mr-5" for="password">Password: </label><input class="rounded" type="password" name="password" id="password" v-model="password" required></div>
                <div class="m-4 p-3"><button type="submit" class="btn btn-primary">Submit</button></div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                name: '',
                email: '',
                username: '',
                password: '',
            }
        },
        methods:{
            newDonator(){
                axios.post('/donate', {
                    name: this.name,
                    email: this.email,
                    username: this.username,
                    password: this.password
                })
                .then(response => {console.log(response.data)})
                .catch(e => {console.log('Error')})
            }
        },
    }
</script>
