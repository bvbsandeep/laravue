<!--Task.vue-->
<template>
    <div class="mx-auto w-4/12 mt-10 bg-blue-200 p-4 rounded-lg">
        <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-2 flex flex-col">
            <h1 class="text-gray-600 py-5 font-bold text-3xl"> Upcoming Tasks </h1>
            <ul class="list-disc text-red-400" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">
                <li>{{value[0]}}</li>
            </ul>
            <p class="list-disc text-red-400" v-if="typeof errors === 'string'">{{errors}}</p>

            <table class="text-left" v-if="tasks"><thead><th>Title</th> <th>Priority</th><th>Due Date</th></thead>
            <tbody  v-for="(value, index) in tasks" :key="index" v-if="tasks">
                <td>{{ value.title }}</td> <td>{{ value.priority }}</td> <td>{{ value.due_date }}</td>
            </tbody>
            </table>

            <router-link
                    class="inline-block align-baseline py-5 font-bold text-sm text-blue-400 hover:text-blue-900"
                    to="/"
                >
                    Home
            </router-link>
        </div>
    </div>
</template>


<script>
import { reactive, ref, onMounted } from "vue";
import {request} from '../helper'
export default {
    name: "TaskList.vue",
     setup() {
        const errors = ref();
        const tasks = ref([]);
        onMounted(() => {
            getTasks();
        });
        const getTasks = async () => {
            try {
                    const result = await request('get', '/api/task');
                    if (result.status === 200 && result.data) {
                        tasks.value = result.data;
                    }

            }
            catch (exception) {
                if(exception.response && exception.response.data && exception.response.data.errors) {
                    errors.value = Object.values(exception.response.data.errors);
                }
                else {
                    errors.value = exception.message;
                }
            }
        }

        return {
            errors,
            tasks
        }
    }
}
</script>
