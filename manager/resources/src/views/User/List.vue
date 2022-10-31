<template>
  <div>

    <TitleView :title="title" :icon="icon" :message="$store.getters['Lang/get']('user_management_msg')"/>

    <TableView
      :data="data"
      :columns="columns"
      :pagination="meta?.pagination || {}"
      :mode-search="true"
      :mode-list="true"
      :loading="loading"
      :link-name="element"
      table-class="table-sm"
      @getData="list">
      <router-link :to="{ name: element, params: { id: '' } }" class="btn btn-success btn-sm">
        <i class="fa fa-plus"></i>
        {{ $store.getters['Lang/get']('new_user') }}
      </router-link>
    </TableView>

  </div>
</template>

<script>
import TitleView from '@/components/Title'
import TableView from '@/components/Table'
import http from '@/utils/http'

export default {
  name: 'UserList',
  components: { TitleView, TableView },
  data () {
    return {
      controller: 'User',
      element: 'UserIndex',
      icon: 'fa fa-user-circle',
      data: null,
      meta: null,
      columns: {
        icon: {
          title: this.$store.getters['Lang/get']('icon'),
          value: '<i class="fa fa-user-circle"/>',
          link: true
        },
        username: {
          title: this.$store.getters['Lang/get']('name'),
          link: true
        },
        fullname: {
          title: this.$store.getters['Lang/get']('user_full_name')
        },
        role: {
          title: this.$store.getters['Lang/get']('role')
        },
        email: {
          title: this.$store.getters['Lang/get']('email')
        },
        lastlogin: {
          title: this.$store.getters['Lang/get']('user_prevlogin')
        },
        logincount: {
          title: this.$store.getters['Lang/get']('user_logincount')
        },
        blocked: {
          title: this.$store.getters['Lang/get']('user_block'),
          value: {
            0: this.$store.getters['Lang/get']('no'),
            1: this.$store.getters['Lang/get']('yes')
          }
        },
        delete: {
          title: this.$store.getters['Lang/get']('delete'),
          value: '<i class="fa fa-trash-alt remove text-danger"/>'
        }
      },
      loading: false
    }
  },
  computed: {
    title () {
      return this.$store.getters['Lang/get']('user_management_title')
    }
  },
  mounted () {
    this.$emit('titleTab', {
      icon: this.icon,
      title: this.title
    })
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
          http.delete(this.controller, item).then(result => {
            if (result) {
              delete category.items[item.id]
              this.$root.$refs.Layout.$refs.MultiTabs.closeTab(this.$router.resolve({ name: this.element, params: { id: item.id } }))
            }
          })
          break
      }
    },
    list() {
      http.list(this.controller).then(this.setData)
    },
    setData(result) {
      this.data = result.data
      this.meta = result.meta
      this.loading = false
    }
  }
}
</script>

<style scoped>

</style>
