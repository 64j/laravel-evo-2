<template>
  <div class="tab-pane" :id="id+`Pane`">

    <div class="tab-row-container">

      <div class="tab-row">
        <div v-for="(tab, index) in tabs" :key="index" class="tab" :class="{ 'active' : tab.active }"
             @mousedown="select(tab)">
          <i v-if="tab.icon" class="icon" :class="tab.icon"/>
          <span>{{ tab.title }}</span>
        </div>
      </div>

      <i class="fa fa-angle-left prev"></i>
      <i class="fa fa-angle-right next"></i>
    </div>

    <template v-for="(tab, index) in tabs">
      <div :key="index" :id="`tab`+tab.id" class="tab-page" v-if="tab.active">
        <component v-if="tab.component" :is="getComponent(tab.component)"/>
        <slot v-else :name="tab.id"/>
      </div>
    </template>

  </div>
</template>

<script>
import { defineAsyncComponent } from 'vue'

export default {
  name: 'TabsView',
  props: {
    data: {
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
    return {
      tabs: this.$props.data
    }
  },
  created () {
    this.$watch('$route.query.' + this.$props.id + 'Tab', index => {
      this.tabs.forEach((i, k) => i.active = k === parseInt(index))
    })
    if (this.tabs && this.tabs.length) {
      let index = parseInt(this.$route.query[this.$props.id + 'Tab'])
      if (!this.tabs[index]) {
        this.tabs[0].active = true
      } else if (this.$props.history) {
        this.tabs.forEach((i, k) => i.active = k === index)
      }
    }
  },
  methods: {
    select (tab) {
      this.tabs.forEach(i => i.active = false)
      tab.active = true

      if (this.$props.history) {
        let query = {}
        query[this.$props.id + 'Tab'] = this.tabs.indexOf(tab)
        this.$router.push({ query: query })
      }
    },
    getComponent (component) {
      return defineAsyncComponent(component)
    }
  }
}
</script>

<style scoped>
.tab-row-container {
  @apply overflow-hidden relative h-12 px-6 bg-slate-100 dark:bg-evo-800
}
.tab-row-container::after {
  @apply absolute z-10 left-0 bottom-0 right-0 border-t;
  content: "";
}
.tab-row {
  @apply relative z-20 overflow-hidden overflow-x-auto h-20 flex flex-nowrap
}
.tab-pane .tab {
  @apply py-3 px-4 h-12 whitespace-nowrap cursor-pointer border-l border-t border-r border-transparent uppercase select-none
}
.tab-pane .tab.active {
  @apply bg-gray-50 border-inherit dark:bg-evo-700
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
  @apply pb-4
}
</style>
