<template>
  <div class="app">
    <div class="header">
      <MenuView ref="Menu" @toggleSidebar="toggle"/>
    </div>
    <div class="body">
      <div class="tree" :style="`width: ${x}px`">
        <Tree ref="Tree"/>
      </div>
      <div class="separator" @mouseup="resizeUp" @mousedown="resizeDown"/>
      <div class="main">
        <MultiTabs ref="MultiTabs"/>
      </div>
      <div class="mask" @mouseup="resizeUp" @mousemove="resizeMove"/>
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

<style scoped>
.app {
  @apply flex flex-wrap flex-col h-full w-full dark:text-gray-300 bg-slate-100 dark:bg-evo-800
}
.header {
  @apply h-12 z-20 bg-evo-800 text-gray-300 shadow-md shadow-black/50
}
.body {
  @apply flex flex-nowrap z-10 w-full;
  height: calc(100% - 3rem);
}
.body::before {
  @apply invisible opacity-0 absolute z-40 left-0 top-0 right-0 bottom-0 bg-black/10 transition-all;
  content: "";
}
.header.active ~ .body::before {
  @apply visible opacity-100
}
.tree {
  @apply flex grow-0 shrink-0 w-full overflow-hidden bg-evo-800 text-gray-100
}
.separator {
  @apply relative grow-0 shrink-0 w-[1px] bg-evo-700 cursor-col-resize hover:bg-blue-600 hover:opacity-100 dark:bg-evo-600
}
.app.tree-resize .separator {
  @apply opacity-100 bg-blue-600
}
.separator::before {
  @apply absolute left-0 top-0 h-full w-3 -ml-[.35rem];
  content: "";
}
.main {
  @apply flex flex-col grow shrink-0 basis-0 overflow-hidden
}
.mask {
  @apply fixed left-0 top-0 right-0 bottom-0 z-10 cursor-col-resize hidden
}
.app.tree-resize .mask {
  @apply block
}
</style>
