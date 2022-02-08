
<template>
     <div class="container text-center mt-5">
         <h1>Welcome</h1>
         <div v-if="posts" >
            <article v-for="post in posts" :key="`post-${post-id}`" >
                <h2>{{ post.title }}</h2>
                <div class="mb-3">
                    {{formatDate( post.created_at )}}
                </div>
                <p>{{ getExcerpts(post.description, 100) }}</p>
  
            </article>
         </div>
         <div v-else>
             Loading...
         </div>
     </div>
</template>

<script>
import axios from 'axios';


export default {
    name: 'App',
    components: {},
    data() {
        return {
            posts: null,
        }
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            
            axios.get('http://127.0.0.1:8000/api/posts')
            .then(res=> {
                console.log(res);
                
                this.posts = res.data;
                });
        },
        getExcerpts(text, Maxlength) {
            if(text.length > Maxlength) {
                return text.substring(0, Maxlength)+ '...';
            }
            return text;
        },
        formatDate(postDate) {

            const date = new Date(postDate);

            const formatted = new Intl.DateTimeFormat('it-IT').format(date);
            return formatted;
        }

    }
}

</script>

<style lang="scss" >

div{
    
h1{
    color: rgba(18, 143, 101, 0.932);
}
}

</style>