<template>
  <div>
    <iframe :src="src" class="w-full h-full overflow-auto border-none"/>
  </div>
</template>

<script>
export default {
  name: 'ModuleExec',
  data () {
    this.controller = 'Module@exec'
    this.icon = 'fa fa-cube'

    return {
      src: 'https://jsonplaceholder.typicode.com/users',
      data: null
    }
  },
  created () {
    this.$emit('titleTab', {
      icon: this.icon,
      title: ''
    })
    const id = this.$route.params && this.$route.params.id || null
    if (id) {
      this.get(id)
    } else {
      this.loading = true
    }
  },
  methods: {
    get (id) {
      // http.post(this.controller, { id: id }).then(result => {
      //   this.data = result.data.result || ''
      //   this.$emit('titleTab', result.data.title)
      //   this.loading = true
      // })
    }
  }
}
</script>

<style scoped>

</style>
