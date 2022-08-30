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
    },
    {
        path: '/catatan',
        name: 'catatan.index-catatan',
        component: () => import( /* webpackChunkName: "catatan.index" */ '@/views/catatan/Index.vue')
    },
    {
        path: '/catatan-create',
        name: 'catatan.create-catatan',
        component: () => import( /* webpackChunkName: "catatan.create" */ '@/views/catatan/Create.vue')
    },
    {
        path: '/catatan-edit/:id',
        name: 'catatan.edit-catatan',
        component: () => import( /* webpackChunkName: "catatan.edit" */ '@/views/catatan/Edit.vue')
    },
    {
        path: '/pap',
        name: 'pap.index-pap',
        component: () => import( /* webpackChunkName: "pap.index" */ '@/views/pap/Index.vue')
    },
    {
        path: '/pap-create',
        name: 'pap.create-pap',
        component: () => import( /* webpackChunkName: "pap.create" */ '@/views/pap/Create.vue')
    },
    {
        path: '/pap-edit/:id',
        name: 'pap.edit-pap',
        component: () => import( /* webpackChunkName: "pap.edit" */ '@/views/pap/Edit.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes  // config routes
})

export default router