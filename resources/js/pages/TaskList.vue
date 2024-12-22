<!--Task.vue-->
<template>
    <div class="mx-auto w-4/12 mt-10 bg-blue-200 p-4 rounded-lg">
        <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-2 flex flex-col">
            <h1 class="text-gray-600 py-5 font-bold text-3xl"> Upcoming Tasks </h1>
            <ul class="list-disc text-red-400" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">
                <li>{{value[0]}}</li>
            </ul>
            <p class="list-disc text-red-400" v-if="typeof errors === 'string'">{{errors}}</p>
            <router-link
                    class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker"
                    to="/"
                >
                    Home
            </router-link>
        </div>
    </div>
</template>


<script>
import { reactive, ref } from "vue";
import {request} from '../helper'
export default {
    name: "TaskList.vue",
    setup() {
        const errors = ref();
        return {
            errors
        }
    }
}
</script>
