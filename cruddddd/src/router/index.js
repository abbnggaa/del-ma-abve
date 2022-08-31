import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "@/views/Dashboard.vue";
// import Tables from "@/views/Tables.vue";
import Billing from "@/views/Billing.vue";
import VirtualReality from "@/views/VirtualReality.vue";
import Profile from "@/views/Profile.vue";
import Rtl from "@/views/Rtl.vue";
import SignIn from "@/views/SignIn.vue";
import SignUp from "@/views/SignUp.vue";

const routes = [
  {
    path: "/",
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
},
  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
  },
  {
    path: "/billing",
    name: "Billing",
    component: Billing,
  },
  {
    path: "/virtual-reality",
    name: "Virtual Reality",
    component: VirtualReality,
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/rtl-page",
    name: "Rtl",
    component: Rtl,
  },
  {
    path: "/sign-in",
    name: "Sign In",
    component: SignIn,
  },
  {
    path: "/sign-up",
    name: "Sign Up",
    component: SignUp,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  linkActiveClass: "active",
});

export default router;
