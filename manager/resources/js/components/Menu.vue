<template>
  <div class="menu" @click.stop="click">
    <div>

      <ul class="nav">

        <li @mouseover="hoverItem">

          <router-link :to="{ name: 'DashboardIndex' }" class="home">
            <span class="logo hover:animate-spin"></span>
            <span class="pl-4 hidden md:inline-block">Evolution</span>
            <sub class="ml-1 text-xs text-gray-400">{{ $root.config('settings_version') }}</sub>
          </router-link>

        </li>

        <li v-if="$root.hasPermissions(['edit_template', 'edit_snippet', 'edit_chunk', 'edit_plugin'])" @mouseover="hoverItem">

          <div>
            <i class="fa fa-th md:hidden"/>
            <span>{{ $root.lang('elements') }}</span>
          </div>

          <ul>

            <li v-if="$root.hasPermissions('edit_template')" @mouseover="hoverSubItem" @mouseenter="getSubMenu('template', list.templates)">

              <router-link :to="{ name: 'ElementsIndex', query: { resourcesTab: 0 } }">
                <i class="fa fa-newspaper mr-3"/>
                {{ $root.lang('manage_templates') }}
                <i class="fa fa-angle-right absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul v-if="list.templates.length">

                <li @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'TemplateIndex', params: { id: '' } }">
                    <i class="fa fa-plus mr-3"/>
                    {{ $root.lang('new_template') }}
                  </router-link>
                </li>

                <li v-for="item in list.templates" :key="'item-template-' + item.id" @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'TemplateIndex', params: { id: item.id } }">
                    <i v-if="item.locked" class="fa fa-lock absolute right-4 text-rose-500 text-xs"/>
                    {{ item.templatename }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>
                </li>

              </ul>

            </li>

            <li v-if="$root.hasPermissions('edit_snippet')" @mouseover="hoverSubItem" @mouseenter="getSubMenu('tv', list.tvs)">

              <router-link :to="{ name: 'ElementsIndex', query: { resourcesTab: 1 } }">
                <i class="fa fa-list-alt mr-3"/>
                {{ $root.lang('tmplvars') }}
                <i class="fa fa-angle-right absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul v-if="list.tvs.length">

                <li @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'TvIndex', params: { id: '' } }">
                    <i class="fa fa-plus mr-3"/>
                    {{ $root.lang('new_tmplvars') }}
                  </router-link>
                </li>

                <li v-for="item in list.tvs" :key="'item-tv-' + item.id" @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'TvIndex', params: { id: item.id } }"
                               :class="{ 'italic': item.locked, 'text-rose-700' : item.disabled }">
                    {{ item.name }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>
                </li>

              </ul>

            </li>

            <li v-if="$root.hasPermissions('edit_chunk')" @mouseover="hoverSubItem" @mouseenter="getSubMenu('chunk', list.chunks)">

              <router-link :to="{ name: 'ElementsIndex', query: { resourcesTab: 2 } }">
                <i class="fa fa-th-large mr-3"/>
                {{ $root.lang('manage_htmlsnippets') }}
                <i class="fa fa-angle-right absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul v-if="list.tvs.length">

                <li @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'ChunkIndex', params: { id: '' } }">
                    <i class="fa fa-plus mr-3"/>
                    {{ $root.lang('new_htmlsnippet') }}
                  </router-link>
                </li>

                <li v-for="item in list.chunks" :key="'item-chunk-' + item.id" @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'ChunkIndex', params: { id: item.id } }"
                      :class="{ 'text-rose-700' : item.disabled }">
                    <i v-if="item.locked" class="fa fa-lock absolute right-4 text-rose-500 text-xs"/>
                    {{ item.name }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>
                </li>

              </ul>

            </li>

            <li v-if="$root.hasPermissions('edit_snippet')" @mouseover="hoverSubItem" @mouseenter="getSubMenu('snippet', list.snippets)">

              <router-link :to="{ name: 'ElementsIndex', query: { resourcesTab: 3 } }">
                <i class="fa fa-code mr-3"/>
                {{ $root.lang('manage_snippets') }}
                <i class="fa fa-angle-right absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul v-if="list.snippets.length">

                <li @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'SnippetIndex', params: { id: '' } }">
                    <i class="fa fa-plus mr-3"/>
                    {{ $root.lang('new_snippet') }}
                  </router-link>
                </li>

                <li v-for="item in list.snippets" :key="'item-snippet-' + item.id" @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'SnippetIndex', params: { id: item.id } }"
                               :class="{ 'text-rose-700' : item.disabled }">
                    <i v-if="item.locked" class="fa fa-lock absolute right-4 text-rose-500 text-xs"/>
                    {{ item.name }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>
                </li>

              </ul>

            </li>

            <li v-if="$root.hasPermissions('edit_plugin')" @mouseover="hoverSubItem" @mouseenter="getSubMenu('plugin', list.plugins)">

              <router-link :to="{ name: 'ElementsIndex', query: { resourcesTab: 4 } }">
                <i class="fa fa-plug mr-3"/>
                {{ $root.lang('manage_plugins') }}
                <i class="fa fa-angle-right absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul v-if="list.plugins.length">

                <li @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'PluginIndex', params: { id: '' } }">
                    <i class="fa fa-plus mr-3"/>
                    {{ $root.lang('new_plugin') }}
                  </router-link>
                </li>

                <li v-for="item in list.plugins" :key="'item-plugin-' + item.id" @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'PluginIndex', params: { id: item.id } }"
                               :class="{ 'text-rose-700' : item.disabled }">
                    <i v-if="item.locked" class="fa fa-lock absolute right-4 text-rose-500 text-xs"/>
                    {{ item.name }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>
                </li>

              </ul>

            </li>

            <li v-if="$root.hasPermissions('edit_module')" @mouseover="hoverSubItem" @mouseenter="getSubMenu('module', list.modules)">

              <router-link :to="{ name: 'ElementsIndex', query: { resourcesTab: 5 } }">
                <i class="fa fa-cubes mr-3"/>
                {{ $root.lang('modules') }}
                <i class="fa fa-angle-right absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul v-if="list.modules.length">

                <li @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'ModuleIndex', params: { id: '' } }">
                    <i class="fa fa-plus mr-3"/>
                    {{ $root.lang('new_module') }}
                  </router-link>
                </li>

                <li v-for="item in list.modules" :key="'item-module-' + item.id" @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'ModuleIndex', params: { id: item.id } }"
                               :class="{ 'text-rose-700' : item.disabled }">
                    <i v-if="item.locked" class="fa fa-lock absolute right-4 text-rose-500 text-xs"/>
                    {{ item.name }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>
                </li>

              </ul>

            </li>

          </ul>

        </li>

        <li v-if="$root.hasPermissions('exec_module')" @mouseover="hoverItem" @mouseenter="getSubMenu('module', list.modules)">

          <div>
            <i class="fa fa-cubes md:hidden"/>
            <span>{{ $root.lang('modules') }}</span>
          </div>

          <ul v-if="list.modules.length">

            <li v-for="item in list.modules" :key="'item-module-exec-' + item.id" @mouseover="hoverSubItem" @mouseenter="subMenuEnter">
              <router-link :to="{ name: 'ModuleExec', query: { id: item.id } }">
                <i class="fa fa-cube mr-3"/>
                {{ item.name }}
              </router-link>
            </li>

          </ul>

        </li>

        <li v-if="$root.hasPermissions('edit_user', 'edit_web_user', 'edit_role', 'access_permissions', 'web_access_permissions')" @mouseover="hoverItem">

          <div>
            <i class="fa fa-users md:hidden"/>
            <span>{{ $root.lang('users') }}</span>
          </div>

          <ul>

            <li v-if="$root.hasPermissions('edit_user')" @mouseover="hoverSubItem">
              <router-link :to="{ name: 'UserList' }">
                <i class="fa fa-user-circle mr-3"/>
                {{ $root.lang('users') }}
              </router-link>
            </li>

            <li v-if="$root.hasPermissions('edit_role')" @mouseover="hoverSubItem">
              <router-link :to="{ name: 'RoleList' }">
                <i class="fa fa-legal mr-3"/>
                {{ $root.lang('role_management_title') }}
              </router-link>
            </li>

            <li v-if="$root.hasPermissions('access_permissions')" @mouseover="hoverSubItem">
              <router-link :to="{ name: 'UserPermissionsIndex' }">
                <i class="fa fa-universal-access mr-3"/>
                {{ $root.lang('manager_permissions') }}
              </router-link>
            </li>

          </ul>

        </li>

        <li v-if="$root.hasPermissions('empty_cache')" @mouseover="hoverItem">

          <div>
            <i class="fa fa-wrench md:hidden"/>
            <span>{{ $root.lang('tools') }}</span>
          </div>

          <ul>

            <li @mouseover="hoverSubItem">
              <router-link :to="{ name: 'ClearCacheIndex' }">
                <i class="fa fa-recycle mr-3"/>
                {{ $root.lang('refresh_site') }}
              </router-link>
            </li>

            <li @mouseover="hoverSubItem">
              <router-link :to="{ name: 'SearchIndex' }">
                <i class="fa fa-search mr-3"/>
                {{ $root.lang('search') }}
              </router-link>
            </li>

          </ul>

        </li>

      </ul>

    </div>
    <div>

      <ul class="nav">

        <li>
          <span @click.stop="toggleMode">
            <i class="fa" :class="[ darkMode ? 'fa-sun' : 'fa-moon' ]"/>
          </span>
        </li>

        <li @mouseover="hoverItem">
          <span>
            <i class="fa fa-search"/>
          </span>

          <!--          <form
                        class="flex h-full items-center hidden1 absolute right-0 top-0 after:content-[''] after:fixed after:left-0 after:top-0 after:right-0 after:h-12 after:z-20 after:bg-black/75 hidden">
                      <input type="text"
                             class="relative z-50 bg-transparent w-60 py-1 text-sm">
                    </form>-->
        </li>

        <li @mouseover="hoverItem">
          <a :href="$root.config('SITE_URL')" class="flex h-full items-center px-3 md:px-4" target="_blank">
            <i class="fa fa-desktop"/>
          </a>
        </li>

        <li @mouseover="hoverItem">

          <div>
            <span class="mr-2">{{ $store.getters['Auth/username'] }}</span>
            <i class="fa fa-user-circle text-xl"/>
          </div>

          <ul>

            <li @mouseover="hoverSubItem">
              <router-link :to="{ name: 'AuthPasswordChange' }">
                <i class="fa fa-lock mr-3"/>
                {{ $root.lang('change_password') }}
              </router-link>
            </li>

            <li @mouseover="hoverSubItem">
              <a href="logout">
                <i class="fa fa-sign-out mr-3"/>
                {{ $root.lang('logout') }}
              </a>
            </li>

          </ul>

        </li>

        <li v-if="$root.hasPermissions(['settings', 'view_eventlog', 'logs', 'help'])" @mouseover="hoverItem">

          <div>
            <i class="fa fa-cogs text-xl"/>
          </div>

          <ul>

            <li v-if="$root.hasPermissions('settings')" @mouseover="hoverSubItem">
              <router-link :to="{ name: 'ConfigurationIndex' }">
                <i class="fa fa-sliders mr-3"/>
                {{ $root.lang('edit_settings') }}
              </router-link>
            </li>

            <li @mouseover="hoverSubItem">
              <router-link :to="{ name: 'SchedulesIndex' }">
                <i class="fa fa-calendar mr-3"/>
                {{ $root.lang('site_schedule') }}
              </router-link>
            </li>

            <li v-if="$root.hasPermissions('view_eventlog')" @mouseover="hoverSubItem">
              <router-link :to="{ name: 'EventLogList' }">
                <i class="fa fa-exclamation-triangle mr-3"/>
                {{ $root.lang('eventlog_viewer') }}
              </router-link>
            </li>

            <template v-if="$root.hasPermissions('logs')">

              <li @mouseover="hoverSubItem">
                <router-link :to="{ name: 'SystemLogIndex' }">
                  <i class="fa fa-user-secret mr-3"/>
                  {{ $root.lang('view_logging') }}
                </router-link>
              </li>

              <li @mouseover="hoverSubItem">
                <router-link :to="{ name: 'SystemInfoIndex' }">
                  <i class="fa fa-info-circle mr-3"/>
                  {{ $root.lang('view_sysinfo') }}
                </router-link>
              </li>

            </template>

            <li v-if="$root.hasPermissions('help')" @mouseover="hoverSubItem">
              <router-link :to="{ name: 'HelpIndex' }">
                <i class="fa fa-question-circle mr-3"/>
                {{ $root.lang('help') }}
              </router-link>
            </li>

          </ul>

        </li>

      </ul>

    </div>
  </div>
</template>

<script>
export default {
  name: 'MenuView',
  data () {
    return {
      darkMode: false,
      counter: 0,
      list: {
        templates: [],
        tvs: [],
        chunks: [],
        snippets: [],
        plugins: [],
        modules: []
      }
    }
  },

  setup () {
    document.addEventListener('click', () => {
      const active = document.querySelector('.app > .app-header.active')
      if (active) {
        active.firstElementChild.classList.remove('active')
        active.classList.remove('active')
      }
    })
  },

  created () {
    this.darkMode = localStorage.getItem('EVO.THEME.MODE') === 'dark'
    if (this.darkMode) {
      document.documentElement.classList.add('dark')
    }
  },

  methods: {
    toggleMode () {
      if (this.darkMode) {
        this.darkMode = false
        document.documentElement.classList.remove('dark')
        localStorage.removeItem('EVO.THEME.MODE')
      } else {
        this.darkMode = true
        document.documentElement.classList.add('dark')
        localStorage.setItem('EVO.THEME.MODE', 'dark')
      }
    },
    click (event) {
      if (event.target.closest('.menu ul.nav > li > div')) {
        if (this.$el.classList.contains('active')) {
          this.$el.classList.remove('active')
          this.$el.parentElement.classList.remove('active')
        } else {
          this.$el.classList.add('active')
          this.$el.parentElement.classList.add('active')
        }
      } else {
        this.$el.classList.remove('active')
        this.$el.parentElement.classList.remove('active')
      }
    },

    hoverItem (event) {
      this.$el.querySelectorAll('ul.nav > li.hover').forEach(i => i.classList.remove('hover'))
      event.currentTarget.classList.add('hover')
    },

    hoverSubItem (event) {
      this.$el.querySelectorAll('ul.nav > li > ul li.hover').forEach(i => i.classList.remove('hover'))
      event.currentTarget.parentElement.querySelectorAll(':scope > li.hover').forEach(i => i.classList.remove('hover'))
      event.currentTarget.classList.add('hover')
    },

    getSubMenu (method, list) {
      clearTimeout(this.counter)

      for (let i in this.list) {
        if (this.list[i] !== list) {
          this.list[i] = []
        }
      }

      if (!list.length) {
        this.counter = setTimeout(() => {
          axios.get('api/' + method).then(result => {
            if (typeof result.data?.data === 'object') {
              for (let i in result.data.data) {
                list.push(result.data.data[i])
              }
            }
          })
        }, 160)
      }
    },

    subMenuEnter (e) {
      e.target.parentElement.querySelectorAll(':scope > li.hover').forEach(i => i.classList.remove('hover'))
      e.target.classList.add('hover')
    }
  }
}
</script>

<style scoped>
.menu {
  @apply flex justify-between h-full m-0;
}
.menu > div {
  @apply flex-auto
}
.menu > div:last-child {
  @apply flex justify-end
}
.menu .nav {
  @apply flex items-center h-full
}
.menu .nav > li {
  @apply h-full md:relative
}
.menu .nav > li > div {
  @apply flex h-full items-center px-3 md:px-4 relative z-10 select-none cursor-pointer transition-all duration-100
}
.menu.active .nav > li.hover > div {
  @apply bg-white text-gray-600 dark:bg-evo-600 dark:text-gray-200
}
.menu .nav > li > span {
  @apply flex h-full items-center px-3 md:px-4 cursor-pointer
}
.menu .nav > li:hover > div, .menu .nav > li:hover > span, .menu .nav > li:hover > a {
  @apply text-gray-100
}
.menu .nav > li > div > span, .menu .home sub {
  @apply hidden md:inline-block
}
.menu .nav > li ul {
  @apply w-full md:w-80 bg-white text-gray-900 opacity-0 invisible absolute left-0 z-10 pb-1 shadow-2xl rounded-b divide-y divide-gray-100 dark:bg-evo-600 dark:text-gray-300 dark:divide-zinc-700 transition-all duration-100
}
.menu > div:last-child .nav > li ul {
  @apply left-auto right-0
}
.menu.active .nav li.hover > ul {
  @apply opacity-100 visible
}
.menu .nav > li > ul > li > ul {
  @apply top-0 left-full
}
.menu .nav > li > ul li > a {
  @apply flex items-center relative px-4 py-2 hover:bg-blue-600 hover:text-white
}
.menu .nav > li > ul li.hover > a {
  @apply bg-blue-600 text-white
}
.menu .home {
  @apply flex h-full items-center px-3 md:pr-4 text-xl uppercase
}
.menu .fa {
  text-align: center;
  width: 1.25em;
}
</style>
