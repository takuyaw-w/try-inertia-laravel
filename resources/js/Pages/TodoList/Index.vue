<script setup>
import Layout from "../../Layout/Default.vue";
import { useForm, Link } from "@inertiajs/vue3";
const props = defineProps({
    todos: {
        type: Array,
        required: true,
    },
});

const createForm = useForm("createTodo", {
    content: "",
    status: "Todo",
});

function register() {
    createForm.post(route("todo-list.create"), {
        preserveScroll: true,
        onSuccess: () => {
            createForm.reset();
        },
    });
}

function deleteTodo(id) {
    const result = globalThis.confirm("Are you sure?");
    if (result) {
        createForm.delete(route("todo-list.delete", id), {
            preserveScroll: true,
        });
    }
}
</script>
<template>
    <Layout title="TodoList">
        <fieldset>
            <legend>Add Todo</legend>
            <form @submit.prevent="register">
                <input type="text" v-model="createForm.content" />
                <select v-model="createForm.status">
                    <option value="Todo">Todo</option>
                    <option value="Doing">Doing</option>
                    <option value="Done">Done</option>
                </select>
                <button type="submit">追加</button>
                <div v-if="createForm.hasErrors">
                    <p v-for="error of createForm.errors">{{ error }}</p>
                </div>
            </form>
        </fieldset>
        <ul v-if="props.todos.length >= 0">
            <li v-for="todo in props.todos" :key="todo.id">
                <div class="todo">
                    <h3 class="todo-title">{{ todo.content }}</h3>
                    <div :class="`todo-status ${todo.status.toLowerCase()}`">
                        {{ todo.status }}
                    </div>
                    <div class="todo-actions">
                        <Link
                            :href="route('todo-list.edit', todo.id)"
                            as="button"
                            >編集</Link
                        >
                        <button @click="deleteTodo(todo.id)">削除</button>
                    </div>
                </div>
            </li>
        </ul>
        <div v-else>
            <p>Empty...</p>
        </div>
    </Layout>
</template>

<style scoped>
.todo {
    display: flex;
    align-items: center;
    gap: 10px;
}
.todo-title {
    font-size: 18px;
}
.todo-status {
    font-size: 14px;
}
.todo-status.todo {
    background-color: yellow;
}
.todo-status.doing {
    background-color: yellowgreen;
    color: white;
}
.todo-status.done {
    background-color: green;
    color: white;
}
.todo-actions {
    display: flex;
    gap: 10px;
}
</style>
