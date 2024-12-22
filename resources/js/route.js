import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: () => import('./pages/Home.vue')
        },
        {
            path: '/task',
            component: () => import('./pages/Task.vue')
        },
        {
            path: '/tasklist',
            component: () => import('./pages/TaskList.vue')
        }
    ]

})
export default router;
