<script setup>
import Layout from "../../Layout/Default.vue";
import { useForm, Link } from "@inertiajs/vue3";
const props = defineProps({
    todo: {
        type: Object,
        required: true,
    },
});

const editForm = useForm("createTodo", {
    content: props.todo.content,
    status: props.todo.status,
});

function update() {
    editForm.put(route("todo-list.update", props.todo.id), {
        preserveScroll: true,
        onSuccess: () => {},
    });
}
</script>
<template>
    <Layout title="TodoList">
        <fieldset>
            <legend>Edit Todo</legend>
            <form @submit.prevent="update">
                <input type="text" v-model="editForm.content" />
                <select v-model="editForm.status">
                    <option value="Todo">Todo</option>
                    <option value="Doing">Doing</option>
                    <option value="Done">Done</option>
                </select>
                <button type="submit">編集</button>
                <div v-if="editForm.hasErrors">
                    <p v-for="error of editForm.errors">{{ error }}</p>
                </div>
            </form>
        </fieldset>
    </Layout>
</template>
