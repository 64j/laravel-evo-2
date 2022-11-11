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
        <input type="text" class="py-1 px-2 text-xs border-0 border-t border-b border-gray-300"
               :placeholder="$root.lang('element_filter_msg')"
               @keyup="filter">
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
        <li :key="'category-' + category.id" v-if="category.data.filter(v => !v.hidden).length">

          <a v-if="!hiddenCategories"
             class="block px-5 py-1 bg-slate-200 border">
            <span class="text-md font-bold mr-2">{{ category.name }} </span>
            <small>({{ category.id }})</small>
          </a>

          <ul class="divide-y">
            <template v-for="item in category.data">
              <li v-if="!item.hidden"
                  :key="'item-' + item.id"
              class="flex flex-1 justify-between pr-5 items-center hover:bg-slate-100">

                <input v-if="checkbox"
                       type="checkbox"
                       :id="`checkbox-item-`+item.id"
                       :value="item.id"
                       :checked="~checkboxChecked.indexOf(item.id)"
                       class="mr-2 p-0"
                       @change="$emit('action', checkbox, item, category)"/>

                <router-link
                    :to="{ name: linkName, params: { id: item.id } }"
                    class="grow py-1 px-5 text-md select-none group/item"
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
      type: Array
    },
    hiddenCategories: {
      type: Boolean
    },
    actions: {
      type: Object
    }
  },
  data () {
    return {
      msg: false
    }
  },
  methods: {
    filter (event) {
      const filter = event.target.value.toLowerCase()
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
</script>
