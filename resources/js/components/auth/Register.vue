<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-6">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Register
                                        </h1>
                                    </div>
                                    <form class="user" @submit.prevent="register">
                                        <label>Name</label>
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="form.name"
                                                id="exampleInputFirstName"
                                                placeholder="Enter Your Name"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.name"
                                            >{{ errors.name[0] }}</small
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="exampleInputEmail"
                                                v-model="form.email"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Email Address"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.email"
                                            >{{ errors.email[0] }}</small
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                v-model="form.password"
                                                id="exampleInputPassword"
                                                placeholder="Password"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.password"
                                            >{{ errors.password[0] }}</small
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                v-model="
                                                    form.password_confirmation
                                                "
                                                id="exampleInputPasswordRepeat"
                                                placeholder="Confirm Password"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <button
                                                type="submit"
                                                class="
                                                    btn btn-primary btn-block
                                                "
                                            >
                                                Register
                                            </button>
                                        </div>
                                    </form>
                                    <hr />
                                    <div class="text-center">
                                        <router-link
                                            class="font-weight-bold small"
                                            to="/login"
                                        >Already have an
                                            account?</router-link
                                        >
                                    </div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                confirm_password: null,
            },
            errors: {},
        }
    },
    methods: {
        register() {
            axios
                .post("/api/auths/register", this.form)
                .then((res) => {
                    console.log(res)
                    User.responseAfterLogin(res);
                    if(res.status == 200) {
                        this.$router.push('home');
                    }
                })
                .catch((error) => (this.errors = error.response.data.errors))
        }

    }
}
</script>
