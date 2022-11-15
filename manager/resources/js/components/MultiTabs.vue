<template>
  <div class="flex flex-col grow w-full">

    <div class="grow-0">
      <div class="multi-tabs h-8 overflow-hidden bg-gray-900">
        <div class="pane h-16 flex flex-nowrap overflow-auto">
          <a v-for="(tab, i) in tabs"
             :key="i"
             :data-to="tab.fullPath"
             class="h-8 inline-flex justify-between items-center no-underline hover:bg-gray-700 text-gray-200 border-r border-r-gray-800 hover:border-b-gray-700 hover:text-white relative select-none	cursor-pointer"
             :class="[tab.active ? 'active bg-gray-600 text-white after:content-[\'\'] after:absolute after:bottom-0 after:w-full after:h-[3px] after:bg-blue-600' : '', tab.class]"
             :title="tab.title"
             @click="clickTab(tab)"
             @dblclick="dblClickTab(tab)">
            <i v-if="tab.icon" :class="tab.icon" class="px-3 py-2 me-1 opacity-75 pointer-events-none icon peer/icon"/>
            <span v-if="tab.title"
                  v-html="tab.title"
                  class="px-3 w-32 pointer-events-none truncate peer-[.icon]/icon:pl-0"/>
            <i v-if="!tab.meta.fixTab" class="fa fa-close inline-flex items-center px-2 h-full hover:text-red-500"
               @click.stop="closeTab(tab)"/>
            <span v-if="tab['changed']" class="absolute top-0 left-0 px-1 text-yellow-500 text-lg font-mono">*</span>
          </a>
        </div>
      </div>
    </div>

    <div class="grow overflow-hidden">
      <div class="multi-tabs-panel h-full overflow-auto">
        <router-view v-slot="{ Component }">
          <CustomKeepAlive :include="keys">
            <component
                :key="key"
                :is="Component"
                @toTab="toTab"
                @setTab="setTab"
                @closeTab="closeTab"
                @replaceTab="replaceTab"
                @refreshTab="refreshTab"
            />
          </CustomKeepAlive>
        </router-view>
      </div>
      <div class="multi-tabs-panel-frames h-full w-full relative"></div>
    </div>

  </div>
</template>

<script>
import diff from '@/utils/diff'
import CustomKeepAlive from '@/utils/keep-alive'
import store from '@/store'

export default {
  name: 'MultiTabsView',
  components: { CustomKeepAlive },
  data () {
    return {
      tabs: this.$store.getters['MultiTabs/values']
    }
  },
  computed: {
    key () {
      return this.tabKey()
    },
    keys () {
      return this.$store.getters['MultiTabs/keys']
    }
  },
  watch: {
    '$route.fullPath' () {
      this.addTab()
    }
  },
  created () {
    this.initTabs()
    this.addTab()
  },
  methods: {
    tabKey (route) {
      return route && route.path || this.$route.path
    },
    isActive (tab) {
      const active = tab.name === this.$route.name &&
          (tab?.meta?.groupTab || !tab?.meta?.groupTab && diff(tab.params, this.$route.params))
      if (active) {
        const title = tab.title && tab.title.replace(/<\/?[^>]+>/ig, '').trim() || ''
        document.title = (title && title + ' - ' || '') + this.$store.getters['Config/get']('site_name') +
            ' (EVO CMS Manager)'
      }
      return active
    },
    titleTab (title) {
      return (title && title.toString().replace(/<\/?[^>]+>/ig, '') || '').trim()
    },
    clickTab (tab) {
      this.$router.push(tab.fullPath)
    },
    dblClickTab (tab) {
      this.$router.replace('/redirect' + tab.fullPath).then(() => {
        this.$store.dispatch('MultiTabs/delTabKey', tab)
      })
    },
    setTab (data) {
      this.tabs.forEach(tab => tab.active && Object.assign(tab, data))
      document.title = (data.title && data.title + ' - ' || '') + store.getters['Config/get']('site_name') +
          ' (EVO CMS Manager)'
    },
    route (route) {
      return route.meta['groupTab'] ? this.$router.resolve(route) : route
    },
    initTabs () {
      const fixTabs = this.filterFixTabs(this.$router.getRoutes())
      for (const route of fixTabs) {
        this.addTab(route)
      }
    },
    addTab (route) {
      route = route || this.$route
      if (route.name && !route.meta['noTab']) {
        this.$store.dispatch('MultiTabs/addTab', this.route(route)).then(tab => {
          const key = this.tabKey(route)
          const panel = this.$el.parentElement.querySelector('.multi-tabs-panel')
          const frames = this.$el.parentElement.querySelector('.multi-tabs-panel-frames')
          let isFrame = false
          let frame = frames.querySelector('iframe[data-key="' + key + '"]')
          frames.querySelectorAll('iframe[data-key]').forEach(f => f.style.display = 'none')
          if (frame) {
            frame.style.display = ''
            isFrame = true
          }
          frame = panel.querySelector('iframe')
          if (frame) {
            frame.style.display = ''
            frame.dataset.key = key
            frames.appendChild(frame)
            isFrame = true
          }
          panel.style.display = isFrame ? 'none' : ''
          frames.style.display = isFrame ? '' : 'none'
        })
      }
    },
    closeTab (tab) {
      if (!tab['changed'] || tab['changed'] && confirm(this.$root.lang('close') + '?')) {
        const key = this.tabKey(tab)
        const frames = this.$el.parentElement.querySelector('.multi-tabs-panel-frames')
        if (frames) {
          frames.querySelectorAll('iframe[data-key="' + key + '"]').forEach(i => i.parentElement.removeChild(i))
        }
        if (tab.active) {
          this.toPrevTab(tab, () => this.$store.dispatch('MultiTabs/delTab', tab))
        } else {
          this.$store.dispatch('MultiTabs/delTab', tab)
        }
      }
    },
    replaceTab (params) {
      const route = this.$route
      const tab = this.$router.resolve(params)
      this.$store.dispatch('MultiTabs/replaceTab', { route, tab }).then(({ tab }) => {
        this.$router.replace(tab).then(() => {
          this.$store.dispatch('MultiTabs/delTabKey', route)
        })
      })
    },
    refreshTab (params) {
      const route = this.$router.resolve(params)
      this.$store.dispatch('MultiTabs/delTabKey', route)
    },
    toPrevTab (tab, callback) {
      const index = this.tabs.map(i => i.path).indexOf(tab.path) - 1
      const prevTab = this.tabs[index]
      if (prevTab) {
        return this.$router.push(prevTab.fullPath).then(callback)
      }
    },
    toLastTab (tabs, tab) {
      const latest = tabs.slice(-1)[0]
      if (latest) {
        return this.$router.push(latest.fullPath)
      } else {
        if (tab.name === 'DashboardIndex') {
          return this.$router.replace({ path: '/redirect' + tab.fullPath })
        } else {
          return this.$router.push('/')
        }
      }
    },
    toTab (to, refresh) {
      const route = this.$route
      this.closeTab(route)
      this.$router.push(to).then(() => {
        if (refresh) {
          const tab = this.$router.resolve(to)
          this.$router.replace('/redirect' + tab.fullPath).then(() => {
            this.$store.dispatch('MultiTabs/delTabKey', tab)
          })
        }
      })
    },
    filterFixTabs (routes, basePath = '/') {
      let tabs = []
      routes.forEach(route => {
        if (route.meta && route.meta.fixTab) {
          const tagPath = this.$router.resolve(basePath, route.path)
          tabs.push(tagPath)
        }
        if (route.children) {
          const _tabs = this.filterFixTabs(route.children, route.path)
          if (_tabs.length >= 1) {
            tabs = [...tabs, ..._tabs]
          }
        }
      })
      return tabs
    }
  }
}
</script>
