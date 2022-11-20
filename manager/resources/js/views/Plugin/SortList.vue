<template>
  <div>

    <ActionsButtons :data="['save', 'cancel']" @action="action"/>

    <TitleView
        :title="title"
        :icon="icon"/>

    <div class="py-3 border-t">
      <p class="px-5 font-bold">{{ $root.lang('plugin_priority') }}</p>
      <p class="px-5 mb-4">{{ $root.lang('plugin_priority_instructions') }}</p>
      <Panel
          :data="data"
          link-icon="fa fa-list-alt"
          @action="action"/>
    </div>
  </div>
</template>

<script>
import ActionsButtons from '@/components/ActionsButtons'
import TitleView from '@/components/Title'
import Panel from '@/components/Panel'

export default {
  name: 'SortList',
  components: { ActionsButtons, TitleView, Panel },
  data () {
    return {
      title: this.$root.lang('plugin_priority_title'),
      icon: 'fa fa-sort-numeric-asc',
      data: null
    }
  },
  created () {
    this.$emit('setTab', {
      icon: this.icon,
      title: this.title,
      changed: false
    })

    this.list({})
  },
  methods: {
    action (action, item, category) {
      switch (action) {
        case 'save':
          break

        case 'cancel':
          this.$emit('toTab', { name: 'ElementsIndex', query: { resourcesTab: 4 } }, true)
          break
      }
    },

    async list (data) {
      let response = await axios.get('api/plugins/sort', data)
      this.data = response.data.data.map(i => {
        i.draggable = true
        return i
      })
    },
  }
}
</script>

<style scoped>

</style>
