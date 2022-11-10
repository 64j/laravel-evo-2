<template>
  <div>

    <ActionsButtons @action="action"/>

    <form name="mutate">

      <TitleView
          :id="data?.id"
          :title="data?.templatename || $root.lang('new_template')"
          :icon="icon"
          :message="$root.lang('template_msg')"/>

      <Tabs
          id="template"
          :tabs="[
            { id: 'Template', title: $root.lang('settings_general'), active: true },
            { id: 'Tvs', title: $root.lang('template_assignedtv_tab') },
          ]"
          :history="true">
        <template #Template>
          <div class="container container-body pt-3 px-4">
            <div class="form-group">

              <div class="flex mb-1">
                <label class="basis-1/4">
                  {{ $root.lang('template_name') }}
                  <small v-if="data?.id === $root.config('default_template')" class="text-danger d-block">{{
                      $root.lang('defaulttemplate_title')
                    }}</small>
                </label>
                <div class="basis-3/4">
                  <div class="form-control-name clearfix">
                    <input v-model="data['templatename']"
                           type="text"
                           maxlength="100"
                           class="block w-full border-gray-300 text-base"
                           onchange="documentDirty=true;">
                    <label v-if="$root.hasPermissions('save_role')" :title="$root.lang('lock_snippet_msg')">
                      <input v-model="data.locked" type="checkbox" :false-value="0" :true-value="1"/>
                      <i class="fa fa-lock" :class="[data.locked ? 'text-danger' : 'text-muted']"></i>
                    </label>
                  </div>
                  <small class="form-text text-danger hide" id='savingMessage'></small>
                </div>
              </div>

              <div class="flex mb-1">
                <label class="basis-1/4">{{ $root.lang('alias') }}</label>
                <div class="basis-3/4">
                  <input v-model="data['templatealias']"
                         type="text"
                         maxlength="255"
                         class="block w-full border-gray-300 px-3 py-1 text-base"
                         onchange="documentDirty=true;">
                </div>
              </div>

              <div class="flex mb-1">
                <label class="basis-1/4">{{ $root.lang('template_desc') }}</label>
                <div class="basis-3/4">
                  <input v-model="data.description"
                         type="text"
                         maxlength="255"
                         class="block w-full border-gray-300 px-3 py-1 text-base"
                         onchange="documentDirty=true;">
                </div>
              </div>

              <div class="flex mb-1">
                <label class="basis-1/4">{{ $root.lang('existing_category') }}</label>
                <div class="basis-3/4">
                  <select v-model="data.category"
                          class="block w-full border-gray-300 px-3 py-1 text-base"
                          onchange="documentDirty=true;">
                    <option v-for="category in $root.categories()" :key="category.id"
                            :value="category.id">
                      {{ category.category }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="flex mb-1">
                <label class="basis-1/4">{{ $root.lang('new_category') }}</label>
                <div class="basis-3/4">
                  <input v-model="data.newcategory"
                         type="text"
                         maxlength="45"
                         class="block w-full border-gray-300 px-3 py-1 text-base"
                         onchange="documentDirty=true;">
                </div>
              </div>

              <div class="form-check mb-1" v-if="$root.hasPermissions('save_role')">
                <input v-model="data.selectable"
                       type="checkbox"
                       class="form-check-input"
                       id="selectable"
                       :false-value="0" :true-value="1">
                <label class="form-check-label" for="selectable">{{ $root.lang('template_selectable') }}</label>
              </div>

            </div>

            <!-- HTML text editor start -->
            <div class="navbar-editor mt-3 mb-1">
              <span>{{ $root.lang('template_code') }}</span>
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
              <p>{{ $root.lang('template_tv_msg') }}</p>

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

                <p v-else class="text-danger">{{ $root.lang('template_no_tv') }}</p>
              </div>

              <div class="row">
                <template v-if="Object.values(meta?.['unselected'] || {}).length">
                  <!--                  <hr class="bg-secondary">-->
                  <p class="m-0">{{ $root.lang('template_notassigned_tv') }}</p>

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

<script>
import ActionsButtons from '@/components/ActionsButtons'
import TitleView from '@/components/Title'
import Tabs from '@/components/Tabs'
import Panel from '@/components/Panel'

export default {
  name: 'TemplateIndex',
  components: { ActionsButtons, TitleView, Tabs, Panel },
  data () {
    return {
      id: this.$route['params'] && this.$route['params']['id'] || null,
      icon: 'fa fa-code',
      errors: {},
      data: {},
      meta: {}
    }
  },

  created () {
    this.setTabTitle(this.data.templatename)

    if (this.id) {
      this.read(this.id)
    }
  },

  methods: {
    action (name, item) {
      switch (name) {
        case 'save':
          this.loading = false
          if (this.data.id) {
            this.update({ ...this.data, tvSelected: this.tvSelected })
          } else {
            this.create({ ...this.data, tvSelected: this.tvSelected })
          }
          break

        case 'delete':
          if (this.data.id) {
            confirm(this.$root.lang('confirm_delete_template')) && this.destroy(this.data.id)
          }
          break

        case 'cancel':
          this.$emit('toTab', { name: 'ElementsIndex', query: { resourcesTab: 0 } }, true)
          break
      }
    },

    setTabTitle (title) {
      this.$emit('titleTab', {
        icon: this.icon,
        title: title || ''
      })

      if (title) {
        this.$emit('titleTab', title)
      }
    },

    async create (data) {
      try {
        let response = await axios.post('api/template', data)
        this.data = response.data.data
        this.setTabTitle(this.data.templatename)
      } catch (e) {
        if (e.response.status === 422) {
          this.errors = e.response.data.errors
        }
      }
    },

    async read (id) {
      let response = await axios.get('api/template/' + id)
      this.data = response.data.data
      this.setTabTitle(this.data.templatename)
    },

    async update (data) {
      this.errors = {}
      try {
        let response = await axios.put('api/template/' + data.id, data)
        this.data = response.data.data
        this.setTabTitle(this.data.templatename)
      } catch (e) {
        if (e.response.status === 422) {
          this.errors = e.response.data.errors
        }
      }
    },

    async destroy (id) {
      await axios.delete('api/template/' + id)
    }
  }
}
</script>

<style scoped>
.form-control-name { position: relative; }
.form-control-name label { position: absolute; right: .8rem; top: .4rem; font-size: 1.5rem; cursor: pointer; }
.form-control-name label input { opacity: 0 }
</style>
