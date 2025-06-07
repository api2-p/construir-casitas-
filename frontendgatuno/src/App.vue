<template>
  <div>
    <h2>Validador de cadenas</h2>
    <input v-model="cadena" placeholder="Escribe una cadena" />
    <button @click="enviarCadena">Enviar</button>

    <ul>
      <li v-for="(item, index) in resultados" :key="index">
        {{ item }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      cadena: '',
      resultados: []
    };
  },
  methods: {
    async enviarCadena() {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/casitas', {
          cadenaJuguetes: this.cadena
        });
        this.resultados = response.data;
      } catch (error) {
        console.error('Error al enviar la cadena:', error);
      }
    }
  }
};
</script>
