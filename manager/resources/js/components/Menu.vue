<template>
  <div class="menu flex justify-between h-full m-0 bg-gray-800 text-gray-200 shadow-lg" @click.stop="click">
    <div class="flex-auto">

      <ul class="nav flex items-center h-full">

        <li
            class="relative h-full"
            @mouseover="hoverItem">

          <router-link
              :to="{ name: 'DashboardIndex' }"
              class="home flex h-full items-center px-4 text-xl uppercase">

            <span class="logo mr-4"></span>
            <span>Evolution</span>
            <sub class="ml-1 text-xs text-gray-400">{{ $root.config('settings_version') }}</sub>

          </router-link>

        </li>

        <li
            v-if="$root.hasPermissions(['edit_template', 'edit_snippet', 'edit_chunk', 'edit_plugin'])"
            class="relative h-full parent"
            @mouseover="hoverItem">

          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            {{ $root.lang('elements') }}
          </a>

          <ul class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b left-0 divide-y divide-gray-100">

            <li
                v-if="$root.hasPermissions('edit_template')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('template', list.templates)">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 0 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-newspaper fa-fw mr-3"/> {{ $root.lang('manage_templates') }}
              </router-link>

              <ul
                  v-if="list.templates.length"
                  class="bg-white text-gray-900 bg-white absolute z-10 left-full top-0 overflow-y-auto pb-1 w-72 shadow-2xl rounded-b left-0 divide-y divide-gray-100">

                <li
                    @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'TemplateIndex', params: { id: '' } }"
                      class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                    <i class="fa fa-plus fa-fw mr-3"/>
                    {{ $root.lang('new_template') }}
                  </router-link>
                </li>

                <li
                    v-for="item in list.templates"
                    :key="'item-template-' + item.id"
                    @mouseenter="subMenuEnter">

                  <router-link
                      :to="{ name: 'TemplateIndex', params: { id: item.id } }"
                      :class="{'fst-italic': item.locked}"
                      class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                    {{ item.templatename }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>

                </li>

              </ul>

            </li>

            <li
                v-if="$root.hasPermissions('edit_snippet')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('tvs', list.tvs)">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 1 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-list-alt fa-fw mr-3"/> {{ $root.lang('tmplvars') }}
              </router-link>

              <ul v-if="list.tvs.length" class="bg-white left-full top-0 overflow-y-auto">

                <li @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'TvIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ $root.lang('new_tmplvars') }}
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

            <li
                v-if="$root.hasPermissions('edit_chunk')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('chunks', list.chunks)">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 2 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-th-large fa-fw mr-3"/> {{ $root.lang('manage_htmlsnippets') }}
              </router-link>

              <ul v-if="list.chunks.length" class="bg-white left-full top-0 overflow-y-auto">

                <li @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'ChunkIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ $root.lang('new_htmlsnippet') }}
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

            <li
                v-if="$root.hasPermissions('edit_snippet')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('snippets', list.snippets)">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 3 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-code fa-fw mr-3"/> {{ $root.lang('manage_snippets') }}
              </router-link>

              <ul v-if="list.snippets.length" class="bg-white left-full top-0 overflow-y-auto">

                <li @mouseenter="subMenuEnter">
                  <router-link :to="{ name: 'SnippetIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ $root.lang('new_snippet') }}
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

            <li
                v-if="$root.hasPermissions('edit_plugin')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('plugins', list.plugins)">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 4 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-plug fa-fw mr-3"/> {{ $root.lang('manage_plugins') }}
              </router-link>

              <ul v-if="list.plugins.length" class="bg-white left-full top-0 overflow-y-auto">

                <li @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'PluginIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ $root.lang('new_plugin') }}
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

            <li
                v-if="$root.hasPermissions('edit_module')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('modules', list.modules)">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 5 } }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-cubes fa-fw mr-3"/> {{ $root.lang('modules') }}
              </router-link>

              <ul v-if="list.modules.length" class="bg-white left-full top-0 overflow-y-auto">

                <li @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'ModuleIndex', params: { id: '' } }">
                    <i class="fa fa-plus fa-fw"/>
                    {{ $root.lang('new_module') }}
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

        <li
            v-if="$root.hasPermissions('exec_module')"
            class="relative h-full parent"
            @mouseover="hoverItem" @mouseenter="getSubMenu('modules', list.modules)">

          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            {{ $root.lang('modules') }}
          </a>

          <ul
              v-if="list.modules.length"
              class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b left-0 divide-y divide-gray-100">

            <li
                v-for="item in list.modules"
                :key="'item-module-exec-' + item.id"
                @mouseover="hoverSubItem"
                @mouseenter="subMenuEnter">

              <router-link
                  :to="{ name: 'ModuleExec', params: { id: item.id } }"
                  :class="{'fst-italic': item.locked, 'text-danger opacity-50': item.disabled}">
                <i class="fa fa-cube"/>
                {{ item.name }}
              </router-link>

            </li>

          </ul>

        </li>

        <li
            v-if="$root.hasPermissions('edit_user', 'edit_web_user', 'edit_role', 'access_permissions', 'web_access_permissions')"
            class="relative h-full parent"
            @mouseover="hoverItem">

          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            {{ $root.lang('users') }}
          </a>

          <ul class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b left-0 divide-y divide-gray-100">

            <li
                v-if="$root.hasPermissions('edit_user')"
                @mouseover="hoverSubItem">
              <router-link
                  :to="{ name: 'UserList' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-user-circle fa-fw mr-3"/> {{ $root.lang('users') }}
              </router-link>
            </li>

            <li
                v-if="$root.hasPermissions('edit_role')"
                @mouseover="hoverSubItem">
              <router-link
                  :to="{ name: 'RoleList' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-legal fa-fw mr-3"/> {{ $root.lang('role_management_title') }}
              </router-link>
            </li>

            <li
                v-if="$root.hasPermissions('access_permissions')"
                @mouseover="hoverSubItem">
              <router-link
                  :to="{ name: 'UserPermissionsIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-universal-access fa-fw mr-3"/> {{ $root.lang('manager_permissions') }}
              </router-link>
            </li>

          </ul>

        </li>

        <li
            v-if="$root.hasPermissions('empty_cache')"
            class="relative h-full parent"
            @mouseover="hoverItem">

          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            {{ $root.lang('tools') }}
          </a>

          <ul class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b left-0 divide-y divide-gray-100">

            <li
                @mouseover="hoverSubItem">
              <router-link
                  :to="{ name: 'ClearCacheIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-recycle fa-fw mr-3"/> {{ $root.lang('refresh_site') }}
              </router-link>
            </li>

            <li
                @mouseover="hoverSubItem">
              <router-link
                  :to="{ name: 'SearchIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-search fa-fw mr-3"/> {{ $root.lang('search') }}
              </router-link>
            </li>

          </ul>

        </li>

      </ul>

    </div>
    <div class="flex-auto flex justify-end">

      <ul class="nav flex items-center h-full">

        <li class="relative h-full parent"
            @mouseover="hoverItem">

          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            <span class="mr-2">{{ $store.getters['Auth/username'] }}</span>
            <i class="fa fa-user-circle text-xl ms-2"/>
          </a>

          <ul class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b right-0 divide-y divide-gray-100">

            <li
                @mouseover="hoverSubItem">
              <router-link
                  :to="{ name: 'AuthPasswordChange' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-lock fa-fw mr-3"/> {{ $root.lang('change_password') }}
              </router-link>
            </li>

            <li
                @mouseover="hoverSubItem">
              <a href="logout" class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-sign-out fa-fw mr-3"/> {{ $root.lang('logout') }}
              </a>
            </li>

          </ul>

        </li>

        <li
            v-if="$root.hasPermissions(['settings', 'view_eventlog', 'logs', 'help'])"
            class="relative h-full parent"
            @mouseover="hoverItem">

          <a class="flex h-full items-center px-4 relative z-20 select-none cursor-default">
            <i class="fa fa-cogs text-xl"/>
          </a>

          <ul class="bg-white text-gray-900 hidden absolute z-10 pb-1 w-72 shadow-2xl rounded-b right-0 divide-y divide-gray-100">

            <li
                v-if="$root.hasPermissions('settings')"
                @mouseover="hoverSubItem">
              <router-link
                  :to="{ name: 'ConfigurationIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-sliders fa-fw mr-3"/> {{ $root.lang('edit_settings') }}
              </router-link>
            </li>

            <li
                @mouseover="hoverSubItem">
              <router-link
                  :to="{ name: 'SchedulesIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-calendar fa-fw mr-3"/> {{ $root.lang('site_schedule') }}
              </router-link>
            </li>

            <li
                v-if="$root.hasPermissions('view_eventlog')"
                @mouseover="hoverSubItem">
              <router-link
                  :to="{ name: 'EventLogList' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-exclamation-triangle fa-fw mr-3"/> {{ $root.lang('eventlog_viewer') }}
              </router-link>
            </li>

            <template v-if="$root.hasPermissions('logs')">

              <li
                  @mouseover="hoverSubItem">
                <router-link
                    :to="{ name: 'SystemLogIndex' }"
                    class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                  <i class="fa fa-user-secret fa-fw mr-3"/> {{ $root.lang('view_logging') }}
                </router-link>
              </li>

              <li
                  @mouseover="hoverSubItem">
                <router-link
                    :to="{ name: 'SystemInfoIndex' }"
                    class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                  <i class="fa fa-info-circle fa-fw mr-3"/> {{ $root.lang('view_sysinfo') }}
                </router-link>
              </li>

            </template>

            <li
                v-if="$root.hasPermissions('help')"
                @mouseover="hoverSubItem">
              <router-link
                  :to="{ name: 'HelpIndex' }"
                  class="flex items-center px-3 py-2 hover:bg-blue-600 hover:text-white">
                <i class="fa fa-question-circle fa-fw mr-3"/> {{ $root.lang('help') }}
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
  setup () {
    document.addEventListener('click', () => {
      const active = document.querySelector('.app-header.active')
      if (active) {
        active.firstElementChild.classList.remove('active')
        active.classList.remove('active')
      }
    })
  },
  mounted () {
    // this.$el.querySelectorAll('ul.nav > li').forEach((i) => {
    //   i.addEventListener('mouseenter', (e) => {
    //     this.$el.querySelectorAll('ul.nav > li.hover').forEach(i => i.classList.remove('hover'))
    //     e.target.classList.add('hover')
    //   })
    // })
    // this.$el.querySelectorAll('ul.nav > li > ul > li').forEach(i => {
    //   i.addEventListener('mouseenter', (e) => {
    //     e.target.parentElement.querySelectorAll(':scope > li.hover').forEach(i => i.classList.remove('hover'))
    //     e.target.classList.add('hover')
    //   })
    // })
  },
  methods: {
    click (event) {
      let a = event.target.closest('a')
      if (a && a.classList.contains('home')) {
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
    hoverItem (event) {
      this.$el.querySelectorAll('ul.nav > li.hover').forEach(i => i.classList.remove('hover'))
      event.currentTarget.classList.add('hover')
    },
    hoverSubItem (event) {
      event.currentTarget.parentElement.querySelectorAll(':scope > li.hover').forEach(i => i.classList.remove('hover'))
      event.currentTarget.classList.add('hover')
    },
    getSubMenu (method, list) {
      for (let i in this.list) {
        if (this.list[i] !== list) {
          this.list[i] = []
        }
      }
      if (!list.length) {
        axios.get('api/' + method).then(result => {
          if (typeof result.data?.data === 'object') {
            for (let i in result.data.data) {
              list.push(result.data.data[i])
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
.menu.active ul.nav > li.hover > ul, .menu ul.nav > li > ul > li.hover > ul { display: block; }
.menu.active ul.nav > li.parent.hover > a { background-color: white; color: #222; }
.menu ul.nav > li ul { max-height: calc(100vh - 3rem); }
.menu ul.nav > li > ul > li > ul { left: 100%; top: 0; overflow-y: auto; }
</style>
