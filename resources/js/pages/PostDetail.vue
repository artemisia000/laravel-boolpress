<template>
  <section class="container">
      <h1>Post DEtail Here</h1>

  </section>
</template>

<script>
import axios from 'axios';

export default {
    name: 'PostDetail',
    data() {
        return {
            post:null,
        }
    },

    created() {
        this.getPostDetail();
    },

    methods: {
        getPostDetail(){

        }
    }
}
</script>

<style>

</style>