<script setup>
import { Link } from "@inertiajs/vue3";
import { Head } from "@inertiajs/vue3";
const props = defineProps({
    title: String,
});
</script>

<template>
    <Head v-bind="props" />
    <header class="header">
        <div class="header-inner">
            <h1>{{ props.title }}</h1>
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
