<template>
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand" href="#">{{title}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <!-- non utlizziamo il tag a ma il componente
                        router-link(ci viene fornito automaticamente con vue router)
                        perchè l'attributo per cambiare la pagina non è href ma to.
                         -->
                        <router-link class="nav-link" :to="{name:'home'}">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'about'}">About us</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'contacts'}">Contacts</router-link>
                    </li>
                </ul>
            </div>
        </nav>





    </header>
</template>

<script>
export default {
    name: "AppHeader",
    props: {
        title: String,
    },
};
</script>

<style>

</style>
