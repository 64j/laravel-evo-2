<template>
  <div>
    <ActionsButtons @action="action"/>

    <form name="mutate" v-show="loading">

      <TitleView
          :id="data.id"
          :title="data.pagetitle || $store.getters['Lang/get']('new_resource')"
          icon="fa fa-file"
          :message="$store.getters['Lang/get']('create_resource_title')"/>

      <Tabs
          id="doc"
          :tabs="[
            { id: 'General', title: $store.getters['Lang/get']('settings_general') },
            { id: 'Settings', title: $store.getters['Lang/get']('settings_page_settings') }
          ]">
        <template #General>
          <div class="container-fluid container-body pt-3">

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">
                {{ $store.getters['Lang/get']('resource_title') }}
              </label>
              <div class="col-md-9 col-lg-10">
                <div class="form-control-name clearfix">
                  <input v-model="data.pagetitle" type="text" maxlength="100" class="form-control form-control-lg"
                         onchange="documentDirty=true;">
                </div>
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('long_title') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.longtitle" type="text" maxlength="255" class="form-control"
                       onchange="documentDirty=true;">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_description') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.description" type="text" maxlength="255" class="form-control"
                       onchange="documentDirty=true;">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_alias') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.alias" type="text" maxlength="100" class="form-control"
                       onchange="documentDirty=true;">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('link_attributes') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.link_attributes" type="text" maxlength="255" class="form-control"
                       onchange="documentDirty=true;">
              </div>
            </div>

            <div class="row form-row mb-1" v-if="data.type === 'reference'">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('weblink') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.link_attributes" type="text" maxlength="255" class="form-control"
                       onchange="documentDirty=true;">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_summary') }}</label>
              <div class="col-md-9 col-lg-10">
                <textarea v-model="data.introtext" maxlength="255" class="form-control" onchange="documentDirty=true;"/>
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('page_data_template') }}</label>
              <div class="col-md-9 col-lg-10">
                <select v-model="data.template" class="form-select" onchange="documentDirty=true;">
                  <option :value="0">(blank)</option>
                  <optgroup v-for="category in meta.templates" :key="`template-category`+category.id"
                            :label="category.title">
                    <option v-for="template in category.items" :key="template.id" :value="template.id">
                      {{ template.name }}
                    </option>
                  </optgroup>
                </select>
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_opt_menu_title') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.menutitle" type="text" maxlength="255" class="form-control"
                       onchange="documentDirty=true;">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_opt_menu_index') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.menuindex" type="text" maxlength="6" class="form-control"
                       onchange="documentDirty=true;">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_opt_show_menu') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.hidemenu" type="checkbox" class="form-check-input" onchange="documentDirty=true;"
                       :false-value="1" :true-value="0">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_parent') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.parent" type="text" class="form-control" onchange="documentDirty=true;">
              </div>
            </div>

            <!-- HTML text editor start -->
            <div class="navbar-editor mt-3 mb-1">
              <span>{{ $store.getters['Lang/get']('resource_content') }}</span>
            </div>

          </div>

          <div class="section-editor">
            <textarea v-model="data.content" class="form-control" rows="20" wrap="soft" onchange="documentDirty=true;"/>
          </div>

        </template>

        <template #Settings>
          <div class="container-fluid container-body pt-3">

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_opt_published') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.published" type="checkbox" class="form-check-input" onchange="documentDirty=true;"
                       :false-value="0" :true-value="1">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('page_data_publishdate') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.pub_date" type="text" maxlength="255" class="form-control"
                       onchange="documentDirty=true;">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('page_data_unpublishdate') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.unpub_date" type="text" maxlength="255" class="form-control"
                       onchange="documentDirty=true;">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_type') }}</label>
              <div class="col-md-9 col-lg-10">
                <select v-model="data.type" class="form-select" onchange="documentDirty=true;">
                  <option value="document">{{ $store.getters['Lang/get']('resource_type_webpage') }}</option>
                  <option value="reference">{{ $store.getters['Lang/get']('resource_type_weblink') }}</option>
                </select>
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('page_data_contentType') }}</label>
              <div class="col-md-9 col-lg-10">
                <select v-model="data.contentType" class="form-select" onchange="documentDirty=true;">
                  <option v-for="(type, i) in config('custom_contenttype').split(',')" :key="`type-`+i" :value="type">
                    {{ type }}
                  </option>
                </select>
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_opt_contentdispo') }}</label>
              <div class="col-md-9 col-lg-10">
                <select v-model="data.content_dispo" class="form-select" onchange="documentDirty=true;">
                  <option :value="0">{{ $store.getters['Lang/get']('inline') }}</option>
                  <option :value="1">{{ $store.getters['Lang/get']('attachment') }}</option>
                </select>
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_opt_folder') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.isfolder" type="checkbox" class="form-check-input" onchange="documentDirty=true;"
                       :false-value="0" :true-value="1">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_opt_alvisibled') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.alias_visible" type="checkbox" class="form-check-input"
                       onchange="documentDirty=true;" :false-value="0" :true-value="1">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_opt_richtext') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.richtext" type="checkbox" class="form-check-input" onchange="documentDirty=true;"
                       :false-value="0" :true-value="1">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('track_visitors_title') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.donthit" type="checkbox" class="form-check-input" onchange="documentDirty=true;"
                       :false-value="1" :true-value="0">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('page_data_searchable') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.searchable" type="checkbox" class="form-check-input" onchange="documentDirty=true;"
                       :false-value="0" :true-value="1">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('page_data_cacheable') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.cacheable" type="checkbox" class="form-check-input" onchange="documentDirty=true;"
                       :false-value="0" :true-value="1">
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">{{ $store.getters['Lang/get']('resource_opt_emptycache') }}</label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data.syncsite" type="checkbox" class="form-check-input" onchange="documentDirty=true;"
                       :false-value="0" :true-value="1">
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
import http from '@/utils/http'

export default {
  name: 'DocumentIndex',
  components: { ActionsButtons, TitleView, Tabs },
  data () {
    this.controller = 'Document'
    this.icon = 'fa fa-file'

    return {
      loading: false,
      data: {
        id: this.$route.params && this.$route.params.id || null
      },
      meta: {}
    }
  },
  created () {
    this.$emit('titleTab', {
      icon: this.icon,
      title: ''
    })
    this.read()
  },
  methods: {
    action (action) {
      switch (action) {
        case 'save':
          this.loading = false
          if (this.data.id) {
            this.update()
          } else {
            this.create()
          }
          break

        case 'delete':
          this.delete()
          break

        case 'cancel':
          this.$emit('toTab', { name: 'DocumentList', param: { id: this.data.id } })
          break

        case 'refresh':
          this.$emit('refreshTab', { name: 'DocumentList', param: { id: this.data.id } })
          break
      }
    },
    create () {
      http.create(this.controller, this.data).then(result => {
        if (result.data.id) {
          this.$emit('replaceTab', { params: { id: result.data.id } })
        } else {
          this.setData(result)
          this.$emit('titleTab', this.title)
        }
        this.action('refresh')
        this.loading = true
      })
    },
    read () {
      http.read(this.controller, this.data).then(result => {
        this.setData(result)
      })
    },
    update () {
      http.update(this.controller, this.data).then(result => {
        this.setData(result)
        this.$emit('titleTab', this.title)
        this.action('refresh')
        this.loading = true
        this.$root.$refs.Layout.$refs.Tree.updateNode(this.data)
      })
    },
    delete () {
      if (confirm(this.$store.getters['Lang/get']('confirm_delete_resource'))) {
        http.delete(this.controller, this.data).then(result => {
          if (result) {
            this.action('cancel')
          }
        })
      }
    },
    setData (result) {
      this.data = result.data
      this.meta = result.meta
      this.$emit('titleTab', this.title)
      this.loading = true
    }
  }
}
</script>

<style scoped>
.form-control-name { position: relative; }
.form-control-name label { position: absolute; right: .8rem; top: .4rem; font-size: 1.5rem; cursor: pointer; }
.form-control-name label input { opacity: 0 }
</style>
