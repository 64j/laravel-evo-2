<template>
  <div class="actions-buttons fixed shadow rounded-b bg-gray-500/5 p-2 right-0 z-50">

    <button
        v-if="!data || ~data.indexOf('cancel')"
        type="button"
        class="btn-sm btn-gray"
        @click="$emit('action', 'cancel', $event)" :title="$root.lang('cancel')">
      <i class="fa fa-reply fa-fw"/>
      <span class="ml-1">{{ $root.lang('cancel') }}</span>
    </button>

    <button
        v-if="!data || ~data.indexOf('delete')"
        type="button"
        class="btn-sm btn-red"
        @click="$emit('action', 'delete', $event)" :title="$root.lang('delete')">
      <i class="fa fa-trash-alt fa-fw"/>
      <span class="ml-1">{{ $root.lang('delete') }}</span>
    </button>

    <button
        v-if="!data || ~data.indexOf('save')"
        type="button"
        class="btn-sm btn-green"
        @click="$emit('action', 'save', $event)" :title="$root.lang('save')">
      <i class="fa fa-save fa-fw"/>
      <span class="ml-1">{{ $root.lang('save') }}</span>
    </button>

  </div>
</template>

<script>
export default {
  name: 'ActionsButtons',
  props: {
    data: {
      type: Array,
      default: null
    }
  }
}
</script>
