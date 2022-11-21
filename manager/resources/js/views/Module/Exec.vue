<template>
  <iframe :src="src" class="w-full h-full overflow-auto border-none"/>
</template>

<script>
export default {
  name: 'ModuleExec',
  data () {
    return {
      src: 'https://jsonplaceholder.typicode.com/users'
    }
  }
}
</script>
