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
                  <span v-if="data.id === $root.config('default_template')" class="text-sm text-rose-500 block">
                    {{ $root.lang('defaulttemplate_title') }}
                  </span>
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

            <div v-if="this.dataTvs.data.length">
              <Panel
                  :data="[dataTvs]"
                  :actions="categoriesActions"
                  :hiddenCategories="false"
                  class-name="pb-3 -mx-5"
                  link-name="TvIndex"
                  checkbox="checkbox"
                  @action="action"
              />
            </div>

            <p v-else class="font-bold text-rose-500 mb-3">{{ $root.lang('template_no_tv') }}</p>

            <div v-if="dataCategories != null">
              <p class="font-bold">{{ $root.lang('template_notassigned_tv') }}</p>

              <Panel
                  :data="dataCategories"
                  :actions="categoriesActions"
                  class-name="px-0 -mx-5"
                  link-name="TvIndex"
                  :search-input="true"
                  :txt-new="$root.lang('new_tmplvars')"
                  checkbox="checkbox"
                  filter="ajax"
                  @action="action"
              />
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
      icon: 'fa fa-newspaper',
      errors: {},
      data: {},
      categoriesActions: {
        tvEdit: {
          icon: 'far fa-edit fa-fw hover:text-blue-500'
        }
      },
      dataCategories: [],
      dataTvs: {
        name: this.$root.lang('template_tv_msg'),
        description: this.$root.lang('template_tv_edit_message'),
        '@selected': true,
        draggable: true,
        sortable: false,
        data: []
      }
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
    this.$emit('setTab', {
      icon: this.icon,
      title: this.title,
      changed: false
    })

    if (this.id) {
      this.read(this.id)
    } else {
      this.loading = true
      this.setData()
    }
  },

  methods: {
    action (name, item, category) {
      switch (name) {
        case 'save':
          this.loading = false
          if (this.data.id) {
            this.update({ ...this.data, tvs: this.tvs(), sortable: this.dataTvs.sortable })
          } else {
            this.create({ ...this.data, tvs: this.tvs(), sortable: this.dataTvs.sortable })
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

        case 'tvEdit':
          this.$router.push({ name: 'TvIndex', params: { id: item.id } })
          break

        case 'filter':
          this.filter(item)
          break

        case 'paginate':
          this.paginate(item, category)
          break
      }
    },

    setData (data) {
      this.data = data?.data || { category: 0, selectable: 1 }
      this.dataCategories = data?.meta?.categories || []
      this.dataTvs.data = data?.meta?.tvs || []
      this.dataTvs.sortable = false
      this.$emit('setTab', { title: this.title })
      this.loading = true

      const unwatchData = this.$watch('data', () => {
        this.$emit('setTab', { changed: true })
        unwatchData()
      }, {
        deep: true
      })

      const unwatchMeta = this.$watch('meta', () => {
        this.$emit('setTab', { changed: true })
        unwatchMeta()
      }, {
        deep: true
      })
    },

    async create (data) {
      try {
        let response = await axios.post('api/template', data)
        this.setData(response.data)
      } catch (e) {
        if (e.response.status === 422) {
          this.errors = e.response.data.errors
        }
      }
    },

    async read (id) {
      let response = await axios.get('api/template/' + id)
      this.setData(response.data)
    },

    async update (data) {
      this.errors = {}
      try {
        let response = await axios.put('api/template/' + data.id, data)
        this.setData(response.data)
      } catch (e) {
        if (e.response.status === 422) {
          this.errors = e.response.data.errors
        }
      }
    },

    async destroy (id) {
      await axios.delete('api/template/' + id)
    },

    async filter (str) {
      if (!str || str.length > 1) {
        let response = await axios.get('api/template/' + this.id + '?filter=' + str)
        this.dataCategories = response.data.meta['categories'] ?? []
      }
    },

    paginate (url, category) {
      axios.get(url).then(response => {
        if (response.data.meta['categories'] != null) {
          response.data.meta['categories'].forEach((cat, i) => {
            if (category.id === cat.id) {
              this.dataCategories[i] = cat
            }
          })
        }
      })
    },

    tvs () {
      let tvs = []

      this.dataTvs.data.forEach(tv => tv['@selected'] && tvs.push(tv.id))

      if (this.dataCategories != null) {
        this.dataCategories.forEach(category => {
          category.data.forEach(tv => tv['@selected'] && tvs.push(tv.id))
        })
      }

      return tvs
    }
  }
}
</script>
