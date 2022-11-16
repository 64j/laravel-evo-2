<template>
  <div class="tree">
    <div class="header">

    </div>
    <div class="root">
      <div v-if="loading" class="tree-loader text-center px-1 absolute z-10 top-0 right-0">
        <i class="fa fa-spinner fa-spin"></i>
      </div>
      <div class="ps-4 py-2 pe-2 font-bold">{{ $root.config('site_name') }}</div>
      <ul>
        <tree-node
            v-for="node in data"
            :key="node.id"
            :node="node"
            @action="action"
        />
      </ul>
    </div>
  </div>
</template>

<script>
import TreeNode from '@/components/TreeNode.vue'

export default {
  name: 'TreeView',
  components: { TreeNode },

  data () {
    return {
      controller: 'Tree',
      loading: false,
      data: [],
      meta: []
    }
  },

  mounted () {
    this.get()
  },

  methods: {

    async get () {
      let response = await axios.get('api/tree')
      this.data = response.data.data
      this.meta = response.data.meta
    },

    action (action, node) {
      switch (action) {
        case 'toggle':
          this.toggle(node)
          break

        case 'click':
          this.click(node)
          break
      }
    },

    async toggle (node) {
      this.loading = true
      if (node.children) {
        let response = await axios.get('api/tree?parent=' + node.id + '&close=' + node.id)
        delete node.children
        this.data = response.data.data
        this.meta = response.data.meta
      } else {
        let response = await axios.get('api/tree?parent=' + node.id)
        node.children = response.data.data
      }
    },

    click (node) {
      this.$router.push({
        name: 'DocumentIndex',
        params: {
          id: node.id
        }
      })
    },

    updateNode (node, data) {
      data = data || this.data

      if (node.id) {
        for (const i in data) {
          if (data[i].id === node.id) {
            data[i] = Object.assign({}, data[i], node)
          } else if (data[i].children) {
            this.updateNode(node, data[i].children)
          }
        }
      }
    }
  }
}
</script>

<style scoped>
.tree {
  @apply relative h-full w-full flex flex-col flex-wrap h-full
}
.header {
  @apply flex-grow-0 h-8 bg-evo-900 border-b border-evo-700 dark:border-evo-600
}
.root {
  @apply flex-grow overflow-hidden overflow-y-auto relative;
  height: calc(100% - 2rem);
}
</style>
