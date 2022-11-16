<template>
  <div class="tab-pane" :id="id+`Pane`">

    <div class="tab-row-container overflow-hidden relative h-11 px-6">

      <div class="tab-row overflow-hidden overflow-x-auto h-20 flex flex-nowrap">
        <template v-for="(tab, index) in data">
          <div :key="index"
               @mousedown="select(tab)"
               class="tab"
               :class="[ tab.active ? 'active bg-gray-50 border-gray-200 dark:bg-evo-700 dark:border-evo-600' : 'border-transparent' ]"
               v-if="!tab.hidden">
            <i class="mr-2 text-gray-600 dark:text-gray-300" :class="tab.icon" v-if="tab.icon"></i>
            <span class="select-none" :class="[ tab.active ? 'text-gray-700 dark:text-gray-100' : 'text-gray-600 dark:text-gray-300' ]">{{ tab.title }}</span>
          </div>
        </template>
      </div>

      <i class="fa fa-angle-left prev left-0"></i>
      <i class="fa fa-angle-right next right-0"></i>
    </div>

    <div
        v-for="(tab, index) in data"
        :key="index"
        v-show="tab.active"
        :id="`tab`+tab.id"
        class="tab-page">
      <component :is="getComponent(index, tab)" v-if="tab.component && !tab.hidden"/>
      <slot :name="tab.id" v-else/>
    </div>

  </div>
</template>

<script>
import { defineAsyncComponent } from 'vue'

export default {
  name: 'TabsView',
  props: {
    tabs: {
      type: Array,
      required: true
    },
    id: {
      type: String,
      required: true
    },
    active: {
      type: [String, Number]
    },
    history: {
      type: [Boolean, Number]
    }
  },
  data () {
    this.components = {}

    return {
      data: this.$props.tabs,
      activeTab: parseInt(this.$props.history && this.$route.query[this.$props.id + 'Tab'] || this.$props.active || '0')
    }
  },
  created () {
    this.$watch('$route.query.' + this.$props.id + 'Tab', (tab) => {
      if (tab) {
        this.activeTab = parseInt(tab)
      }
    })
    if (this.history) {
      this.data.forEach((el, i) => this.activeTab === i ? el.active = true : el.active = false)
    }
  },
  methods: {
    select (tab) {
      this.data.forEach(el => el.active = false)
      tab.active = true

      if (this.$props.history) {
        const Tab = {}
        Tab[this.$props.id + 'Tab'] = this.data.indexOf(tab)
        this.$router.push({ query: Tab })
      }
    },
    getComponent (index, tab) {
      if (index === this.activeTab) {
        if (!this.components[tab.id]) {
          this.components[tab.id] = defineAsyncComponent(tab.component)
        }
        return this.components[tab.id]
      }
      return null
    }
  }
}
</script>

<style scoped>
.tab-pane .tab {
  @apply pt-3 pb-2 px-4 h-11 whitespace-nowrap cursor-pointer border-l border-t border-r uppercase
}
.tab-pane .prev, .tab-pane .next {
  @apply absolute h-full top-0 flex items-center px-2
}
.tab-page {
  @apply -mt-[1px] bg-gray-50 pb-4 border-t border-b border-gray-200 dark:bg-evo-700 dark:border-evo-600
}
</style>
