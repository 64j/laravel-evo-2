<template>
  <div class="dynamic-tab-pane-control tab-pane" :id="id+`Pane`">
    <div class="tab-row-container overflow-hidden relative h-10 px-6 border-b-2 border-b-gray-200">
      <div class="tab-row overflow-hidden overflow-x-auto h-16 flex flex-nowrap">
        <template v-for="(tab, index) in data">
          <div :key="index"
               @mousedown="select(tab)"
               class="tab py-2 px-3 h-10 whitespace-nowrap rounded-t cursor-pointer"
               :class="{ 'active bg-gray-200': tab.active }"
               v-if="!tab.hidden">
            <i class="mr-2" :class="tab.icon" v-if="tab.icon"></i>
            <span class="font-bold" :class="{ 'text-blue-500' : tab.active }">{{ tab.title }}</span>
          </div>
        </template>
      </div>
      <i class="fa fa-angle-left prev absolute h-full top-0 left-0 flex items-center px-2"></i>
      <i class="fa fa-angle-right next absolute h-full top-0 right-0 flex items-center px-2"></i>
    </div>
    <div v-for="(tab, index) in data" :key="index" v-show="tab.active" class="tab-page" :id="`tab`+tab.id">
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
