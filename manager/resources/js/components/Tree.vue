<template>
  <div class="relative h-full">
    <div class="separator bg-blue-600 flex justify-center content-center" @mousedown="resizeMousedown" @mouseup="resizeMouseup"/>
    <teleport to="body">
      <div class="resize-mask" @mousemove="resizeMousemove" @mouseup="resizeMouseup"/>
    </teleport>
    <div class="flex flex-col flex-wrap h-full">
      <div class="app-tree-header flex-grow-0 bg-gray-900">

      </div>
      <div class="app-tree-root flex-grow-1 overflow-hidden bg-gray-800 text-white relative">
        <div v-if="loading" class="tree-loader text-center px-1 absolute">
          <i class="fa fa-spinner fa-spin"></i>
        </div>
        <div class="ps-4 py-2 pe-2 fw-bolder">{{ $store.getters['Config/get']('site_name') }}</div>
        <ul class="list-unstyled m-0">
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
      elMain: null,
      key: 'widthSideBar',
      data: [],
      meta: []
    }
  },
  mounted () {
    this.elTree = document.querySelector('.app-tree')
    this.elMain = document.querySelector('.app-main')

    this.x = localStorage.getItem(this.key)
    if (this.x) {
      this.elTree.style.flexBasis = this.x + 'px'
      this.elMain.style.flexBasis = 'calc(100% - ' + this.x + 'px)'
      this.elMain.style.maxWidth = 'calc(100% - ' + this.x + 'px)'
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
      if (5 > this.x) {
        document.body.classList.remove('tree-resize')
        localStorage.setItem(this.key, this.x)
        return
      }
      this.elTree.style.flexBasis = this.x + 'px'
      this.elMain.style.flexBasis = 'calc(100% - ' + this.x + 'px)'
      this.elMain.style.maxWidth = 'calc(100% - ' + this.x + 'px)'
    },
    get () {
      axios.post(this.controller + '@get').then(result => {
        this.data = result.data
        this.meta = result.meta
      })
    },
    action(action, node) {
      switch (action) {
        case 'toggle':
          this.toggle(node)
          break;

        case 'click':
          this.click(node)
          break;
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

<style scoped>
.separator { position: absolute; z-index: 10; top: 0; right: 0; width: 5px; height: 100%; opacity: .05; cursor: col-resize; transition: opacity .1s }
.separator:hover, .tree-resize .separator { opacity: 1; }
.resize-mask { display: none; position: absolute; z-index: 9; left: 0; top: 0; right: 0; bottom: 0; cursor: col-resize; }
.tree-resize .resize-mask { display: block; }
.app-tree-header { height: 2rem; }
.app-tree-root { overflow-y: auto !important; height: calc(100% - 2rem); }
.tree-loader { z-index: 2; top: 0; right: 0; }
</style>
