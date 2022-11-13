<template>
  <Panel
      :data="data"
      :actions="actions"
      :search-input="true"
      link-name="TemplateIndex"
      link-icon="fa fa-newspaper"
      :txt-new="$root.lang('new_template')"
      :txt-help="$root.lang('template_management_msg')"
      filter="ajax"
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

        case 'filter':
          this.filter(item)
          break

        case 'paginate':
          this.paginate(item, category)
          break
      }
    },

    async list (data) {
      let response = await axios.get('api/category/templates', data)
      this.data = response.data.data
    },

    async filter (str) {
      if (!str || str.length > 1) {
        let response = await axios.get('api/category/templates?filter=' + str)
        this.data = response.data.data ?? []
      }
    },

    paginate (url, category) {
      axios.get(url).then(response => {
        if (response.data.data != null) {
          response.data.data.forEach((cat, i) => {
            if (category.id === cat.id) {
              this.data[i] = cat
            }
          })
        }
      })
    },
  }
}
</script>
