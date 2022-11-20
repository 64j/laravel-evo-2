<template>
  <Panel
      :data="data"
      :actions="actions"
      :search-input="true"
      link-name="TvIndex"
      link-icon="fa fa-list-alt"
      :txt-custom="$root.lang('template_tv_edit')"
      link-custom="TvSort"
      :txt-new="$root.lang('new_tmplvars')"
      :txt-help="$root.lang('tmplvars_management_msg')"
      filter="ajax"
      @action="action"
  />
</template>

<script>
import Panel from '@/components/Panel'

export default {
  name: 'TvList',
  components: { Panel },
  data () {
    return {
      data: null,
      actions: {
        copy: {
          icon: 'far fa-clone fa-fw hover:text-blue-500'
        },
        delete: {
          icon: 'fa fa-trash fa-fw hover:text-rose-600'
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
          if (confirm(this.$root.lang('confirm_delete_tmplvars'))) {
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
      let response = await axios.get('api/category/list/tvs', data)
      this.data = response.data.data
    },

    async filter (str) {
      if (!str || str.length > 1) {
        let response = await axios.get('api/category/list/tvs?filter=' + str)
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
