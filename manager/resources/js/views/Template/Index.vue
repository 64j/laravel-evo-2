<template>
  <div>

    <ActionsButtons @action="action"/>

    <form name="mutate">

      <TitleView
          :id="data?.id"
          :title="data?.templatename || $store.getters['Lang/get']('new_template')"
          icon="fa fa-code"
          :message="$store.getters['Lang/get']('template_msg')"/>

      <Tabs
          id="template"
          :tabs="[
            { id: 'Template', title: $store.getters['Lang/get']('settings_general'), active: true },
            { id: 'Tvs', title: $store.getters['Lang/get']('template_assignedtv_tab') },
          ]"
          :history="true">
        <template #Template>
          <div class="container container-body pt-3 px-4">
            <div class="form-group">

              <div class="flex mb-1">
                <label class="basis-1/4">
                  {{ $store.getters['Lang/get']('template_name') }}
                  <small v-if="data?.id === $store.getters['Config/get']('default_template')" class="text-danger d-block">{{
                      $store.getters['Lang/get']('defaulttemplate_title')
                    }}</small>
                </label>
                <div class="basis-3/4">
                  <div class="form-control-name clearfix">
                    <input v-model="data['templatename']" type="text" maxlength="100"
                           class="block w-full border-gray-300 text-base"
                           onchange="documentDirty=true;">
                    <label v-if="$store.getters['Auth/hasPermissions']('save_role')" :title="$store.getters['Lang/get']('lock_snippet_msg')">
                      <input v-model="data.locked" type="checkbox" :false-value="0" :true-value="1"/>
                      <i class="fa fa-lock" :class="[data.locked ? 'text-danger' : 'text-muted']"></i>
                    </label>
                  </div>
                  <small class="form-text text-danger hide" id='savingMessage'></small>
                </div>
              </div>

              <div class="flex mb-1">
                <label class="basis-1/4">{{ $store.getters['Lang/get']('alias') }}</label>
                <div class="basis-3/4">
                  <input v-model="data['templatealias']" type="text" maxlength="255"
                         class="block w-full border-gray-300 px-3 py-1 text-base"
                         onchange="documentDirty=true;">
                </div>
              </div>

              <div class="flex mb-1">
                <label class="basis-1/4">{{ $store.getters['Lang/get']('template_desc') }}</label>
                <div class="basis-3/4">
                  <input v-model="data.description" type="text" maxlength="255"
                         class="block w-full border-gray-300 px-3 py-1 text-base"
                         onchange="documentDirty=true;">
                </div>
              </div>

              <div class="flex mb-1">
                <label class="basis-1/4">{{ $store.getters['Lang/get']('existing_category') }}</label>
                <div class="basis-3/4">
                  <select v-model="data.category"
                          class="block w-full border-gray-300 px-3 py-1 text-base"
                          onchange="documentDirty=true;">
                    <option v-for="category in categories()" :key="category.id" :value="category.id">
                      {{ category.category }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="flex mb-1">
                <label class="basis-1/4">{{ $store.getters['Lang/get']('new_category') }}</label>
                <div class="basis-3/4">
                  <input v-model="data.newcategory" type="text" maxlength="45"
                         class="block w-full border-gray-300 px-3 py-1 text-base"
                         onchange="documentDirty=true;">
                </div>
              </div>

              <div class="form-check mb-1" v-if="$store.getters['Auth/hasPermissions']('save_role')">
                <input v-model="data.selectable" type="checkbox" class="form-check-input" id="selectable"
                       :false-value="0" :true-value="1">
                <label class="form-check-label" for="selectable">{{ $store.getters['Lang/get']('template_selectable') }}</label>
              </div>

            </div>

            <!-- HTML text editor start -->
            <div class="navbar-editor mt-3 mb-1">
              <span>{{ $store.getters['Lang/get']('template_code') }}</span>
            </div>
          </div>

          <div class="section-editor">
            <textarea v-model="data.content"
                      class="block w-full border-gray-300 border-l-transparent border-r-transparent px-3 py-1 text-base"
                      rows="20"
                      wrap="soft"
                      onchange="documentDirty=true;"/>
          </div>
        </template>

        <template #Tvs>
          <div class="container-fluid container-body pt-3">
            <div class="form-group">
              <p>{{ $store.getters['Lang/get']('template_tv_msg') }}</p>

              <div class="row">
                <template v-if="Object.values(meta?.selected || {}).length">
                  <hr class="bg-secondary m-0">
                  <Panel
                      :data="meta.selected"
                      class-name="px-0 mb-4"
                      link-name="TvIndex"
                      link-icon="fa fa-list-alt"
                      checkbox="checkbox"
                      :checkbox-checked="tvSelected"
                      :hidden-categories="false"
                      @action="action"
                  />
                </template>

                <p v-else class="text-danger">{{ lang$store.getters['Lang/get']('template_no_tv') }}</p>
              </div>

              <div class="row">
                <template v-if="Object.values(meta?.['unselected'] || {}).length">
                  <!--                  <hr class="bg-secondary">-->
                  <p class="m-0">{{ $store.getters['Lang/get']('template_notassigned_tv') }}</p>

                  <Panel
                      :data="meta['unselected']"
                      class-name="px-0"
                      link-name="TvIndex"
                      link-icon="fa fa-list-alt"
                      :search-input="true"
                      checkbox="checkbox"
                      :checkbox-checked="tvSelected"
                      @action="action"
                  />
                </template>
              </div>

            </div>
          </div>
        </template>

      </Tabs>

    </form>

  </div>
</template>

<script setup>
import TemplateService from '@/views/Template/service'
import { onMounted } from 'vue'
import router from '@/router'

const { data, read, create, update, destroy } = TemplateService()

onMounted(() => {
  if (router.params.id) {

  }
})
</script>

<script>
import ActionsButtons from '@/components/ActionsButtons'
import TitleView from '@/components/Title'
import Tabs from '@/components/Tabs'
import Panel from '@/components/Panel'
// import TemplateService from '@/views/Template/service'
// import { onMounted } from 'vue'
// import router from '@/router'

// export default {
//   name: 'TemplateIndex',
//   components: { ActionsButtons, TitleView, Tabs, Panel },
//   data () {
//     this.events = {
//       OnTempFormPrerender: '',
//       OnTempFormRender: ''
//     }
//
//     return {
//       controller: 'Template',
//       icon: 'fa fa-code',
//       loading: false,
//       id: this.$route['params'] && this.$route['params']['id'] || null,
//       meta: {},
//       data: formData,
//       tvSelected: []
//     }
//   },
//   created () {
//     this.$emit('titleTab', {
//       icon: this.icon,
//       title: ''
//     })
//
//     if (this.id) {
//       read(this.id).then(() => {
//         this.$emit('titleTab', formData.value.templatename)
//       })
//     }
//   },
//   methods: {
//     lang (key) {
//       return this.$store.getters['Lang/get'](key)
//     },
//     config (key) {
//       return this.$store.getters['Config/get'](key)
//     },
//     hasPermissions (permissions) {
//       return this.$store.getters['Auth/hasPermissions'](permissions)
//     },
//     categories () {
//       return this.$store.getters['Config/categories']
//     },
//     action (name, item) {
//       switch (name) {
//         case 'save':
//           this.loading = false
//           if (this.data.id) {
//             update(this.controller, { ...this.data, tvSelected: this.tvSelected })
//           } else {
//             create({ ...this.data, tvSelected: this.tvSelected })
//           }
//           break
//
//         case 'delete':
//           if (this.data.id) {
//             if (confirm(this.lang('confirm_delete_template'))) {
//               destroy(this.id)
//             }
//           }
//           break
//
//         case 'cancel':
//           this.$emit('toTab', { name: 'ElementsIndex', query: { resourcesTab: 0 } }, true)
//           break
//
//         case 'refresh':
//           this.$emit('refreshTab', { name: 'ElementsIndex', query: { resourcesTab: 0 } })
//           break
//
//         case 'checkbox': {
//           const index = this.tvSelected.indexOf(item.id)
//           index > -1 && this.tvSelected.splice(index, 1) || this.tvSelected.push(item.id)
//           break
//         }
//       }
//     },
//     setData (result) {
//       this.data = result.data
//       this.meta = result.meta
//
//       if (this.meta?.selected) {
//         this.tvSelected = []
//         for (const i in this.meta.selected) {
//           for (const j in this.meta.selected[i].items) {
//             const tv = this.meta.selected[i].items[j]
//             this.tvSelected.push(tv.id)
//           }
//         }
//       }
//
//       if (this.meta?.unselected) {
//         for (const i in this.meta.unselected) {
//           for (const j in this.meta.unselected[i].items) {
//             let tv = this.meta.unselected[i].items[j]
//             tv.prepend = '<input type="checkbox" name="assignedTv[]" value="' + tv.id +
//                 '" class="form-check-input me-2">'
//           }
//         }
//       }
//
//       for (let i in this.meta?.events || {}) {
//         this.events[i] = Array.isArray(this.meta.events[i]) ? this.meta.events[i].join('') : this.meta.events[i]
//       }
//
//       this.$emit('titleTab', result.data.templatename)
//       this.loading = true
//     }
//   }
// }
</script>

<style scoped>
.form-control-name { position: relative; }
.form-control-name label { position: absolute; right: .8rem; top: .4rem; font-size: 1.5rem; cursor: pointer; }
.form-control-name label input { opacity: 0 }
</style>
