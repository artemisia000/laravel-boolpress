<template>
  <section class="container">
      <div v-if="post">
          <h1>{{ post.title }}</h1>

          <h3>Category:{{ post.category.name }}</h3>

          <div class="m-4">
              <span
              v-for="tag in post.tags"
              :key="`tag-${tag.id}`"
              class="badge badge-primary mr-2"          
              >
              {{ tag.name }}
              </span>

          </div>

          <p>{{ post.description }} </p>
      </div>
      <div v-else>
          Loading...
      </div>

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

            axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
            .then(res => {
                
                this.post = res.data;
            })
            .catch(err => log.error(err));

        }
    }
}
</script>

<style>

</style>