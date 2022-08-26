//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [
    {
        path: '/',
        name: 'user.index-user',
        component: () => import( /* webpackChunkName: "user.index" */ '@/views/user/Index.vue')
    },
    {
        path: '/create',
        name: 'user.create-user',
        component: () => import( /* webpackChunkName: "user.create" */ '@/views/user/Create.vue')
    },
    {
        path: '/edit/:id',
        name: 'user.edit-user',
        component: () => import( /* webpackChunkName: "user.edit" */ '@/views/user/Edit.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes  // config routes
})

export default router