<template>
  <div class="panel" :class="className">

    <div v-if="searchInput" class="py-3 px-5">
      <div class="input-group input-group-sm">
        <router-link
            v-if="txtNew"
            :to="{ name: linkName, params: { id : '' } }"
            class="bg-green-700 border border-transparent hover:bg-green-800 text-white font-bold py-1 px-2 text-xs rounded-l">
          <i class="fa fa-plus"/>
          {{ txtNew }}
        </router-link>
        <div class="inline-flex items-center relative">
          <input type="text"
                 class="py-1 pl-2 pr-5 w-80 text-xs border-0 border-t border-b peer/filter"
                 :placeholder="$root.lang('element_filter_msg')"
                 @keyup="setFilter">
          <i
              class="fa fa-circle-xmark text-gray-300 hover:text-rose-500 cursor-pointer absolute right-0 mx-1 invisible peer-[.active]/filter:visible"
              @click="clearFilter"
          />
        </div>
        <a v-if="txtHelp" href="javascript:;"
           class="bg-blue-600 border border-transparent hover:bg-blue-700 text-white font-bold py-1 px-2 text-xs rounded-r"
           @click="msg=!msg">{{ $root.lang('help') }}</a>
      </div>
      <div class="bg-blue-100 rounded p-4 m-0 mt-3" v-html="txtHelp" v-if="msg"/>
    </div>

    <div v-if="!data" class="text-center p-4">
      <i class="fa fa-spinner fa-spin"/>
    </div>

    <ul v-else>
      <template v-for="category in data">
        <li :key="'category-' + category.id" v-if="Object.values(category.data).filter(v => !v.hidden).length">

          <div v-if="!hiddenCategories"
               class="flex justify-between items-center px-5 bg-slate-200 border">
            <div class="py-1">
              <input
                  v-if="checkbox"
                  type="checkbox"
                  v-model="category['@selected']"
                  class="mr-3 peer/check"/>

              <span class="text-md font-bold mr-2">{{ category.name }} </span>
              <small>({{ category.id }})</small>
            </div>
            <div v-if="category.total">
              <i
                  :class="{ 'pointer-events-none text-gray-400' : !category['prev_page_url'] }"
                  class="fa fa-angle-left fa-fw text-lg cursor-pointer hover:text-blue-500"
                  @click="$emit('action', 'paginate', category['prev_page_url'], category)"
              />
              <i
                  :class="{ 'pointer-events-none text-gray-400' : !category['next_page_url'] }"
                  class="fa fa-angle-right fa-fw text-lg cursor-pointer hover:text-blue-500"
                  @click="$emit('action', 'paginate', category['next_page_url'], category)"
              />
            </div>
          </div>

          <ul class="divide-y divide-gray-100 pb-2">
            <template v-for="item in category.data">
              <li v-if="!item.hidden"
                  :key="'item-' + item.id"
                  class="flex flex-1 justify-between px-5 items-center hover:bg-slate-100">

                <label v-if="checkbox"
                       class="grow inline-flex items-center py-1 pr-5 select-none group/item">

                  <input
                      type="checkbox"
                      :id="`checkbox-item-`+item.id"
                      :value="item.id"
                      v-model="item['@selected']"
                      class="mr-3 peer/check"/>

                  <i :class="linkIcon" class="mr-1"></i>
                  <i class="fa fa-lock fa-fw mr-1 text-rose-500" v-if="item.locked"/>
                  <span class="group-hover/item:text-blue-700 peer-checked/check:font-bold mr-1">{{ item.name }}</span>
                  <span class="text-xs">({{ item.id }})</span>
                  <span class="ml-3 text-xs" v-html="item.description"/>

                </label>

                <router-link
                    v-else
                    :to="{ name: linkName, params: { id: item.id } }"
                    class="grow inline-flex items-center py-1 pr-5 select-none group/item"
                    :class="[item.disabled ? 'text-rose-700/75': '']">

                  <i :class="linkIcon" class="mr-1"></i>
                  <i class="fa fa-lock fa-fw mr-1 text-rose-500" v-if="item.locked"/>
                  <span class="text-blue-500 group-hover/item:text-blue-700 mr-1">{{ item.name }}</span>
                  <span class="text-xs">({{ item.id }})</span>
                  <span class="ml-3 text-xs" v-html="item.description"/>

                </router-link>

                <div v-if="actions">
                  <i v-for="(action, k) in actions"
                     :key="`item-` + item.id + `action-` + k"
                     :class="[action.values ? action.values[item[k]].icon : action.icon]"
                     class="ml-2"
                     role="button"
                     :title="[action.values ? action.values[item[k]].title : action.title]"
                     @click="$emit('action', k, item, category)"
                  />
                </div>

              </li>
            </template>
          </ul>

        </li>
      </template>
    </ul>

  </div>
</template>

<script>
export default {
  name: 'PanelView',
  props: {
    data: {
      type: [null, Object, Array],
      required: true
    },
    linkName: {
      type: String,
      required: true
    },
    linkIcon: {
      type: String
    },
    className: {
      type: String
    },
    searchInput: {
      type: Boolean
    },
    txtNew: {
      type: String
    },
    txtHelp: {
      type: String
    },
    checkbox: {
      type: String
    },
    checkboxChecked: {
      type: Array,
      default: []
    },
    hiddenCategories: {
      type: Boolean
    },
    actions: {
      type: Object
    },
    filter: {
      type: String
    }
  },
  data () {
    return {
      msg: false
    }
  },
  watch: {
    'data': {
      handler (categories) {
        categories.forEach(category => {
          category.data.forEach(item => {
            item['@selected'] = category['@selected']
          })
        })
      },
      deep: true
    }
  },
  methods: {
    checkAll (event, category) {
      category.data.forEach(input => input['@selected'] = event.target.checked)
    },
    clearFilter (event) {
      const filterElement = event.target.previousElementSibling
      if (filterElement.value) {
        filterElement.value = ''
        filterElement.classList.remove('active')
        this.$emit('action', 'filter', '')
      }
    },
    setFilter (event) {
      const filter = event.target.value.toLowerCase()

      if (filter) {
        event.target.classList.add('active')
      } else {
        event.target.classList.remove('active')
      }

      if (this.filter === 'ajax') {
        this.$emit('action', 'filter', filter)
      } else {
        if (filter.length) {
          for (let i in this.data) {
            let category = this.data[i]
            for (let l in category.data) {
              let item = category.data[l]
              if (~item.name.toLowerCase().indexOf(filter)) {
                delete (item.hidden)
              } else {
                item.hidden = true
              }
            }
          }
        } else {
          for (let i in this.data) {
            let category = this.data[i]
            for (let l in category.data) {
              let item = category.data[l]
              delete (item.hidden)
            }
          }
        }
      }
    }
  }
}
</script>
