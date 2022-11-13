<template>
  <div class="relative h-full w-full">
    <div class="flex flex-col flex-wrap h-full">
      <div class="app-tree-header flex-grow-0 h-8 bg-gray-900">

      </div>
      <div
          class="app-tree-root flex-grow-1 h-[calc(100%-2rem)] overflow-hidden overflow-y-auto relative">
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
    //this.get()
  },

  methods: {

    async get () {
      let response = await axios.post('api/tree')
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

    toggle (node) {
      this.loading = true
      if (node.children) {
        axios.post(this.controller + '@get', {
          parent: node.id,
          close: node.id
        }).then(() => {
          delete node.children
          this.loading = false
        })
      } else {
        axios.post(this.controller + '@get', {
          parent: node.id
        }).then(result => {
          node.children = result.data
          this.loading = false
        })
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
