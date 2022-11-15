<template>
  <editor
      api-key="no-api-key"
      init="{}"
      v-model="data"
  />
</template>

<script>
import editor from '@tinymce/tinymce-vue'
export default {
  name: 'Tinymce',
  components: { editor },
  props: {
    model: String
  },
  data () {
    return {
      data: this.$props.model
    }
  }
}
</script>
