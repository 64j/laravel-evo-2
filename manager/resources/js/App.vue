<template>
  <div class="app flex flex-nowrap flex-col h-full w-full">
    <div class="app-header grow-0 border-bottom peer/header">
      <MenuView ref="Menu"/>
    </div>
    <div class="app-body grow flex flex-nowrap before:hidden before:content-[''] before:absolute before:z-40 before:left-0 before:top-0 before:right-0 before:bottom-0 before:bg-gray-900/25 before:peer-[.active]/header:block">
      <div class="app-tree flex-auto overflow-hidden">
        <Tree ref="Tree"/>
      </div>
      <div class="app-main flex flex-nowrap flex-col bg-slate-100">
        <MultiTabs ref="MultiTabs"/>
      </div>
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
  methods: {
    lang: (key) => store.getters['Lang/get'](key),
    config: (key) => store.getters['Config/get'](key),
    categories: () => store.getters['Config/categories'],
    hasPermissions: (key) => store.getters['Auth/hasPermissions'](key)
  }
}
</script>

<style scoped>
.app-header { z-index: 2; height: 3rem; }
.app-body { z-index: 1; height: calc(100% - 3rem); }
.app-tree { flex-basis: 20rem; }
.app-main { flex-basis: calc(100% - 20rem); max-width: calc(100% - 20rem); }
</style>
