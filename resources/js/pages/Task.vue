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
                    v-model="form.email"
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
                <input
                    class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3"
                    id="priority"
                    type="text"
                    v-model="form.priority"
                    required
                />
            </div>
            <div class="mb-4">
                <label
                    class="block text-grey-darker text-sm font-bold mb-2"
                    for="duedate"
                >
                    duedate
                </label>
                <input
                    class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3"
                    id="duedate"
                    type="date"
                    v-model="form.duedate"
                    required
                />
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded"
                    type="submit"
                >
                    Submit
                </button>
                <router-link
                    class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker"
                    to="task"
                >
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
import useRouter from 'vue-router';
export default {
    name: "Task.vue",
    setup() {
        const errors = ref();
        const router = useRouter();
        const form_data = reactive({
            title: '',
            priority: '',
            duedate: ''
        });
        const handleCreateTask = async () => {
            try {
                const result = await request('post', '/api/task', form_data);
                if (result.status === 200 && result.data) {

                }

            } catch (exception) {

            }
        }
        return {
            form_data,
            errors,
            handleCreateTask,
        }
    }
}
</script>
