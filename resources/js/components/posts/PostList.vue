<template>
    <div>
        <h2 class="text-center">Posts</h2>
        <AppLoader v-if="isLoading "/>
        <div v-else>
            <div v-if="posts.length">
                <PostCard  v-for="post in posts" :key="post.id" :post="post"/>
            </div>
            <h3 v-else class="text-center">Nessun Post</h3>
        </div>
    </div>
</template>

<script>
import PostCard from './PostCard.vue';
import AppLoader from '../AppLoader.vue';
export default {
    name: "PostList",
    data() {
        return {
            posts: [],
            isLoading: false,
        };
    },
    methods: {
        fetchPosts() {
            this.isLoading = true
            axios.get("http://localhost:8000/api/posts").then((res) => {
                this.posts = res.data;
            })
                .catch((err) => {
            })
                .then(() => {
                    this.isLoading = false
            });
        },
    },
    mounted() {
        this.fetchPosts();
    },
    components: {
    PostCard,
    AppLoader
}
};
</script>
