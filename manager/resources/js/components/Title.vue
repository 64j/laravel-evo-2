<template>
  <div class="py-4 px-5 bg-slate-100 dark:bg-evo-800">
    <h1 class="title h4 m-0">
      <i v-if="icon" class="mr-2 text-lg dark:text-gray-600" :class="icon"/>
      <span v-html="title" class="text-xl font-bold"/>
      <small v-if="id" class="ml-2">({{ id }})</small>
      <i v-if="message" class="fa fa-question-circle ml-3 text-sm text-gray-400 hover:text-gray-600 cursor-pointer" @click="show=!show"/>
    </h1>
    <div v-if="message" v-show="show" class="bg-blue-100 rounded p-4 m-0 mt-3 dark:bg-blue-500/50" v-html="message"/>
  </div>
</template>

<script>
export default {
  name: 'TitleView',
  props: {
    id: {
      type: [String, Number]
    },
    title: {
      type: String
    },
    icon: {
      type: String
    },
    message: {
      type: String
    }
  },
  data () {
    return {
      show: false
    }
  }
}
</script>
