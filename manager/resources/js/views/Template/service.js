import { ref } from 'vue'

export default function TemplateService () {
  const errors = ref('')
  const formData = ref({})
  const templates = ref([])

  const create = async (data) => {
    try {
      let response = await axios.post('api/template', data)
      formData.value = response.data.data
    } catch (e) {
      if (e.response.status === 422) {
        errors.value = e.response.data.errors
      }
    }
  }

  const read = async (id) => {
    let response = await axios.get('api/template/' + id)
    formData.value = response.data.data
  }

  const update = async (data) => {
    errors.value = ''
    try {
      let response = await axios.put('api/template/' + data.id, data)
      formData.value = response.data.data
    } catch (e) {
      if (e.response.status === 422) {
        errors.value = e.response.data.errors
      }
    }
  }

  const destroy = async (id) => {
    await axios.delete('api/template/' + id)
  }

  const list = async (data) => {
    let response = await axios.get('api/template', data)
    templates.value = response.data.data
  }

  return { errors, formData, templates, create, read, update, destroy, list }
}
