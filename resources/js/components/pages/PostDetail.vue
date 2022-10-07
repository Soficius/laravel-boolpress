<template>
    <div class="post-detail">
        <h1>Dettaglio Post</h1>
        <AppLoader v-if="isLoading"/>
        <PostCard v-else-if="!isLoading && post" :post="post"/>
    </div>
</template>

<script>
import PostCard from '../posts/PostCard.vue';
import AppLoader from '../AppLoader.vue';
export default {
    name: "PostDatail",
    components: {
    PostCard,
    AppLoader
},
    data() {
        return {
            post: null,
            isLoading: false
        }
    },
    methods: {
        fetchPost() {
            this.isLoading = true
            // prendiamo il post cliccato
            axios.get("http://localhost:8000/api/posts/" + this.$route.params.slug).then((res) => {
                this.post = res.data;
            })
                .catch((err) => {
                    console.log(err)
                })
                .then(() => {
                    this.isLoading = false
                });
        },
    },
    mounted() {
        this.fetchPost()
    },

}
</script>
