<template>
  <div>
    <ActionsButtons @action="action"/>

    <form name="mutate" v-show="loading">

      <TitleView :title="lang('settings_title')" :icon="icon"/>

      <Tabs
        id="Configuration"
        :tabs="[
          { id: 'Site_settings', title: lang('settings_site') },
          { id: 'furl_settings', title: lang('settings_furls') },
          { id: 'user_settings', title: lang('settings_users') },
          { id: 'manager_settings', title: lang('settings_ui') },
          { id: 'security_settings', title: lang('settings_security') },
          { id: 'filemanager_settings', title: lang('settings_misc') },
          { id: 'filebrowser_settings', title: lang('settings_KC') },
        ]">
        <template #Site_settings>
          <div class="container-fluid container-body pt-3">

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">
                {{ lang('sitestatus_title') }}
                <br>
                <small>[(site_status)]</small>
              </label>
              <div class="col-md-9 col-lg-10">
                <label>
                  <input v-model="data['site_status']" type="radio" value="1"
                         class="form-check-input">
                  {{ lang('online') }}
                </label>
                <br>
                <label>
                  <input v-model="data['site_status']" type="radio" value="0"
                         class="form-check-input">
                  {{ lang('offline') }}
                </label>
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">
                {{ lang('sitename_title') }}
                <br>
                <small>[(site_name)]</small>
              </label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data['site_name']" type="text" maxlength="255" class="form-control">
                <div class="small text-muted">{{ lang('sitename_message') }}</div>
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">
                {{ lang('emailsender_title') }}
                <br>
                <small>[(emailsender)]</small>
              </label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data['emailsender']" type="text" maxlength="255"
                       class="form-control">
                <div class="small text-muted">{{ lang('emailsender_message') }}</div>
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">
                {{ lang('sitestart_title') }}
                <br>
                <small>[(site_start)]</small>
              </label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data['site_start']" type="text" maxlength="255"
                       class="form-control">
                <div class="small text-muted">{{ lang('sitestart_message') }}</div>
              </div>
            </div>

            <div class="row form-row mb-1">
              <label class="col-md-3 col-lg-2">
                {{ lang('errorpage_title') }}
                <br>
                <small>[(error_page)]</small>
              </label>
              <div class="col-md-9 col-lg-10">
                <input v-model="data['error_page']" type="text" maxlength="255"
                       class="form-control">
                <div class="small text-muted">{{ lang('errorpage_message') }}</div>
              </div>
            </div>

          </div>
        </template>

        <template #furl_settings>
          <div class="container-fluid container-body pt-3">

          </div>
        </template>

        <template #user_settings>
          <div class="container-fluid container-body pt-3">

          </div>
        </template>

        <template #manager_settings>
          <div class="container-fluid container-body pt-3">

          </div>
        </template>

        <template #security_settings>
          <div class="container-fluid container-body pt-3">

          </div>
        </template>

        <template #filemanager_settings>
          <div class="container-fluid container-body pt-3">

          </div>
        </template>

        <template #filebrowser_settings>
          <div class="container-fluid container-body pt-3">

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

export default {
  name: 'ConfigurationIndex',
  components: { ActionsButtons, TitleView, Tabs },
  data () {
    return {
      controller: 'Configuration',
      icon: 'fa fa-cogs',
      loading: false,
      data: this.$store.state['Settings'].config,
      meta: {}
    }
  },
  computed: {
    title () {
      return this.lang('settings_title')
    }
  },
  mounted () {
    this.$emit('titleTab', {
      icon: this.icon,
      title: this.lang('settings_title')
    })
    this.read()
  },
  methods: {
    action () {

    },
    read () {
      this.loading = true
      //this.setData({})
      // http.post(this.controller + '@read', this.data).then(result => {
      //   this.setData(result)
      // })
    },
    setData (result) {
      this.data = result.data || {}
      this.meta = result.meta || {}
      this.loading = true
    }
  }
}
</script>

<style scoped>

</style>
