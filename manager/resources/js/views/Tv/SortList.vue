<template>
  <div>

    <ActionsButtons :data="['save', 'cancel']" @action="action"/>

    <TitleView
        :title="title"
        :icon="icon"/>

    <Panel
        :data="[data]"
        link-icon="fa fa-list-alt"
        @action="action"/>
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
      title: this.$root.lang('template_tv_edit_title'),
      icon: 'fa fa-sort-numeric-asc',
      data: {
        name: this.$root.lang('template_tv_edit'),
        description: this.$root.lang('tmplvars_rank_edit_message'),
        draggable: true,
        data: [],
        sort: '1-9',
        actions: {
          sort: {
            values: {
              '0': {
                icon: 'fa-solid fa-sort fa-fw'
              },
              '1-9': {
                icon: 'fa-solid fa-arrow-up-1-9 fa-fw'
              },
              '9-1': {
                icon: 'fa-solid fa-arrow-down-9-1 fa-fw'
              },
              'a-z': {
                icon: 'fa-solid fa-arrow-up-a-z fa-fw'
              },
              'z-a': {
                icon: 'fa-solid fa-arrow-down-z-a fa-fw'
              }
            }
          }
        }
      }
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
          this.$emit('toTab', { name: 'ElementsIndex', query: { resourcesTab: 1 } }, true)
          break

        case 'sortable':
          this.data.sortable = true
          this.data.sort = this.checkSort()

          this.$emit('setTab', {
            changed: true
          })
          break

        case 'sort':
          this.sort(item, category)

          this.$emit('setTab', {
            changed: true
          })
          break
      }
    },

    async list (data) {
      let response = await axios.get('api/tvs/sort', data)
      this.data.data = response.data.data
      this.data.sort = this.checkSort()
    },

    checkSort () {
      let sort = '0'

      sort = this.data.data.every((x, i) => {
        return i === 0 || x.id >= this.data.data[i - 1].id
      }) ? '1-9' : sort

      sort = this.data.data.every((x, i) => {
        return i === 0 || x.id < this.data.data[i - 1].id
      }) ? '9-1' : sort

      sort = this.data.data.every((x, i) => {
        return i === 0 || x.name >= this.data.data[i - 1].name
      }) ? 'a-z' : sort

      sort = this.data.data.every((x, i) => {
        return i === 0 || x.name < this.data.data[i - 1].name
      }) ? 'z-a' : sort

      return sort
    },

    sort (item, category) {
      let values = Object.entries(category.actions.sort.values)

      category.sortable = true

      category.sort = values.map((i, k) => {
        return i[0] === item ? (values[k + 1] ? values[k + 1][0] : values[1][0]) : false
      }).filter(i => i)[0]

      switch (category.sort) {
        case '1-9':
          category.data.sort((x, y) => x.id < y.id ? -1 : (x.id > y.id ? 1 : 0))
          break

        case '9-1':
          category.data.sort((x, y) => x.id > y.id ? -1 : (x.id < y.id ? 1 : 0))
          break

        case 'a-z':
          category.data.sort((x, y) => x.name < y.name ? -1 : (x.name > y.name ? 1 : 0))
          break

        case 'z-a':
          category.data.sort((x, y) => x.name > y.name ? -1 : (x.name < y.name ? 1 : 0))
          break
      }
    }
  }
}
</script>

<style scoped>

</style>
