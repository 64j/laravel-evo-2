<template>
  <div class="relative h-full w-full">
    <div @mousedown="resizeMousedown"
         @mouseup="resizeMouseup"
         class="separator absolute z-50 top-0 right-0 w-[4px] h-full opacity-[.05] bg-blue-600 cursor-col-resize hover:opacity-100 group-[.tree-resize]/body:opacity-100 transition"/>

    <teleport to="body">
      <div @mousemove="resizeMousemove"
           @mouseup="resizeMouseup"
           class="resize-mask fixed left-0 top-0 right-0 bottom-0 z-10 cursor-col-resize hidden group-[.tree-resize]/body:block"/>
    </teleport>

    <div class="flex flex-col flex-wrap h-full">
      <div class="app-tree-header flex-grow-0 h-8 bg-gray-900">

      </div>
      <div
          class="app-tree-root flex-grow-1 h-[calc(100%-2rem)] overflow-hidden overflow-y-auto bg-gray-800 text-white relative">
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
      x: 0,
      elTree: null,
      key: 'widthSideBar',
      data: [],
      meta: []
    }
  },

  mounted () {
    this.elTree = document.querySelector('.app-tree')
    this.x = localStorage.getItem(this.key)
    if (this.x) {
      this.elTree.style.width = this.x + 'px'
    }
    //this.get()
  },

  methods: {
    resizeMousedown () {
      document.body.classList.add('tree-resize')
      document.onselectstart = () => false
    },

    resizeMouseup () {
      document.body.classList.remove('tree-resize')
      document.onselectstart = () => null
      localStorage.setItem(this.key, this.x)
    },

    resizeMousemove (e) {
      this.x = Math.abs(e.clientX)
      if (this.x > 100) {
        this.elTree.style.width = this.x + 'px'
      }
    },

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
