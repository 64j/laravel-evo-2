<template>
  <div>

    <TitleView :title="$store.getters['Lang/get']('elements')" icon="fa fa-th"/>

    <Tabs
      id="resources"
      :activeTab="activeTab"
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
      activeTab: this.$route.query.resourcesTab || 0,
      history: true,
      tabs: [
        {
          id: 'Templates',
          title: this.$store.getters['Lang/get']('templates'),
          icon: 'fa fa-newspaper',
          component: () => import('@/views/Template/List'),
          hidden: !this.$store.getters['Auth/hasPermissions']('edit_template')
        },
        {
          id: 'Variables',
          title: this.$store.getters['Lang/get']('tmplvars'),
          icon: 'fa fa-list-alt',
          component: () => import('@/views/Tv/List'),
          hidden: !this.$store.getters['Auth/hasPermissions'](['edit_template', 'edit_snippet', 'edit_chunk', 'edit_plugin'])
        },
        {
          id: 'Chunks',
          title: this.$store.getters['Lang/get']('htmlsnippets'),
          icon: 'fa fa-th-large',
          component: () => import('@/views/Chunk/List'),
          hidden: !this.$store.getters['Auth/hasPermissions']('edit_chunk')
        },
        {
          id: 'Snippets',
          title: this.$store.getters['Lang/get']('snippets'),
          icon: 'fa fa-code',
          component: () => import('@/views/Snippet/List'),
          hidden: !this.$store.getters['Auth/hasPermissions']('edit_snippet')
        },
        {
          id: 'Plugins',
          title: this.$store.getters['Lang/get']('plugins'),
          icon: 'fa fa-plug',
          component: () => import('@/views/Plugin/List'),
          hidden: !this.$store.getters['Auth/hasPermissions']('edit_plugin')
        },
        {
          id: 'Modules',
          title: this.$store.getters['Lang/get']('modules'),
          icon: 'fa fa-cubes',
          component: () => import('@/views/Module/List'),
          hidden: !this.$store.getters['Auth/hasPermissions']('edit_module')
        }
      ],
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
