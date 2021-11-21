<template>
  <div class="container md-5">
    <div class="card mt-4">
        <div class="card-header h4">
            Login
        </div>
        <div class="card-body">
            <form @submit.prevent="login">
                <div class="form-group py-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" v-model="user.username" placeholder="username">
                    <div class="mt-2 alert alert-danger" v-if="validation.username">
                        test
                    </div>
                </div>
                <div class="form-group py-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" v-model="user.password" placeholder="Enter Password">
                    <div class="mt-2 alert alert-danger" v-if="validation.password">
                        test
                    </div>
                </div>
                <button type="submit" class="btn btn-primary py-2">Login</button>
            </form>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'login',
    data(){
        return {
            loggedIn: localStorage.getItem('loggedIn'),
            token: localStorage.getItem('token'),
            user: [],
            validation: [],
            loginFailed: null
        }
    },
    methods: {
        login(){
            if(this.user.username && this.user.password){
                axios.post('http://127.0.0.1:8000/api/v1/login', {
                    username: this.user.username,
                    password: this.user.password
                }).then(res => {
                    console.log(res)

                    if(res.data.status){
                        localStorage.setItem('loggedIn', true)
                        localStorage.setItem('token', res.data.data.token)
                        this.loggedIn =  true

                    }else{
                        this.loginFailed = true
                    }
                }).catch(err => {
                    console.log(err)
                })
            }
        }
    }
}
</script>

<style>

</style>