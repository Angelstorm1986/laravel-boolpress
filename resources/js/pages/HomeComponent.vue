<template>
    <section>
        <div class="row">
            <div class="col-2">
                <nav>
                <ul class="p-0 my-2">
                    <li class="my-2 bg-dark" v-for="(category,index) in categories" :key="index">
                    <router-link :to="{ name:'category', params:{slug: category.slug} }" >{{category.name}}</router-link>
                    </li>
                </ul>
                </nav>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: 'HomeComponent',
    data(){
        return{
            categories:[],
            posts:[]
        }
    },
    mounted(){
        axios.get('/api/categories').then((res)=>{
            this.categories = res.data;
        }).catch((error) =>{
            console.log(error);
        });

        axios.get('/api/posts/').then((res)=>{
            this.posts = res.data.slice(0,3);
        }).catch((error) =>{
            console.log(error);
        });
    }
}
</script>
<style lang="scss">

</style>
