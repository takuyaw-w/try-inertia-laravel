<script setup>
import Layout from "../../Layout/Default.vue";
import { useForm, Link, router, usePage } from "@inertiajs/vue3";
import { ref } from "vue";
const form = useForm({
    name: "",
    email: "",
    password: "",
});

function login() {
    // ログインする
    form.post(route("auth.create"), {
        onSuccess: () => {},
    });
}
</script>
<template>
    <Layout title="Register">
        <fieldset>
            <legend>Register Form</legend>
            <form @submit.prevent="login">
                <div>
                    <label>
                        Name:
                        <input type="text" v-model="form.name" />
                    </label>
                </div>
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
                <button type="submit">Create User</button>
            </form>
            <div v-if="form.hasErrors">
                <p v-for="error of form.errors">{{ error }}</p>
            </div>
        </fieldset>
    </Layout>
</template>

<style scoped></style>
