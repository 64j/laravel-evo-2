<template>
  <component :is="layout" ref="Layout"/>
</template>

<script>
import { defineAsyncComponent } from 'vue'

export default {
  name: 'App',
  computed: {
    key () {
      return this.getKey()
    },
    layout () {
      return this.getLayout()
    }
  },
  methods: {
    getLayout () {
      if (this.user('role')) {
        return defineAsyncComponent(() => import('@/layouts/DefaultLayout'))
      } else {
        return defineAsyncComponent(() => import('@/layouts/BlankLayout'))
      }
    },
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
