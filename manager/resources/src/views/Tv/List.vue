<template>
  <Panel
    :data="data"
    :actions="actions"
    :search-input="true"
    link-name="TvIndex"
    link-icon="fa fa-list-alt"
    :txt-new="$store.getters['Lang/get']('new_tmplvars')"
    :txt-help="$store.getters['Lang/get']('tmplvars_management_msg')"
    @action="action"
  />
</template>

<script>
import http from '@/utils/http'
import Panel from '@/components/Panel'

export default {
  name: 'TvList',
  components: { Panel },
  data () {
    this.element = 'TvIndex'
    this.controller = 'Tv'

    return {
      data: null,
      actions: {
        copy: {
          icon: 'far fa-clone fa-fw'
        },
        delete: {
          icon: 'fa fa-trash fa-fw text-danger'
        }
      }
    }
  },
  created () {
    http.list(this.controller, { categories: true }).then(result => this.data = result.data)
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
          if (confirm(this.$store.getters['Lang/get']('confirm_delete_tmplvars'))) {
            http.delete(this.controller, item).then(result => {
              if (result) {
                delete category.items[item.id]
                this.$root.$refs.Layout.$refs.MultiTabs.closeTab(this.$router.resolve({ name: this.element, params: { id: item.id } }))
              }
            })
          }
          break
      }
    }
  }
}
</script>
