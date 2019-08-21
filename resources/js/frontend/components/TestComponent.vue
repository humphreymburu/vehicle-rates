
<template>
  <ul>
      <li v-for="skill in skills"  v-bind:key="skill">{{ skill }}</li>
      </ul>
</template>

<script>
    export default {

    
    data() {

        return {
            skills: []
        }
        
      },
      


        mounted() {
            console.log('Component mounted.')
            axios.get('vehicle/skills').then(response => this.skills = response.data);
        }
    }
</script>
