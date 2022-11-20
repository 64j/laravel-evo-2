<template>
  <div class="app">
    <div class="app-header">
      <MenuView ref="Menu"/>
    </div>
    <div class="app-body">
      <div class="app-tree" :style="`width: ${x}px`">
        <Tree ref="Tree" @toggleSidebar="toggle"/>
      </div>
      <div class="app-separator" @mouseup="resizeUp" @mousedown="resizeDown"/>
      <div class="app-main">
        <MultiTabs ref="MultiTabs"/>
      </div>
      <div class="app-mask" @mouseup="resizeUp" @mousemove="resizeMove"/>
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
    this.m = 40
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
      this.$el.classList.add('tree-hidden')
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
        this.$el.classList.add('tree-hidden')
      } else {
        this.x = localStorage.getItem(this.sw)
        localStorage.removeItem(this.sh)
        this.$el.classList.remove('tree-hidden')
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
        document.onselectstart = () => false
        localStorage.setItem(this.sh, '1')
        localStorage.setItem(this.sw, this.w)
        this.$el.classList.add('tree-hidden')
      } else if (this.$el.classList.contains('tree-hidden')) {
        localStorage.removeItem(this.sh)
        this.$el.classList.remove('tree-hidden')
      }
    }
  }
}
</script>

<style scoped>
.app {
  @apply flex flex-wrap flex-col h-full w-full dark:text-gray-300 bg-gray-50 dark:bg-evo-700
}
.app-header {
  @apply h-12 z-20 bg-evo-800 text-gray-300 shadow-md shadow-black/50
}
.app-body {
  @apply flex flex-nowrap z-10 w-full;
  height: calc(100% - 3rem);
}
.app-body::before {
  @apply invisible opacity-0 absolute z-40 left-0 top-0 right-0 bottom-0 bg-black/10 transition-all;
  content: "";
}
.app-header.active ~ .app-body::before {
  @apply visible opacity-100
}
.app-tree {
  @apply flex grow-0 shrink-0 w-full overflow-hidden bg-evo-800 text-gray-100
}
.tree-hidden .app-tree {
  @apply bg-evo-900
}
.app-separator {
  @apply relative grow-0 shrink-0 w-[1px] bg-evo-700 cursor-col-resize hover:bg-blue-600 hover:opacity-100 dark:bg-evo-600
}
.app.tree-resize .app-separator {
  @apply opacity-100 bg-blue-600
}
.app-separator::before {
  @apply absolute left-0 top-0 h-full w-3 -ml-[.35rem];
  content: "";
}
.app-main {
  @apply flex flex-col grow shrink-0 basis-0 overflow-hidden
}
.app-mask {
  @apply fixed left-0 top-0 right-0 bottom-0 z-10 cursor-col-resize hidden
}
.app.tree-resize .app-mask {
  @apply block
}
</style>
