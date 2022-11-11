<template>
  <div>

    <ActionsButtons @action="action"/>

    <form name="mutate" v-show="loading">

      <TitleView
          :id="data.id"
          :title="title"
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
          <div class="py-4 px-5">
            <div class="form-group">

              <div class="flex flex-wrap md:flex-nowrap mb-1">
                <label class="basis-full md:basis-80">
                  {{ $root.lang('template_name') }}
                  <small v-if="data.id === $root.config('default_template')" class="text-danger d-block">
                    {{ $root.lang('defaulttemplate_title') }}
                  </small>
                </label>
                <div class="basis-full">
                  <div class="form-control-name relative">
                    <input v-model="data['templatename']"
                           type="text"
                           maxlength="100"
                           class="block w-full border-gray-300 pr-8 text-lg"
                           onchange="documentDirty=true;">
                    <label v-if="$root.hasPermissions('save_role')"
                           :title="$root.lang('lock_snippet_msg')"
                           class="absolute left-full top-0 mt-2 -ml-6 text-lg">
                      <input v-model="data.locked" type="checkbox" class="hidden" :false-value="0" :true-value="1"/>
                      <i class="fa fa-lock -ml-1 cursor-pointer"
                         :class="[data.locked ? 'text-rose-500 hover:text-rose-600' : 'text-gray-400 hover:text-gray-500 fa-lock-open']"></i>
                    </label>
                  </div>
                  <small class="form-text text-danger hide" id='savingMessage'></small>
                </div>
              </div>

              <div class="flex flex-wrap md:flex-nowrap mb-1">
                <label class="basis-full md:basis-80">{{ $root.lang('alias') }}</label>
                <div class="basis-full">
                  <input v-model="data['templatealias']"
                         type="text"
                         maxlength="255"
                         class="block w-full border-gray-300 px-3 py-1"
                         onchange="documentDirty=true;">
                </div>
              </div>

              <div class="flex flex-wrap md:flex-nowrap mb-1">
                <label class="basis-full md:basis-80">{{ $root.lang('template_desc') }}</label>
                <div class="basis-full">
                  <input v-model="data.description"
                         type="text"
                         maxlength="255"
                         class="block w-full border-gray-300 px-3 py-1"
                         onchange="documentDirty=true;">
                </div>
              </div>

              <div class="flex flex-wrap md:flex-nowrap mb-1">
                <label class="basis-full md:basis-80">{{ $root.lang('existing_category') }}</label>
                <div class="basis-full">
                  <select v-model="data.category"
                          class="block w-full border-gray-300 px-3 py-1"
                          onchange="documentDirty=true;">
                    <option v-for="category in $root.categories()" :key="category.id"
                            :value="category.id">
                      {{ category.category }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="flex flex-wrap md:flex-nowrap mb-1">
                <label class="basis-full md:basis-80">{{ $root.lang('new_category') }}</label>
                <div class="basis-full">
                  <input v-model="data.newcategory"
                         type="text"
                         maxlength="45"
                         class="block w-full border-gray-300 px-3 py-1"
                         onchange="documentDirty=true;">
                </div>
              </div>

              <div class="flex flex-wrap md:flex-nowrap items-center mb-1" v-if="$root.hasPermissions('save_role')">
                <input v-model="data.selectable"
                       type="checkbox"
                       class="mr-2 border-gray-300"
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
                      class="block w-full border-gray-300 border-l-transparent border-r-transparent px-3 py-1"
                      rows="20"
                      wrap="soft"
                      onchange="documentDirty=true;"/>
          </div>
        </template>

        <template #Tvs>
          <div class="py-4 px-5">
            <div class="form-group">
              <p>{{ $root.lang('template_tv_msg') }}</p>

              <div class="row">
                <template v-if="Object.values(meta.selected || {}).length">
                  <ul class="mt-2 py-3 -mx-4 border-t border-gray-200 divide-y divide-gray-100">
                    <li v-for="tv in meta.selected" class="py-1 hover:text-blue-500 hover:bg-slate-100">
                      <router-link
                          :to="{ name: 'TvIndex', params: { id: tv.id } }"
                          class="block px-5">
                        <span class="font-bold">{{ tv.name }}</span> ({{ tv.id }})
                        <span v-if="tv.caption">- {{ tv.caption }}</span>
                      </router-link>
                    </li>
                  </ul>

                  <!--                  <Panel-->
                  <!--                      :data="meta.selected"-->
                  <!--                      class-name="px-0 mb-4"-->
                  <!--                      link-name="TvIndex"-->
                  <!--                      link-icon="fa fa-list-alt"-->
                  <!--                      checkbox="checkbox"-->
                  <!--                      :checkbox-checked="tvSelected"-->
                  <!--                      :hidden-categories="false"-->
                  <!--                      @action="action"-->
                  <!--                  />-->
                </template>

                <p v-else class="text-danger">{{ $root.lang('template_no_tv') }}</p>
              </div>

              <div class="row">
                <template v-if="Object.values(meta['unselected'] || {}).length">
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
      loading: false,
      icon: 'fa fa-code',
      errors: {},
      data: {},
      meta: {}
    }
  },

  computed: {
    id () {
      return this.$route['params'] && this.$route['params']['id'] || null
    },
    title () {
      return this.data.templatename || (this.id && '...') || this.$root.lang('new_template')
    }
  },

  created () {
    this.$emit('titleTab', {
      icon: this.icon,
      title: this.title
    })

    if (this.id) {
      this.read(this.id)
    } else {
      this.loading = true
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

    async create (data) {
      try {
        let response = await axios.post('api/template', data)
        this.data = response.data.data
        this.$emit('titleTab', this.data.templatename)
      } catch (e) {
        if (e.response.status === 422) {
          this.errors = e.response.data.errors
        }
      }
    },

    async read (id) {
      let response = await axios.get('api/template/' + id)
      this.data = response.data.data
      this.meta = response.data.meta
      this.$emit('titleTab', this.data.templatename)
      this.loading = true
    },

    async update (data) {
      this.errors = {}
      try {
        let response = await axios.put('api/template/' + data.id, data)
        this.data = response.data.data
        this.$emit('titleTab', this.data.templatename)
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
