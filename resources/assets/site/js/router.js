import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'list',
        component: () => import('./views/List')
    },
    {
        path: '/converter',
        name: 'converter',
        component: () => import('./views/Converter')
    },
]

const router = createRouter({
    routes,
    history: createWebHistory(process.env.BASE_URL)
})


export default router
