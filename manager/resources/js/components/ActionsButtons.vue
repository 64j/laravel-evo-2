<template>
  <div class="actions-buttons fixed shadow rounded-b bg-gray-500/5 p-2 pl-1 right-0 z-50">

    <button
        type="button"
        class="btn-sm btn-gray ml-1"
        @click="$emit('action', 'cancel', $event)" :title="$root.lang('cancel')">
      <i class="fa fa-reply fa-fw"/>
      <span class="ml-1">{{ $root.lang('cancel') }}</span>
    </button>

    <button
        type="button"
        class="btn-sm btn-red ml-1"
        @click="$emit('action', 'delete', $event)" :title="$root.lang('delete')">
      <i class="fa fa-trash-alt fa-fw"/>
      <span class="ml-1">{{ $root.lang('delete') }}</span>
    </button>

    <button
        type="button"
        class="btn-sm btn-green ml-1"
        @click="$emit('action', 'save', $event)" :title="$root.lang('save')">
      <i class="fa fa-save fa-fw"/>
      <span class="ml-1">{{ $root.lang('save') }}</span>
    </button>

  </div>
</template>

<script>
export default {
  name: 'ActionsButtons'
}
</script>
