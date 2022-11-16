<template>
  <Panel
      :data="data"
      :actions="actions"
      :search-input="true"
      link-name="ChunkIndex"
      link-icon="fa fa-th-large"
      :txt-new="$root.lang('new_htmlsnippet')"
      :txt-help="$root.lang('htmlsnippet_management_msg')"
      filter="ajax"
      @action="action"
  />
</template>

<script>
import Panel from '@/components/Panel'

export default {
  name: 'ChunkList',
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
              icon: 'far fa-times-circle text-rose-600',
              title: this.$root.lang('disable')
            },
            1: {
              icon: 'far fa-check-circle text-green-500',
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
          if (confirm(this.$store.getters['Lang/get']('confirm_delete_htmlsnippet'))) {
            // http.delete(this.controller, item).then(result => {
            //   if (result) {
            //     delete category.items[item.id]
            //     this.$root.$refs.Layout.$refs.MultiTabs.closeTab(this.$router.resolve({ name: this.element, params: { id: item.id } }))
            //   }
            // })
          }
          break

        case 'disabled':
          item.disabled = item.disabled ? 0 : 1
          // http.update(this.controller, { id: item.id, disabled: item.disabled })
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
      let response = await axios.get('api/category/chunks', data)
      this.data = response.data.data
    },

    async filter (str) {
      if (!str || str.length > 1) {
        let response = await axios.get('api/category/chunks?filter=' + str)
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
