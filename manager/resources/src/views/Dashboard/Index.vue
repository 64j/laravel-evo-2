<template>
  <div class="container-fluid py-2">
    <h1>{{ $store.getters['Lang/get']('home') }}</h1>
  </div>
</template>

<script>
export default {
  name: 'DashboardIndex',
}
</script>

<style scoped>

</style>
