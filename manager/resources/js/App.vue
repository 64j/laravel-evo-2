<template>
  <div class="app flex flex-wrap flex-col h-full w-full group/app">

    <div class="app-header h-12 z-20 peer/header">
      <MenuView ref="Menu" @toggleSidebar="toggle"/>
    </div>

    <div
        class="app-body flex flex-nowrap z-10 w-full h-[calc(100%-3rem)] before:content-[''] before:invisible before:opacity-0 before:absolute before:z-40 before:left-0 before:top-0 before:right-0 before:bottom-0 before:bg-black/10 before:peer-[.active]/header:visible before:peer-[.active]/header:opacity-100 before:transition-all">

      <div
          :style="`width: ${x}px`"
          class="app-tree flex grow-0 shrink-0 w-full overflow-hidden bg-gray-800 text-gray-100">
        <Tree ref="Tree"/>
      </div>

      <div
          @mouseup="resizeUp"
          @mousedown="resizeDown"
          class="relative grow-0 shrink-0 w-[1px] bg-gray-700 cursor-col-resize hover:bg-blue-600 hover:opacity-100 group-[.tree-resize]/app:opacity-100 group-[.tree-resize]/app:bg-blue-600 group/separator">
        <div class="absolute left-0 top-0 h-full w-3 -ml-[.35rem]"/>
      </div>

      <div class="app-main flex flex-col grow shrink-0 basis-0 overflow-hidden bg-slate-100 dark:bg-gray-800 dark:text-gray-200">
        <MultiTabs ref="MultiTabs"/>
      </div>

      <div
          @mouseup="resizeUp"
          @mousemove="resizeMove"
          class="resize-mask fixed left-0 top-0 right-0 bottom-0 z-10 cursor-col-resize hidden group-[.tree-resize]/app:block"/>

    </div>

  </div>
</template>

<script>
import MenuView from '@/components/Menu.vue'
import Tree from '@/components/Tree.vue'
import MultiTabs from '@/components/MultiTabs.vue'
import store from '@/store'

export default {
  name: 'App.vue',
  components: { MenuView, Tree, MultiTabs },
  data () {
    this.w = 250
    this.m = 10
    this.sw = 'EVO.SIDEBAR.WIDTH'
    this.sh = 'EVO.SIDEBAR.HIDE'

    return {
      x: localStorage.getItem(this.sw) || this.w
    }
  },

  mounted () {
    this.elTree = document.querySelector('.app-tree')
    localStorage.setItem(this.sw, this.x)
    if (localStorage.getItem(this.sh)) {
      this.x = this.m
    }
  },

  methods: {
    lang: (key) => store.getters['Lang/get'](key),
    config: (key) => store.getters['Config/get'](key),
    categories: () => store.getters['Config/categories'],
    hasPermissions: (key) => store.getters['Auth/hasPermissions'](key),

    toggle () {
      if (this.x > this.m) {
        this.x = this.m
        localStorage.setItem(this.sh, '1')
      } else {
        this.x = localStorage.getItem(this.sw)
        localStorage.removeItem(this.sh)
      }
    },

    resizeDown () {
      this.$el.classList.add('tree-resize')
      document.onselectstart = () => false
    },

    resizeUp () {
      this.$el.classList.remove('tree-resize')
      document.onselectstart = () => null
      localStorage.setItem(this.sw, this.x)
      localStorage.removeItem(this.sh)
    },

    resizeMove (event) {
      this.x = Math.abs(event.clientX)
      if (this.x < this.m) {
        this.x = this.m
        this.resizeUp()
      }
    }
  }
}
</script>
