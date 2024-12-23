<!--Task.vue-->
<template>
    <div class="mx-auto w-4/12 mt-10 bg-blue-200 p-4 rounded-lg">
        <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-2 flex flex-col">
            <h1 class="text-gray-600 py-5 font-bold text-3xl"> Create Task </h1>
            <ul class="list-disc text-red-400" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">
                <li>{{value[0]}}</li>
            </ul>
            <p class="list-disc text-red-400" v-if="typeof errors === 'string'">{{errors}}</p>
            <form method="post" @submit.prevent="handleCreateTask">
            <div class="mb-4">
                <label
                    class="block text-grey-darker text-sm font-bold mb-2"
                    for="title"
                >
                    Title
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                    id="title"
                    type="text"
                    maxlength="255"
                    v-model="form_data.title"
                    required
                />
            </div>
            <div class="mb-4">
                <label
                    class="block text-grey-darker text-sm font-bold mb-2"
                    for="priority"
                >
                    Priority
                </label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 id="priority"
                        v-model="form_data.priority" required>
                    <option value="" selected>Choose Priority</option>
                    <option value="low"> Low</option>
                    <option value="medium"> Medium</option>
                    <option value="high"> High</option>
                </select>

            </div>
            <div class="mb-4">
                <label
                    class="block text-grey-darker text-sm font-bold mb-2"
                    for="due_date"
                >
                    Due date
                </label>
                <input
                    class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3"
                    id="due_date"
                    type="date"
                    :min="min_date"
                    v-model="form_data.due_date"
                    required
                />
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"
                        type="submit" > Submit
                </button>
                <router-link
                    class="inline-block align-baseline font-bold text-sm text-blue-400 hover:text-blue-900"
                    to="tasklist">
                    Task List
                </router-link>
            </div>
            </form>
        </div>
    </div>
</template>


<script>
import { reactive, ref } from "vue";
import {request} from '../helper'
export default {
    name: "Task.vue",
    setup() {
        const errors = ref();
        const min_date = ref();
        min_date.value = new Date().toISOString().split('T')[0];
        const form_data = reactive({
            title: '',
            priority: '',
            due_date: ''
        });
        const handleCreateTask = async (event) => {
            try {
                const result = await request('post', '/api/task', form_data);
                if (result.status === 200 && result.data) {
                    alert("Task created!");
                    event.target.reset();
                }

            } catch (exception) {
                if(exception.response && exception.response.data && exception.response.data.errors) {
                    errors.value = Object.values(exception.response.data.errors);
                }
                else {
                    errors.value = exception.message;
                }
            }
        }
        return {
            form_data,
            errors,
            handleCreateTask,
            min_date
        }
    }
}
</script>
