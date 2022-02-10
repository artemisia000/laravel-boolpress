
<template>
     <div class="container mt-5">
         <h1 class="text-center" >Welcome</h1>
         <div v-if="posts" >
            <article v-for="post in posts" :key="`post-${post-id}`" >
                <h2>{{ post.title }}</h2>
                <div class="mb-3">
                    {{formatDate( post.created_at )}}
                </div>
                <p>{{ getExcerpts(post.description, 100) }}</p>
                <router-link :to="{ name: 'post-detail', params: {slug: post.slug} } ">
                      Read more 
                </router-link>      
            </article>

            <!--paginazione-->
            <!--PREV-->
            <button
                class="btn btn-primary m-2"
                :disabled="pagination.current === 1"
                @click="getPosts(pagination.current - 1)"
                >
                Prev
            </button>

            <!--NUMBER BUTTONS-->
            <button
                class="btn m-2"
                :class="pagination.current === i ? 'btn-primary' : 'btn-secondary'"
                v-for="i in pagination.last"
                :key="`page-${i}`" 
                @click="getPosts(i)"       
            >
                {{ i }}
            </button>

            <!--NEXT-->
            <button
                class="btn btn-primary m-2"
                :disabled="pagination.current === pagination.last"
                @click="getPosts(pagination.current + 1)"
                >
                Next
            </button>
         </div>
         <Loader text="Loading Blog" v-else />
   
     </div>
</template>

<script>
import axios from 'axios';
import Loader from '../components/Loader';


export default {
    name: 'Blog',
    components: {
        Loader,
    },
    data() {
        return {
            posts: null,
            pagination: null,
        }
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts(page = 1) {
            
            axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
            .then(res=> {
                console.log(res);
                
                //this.posts = res.data;
                
                //con paginazione
                this.posts = res.data.data;
                this.pagination = {
                    current: res.data.current_page,
                    last: res.data.last_page
                };
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


</style>