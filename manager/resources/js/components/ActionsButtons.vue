<template>
  <div class="actions-buttons fixed rounded-b bg-gray-900/5 p-2 pl-1 right-0 z-50">

    <button
        type="button"
        class="bg-gray-200 hover:bg-gray-300 text-gray-900 text-sm font-bold py-1 px-2 rounded ml-1"
        @click="$emit('action', 'cancel', $event)" :title="lang('cancel')">
      <i class="fa fa-reply fa-fw"/>
      <span class="pl-1">{{ lang('cancel') }}</span>
    </button>

    <button
        type="button"
        class="bg-rose-600 hover:bg-rose-700 text-white text-sm font-bold py-1 px-2 rounded ml-1"
        @click="$emit('action', 'delete', $event)" :title="lang('delete')">
      <i class="fa fa-trash-alt fa-fw"/>
      <span class="pl-1">{{ lang('delete') }}</span>
    </button>

    <button
        type="button"
        class="bg-green-700 hover:bg-green-800 text-white text-sm font-bold py-1 px-2 rounded ml-1"
        @click="$emit('action', 'save', $event)" :title="lang('save')">
      <i class="fa fa-save fa-fw"/>
      <span class="pl-1">{{ lang('save') }}</span>
    </button>

  </div>
</template>

<script>
export default {
  name: 'ActionsButtons',
  methods: {
    lang (key) {
      return this.$store.getters['Lang/get'](key)
    }
  }
}
</script>
