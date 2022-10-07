// importo vue e vue router
import Vue from 'vue';
import VueRouter from 'vue-router';

// importo i componenti dalle pagine
import HomePage from './components/pages/HomePage.vue';
import AboutUs from './components/pages/AboutUs.vue';
import Contacts from './components/pages/Contacts.vue';
import PostDetail from './components/pages/PostDetail.vue';

// dico a vue di usare route
Vue.use(VueRouter)

// definisco le rotte
const routes = new VueRouter({
    // usiamo la history perchè ci tiene la cronologia e ci permette di andare avanti e indietro come le pagine di navigaione. Toglie anche il cancelletto dalla barra di ricerca prima di ogni rotta
    mode: 'history',
    // prendo la chiave e le assegno la classe active di bootstrap(posso anche rinomiare la classe)
    linkExactActiveClass:'active',
    routes: [
        { path: '/', component: HomePage, name:'home' },
        { path: '/about', component: AboutUs, name: 'about' },
        { path: '/contacts', component: Contacts, name: 'contacts' },

        // con questa rotta mostro il singolo post. id è il parametro dinamico
        { path: '/posts/:slug', component: PostDetail, name: 'post-detail' },
    ]
});

// lo rendo esportabile per poterlo importarlo nel file dove ho istanziato vue. Nel nostro caso front.js
export default routes;
