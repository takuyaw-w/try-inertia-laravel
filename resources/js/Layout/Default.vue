<script setup>
import { Link, Head, usePage } from "@inertiajs/vue3";
import { computed } from "vue";
const props = defineProps({
    title: String,
});
const page = usePage();

const isLoggedin = computed(() => {
    return page.props.auth.user !== null;
});
</script>

<template>
    <Head :title="`${page.props.appName} | ${props.title}`" />
    <header class="header">
        <div class="header-inner">
            <h1>{{ page.props.appName }}</h1>
            <nav class="nav">
                <ul class="menu">
                    <li>
                        <Link :href="route('app')">Home</Link>
                    </li>
                    <li>
                        <Link :href="route('todo-list.index')">TodoList</Link>
                    </li>
                    <li>
                        <Link :href="route('auth.login')">Login</Link>
                    </li>
                    <li v-if="isLoggedin">
                        <Link :href="route('auth.logout')" method="post"
                            >Logout</Link
                        >
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">
        <slot />
    </main>
</template>

<style>
.header {
    border-bottom: thin solid #ccc;
}
.header-inner {
    display: flex;
    align-items: center;
    width: 1000px;
    margin: 0 auto;
}
.menu {
    display: flex;
    list-style: none;
    gap: 10px;
    font-size: 18px;
}
.main {
    width: 1000px;
    margin: 0 auto;
}
</style>
