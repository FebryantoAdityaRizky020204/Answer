<template>
  <div class="container md-5">
    <div class="card mt-4">
        <div class="card-header h4">
            Login
        </div>
        <div class="card-body">
            <div class="alert alert-danger md-5" v-if="loginFailed">
                Username or Password wrong
            </div>
            <form @submit.prevent="login">
                <div class="form-group py-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" v-model="user.username" placeholder="username">
                    <div class="mt-2 alert alert-danger" v-if="validation.username">
                        {{validation.username[0]}}
                    </div>
                </div>
                <div class="form-group py-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" v-model="user.password" placeholder="Enter Password">
                    <div class="mt-2 alert alert-danger" v-if="validation.password">
                        {{validation.password[0]}}
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
import {reactive, ref} from 'vue'
import {useRouter} from 'vue-router'


export default {
    name: 'login',
    setup(){
        const router = useRouter()
        const user = reactive({
            username: '',
            password: ''
        })
        const validation = ref([])
        const loginFailed = ref(false)

        function login(){
            let username = user.username
            let password = user.password

            axios.post("http://127.0.0.1:8000/api/v1/login", {
                username,
                password
            }).then(res => {
                if(res.data.status){
                    localStorage.setItem('token', res.data.token)
                    localStorage.setItem('userId', res.data.user_id)

                    return router.push({
                        name: 'Home'
                    })
                }

            }).catch(err => {
                console.log(err.response.data)
                console.log(err.response.data.status)

                if(err.response.data.status == false){
                    loginFailed.value = true
                }

                validation.value = err.response.data
            })
        }

        return {
            user,
            validation,
            loginFailed,
            login
        }
    }
}
</script>

<style>

</style>