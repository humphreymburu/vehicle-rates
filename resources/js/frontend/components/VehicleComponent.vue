<template>
    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input id="purchase_cost" v-model="purchase_cost" number  class="form-control" name="purchase_cost">
        </div>

        <button type="submit" class="btn btn-primary">Send message</button>
    </form>
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
