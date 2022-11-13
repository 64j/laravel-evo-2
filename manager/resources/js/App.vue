<template>
  <div class="app flex flex-nowrap flex-col h-full w-full group/app">
    <div class="app-header grow-0 border-bottom h-12 z-20 peer/header">
      <MenuView ref="Menu"/>
    </div>
    <div class="app-body grow flex flex-nowrap z-10 h-[calc(100%-3rem)] before:content-[''] before:invisible before:opacity-0 before:absolute before:z-40 before:left-0 before:top-0 before:right-0 before:bottom-0 before:bg-black/10 before:peer-[.active]/header:visible before:peer-[.active]/header:opacity-100 before:transition">
      <div class="app-tree flex-0 basis-80 overflow-hidden group-[.tree-hidden]/app:hidden">
        <Tree ref="Tree"/>
      </div>
      <div class="app-main flex flex-nowrap flex-col flex-1 bg-slate-100">
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
