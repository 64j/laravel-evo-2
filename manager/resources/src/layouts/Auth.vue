<template>
  <div class="main w-100 h-100 d-flex flex-nowrap bg-dark">
    <div class="col-auto sidebar p-5 bg-dark bg-opacity-75 text-white text-opacity-75">
      <router-view/>
    </div>
  </div>
</template>

<script>
export default {
  name: 'AuthLayout'
}
</script>

<style scoped>
.main { background: url("https://picsum.photos/1600/900") 50% 50% no-repeat; background-size: cover }
.sidebar { width: 30rem; max-width: 100%; }
</style>
