<template>
  <div>
    <iframe :src="src" class="w-full h-full overflow-auto border-none"/>
  </div>
</template>

<script>
export default {
  name: 'ModuleIndex',
  data () {
    return {
      src: 'https://jsonplaceholder.typicode.com/users/' + this.$route.params.id
    }
  }
}
</script>
