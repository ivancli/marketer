<template>
    <div class="cls-content">
        <div class="cls-content-lg panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h3 class="h4 mar-no">Create a New Account</h3>
                    <p class="text-muted">Come join the Nifty community! Let's set up your account.</p>
                </div>
                <ul class="text-danger errors-container p-b-10 p-l-20" v-if="Object.keys(errors).length > 0">
                    <li v-for="error in errors">
                        <div v-if="error.constructor != Array" v-text="error"></div>
                        <div v-else v-for="message in error" v-text="message"></div>
                    </li>
                </ul>
                <form action="/register" method="post" @submit.prevent="submitRegister">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First name" name="first_name"
                                       v-model="first_name" autofocus tabindex="1" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="E-mail" name="email"
                                       v-model="email" tabindex="3" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last name" name="last_name"
                                       v-model="last_name" tabindex="2" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                       v-model="password" tabindex="4" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="checkbox pad-btm text-left">
                        <input id="chk-agree" class="magic-checkbox" type="checkbox" v-model="terms_and_conditions">
                        <label for="chk-agree">
                            I agree with the
                            <a href="#" class="btn-link">Terms and Conditions</a>
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" :disabled="isRegistering">
                        {{ registerButtonText }}
                    </button>
                </form>
            </div>
            <div class="pad-all">
                Already have an account ? <a href="/login" class="btn-link mar-rgt">Sign In</a>

                <div class="media pad-top bord-top">
                    <div class="pull-right">
                        <a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
                        <a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
                        <a href="#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
                    </div>
                    <div class="media-body text-left text-muted">
                        Sign Up with
                    </div>
                </div>
            </div>
        </div>
        <loading v-if="isRegistering"></loading>
    </div>
</template>

<script>
    import loading from '../../fragments/Loading.vue';

    export default{
        components: {
            loading
        },
        mounted(){
            console.info('Register.vue is mounted.');
        },
        data(){
            return {
                isRegistering: false,
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                terms_and_conditions: '',
                errors: {}
            }
        },
        methods: {
            submitRegister () {
                this.isRegistering = true;
                this.errors = {};
                axios.post('/register', this.registerData).then(response => {
                    this.isRegistering = false;
                    if (response.data.redirect_path) {
                        window.location.href = response.data.redirect_path;
                    }
                }).catch(error => {
                    this.isRegistering = false;
                    if (error.response && error.response.status == 422 && error.response.data) {
                        this.errors = error.response.data;
                    }
                })
            }
        },
        computed: {
            registerData(){
                return {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    password: this.password,
                    terms_and_conditions: this.terms_and_conditions,
                }
            },
            registerButtonText(){
                return this.isRegistering ? 'Registering' : 'Register';
            }
        }
    }
</script>

<style>

</style>