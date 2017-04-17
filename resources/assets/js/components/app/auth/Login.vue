<template>

    <!-- LOGIN FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h3 class="h4 mar-no">Account Login</h3>
                    <p class="text-muted">Sign In to your account</p>
                </div>
                <ul class="text-danger errors-container p-b-10 p-l-20" v-if="Object.keys(errors).length > 0">
                    <li v-for="error in errors">
                        <div v-if="error.constructor != Array" v-text="error"></div>
                        <div v-else v-for="message in error" v-text="message"></div>
                    </li>
                </ul>
                <form action="/login" method="post" @submit.prevent="submitLogin">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" autofocus v-model="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" v-model="password">
                    </div>
                    <div class="checkbox">
                        <input id="chk-remember" class="magic-checkbox" type="checkbox" v-model="remember">
                        <label for="chk-remember">Remember me</label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit" :disabled="isLoggingIn">
                        {{ loginButtonText }}
                    </button>
                </form>
            </div>

            <div class="pad-all">
                <a href="/forgot" class="btn-link mar-rgt">Forgot password ?</a>
                <a href="/register" class="btn-link mar-lft">Create a new account</a>

                <div class="media pad-top bord-top">
                    <div class="pull-right">
                        <a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
                        <a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
                        <a href="#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
                    </div>
                    <div class="media-body text-left">
                        Login with
                    </div>
                </div>
            </div>
        </div>
        <loading v-if="isLoggingIn"></loading>
    </div>
</template>

<script>
    import loading from '../../fragments/Loading.vue';

    export default{
        components: {
            loading
        },
        mounted(){
            console.info('Login.vue is mounted.');
        },
        data(){
            return {
                email: '',
                password: '',
                remember: false,
                isLoggingIn: false,
                errors: {}
            }
        },
        methods: {
            submitLogin() {
                this.isLoggingIn = true;
                this.errors = {};
                axios.post('/login', this.loginData).then(response => {
                    this.isLoggingIn = false;
                    if (response.data.redirect_path) {
                        window.location.href = response.data.redirect_path;
                    }
                }).catch(error => {
                    this.isLoggingIn = false;
                    this.password = '';
                    if (error.response && error.response.status == 422 && error.response.data) {
                        this.errors = error.response.data;
                    }
                })
            }
        },
        computed: {
            loginData(){
                return {
                    email: this.email,
                    password: this.password,
                    remember: this.remember ? this.remember : null
                }
            },
            loginButtonText(){
                return this.isLoggingIn ? 'Signing In' : 'Sign In';
            }
        }
    }
</script>

<style>

</style>