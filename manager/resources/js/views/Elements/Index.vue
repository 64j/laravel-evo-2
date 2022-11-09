<template>
  <div>

    <TitleView :title="$store.getters['Lang/get']('elements')" icon="fa fa-th"/>

    <Tabs
        id="resources"
        :history="history"
        :tabs="tabs"/>

  </div>
</template>

<script>
import TitleView from '@/components/Title'
import Tabs from '@/components/Tabs'

export default {
  name: 'ElementsIndex',
  components: { TitleView, Tabs },
  data () {
    return {
      history: true,
      tabs: [
        {
          id: 'Templates',
          title: this.$store.getters['Lang/get']('templates'),
          icon: 'fa fa-newspaper',
          component: () => import('@/views/Template/List'),
          hidden: !this.$store.getters['Auth/hasPermissions']('edit_template'),
          active: this.$route.query.resourcesTab === '0' || !this.$route.query.resourcesTab && '0'
        },
        {
          id: 'Variables',
          title: this.$store.getters['Lang/get']('tmplvars'),
          icon: 'fa fa-list-alt',
          component: () => import('@/views/Tv/List'),
          hidden: !this.$store.getters['Auth/hasPermissions'](
              ['edit_template', 'edit_snippet', 'edit_chunk', 'edit_plugin']),
          active: this.$route.query.resourcesTab === '1'
        },
        {
          id: 'Chunks',
          title: this.$store.getters['Lang/get']('htmlsnippets'),
          icon: 'fa fa-th-large',
          component: () => import('@/views/Chunk/List'),
          hidden: !this.$store.getters['Auth/hasPermissions']('edit_chunk'),
          active: this.$route.query.resourcesTab === '2'
        },
        {
          id: 'Snippets',
          title: this.$store.getters['Lang/get']('snippets'),
          icon: 'fa fa-code',
          component: () => import('@/views/Snippet/List'),
          hidden: !this.$store.getters['Auth/hasPermissions']('edit_snippet'),
          active: this.$route.query.resourcesTab === '3'
        },
        {
          id: 'Plugins',
          title: this.$store.getters['Lang/get']('plugins'),
          icon: 'fa fa-plug',
          component: () => import('@/views/Plugin/List'),
          hidden: !this.$store.getters['Auth/hasPermissions']('edit_plugin'),
          active: this.$route.query.resourcesTab === '4'
        },
        {
          id: 'Modules',
          title: this.$store.getters['Lang/get']('modules'),
          icon: 'fa fa-cubes',
          component: () => import('@/views/Module/List'),
          hidden: !this.$store.getters['Auth/hasPermissions']('edit_module'),
          active: this.$route.query.resourcesTab === '5'
        }
      ]
    }
  },
  created () {
    this.$emit('titleTab', {
      title: this.$store.getters['Lang/get']('elements'),
      icon: 'fa fa-th'
    })
  }
}
</script>
