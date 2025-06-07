<template>
  <div class="p-4">
    <h1 class="text-xl mb-4">Construir Casitas</h1>
    <input v-model="cadena" placeholder="Ej: 25525511135" class="border p-2 mr-2" />
    <button @click="construirCasitas" class="bg-blue-600 text-white px-4 py-2">Construir Casitas</button>

    <div v-if="resultados.length" class="mt-4">
      <h2>Resultados:</h2>
      <ul>
        <li v-for="ip in resultados" :key="ip">{{ ip }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      cadena: '',
      resultados: []
    }
  },
  methods: {
    async construirCasitas() {
      try {
        const res = await axios.post('http://127.0.0.1:8000/api/casitas
', {
  cadenaJuguetes: this.cadena
})
        this.resultados = res.data
      } catch (err) {
        console.error('Error:', err)
      }
    }
  }
}
</script>

