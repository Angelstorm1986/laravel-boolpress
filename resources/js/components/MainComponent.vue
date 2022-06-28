<template>
    <main>
        <h1>Sono il main</h1>
        <ul>
            <li v-for="(post, index) in posts" :key="index">
                {{post.title}} 
                <a href="#" @click="getDetail(post.slug, index)">Vedi dettaglio</a>
                <span v-if="post.detail">
                    {{post.detail.slug}}
                </span>
            </li>
        </ul>
    </main>
</template>

<script>
import Axios from 'axios'

export default {
    name: 'MainComponent',
    data(){
        return {
            posts: []
        }
    },
    methods: {
        getDetail(slug, index) {
            Axios.get('/api/posts/'+ slug).then((response) => {
                this.posts[index].detail = response.data;
            })
        }
    },
    mounted() {
        Axios.get('/api/posts').then((response) => {
            console.log(response)
            this.posts = response.data;
        })
    }
}
</script>

<style lang="scss">

</style>
