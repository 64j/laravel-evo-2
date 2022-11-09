<template>
  <div class="app flex flex-nowrap flex-col h-full w-full">
    <div class="app-header grow-0 border-bottom">
      <MenuView ref="Menu"/>
    </div>
    <div class="app-body grow flex flex-nowrap">
      <div class="app-tree flex-auto overflow-hidden">
        <Tree ref="Tree"/>
      </div>
      <div class="app-main flex flex-nowrap flex-col bg-gray-50">
        <MultiTabs ref="MultiTabs"/>
      </div>
    </div>
  </div>
</template>

<script>
import MenuView from '@/components/Menu.vue'
import Tree from '@/components/Tree.vue'
import MultiTabs from '@/components/MultiTabs.vue'

export default {
  name: 'App.vue',
  components: { MenuView, Tree, MultiTabs }
}
</script>

<style scoped>
.app-header { z-index: 2; height: 3rem; }
.app-body { z-index: 1; height: calc(100% - 3rem); }
.app-tree { flex-basis: 20rem; }
.app-main { flex-basis: calc(100% - 20rem); max-width: calc(100% - 20rem); }
</style>
