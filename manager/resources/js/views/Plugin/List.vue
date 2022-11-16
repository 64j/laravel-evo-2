<template>
  <Panel
    :data="data"
    :actions="actions"
    :search-input="true"
    link-name="PluginIndex"
    link-icon="fa fa-plug"
    :txt-new="$root.lang('new_plugin')"
    :txt-help="$root.lang('plugin_management_msg')"
    filter="ajax"
    @action="action"
  />
</template>

<script>
import Panel from '@/components/Panel'

export default {
  name: 'PluginList',
  components: { Panel },
  data () {
    return {
      data: null,
      actions: {
        copy: {
          icon: 'far fa-clone fa-fw',
          title: this.$root.lang('duplicate')
        },
        disabled: {
          values: {
            0: {
              icon: 'far fa-times-circle fa-fw text-rose-600',
              title: this.$root.lang('disable')
            },
            1: {
              icon: 'far fa-check-circle fa-fw text-green-600',
              title: this.$root.lang('enable')
            }
          }
        },
        delete: {
          icon: 'fa fa-trash fa-fw hover:text-rose-600',
          title: this.$root.lang('delete')
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
          // http.delete(this.controller, item).then(result => {
          //   if (result) {
          //     delete category.items[item.id]
          //     this.$root.$refs.Layout.$refs.MultiTabs.closeTab(this.$router.resolve({ name: this.element, params: { id: item.id } }))
          //   }
          // })
          break

        case 'disabled':
          item.disabled = item.disabled ? 0 : 1
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
      let response = await axios.get('api/category/plugins', data)
      this.data = response.data.data
    },

    async filter (str) {
      if (!str || str.length > 1) {
        let response = await axios.get('api/category/plugins?filter=' + str)
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
    }
  }
}
</script>
