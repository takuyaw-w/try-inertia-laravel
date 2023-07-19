<script setup>
import Layout from "../../Layout/Default.vue";
import { useForm, Link, router, usePage } from "@inertiajs/vue3";
import { ref } from "vue";
const form = useForm({
    email: "",
    password: "",
});

const hasError = ref(false);
const errorMessage = ref("");
function login() {
    hasError.value = false;
    errorMessage.value = "";
    // ログインする
    form.post(route("auth.login"), {
        onSuccess: (e) => {
            hasError.value = e.props.flash.message !== "";
            if (hasError.value) {
                errorMessage.value = e.props.flash.message;
            }
        },
    });
}
</script>
<template>
    <Layout title="Login">
        <template v-if="hasError">
            <div class="alert alert-success">
                {{ errorMessage }}
            </div>
        </template>
        <fieldset>
            <legend>Login Form</legend>
            <form @submit.prevent="login">
                <div>
                    <label>
                        Email:
                        <input type="text" v-model="form.email" />
                    </label>
                </div>
                <div>
                    <label>
                        Password:
                        <input type="password" v-model="form.password" />
                    </label>
                </div>
                <button type="submit">Login</button>
            </form>
            <div v-if="form.hasErrors">
                <p v-for="error of form.errors">{{ error }}</p>
            </div>
            <Link as="button" :href="$route('auth.register')">Register</Link>
        </fieldset>
    </Layout>
</template>

<style scoped></style>
