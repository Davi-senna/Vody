import { createRouter, createWebHashHistory } from 'vue-router'


const routes = [
  
  {
    path: '/',
    name: 'home',
    component: () => import(/* webpackChunkName: "home" */ '../views/Home.vue')
  },

  {
    path: '/reports/:teste',
    name: 'reports',
    component: () => import(/* webpackChunkName: "reports" */ '../views/Reports.vue')
  }

]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
