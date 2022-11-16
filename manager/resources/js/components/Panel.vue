<template>
  <div class="panel" :class="className">

    <div v-if="searchInput" class="py-3 px-5 flex flex-wrap md:block justify-between">

      <div class="inline-flex items-center flex-1 relative md:mr-1">
        <input type="text"
               :placeholder="$root.lang('element_filter_msg')"
               @keyup="setFilter"
               class="py-1 pl-2 pr-5 w-full md:w-80 text-xs peer/filter"
               autofocus>
        <i
            class="fa fa-circle-xmark text-gray-300 hover:text-rose-500 cursor-pointer absolute right-0 mx-1 invisible peer-[.active]/filter:visible dark:text-gray-500"
            @click="clearFilter"
        />
      </div>

      <router-link
          v-if="txtNew"
          :to="{ name: linkName, params: { id : '' } }"
          class="bg-green-600 hover:bg-green-700 border border-transparent text-white font-bold py-1 px-2 md:mr-1 text-xs whitespace-nowrap">
        <i class="fa fa-plus-circle fa-fw"/>
        <span class="hidden md:inline-block pl-2">{{ txtNew }}</span>
      </router-link>

      <span v-if="txtHelp"
            class="bg-white hover:bg-gray-100 border border-gray-300 font-bold py-1 px-2 text-xs whitespace-nowrap cursor-pointer dark:bg-gray-500 dark:border-gray-400 dark:hover:bg-gray-600 dark:hover:border-gray-450"
            @click="msg=!msg">
        <i class="far fa-question-circle fa-fw"/>
        <span class="hidden md:inline-block pl-2">{{ $root.lang('help') }}</span>
      </span>

      <div class="bg-blue-100 rounded p-4 m-0 mt-3 dark:bg-blue-500/50" v-html="txtHelp" v-if="msg"/>

    </div>

    <div v-if="!data" class="text-center p-5">
      <i class="fa fa-spinner fa-spin"/>
    </div>

    <ul v-else>
      <template v-for="category in data">
        <li :key="'category-' + category.id" v-if="Object.values(category.data).filter(v => !v.hidden).length">

          <div v-if="!hiddenCategories"
               class="flex justify-between items-center px-5 bg-slate-200 dark:bg-slate-600">
            <label class="py-1">
              <input
                  v-if="checkbox"
                  type="checkbox"
                  v-model="category['@selected']"
                  @change="checkAll(category)"
                  class="mr-3 peer/check"/>

              <span class="font-extrabold text-gray-600 mr-1 dark:text-gray-300">{{ category.name }}</span>
              <span class="text-xs">({{ category.id }})</span>
            </label>
            <div v-if="category['prev_page_url'] || category['next_page_url']">
              <i
                  :class="{ 'pointer-events-none opacity-50' : !category['prev_page_url'] }"
                  class="fa fa-angle-left fa-fw text-lg cursor-pointer hover:text-blue-500"
                  @click="$emit('action', 'paginate', category['prev_page_url'], category)"
              />
              <i
                  :class="{ 'pointer-events-none opacity-50' : !category['next_page_url'] }"
                  class="fa fa-angle-right fa-fw text-lg cursor-pointer hover:text-blue-500"
                  @click="$emit('action', 'paginate', category['next_page_url'], category)"
              />
            </div>
          </div>

          <ul class="divide-y divide-gray-100 pb-2 dark:divide-gray-800">
            <template v-for="item in category.data">
              <li v-if="!item.hidden"
                  :key="'item-' + item.id"
                  class="flex flex-1 justify-between px-5 items-center hover:bg-slate-100 dark:hover:bg-slate-800">

                <template v-if="checkbox">

                  <label class="grow inline-flex items-center py-1 select-none group/item">

                    <input
                        type="checkbox"
                        :id="`checkbox-item-`+item.id"
                        :value="item.id"
                        v-model="item['@selected']"
                        class="mr-3 peer/check"/>

                    <i v-if="linkIcon" :class="linkIcon" class="mr-2 peer/icon"></i>
                    <i class="fa fa-lock fa-fw mr-1 -ml-5 text-rose-500 text-xs peer-[.fa]/icon:-ml-4 peer-[.fa]/icon:mr-0"
                       v-if="item.locked"/>
                    <span class="mr-1 peer-checked/check:font-bold">
                      {{ item.name }}
                    </span>
                    <span class="text-xs">({{ item.id }})</span>
                    <span class="ml-3 text-xs" v-html="item.description"/>

                  </label>

                </template>

                <router-link
                    v-else
                    :to="{ name: linkName, params: { id: item.id } }"
                    class="grow inline-flex items-center py-1 pr-5 select-none group/item"
                    :class="{ 'text-rose-600': item.disabled }">

                  <i v-if="linkIcon" :class="linkIcon" class="mr-2 peer/icon"></i>
                  <i class="fa fa-lock fa-fw mr-1 -ml-5 text-rose-500 text-xs peer-[.fa]/icon:-ml-4 peer-[.fa]/icon:mr-0"
                     v-if="item.locked"/>
                  <span class="mr-1"
                        :class="{ 'group-hover/item:text-rose-700': item.disabled }">
                    {{ item.name }}
                  </span>
                  <span class="text-xs">({{ item.id }})</span>
                  <span class="ml-3 text-xs" v-html="item.description"/>

                </router-link>

                <div v-if="actions" class="inline-flex flex-nowrap">
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
  methods: {
    checkAll (category) {
      category.data.forEach(item => item['@selected'] = category['@selected'])
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
