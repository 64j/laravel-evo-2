<template>
  <Panel
    :data="data"
    :actions="actions"
    :search-input="true"
    link-name="ChunkIndex"
    link-icon="fa fa-th-large"
    :txt-new="$store.getters['Lang/get']('new_htmlsnippet')"
    :txt-help="$store.getters['Lang/get']('htmlsnippet_management_msg')"
    @action="action"
  />
</template>

<script>
import http from '@/utils/http'
import Panel from '@/components/Panel'

export default {
  name: 'ChunkList',
  components: { Panel },
  data () {
    this.element = 'ChunkIndex'
    this.controller = 'Chunk'

    return {
      data: null,
      actions: {
        copy: {
          icon: 'far fa-clone fa-fw',
          title: this.$store.getters['Lang/get']('duplicate')
        },
        disabled: {
          values: {
            0: {
              icon: 'far fa-times-circle text-danger',
              title: this.$store.getters['Lang/get']('disabled')
            },
            1: {
              icon: 'far fa-check-circle text-success',
              title: this.$store.getters['Lang/get']('enabled')
            }
          }
        },
        delete: {
          icon: 'fa fa-trash fa-fw text-danger',
          title: this.$store.getters['Lang/get']('delete')
        }
      }
    }
  },
  created () {
    this.list()
  },
  methods: {
    action (action, item, category) {
      switch (action) {
        case 'copy':
          http.copy(this.controller, item).then(result => {
            if (result) {
              this.list()
            }
          })
          break

        case 'delete':
          if (confirm(this.$store.getters['Lang/get']('confirm_delete_htmlsnippet'))) {
            http.delete(this.controller, item).then(result => {
              if (result) {
                delete category.items[item.id]
                this.$root.$refs.Layout.$refs.MultiTabs.closeTab(this.$router.resolve({ name: this.element, params: { id: item.id } }))
              }
            })
          }
          break

        case 'disabled':
          item.disabled = item.disabled ? 0 : 1
          http.update(this.controller, { id: item.id, disabled: item.disabled })
          break
      }
    },
    list() {
      http.list(this.controller, { categories: true }).then(result => this.data = result.data)
    }
  }
}
</script>
