<template>
  <Panel
      :data="data"
      :actions="actions"
      :search-input="true"
      link-name="TemplateIndex"
      link-icon="fa fa-newspaper"
      :txt-new="$root.lang('new_template')"
      :txt-help="$root.lang('template_management_msg')"
      @action="action"
  />
</template>

<script>
import Panel from '@/components/Panel'

export default {
  name: 'TemplateList',
  components: { Panel },
  data () {
    return {
      data: [],
      actions: {
        copy: {
          icon: 'far fa-clone fa-fw hover:text-blue-500'
        },
        delete: {
          icon: 'fa fa-trash fa-fw text-rose-500 hover:text-rose-700'
        }
      }
    }
  },

  created () {
    this.list({})
  },

  methods: {
    action (action, item, category) {
      switch (action) {
        case 'copy':
          // http.copy(this.controller, item).then(result => {
          //   if (result) {
          //     this.list()
          //   }
          // })
          break

        case 'delete':
          if (confirm(this.$root.lang('confirm_delete_template'))) {
            // http.delete(this.controller, item).then(result => {
            //   if (result) {
            //     delete category.items[item.id]
            //     this.$root.$refs.Layout.$refs.MultiTabs.closeTab(
            //         this.$router.resolve({ name: this.element, params: { id: item.id } }))
            //   }
            // })
          }
          break
      }
    },

    async list (data) {
      let response = await axios.get('api/category/templates', data)
      this.data = response.data.data
    }
  }
}
</script>
