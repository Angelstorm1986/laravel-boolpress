<template>
    <section>
        <div class="container d-flex justify-content-center align-items-center">
            <div v-if="post">
                <div v-if="post.image">
                    <img class="rounded-pill" :src="`/storage/${post.image}`" :alt="`${post.title}`">
                </div>
                <h1>{{post.title}}</h1>
                <p>{{post.content}}</p>
                <ul v-if="post.tags">
                    <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
                </ul>
                <div class="text-center">
                    <h4>Add a Comment</h4>
                    <form @submit.prevent="addComment()">
                        <label for="username">Inserisci il nome</label><br>
                        <input type="text" v-model="formData.username"><br>
                        <label for="content">Inserisci il contenuto</label><br>
                        <textarea v-model="formData.content" cols="50" rows="5" placeholder="Inserisci il contenuto qui"></textarea><br>
                        <button type="submit">Invia</button>
                    </form>
                </div>
                <div v-if="post.comments.length > 0">
                    <h4>Comments:</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Content</th>
                                <th scope="col">Created at</th>
                            </tr>
                        </thead>
                        <tbody v-for="comment in post.comments" :key="comment.id">
                            <tr>
                                <td>{{comment.id}}</td>
                                <td><strong>{{comment.username}}</strong></td>
                                <td>{{comment.content}}</td>
                                <td>{{comment.created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: 'SinglePostComponent',
    data(){
        return{
            post: null,
            formData: {
                username : "",
                content : "",
                post_id : ""
            }
        }
    },
    methods:{
        addComment() {
            axios.post("/api/comments", this.formData)
            .then((response) => {
                console.log(response);
                this.post.comments.push(response.data);
            }).catch((error) => {
                console.log(error);
            })
        }
    },
    mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((response) => {
            this.post = response.data;
            this.formData.post_id =this.post.id;
        }).catch((error) => {
            this.$router.push({name: 'page-404'});
        })
    }
}
</script>
<style lang="scss">

</style>
