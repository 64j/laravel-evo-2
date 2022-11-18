<template>
  <div class="tab-pane" :id="id+`Pane`">

    <div class="tab-row-container">

      <div class="tab-row">
        <template v-for="(tab, index) in data">
          <div class="tab" v-if="!tab.hidden" :key="index" @mousedown="select(tab)" :class="{ 'active' : tab.active }">
            <i class="icon" :class="tab.icon" v-if="tab.icon"/>
            <span>{{ tab.title }}</span>
          </div>
        </template>
      </div>

      <i class="fa fa-angle-left prev"></i>
      <i class="fa fa-angle-right next"></i>
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
.tab-row-container {
  @apply overflow-hidden relative h-12 px-6
}
.tab-row {
  @apply overflow-hidden overflow-x-auto h-20 flex flex-nowrap
}
.tab-pane .tab {
  @apply py-3 px-4 h-12 whitespace-nowrap cursor-pointer border-l border-t border-r border-transparent uppercase select-none
}
.tab-pane .tab.active {
  @apply bg-gray-50 border-gray-200 dark:bg-evo-700 dark:border-evo-600
}
.tab-pane .tab .icon {
  @apply mr-2 text-gray-600 dark:text-gray-300
}
.tab-pane .tab span {
  @apply text-gray-600 dark:text-gray-300
}
.tab-pane .tab.active span {
  @apply text-gray-700 dark:text-gray-100
}
.tab-pane .prev, .tab-pane .next {
  @apply absolute h-full top-0 flex items-center px-2
}
.tab-pane .prev {
  @apply left-0
}
.tab-pane .next {
  @apply right-0
}
.tab-page {
  @apply -mt-[1px] bg-gray-50 pb-4 border-t border-b border-gray-200 dark:bg-evo-700 dark:border-evo-600
}
</style>
