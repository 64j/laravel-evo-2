<template>
  <component :is="currentLayout" ref="Layout"/>
</template>

<script>
import { defineAsyncComponent } from 'vue'

export default {
  name: 'App',
  data () {
    return {
      layout: null
    }
  },
  watch: {
    '$route.meta.layout' (layout) {
      this.layout = layout || 'Blank'
    }
  },
  computed: {
    currentLayout () {
      return this.layout && defineAsyncComponent(() => import(`@/layouts/${this.layout}`))
    },
    key () {
      return this.getKey()
    }
  },
  methods: {
    getKey (route) {
      return (route || this.$route)['path']
    }
  }
}
</script>

<style>
@import './assets/scss/bootstrap.scss';
:root {
  --bs-blue: #1976d2;
  --bs-primary: #1976d2;
  --bs-success: #5cb85c;
  --bs-success-rgb: 92, 184, 92;
  --nprogress-color: #ffc107;
  --nprogress-z-index: 1031;
}
a { color: var(--bs-blue); }
input:focus, select:focus, textarea:focus { box-shadow: none !important }
html { font-size: 0.7777rem; }
body { font-size: 13px; }
html, body, #app { width: 100%; height: 100%; overflow: hidden; }
.nav-tabs .nav-link { cursor: pointer; }
</style>
