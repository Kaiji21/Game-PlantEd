import { createRouter, createWebHistory } from 'vue-router'

import Homeview from '../views/Home.vue'
import Gameview from '../views/Gameview.vue'
import Profile from '../views/Profile.vue'
import GameStart from '../views/GameStart.vue'


const routes = [
    {
      path: '/',
      name: 'home',
      component: Homeview
    },
    {
        path: '/teste',
        name: 'teste',
        meta: { hideHeaderFooter: true },
        component: GameStart
      },
    {
        path: '/Game',
        name: 'Game',
        meta: { hideHeaderFooter: true },
        component: Gameview,
        children: [
            {
                path: '',
                name: 'Profile',
                component: Profile
            },
            {
                path: 'start',
                name: 'gamestart',
                component: GameStart
            },
        ]

      },



  ]

  const router = createRouter({
    history: createWebHistory('/'),
    routes
  })

  export default router
