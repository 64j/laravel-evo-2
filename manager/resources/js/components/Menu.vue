<template>
  <div class="menu group/menu flex justify-between h-full m-0 bg-gray-800 text-gray-300 shadow-lg" @click.stop="click">
    <div class="flex-auto">

      <ul class="nav flex items-center h-full">

        <li class="h-full">
          <span @click="$emit('toggleSidebar')" class="inline-flex justify-center items-center w-10 h-full cursor-pointer">
            <i class="fa fa-bars fa-fw"/>
          </span>
        </li>

        <li
            class="md:relative h-full"
            @mouseover="hoverItem">

          <router-link
              :to="{ name: 'DashboardIndex' }"
              class="home flex h-full items-center pr-3 md:pr-4 text-xl uppercase">

            <span class="logo hover:animate-spin"></span>
            <span class="pl-4 hidden md:inline-block">Evolution</span>
            <sub class="ml-1 text-xs text-gray-400 hidden md:inline-block">{{ $root.config('settings_version') }}</sub>

          </router-link>

        </li>

        <li
            v-if="$root.hasPermissions(['edit_template', 'edit_snippet', 'edit_chunk', 'edit_plugin'])"
            class="md:relative h-full parent"
            @mouseover="hoverItem">

          <div class="flex h-full items-center px-3 md:px-4 relative z-20 select-none cursor-pointer">
            <i class="fa fa-th fa-fw md:hidden"/>
            <span class="hidden md:inline-block">{{ $root.lang('elements') }}</span>
          </div>

          <ul class="w-full md:w-80 bg-white text-gray-900 hidden absolute z-10 pb-1 shadow-2xl rounded-b left-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

            <li
                v-if="$root.hasPermissions('edit_template')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('template', list.templates)"
                class="group/item">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 0 } }"
                  class="flex items-center relative pl-4 pr-8 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-newspaper fa-fw mr-3"/>
                {{ $root.lang('manage_templates') }}
                <i class="fa fa-angle-right fa-fw absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul
                  v-if="list.templates.length"
                  class="bg-white text-gray-900 bg-white absolute z-10 left-full top-0 overflow-y-auto pb-1 w-80 shadow-2xl rounded-b left-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

                <li
                    @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'TemplateIndex', params: { id: '' } }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white">
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
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white relative">
                    <i v-if="item.locked" class="fa fa-lock fa-fw absolute right-4 text-rose-500 text-xs"/>
                    {{ item.templatename }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>

                </li>

              </ul>

            </li>

            <li
                v-if="$root.hasPermissions('edit_snippet')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('tvs', list.tvs)"
                class="group/item">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 1 } }"
                  class="flex items-center relative px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-list-alt fa-fw mr-3"/>
                {{ $root.lang('tmplvars') }}
                <i class="fa fa-angle-right fa-fw absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul
                  v-if="list.tvs.length"
                  class="bg-white text-gray-900 bg-white absolute z-10 left-full top-0 overflow-y-auto pb-1 w-80 shadow-2xl rounded-b left-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

                <li
                    @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'TvIndex', params: { id: '' } }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white">
                    <i class="fa fa-plus fa-fw mr-3"/>
                    {{ $root.lang('new_tmplvars') }}
                  </router-link>
                </li>

                <li
                    v-for="item in list.tvs"
                    :key="'item-tv-' + item.id"
                    @mouseenter="subMenuEnter">

                  <router-link
                      :to="{ name: 'TvIndex', params: { id: item.id } }"
                      :class="{ 'italic': item.locked, 'text-rose-700' : item.disabled }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white">
                    {{ item.name }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>

                </li>

              </ul>

            </li>

            <li
                v-if="$root.hasPermissions('edit_chunk')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('chunks', list.chunks)"
                class="group/item">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 2 } }"
                  class="flex items-center relative px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-th-large fa-fw mr-3"/>
                {{ $root.lang('manage_htmlsnippets') }}
                <i class="fa fa-angle-right fa-fw absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul
                  v-if="list.tvs.length"
                  class="bg-white text-gray-900 bg-white absolute z-10 left-full top-0 overflow-y-auto pb-1 w-80 shadow-2xl rounded-b left-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

                <li
                    @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'ChunkIndex', params: { id: '' } }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white">
                    <i class="fa fa-plus fa-fw mr-3"/>
                    {{ $root.lang('new_htmlsnippet') }}
                  </router-link>
                </li>

                <li
                    v-for="item in list.chunks"
                    :key="'item-chunk-' + item.id"
                    @mouseenter="subMenuEnter">

                  <router-link
                      :to="{ name: 'ChunkIndex', params: { id: item.id } }"
                      :class="{ 'text-rose-700' : item.disabled }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white relative">
                    <i v-if="item.locked" class="fa fa-lock fa-fw absolute right-4 text-rose-500 text-xs"/>
                    {{ item.name }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>

                </li>

              </ul>

            </li>

            <li
                v-if="$root.hasPermissions('edit_snippet')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('snippets', list.snippets)"
                class="group/item">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 3 } }"
                  class="flex items-center relative px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-code fa-fw mr-3"/>
                {{ $root.lang('manage_snippets') }}
                <i class="fa fa-angle-right fa-fw absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul
                  v-if="list.snippets.length"
                  class="bg-white text-gray-900 bg-white absolute z-10 left-full top-0 overflow-y-auto pb-1 w-80 shadow-2xl rounded-b left-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

                <li
                    @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'SnippetIndex', params: { id: '' } }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white">
                    <i class="fa fa-plus fa-fw mr-3"/>
                    {{ $root.lang('new_snippet') }}
                  </router-link>
                </li>

                <li
                    v-for="item in list.snippets"
                    :key="'item-snippet-' + item.id"
                    @mouseenter="subMenuEnter">

                  <router-link
                      :to="{ name: 'SnippetIndex', params: { id: item.id } }"
                      :class="{ 'text-rose-700' : item.disabled }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white relative">
                    <i v-if="item.locked" class="fa fa-lock fa-fw absolute right-4 text-rose-500 text-xs"/>
                    {{ item.name }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>

                </li>

              </ul>

            </li>

            <li
                v-if="$root.hasPermissions('edit_plugin')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('plugins', list.plugins)"
                class="group/item">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 4 } }"
                  class="flex items-center relative px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-plug fa-fw mr-3"/>
                {{ $root.lang('manage_plugins') }}
                <i class="fa fa-angle-right fa-fw absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul
                  v-if="list.plugins.length"
                  class="bg-white text-gray-900 bg-white absolute z-10 left-full top-0 overflow-y-auto pb-1 w-80 shadow-2xl rounded-b left-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

                <li
                    @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'PluginIndex', params: { id: '' } }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white">
                    <i class="fa fa-plus fa-fw mr-3"/>
                    {{ $root.lang('new_plugin') }}
                  </router-link>
                </li>

                <li
                    v-for="item in list.plugins"
                    :key="'item-plugin-' + item.id"
                    @mouseenter="subMenuEnter">

                  <router-link
                      :to="{ name: 'PluginIndex', params: { id: item.id } }"
                      :class="{ 'text-rose-700' : item.disabled }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white relative">
                    <i v-if="item.locked" class="fa fa-lock fa-fw absolute right-4 text-rose-500 text-xs"/>
                    {{ item.name }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>

                </li>

              </ul>

            </li>

            <li
                v-if="$root.hasPermissions('edit_module')"
                @mouseover="hoverSubItem"
                @mouseenter="getSubMenu('modules', list.modules)"
                class="group/item">

              <router-link
                  :to="{ name: 'ElementsIndex', query: { resourcesTab: 5 } }"
                  class="flex items-center relative px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-cubes fa-fw mr-3"/>
                {{ $root.lang('modules') }}
                <i class="fa fa-angle-right fa-fw absolute top-0 right-0 h-full inline-flex items-center px-5"/>
              </router-link>

              <ul
                  v-if="list.modules.length"
                  class="bg-white text-gray-900 bg-white absolute z-10 left-full top-0 overflow-y-auto pb-1 w-80 shadow-2xl rounded-b left-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

                <li
                    @mouseenter="subMenuEnter">
                  <router-link
                      :to="{ name: 'ModuleIndex', params: { id: '' } }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white">
                    <i class="fa fa-plus fa-fw mr-3"/>
                    {{ $root.lang('new_module') }}
                  </router-link>
                </li>

                <li
                    v-for="item in list.modules"
                    :key="'item-module-' + item.id"
                    @mouseenter="subMenuEnter">

                  <router-link
                      :to="{ name: 'ModuleIndex', params: { id: item.id } }"
                      :class="{ 'text-rose-700' : item.disabled }"
                      class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white relative">
                    <i v-if="item.locked" class="fa fa-lock fa-fw absolute right-4 text-rose-500 text-xs"/>
                    {{ item.name }}
                    <small class="ml-1">({{ item.id }})</small>
                  </router-link>

                </li>

              </ul>

            </li>

          </ul>

        </li>

        <li
            v-if="$root.hasPermissions('exec_module')"
            class="md:relative h-full parent"
            @mouseover="hoverItem" @mouseenter="getSubMenu('modules', list.modules)">

          <div class="flex h-full items-center px-3 md:px-4 relative z-20 select-none cursor-pointer">
            <i class="fa fa-cubes fa-fw md:hidden"/>
            <span class="hidden md:inline-block">{{ $root.lang('modules') }}</span>
          </div>

          <ul
              v-if="list.modules.length"
              class="w-full md:w-80 bg-white text-gray-900 hidden absolute z-10 pb-1 shadow-2xl rounded-b left-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

            <li
                v-for="item in list.modules"
                :key="'item-module-exec-' + item.id"
                @mouseover="hoverSubItem"
                @mouseenter="subMenuEnter"
                class="group/item">

              <router-link
                  :to="{ name: 'ModuleExec', query: { id: item.id } }"
                  class="flex items-center relative pl-4 pr-8 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-cube fa-fw mr-3"/>
                {{ item.name }}
              </router-link>

            </li>

          </ul>

        </li>

        <li
            v-if="$root.hasPermissions('edit_user', 'edit_web_user', 'edit_role', 'access_permissions', 'web_access_permissions')"
            class="md:relative h-full parent"
            @mouseover="hoverItem">

          <div class="flex h-full items-center px-3 md:px-4 relative z-20 select-none cursor-pointer">
            <i class="fa fa-users fa-fw md:hidden"/>
            <span class="hidden md:inline-block">{{ $root.lang('users') }}</span>
          </div>

          <ul class="w-full md:w-80 bg-white text-gray-900 hidden absolute z-10 pb-1 shadow-2xl rounded-b left-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

            <li
                v-if="$root.hasPermissions('edit_user')"
                @mouseover="hoverSubItem"
                class="group/item">
              <router-link
                  :to="{ name: 'UserList' }"
                  class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-user-circle fa-fw mr-3"/> {{ $root.lang('users') }}
              </router-link>
            </li>

            <li
                v-if="$root.hasPermissions('edit_role')"
                @mouseover="hoverSubItem"
                class="group/item">
              <router-link
                  :to="{ name: 'RoleList' }"
                  class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-legal fa-fw mr-3"/> {{ $root.lang('role_management_title') }}
              </router-link>
            </li>

            <li
                v-if="$root.hasPermissions('access_permissions')"
                @mouseover="hoverSubItem"
                class="group/item">
              <router-link
                  :to="{ name: 'UserPermissionsIndex' }"
                  class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-universal-access fa-fw mr-3"/> {{ $root.lang('manager_permissions') }}
              </router-link>
            </li>

          </ul>

        </li>

        <li
            v-if="$root.hasPermissions('empty_cache')"
            class="md:relative h-full parent"
            @mouseover="hoverItem">

          <div class="flex h-full items-center px-4 relative z-20 select-none cursor-pointer">
            <i class="fa fa-wrench fa-fw md:hidden"/>
            <span class="hidden md:inline-block">{{ $root.lang('tools') }}</span>
          </div>

          <ul class="w-full md:w-80 bg-white text-gray-900 hidden absolute z-10 pb-1 shadow-2xl rounded-b left-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

            <li
                @mouseover="hoverSubItem"
                class="group/item">
              <router-link
                  :to="{ name: 'ClearCacheIndex' }"
                  class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-recycle fa-fw mr-3"/> {{ $root.lang('refresh_site') }}
              </router-link>
            </li>

            <li
                @mouseover="hoverSubItem"
                class="group/item">
              <router-link
                  :to="{ name: 'SearchIndex' }"
                  class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-search fa-fw mr-3"/> {{ $root.lang('search') }}
              </router-link>
            </li>

          </ul>

        </li>

      </ul>

    </div>
    <div class="flex-auto flex justify-end">

      <ul class="nav flex items-center h-full">

        <li>
          <span class="flex h-full items-center px-3 md:px-4 cursor-pointer">
            <i class="fa fa-fw" :class="[ darkMode ? 'fa-sun' : 'fa-moon' ]" @click.stop="toggleMode"/>
          </span>
        </li>

        <li class="h-full relative group/item" @mouseover="hoverItem">
          <div class="flex h-full items-center px-3 md:px-4 cursor-pointer">
            <i class="fa fa-search fa-fw"/>
          </div>

<!--          <form
              class="flex h-full items-center hidden1 absolute right-0 top-0 after:content-[''] after:fixed after:left-0 after:top-0 after:right-0 after:h-12 after:z-20 after:bg-black/75 hidden group-[.active]/menu:flex">
            <input type="text"
                   class="relative z-50 bg-transparent w-60 py-1 text-sm">
          </form>-->
        </li>

        <li class="h-full" @mouseover="hoverItem">
          <a :href="$root.config('SITE_URL')" class="flex h-full items-center px-3 md:px-4" target="_blank">
            <i class="fa fa-desktop fa-fw"/>
          </a>
        </li>

        <li class="md:relative h-full parent"
            @mouseover="hoverItem">

          <div class="flex h-full items-center px-3 md:px-4 relative z-10 select-none cursor-pointer">
            <span class="mr-2 hidden md:inline-block">{{ $store.getters['Auth/username'] }}</span>
            <i class="fa fa-user-circle fa-fw text-xl"/>
          </div>

          <ul class="w-full md:w-80 bg-white text-gray-900 hidden absolute z-10 pb-1 shadow-2xl rounded-b right-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

            <li
                @mouseover="hoverSubItem"
                class="group/item">
              <router-link
                  :to="{ name: 'AuthPasswordChange' }"
                  class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-lock fa-fw mr-3"/> {{ $root.lang('change_password') }}
              </router-link>
            </li>

            <li
                @mouseover="hoverSubItem"
                class="group/item">
              <a href="logout"
                 class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-sign-out fa-fw mr-3"/> {{ $root.lang('logout') }}
              </a>
            </li>

          </ul>

        </li>

        <li
            v-if="$root.hasPermissions(['settings', 'view_eventlog', 'logs', 'help'])"
            @mouseover="hoverItem"
            class="md:relative h-full parent">

          <div class="flex h-full items-center px-3 md:px-4 relative z-10 select-none cursor-pointer">
            <i class="fa fa-cogs fa-fw text-xl"/>
          </div>

          <ul class="w-full md:w-80 bg-white text-gray-900 hidden absolute z-10 pb-1 shadow-2xl rounded-b right-0 divide-y divide-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:divide-gray-800">

            <li
                v-if="$root.hasPermissions('settings')"
                @mouseover="hoverSubItem"
                class="group/item">
              <router-link
                  :to="{ name: 'ConfigurationIndex' }"
                  class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-sliders fa-fw mr-3"/> {{ $root.lang('edit_settings') }}
              </router-link>
            </li>

            <li
                @mouseover="hoverSubItem"
                class="group/item">
              <router-link
                  :to="{ name: 'SchedulesIndex' }"
                  class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-calendar fa-fw mr-3"/> {{ $root.lang('site_schedule') }}
              </router-link>
            </li>

            <li
                v-if="$root.hasPermissions('view_eventlog')"
                @mouseover="hoverSubItem"
                class="group/item">
              <router-link
                  :to="{ name: 'EventLogList' }"
                  class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                <i class="fa fa-exclamation-triangle fa-fw mr-3"/> {{ $root.lang('eventlog_viewer') }}
              </router-link>
            </li>

            <template v-if="$root.hasPermissions('logs')">

              <li
                  @mouseover="hoverSubItem"
                  class="group/item">
                <router-link
                    :to="{ name: 'SystemLogIndex' }"
                    class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                  <i class="fa fa-user-secret fa-fw mr-3"/> {{ $root.lang('view_logging') }}
                </router-link>
              </li>

              <li
                  @mouseover="hoverSubItem"
                  class="group/item">
                <router-link
                    :to="{ name: 'SystemInfoIndex' }"
                    class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
                  <i class="fa fa-info-circle fa-fw mr-3"/> {{ $root.lang('view_sysinfo') }}
                </router-link>
              </li>

            </template>

            <li
                v-if="$root.hasPermissions('help')"
                @mouseover="hoverSubItem"
                class="group/item">
              <router-link
                  :to="{ name: 'HelpIndex' }"
                  class="flex items-center px-4 py-2 hover:bg-blue-600 hover:text-white group-[.hover]/item:bg-blue-600 group-[.hover]/item:text-white">
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
      darkMode: false,
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

  created () {
    this.darkMode = localStorage.getItem('EVO.THEME.MODE') === 'dark'
    if (this.darkMode) {
      document.documentElement.classList.add('dark')
    }
  },

  methods: {
    toggleMode() {
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
      this.$el.querySelectorAll('ul.nav > li > ul li.hover').forEach(i => i.classList.remove('hover'))
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
.menu.active ul.nav > li.parent.hover > div { background-color: white; color: #222; }
.menu ul.nav > li ul { max-height: calc(100vh - 3rem); }
.menu ul.nav > li > ul > li > ul { left: 100%; top: 0; overflow-y: auto; }
</style>
