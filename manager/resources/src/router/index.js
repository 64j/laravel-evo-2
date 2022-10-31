import { createRouter, createWebHashHistory } from 'vue-router'
//import store from '@/store'

const routes = [
  {
    path: '/',
    name: 'DashboardIndex',
    component: () => import('@/views/Dashboard/Index'),
    meta: {
      layout: 'Default',
      fixTab: true,
      title: '',
      icon: 'fa fa-home',
      class: 'tab-home'
    }
  },
  {
    path: '/document/:id?',
    name: 'DocumentIndex',
    component: () => import('@/views/Document/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/document/:id/list',
    name: 'DocumentList',
    component: () => import('@/views/Document/List'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/elements',
    name: 'ElementsIndex',
    component: () => import('@/views/Elements/Index'),
    meta: {
      layout: 'Default',
      groupTab: true
    }
  },
  {
    path: '/template/:id?',
    name: 'TemplateIndex',
    component: () => import('@/views/Template/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/tv/:id?',
    name: 'TvIndex',
    component: () => import('@/views/Tv/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/chunk/:id?',
    name: 'ChunkIndex',
    component: () => import('@/views/Chunk/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/snippet/:id?',
    name: 'SnippetIndex',
    component: () => import('@/views/Snippet/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/plugin/:id?',
    name: 'PluginIndex',
    component: () => import('@/views/Plugin/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/module/:id?',
    name: 'ModuleIndex',
    component: () => import('@/views/Module/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/module/exec/:id?',
    name: 'ModuleExec',
    component: () => import('@/views/Module/Exec'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/users',
    name: 'UserList',
    component: () => import('@/views/User/List'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/user/:id?',
    name: 'UserIndex',
    component: () => import('@/views/User/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/roles',
    name: 'RoleList',
    component: () => import('@/views/Role/List'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/role/:id?',
    name: 'RoleIndex',
    component: () => import('@/views/Role/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/user-permissions',
    name: 'UserPermissionsIndex',
    component: () => import('@/views/UserPermissions/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/clear-cache',
    name: 'ClearCacheIndex',
    component: () => import('@/views/Cache/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/search',
    name: 'SearchIndex',
    component: () => import('@/views/Search/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/configuration',
    name: 'ConfigurationIndex',
    component: () => import('@/views/Configuration/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/schedules',
    name: 'SchedulesIndex',
    component: () => import('@/views/Schedules/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/event-logs',
    name: 'EventLogList',
    component: () => import('@/views/EventLog/List'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/event-log/:id',
    name: 'EventLogIndex',
    component: () => import('@/views/EventLog/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/system-log',
    name: 'SystemLogIndex',
    component: () => import('@/views/SystemLog/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/system-info',
    name: 'SystemInfoIndex',
    component: () => import('@/views/SystemInfo/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/help',
    name: 'HelpIndex',
    component: () => import('@/views/Help/Index'),
    meta: {
      layout: 'Default'
    }
  },
  {
    path: '/login',
    name: 'AuthLogin',
    component: () => import('@/views/Auth/Login'),
    meta: {
      layout: 'Auth',
      noTab: true
    }
  },
  {
    path: '/logout',
    name: 'AuthLogout',
    redirect: '/login'
  },
  {
    path: '/auth/password/change',
    name: 'AuthPasswordChange',
    component: () => import('@/views/Auth/PasswordChange'),
    meta: {
      layout: 'Auth'
    }
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'PageNotFoundIndex',
    component: () => import('@/views/PageNotFound/Index'),
    meta: {
      layout: 'Blank'
    }
  },
  {
    path: '/redirect',
    component: () => import('@/views/Redirect/Index'),
    hidden: true,
    children: [
      {
        path: '/redirect/:path(.*)',
        component: () => import('@/views/Redirect/Index')
      }
    ]
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

// router.beforeEach((to, from, next) => {
//   const role = store.state['Settings'].user.role
//   if (role) {
//     if (to?.redirectedFrom?.name === 'AuthLogout') {
//       store.dispatch('Settings/del').then(() => next)
//     } else if (to.name === 'AuthLogin') {
//       next('/')
//     } else {
//       next()
//     }
//   } else if (!role) {
//     if (to.name !== 'AuthLogin') {
//       store.dispatch('Settings/del').then(() => next)
//     } else {
//       next()
//     }
//   } else {
//     next()
//   }
// })

router.onError((handler) => {
  console.log('error:', handler)
})

export default router
