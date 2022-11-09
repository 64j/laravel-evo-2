<template>
  <div class="menu flex justify-between h-full m-0 bg-gray-800 text-gray-200 shadow-lg" @click.stop="click">
    <div class="flex-auto">
      <ul class="nav flex items-center h-full">
        <li class="relative h-full">
          <router-link :to="{ name: 'DashboardIndex' }" class="flex h-full items-center px-4 text-xl uppercase">
            <span class="logo ml-3 mr-6"></span>
            <span>Evolution</span>
            <sub class="ml-1 text-xs text-gray-400">{{ $store.getters['Config/get']('settings_version') }}</sub>
          </router-link>
        </li>
        <li class="relative h-full parent"
            v-if="hasPermissions(['edit_template', 'edit_snippet', 'edit_chunk', 'edit_plugin'])">
          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            {{ lang('elements') }}
          </a>
          <ul class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b left-0 divide-y divide-gray-100">
            <li v-if="hasPermissions('edit_template')" @mouseenter="getSubMenu('Template@list', list.templates)">
              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 0 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-newspaper fa-fw mr-3"/> {{ lang('manage_templates') }}
              </router-link>
              <ul v-if="list.templates.length">
                <li @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'TemplateIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ lang('new_template') }}
                  </router-link>
                </li>
                <li v-for="item in list.templates" :key="'item-template-' + item.id" @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'TemplateIndex', params: { id: item.id } }"
                      :class="{'fst-italic': item.locked}">
                    {{ item.name }}
                    <small class="ms-1">({{ item.id }})</small>
                  </router-link>
                </li>
              </ul>
            </li>
            <li v-if="hasPermissions('edit_snippet')" @mouseenter="getSubMenu('Tv@list', list.tvs)">
              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 1 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-list-alt fa-fw mr-3"/> {{ lang('tmplvars') }}
              </router-link>
              <ul v-if="list.tvs.length">
                <li @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'TvIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ lang('new_tmplvars') }}
                  </router-link>
                </li>
                <li v-for="item in list.tvs" :key="'item-tv-' + item.id" @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'TvIndex', params: { id: item.id } }" :class="{'fst-italic': item.locked}">
                    {{ item.name }}
                    <small class="ms-1">({{ item.id }})</small>
                  </router-link>
                </li>
              </ul>
            </li>
            <li v-if="hasPermissions('edit_chunk')" @mouseenter="getSubMenu('Chunk@list', list.chunks)">
              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 2 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-th-large fa-fw mr-3"/> {{ lang('manage_htmlsnippets') }}
              </router-link>
              <ul v-if="list.chunks.length">
                <li @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'ChunkIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ lang('new_htmlsnippet') }}
                  </router-link>
                </li>
                <li v-for="item in list.chunks" :key="'item-chunk-' + item.id" @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'ChunkIndex', params: { id: item.id } }"
                      :class="{'fst-italic': item.locked, 'text-danger opacity-50': item.disabled}">
                    {{ item.name }}
                    <small class="ms-1">({{ item.id }})</small>
                  </router-link>
                </li>
              </ul>
            </li>
            <li v-if="hasPermissions('edit_snippet')" @mouseenter="getSubMenu('Snippet@list', list.snippets)">
              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 3 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-code fa-fw mr-3"/> {{ lang('manage_snippets') }}
              </router-link>
              <ul v-if="list.snippets.length">
                <li @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'SnippetIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ lang('new_snippet') }}
                  </router-link>
                </li>
                <li v-for="item in list.snippets" :key="'item-snippet-' + item.id" @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'SnippetIndex', params: { id: item.id } }"
                               :class="{'fst-italic': item.locked, 'text-danger opacity-50': item.disabled}">
                    {{ item.name }}
                    <small class="ms-1">({{ item.id }})</small>
                  </router-link>
                </li>
              </ul>
            </li>
            <li v-if="hasPermissions('edit_plugin')" @mouseenter="getSubMenu('Plugin@list', list.plugins)">
              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 4 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-plug fa-fw mr-3"/> {{ lang('manage_plugins') }}
              </router-link>
              <ul v-if="list.plugins.length">
                <li @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'PluginIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ lang('new_plugin') }}
                  </router-link>
                </li>
                <li v-for="item in list.plugins" :key="'item-plugin-' + item.id" @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'PluginIndex', params: { id: item.id } }"
                      :class="{'fst-italic': item.locked, 'text-danger opacity-50': item.disabled}">
                    {{ item.name }}
                    <small class="ms-1">({{ item.id }})</small>
                  </router-link>
                </li>
              </ul>
            </li>
            <li v-if="hasPermissions('edit_module')" @mouseenter="getSubMenu('Module@list', list.modules)">
              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 5 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-cubes fa-fw mr-3"/> {{ lang('modules') }}
              </router-link>
              <ul v-if="list.modules.length">
                <li @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'ModuleIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ lang('new_module') }}
                  </router-link>
                </li>
                <li v-for="item in list.modules" :key="'item-module-' + item.id" @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'ModuleIndex', params: { id: item.id } }"
                      :class="{'fst-italic': item.locked, 'text-danger opacity-50': item.disabled}">
                    {{ item.name }}
                    <small class="ms-1">({{ item.id }})</small>
                  </router-link>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="relative h-full parent" v-if="hasPermissions('exec_module')"
            @mouseenter="getSubMenu('Module@list', list.modules)">
          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            {{ lang('modules') }}
          </a>
          <ul v-if="list.modules.length"
              class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b left-0 divide-y divide-gray-100">
            <li v-for="item in list.modules" :key="'item-module-exec-' + item.id" @mouseenter="subMenuEnter">
              <router-link
                  :to="{ name: 'ModuleExec', params: { id: item.id } }"
                  :class="{'fst-italic': item.locked, 'text-danger opacity-50': item.disabled}">
                <i class="fa fa-cube"/>
                {{ item.name }}
              </router-link>
            </li>
          </ul>
        </li>
        <li class="relative h-full parent"
            v-if="hasPermissions('edit_user', 'edit_web_user', 'edit_role', 'access_permissions', 'web_access_permissions')">
          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            {{ lang('users') }}
          </a>
          <ul class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b left-0 divide-y divide-gray-100">
            <li v-if="hasPermissions('edit_user')">
              <router-link
                  :to="{ name: 'UserList' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-user-circle fa-fw mr-3"/> {{ lang('users') }}
              </router-link>
            </li>
            <li v-if="hasPermissions('edit_role')">
              <router-link
                  :to="{ name: 'RoleList' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-legal fa-fw mr-3"/> {{ lang('role_management_title') }}
              </router-link>
            </li>
            <li v-if="hasPermissions('access_permissions')">
              <router-link
                  :to="{ name: 'UserPermissionsIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-universal-access fa-fw mr-3"/> {{ lang('manager_permissions') }}
              </router-link>
            </li>
          </ul>
        </li>
        <li class="relative h-full parent" v-if="hasPermissions('empty_cache')">
          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            {{ lang('tools') }}
          </a>
          <ul class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b left-0 divide-y divide-gray-100">
            <li>
              <router-link
                  :to="{ name: 'ClearCacheIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-recycle fa-fw mr-3"/> {{ lang('refresh_site') }}
              </router-link>
            </li>
            <li>
              <router-link
                  :to="{ name: 'SearchIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-search fa-fw mr-3"/> {{ lang('search') }}
              </router-link>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="flex-auto flex justify-end">
      <ul class="nav flex items-center h-full">
        <li class="relative h-full parent">
          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            <span class="mr-2">{{ $store.getters['Auth/username'] }}</span>
            <i class="fa fa-user-circle text-xl ms-2"/>
          </a>
          <ul class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b right-0 divide-y divide-gray-100">
            <li>
              <router-link
                  :to="{ name: 'AuthPasswordChange' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-lock fa-fw mr-3"/> {{ lang('change_password') }}
              </router-link>
            </li>
            <li>
              <a href="logout" class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-sign-out fa-fw mr-3"/> {{ lang('logout') }}
              </a>
            </li>
          </ul>
        </li>
        <li class="relative h-full parent" v-if="hasPermissions(['settings', 'view_eventlog', 'logs', 'help'])">
          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            <i class="fa fa-cogs text-xl"/>
          </a>
          <ul class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b right-0 divide-y divide-gray-100">
            <li v-if="hasPermissions('settings')">
              <router-link
                  :to="{ name: 'ConfigurationIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-sliders fa-fw mr-3"/> {{ lang('edit_settings') }}
              </router-link>
            </li>
            <li>
              <router-link
                  :to="{ name: 'SchedulesIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-calendar fa-fw mr-3"/> {{ lang('site_schedule') }}
              </router-link>
            </li>
            <li v-if="hasPermissions('view_eventlog')">
              <router-link
                  :to="{ name: 'EventLogList' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-exclamation-triangle fa-fw mr-3"/> {{ lang('eventlog_viewer') }}
              </router-link>
            </li>
            <template v-if="hasPermissions('logs')">
              <li>
                <router-link
                    :to="{ name: 'SystemLogIndex' }"
                    class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                  <i class="fa fa-user-secret fa-fw mr-3"/> {{ lang('view_logging') }}
                </router-link>
              </li>
              <li>
                <router-link
                    :to="{ name: 'SystemInfoIndex' }"
                    class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                  <i class="fa fa-info-circle fa-fw mr-3"/> {{ lang('view_sysinfo') }}
                </router-link>
              </li>
            </template>
            <li v-if="hasPermissions('help')">
              <router-link
                  :to="{ name: 'HelpIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-question-circle fa-fw mr-3"/> {{ lang('help') }}
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
  mounted () {
    this.$el.querySelectorAll('ul.nav > li').forEach((i) => {
      i.addEventListener('mouseenter', (e) => {
        this.$el.querySelectorAll('ul.nav > li.hover').forEach(i => i.classList.remove('hover'))
        e.target.classList.add('hover')
      })
    })
    this.$el.querySelectorAll('ul.nav > li > ul > li').forEach(i => {
      i.addEventListener('mouseenter', (e) => {
        e.target.parentElement.querySelectorAll(':scope > li.hover').forEach(i => i.classList.remove('hover'))
        e.target.classList.add('hover')
      })
    })
    document.addEventListener('click', () => {
      const active = document.querySelector('.app-header.active')
      if (active) {
        this.$el.classList.remove('active')
        active.classList.remove('active')
      }
    })
  },
  methods: {
    lang (key) {
      return this.$store.getters['Lang/get'](key)
    },
    hasPermissions (permissions) {
      return this.$store.getters['Auth/hasPermissions'](permissions)
    },
    click (event) {
      if (event.target.classList.contains('link-home')) {
        this.$el.classList.remove('active')
        this.$el.parentElement.classList.remove('active')
      } else if (event.target.closest('.menu ul.nav > li > a')) {
        this.$el.classList.add('active')
        this.$el.parentElement.classList.add('active')
      } else {
        this.$el.classList.remove('active')
        this.$el.parentElement.classList.remove('active')
      }
    },
    getSubMenu (method, list) {
      for (let i in this.list) {
        if (this.list[i] !== list) {
          this.list[i] = []
        }
      }
      if (!list.length) {
        axios.post(method).then(result => {
          if (result.data) {
            for (let i in result.data) {
              list.push(result.data[i])
            }
          }
        })
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
.logo { transform: scale(0.2); }
.menu.active ul.nav > li.hover > ul, .menu ul.nav > li > ul > li.hover > ul { display: block; }
.menu.active ul.nav > li.parent.hover > a { background-color: white; color: #222; }
.menu ul.nav > li ul { max-height: calc(100vh - 3rem); }
.menu ul.nav > li > ul > li > ul { left: 100%; top: 0; overflow-y: auto; }
</style>
