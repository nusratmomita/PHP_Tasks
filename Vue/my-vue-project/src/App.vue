<template>
  <HelloWorld msg="Welcome to Your Vue.js App"/>
</template>

<script>
onst Vue = require('vue');
const Task_Manager = require('./components/Task_Manager.vue');

export default {
  name: 'App',
  components: {
    Task_Manager
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
