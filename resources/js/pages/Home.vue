<!--Task.vue-->
<template>
    <div class="mx-auto w-4/12 mt-10 bg-blue-200 p-4 rounded-lg">
        <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-2 flex flex-col">
            <h1 class="text-gray-600 py-5 font-bold text-3xl"> Menu </h1>
            <router-link
                    class="inline-block align-baseline font-bold text-sm text-blue-400 hover:text-blue-900"
                    to="task">
                    Create Task
            </router-link>

            <router-link
                    class="inline-block align-baseline py-2 font-bold text-sm text-blue-400 hover:text-blue-900"
                    to="tasklist">
                    Task List
            </router-link>
        </div>
    </div>
</template>


<script>
import { reactive, ref } from "vue";
import {request} from '../helper'
export default {
    name: "Home.vue",
    setup() {
    }
}
</script>
