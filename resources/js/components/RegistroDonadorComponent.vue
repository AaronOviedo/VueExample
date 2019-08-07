<template>
    <div class='container'>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form action="" v-on:submit.prevent="newDonator()">
                        <div class="form-group p-2">
                            <div class="row m-4 p-1"><label class="mr-5" for="name">Name: </label><input class="rounded" type="text" name="name" id="name" v-model="name" required></div>
                            <div class="row m-4 p-1"><label class="mr-5" for="email">Email: </label><input class="rounded" type="email" name="email" id="email" v-model="email" required></div>
                            <div class="row m-4 p-1"><label class="mr-5" for="username">Username: </label><input class="rounded" type="text" name="username" id="username" v-model="username" required></div>
                            <div class="row m-4 p-1"><label class="mr-5" for="password">Password: </label><input class="rounded" type="password" name="password" id="password" v-model="password" required></div>
                            <div class="mt-2     ml-3 p-3"><el-button type="primary" native-primary="submit">Registrar</el-button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                axios.post('/donator', {
                    name: this.name,
                    email: this.email,
                    username: this.username,
                    password: this.password
                })
                .then(response => {
                    if(response.data.code == 201)
                        window.location = 'home';
                    else
                        alert('Error, contact the administrator')
                })
                .catch(e => {console.log('Error')})
            }
        },
    }
</script>
