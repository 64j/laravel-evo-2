import { ref } from 'vue'

export default function BootstrapService () {
  const config = ref({})

  const getConfig = async () => {
    let response = await axios.post('api/bootstrap')
    config.value = response.data.data
  }

  return { config, getConfig }
}
