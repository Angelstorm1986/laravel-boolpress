<template>
    <section>
        <h1 class="text-center pt-5">Posts</h1>
        <div class="container pt-3 pb-5">
            <div class="row" v-if="posts.length > 0">
                <div class="col-6" v-for="(post,index) in posts" :key="post.id">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{post.title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Index: {{index}}</h6>
                            <p class="card-text">{{post.content}}.</p>
                            <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Visualizza Post</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <ul v-if="posts.length > 0">
            <li v-for="(post,index) in posts" :key="post.id">
                {{index}} - {{post.title}}
            <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Visualizza Post</router-link>
            </li>
        </ul> -->
    </section>
</template>
<script>
export default {
    name: 'PostsComponent',
    data(){
        return {
            posts: []
        }
    },
    created(){
        axios.get('/api/posts').then((response)=>{
            this.posts = response.data;
        })
    }
}
</script>
<style lang="scss">

</style>
