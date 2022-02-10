<template>
  <section class="container">
      <div v-if="post">
          <h1>{{ post.title }}</h1>

          <h3>Category:{{ post.category.name }}</h3>

          <p>{{ post.description }} </p>

      <Tags :list="post.tags"/>
      </div>

      <Loader text="Loading Post" v-else/>
  </section>
</template>

<script>
import axios from 'axios';
import Tags from '../components/Tags';
import Loader from '../components/Loader';

export default {
    name: 'PostDetail',
    components: {
        Tags,
        Loader,
    },

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