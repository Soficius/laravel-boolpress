<template>
    <section class="d-flex justify-content-center">
        <div class="card mb-5 mt-3" style="max-width: 540px; min-width: 800px">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img :src="post.image" :alt="post.title" class="w-100 h-100">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">{{ post.title }}</h2>
                        <!-- <p><strong>Autore</strong></p> -->
                        <p class="card-text">{{ post.content }}</p>
                        <!-- <p>Categoria: </p>
                        <p><strong>Tags:</strong>
                            <span>{{ tag.label }}</span>
                        </p> -->
                        <p>Creato il<time> {{ formatedData }} </time></p>
                        <p>Modificato il<time> {{ formatedData }} </time> </p>
                        <router-link class="btn btn-primary" :to="{name:'post-detail', params:{id: post.id} }">Vedi</router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    name: 'PostCard',
    props: {
        post: Object
    },
    computed: {
        // formatto la data
        formatedData() {
            const postDate = new Date(this.post.created_at);
            let day = postDate.getDate();
            // faccio il +1 perchè js iniza a contare i mesi da zero
            let month = postDate.getMonth() + 1 ;
            let year = postDate.getYear();

            // la funzione parla da sola
            if (day < 10) day = "0" + day;
            if (month < 10) month = "0" + month;

            return ` ${day} /${month}/${year}`
        }
    }
   }
</script>
