<template>
  <iframe :src="src" class="w-full h-full overflow-auto border-none"/>
</template>

<script>
export default {
  name: 'FrameComponent',
  props: {
    src: String
  }
}
</script>

<style scoped>

</style>
