import { createRouter, createWebHistory } from 'vue-router'

import Homeview from '../views/Home.vue'
import Gameview from '../views/Gameview.vue'
import Profile from '../views/Profile.vue'
import GameStart from '../views/GameStart.vue'
import Levels from '../views/Levels.vue'


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
            {
                path: '/level/:id',
                name: 'level',
                meta: { hideHeaderFooter: true },
                component: Levels
            },
        ]

      },



  ]

  const router = createRouter({
    history: createWebHistory('/'),
    routes
  })

  export default router
