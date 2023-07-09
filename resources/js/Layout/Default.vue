<script setup>
import { Link, Head, usePage } from "@inertiajs/vue3";
const props = defineProps({
    title: String,
});
const page = usePage();
console.log(page.props);
</script>

<template>
    <Head :title="`${page.props.appName} | ${props.title}`" />
    <header class="header">
        <div class="header-inner">
            <h1>{{ page.props.appName }}</h1>
            <ul>
                <li>
                    <Link :href="route('app')">Home</Link>
                </li>
            </ul>
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
.main {
    width: 1000px;
    margin: 0 auto;
}
</style>
