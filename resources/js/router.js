import Vue from 'vue';
import Router from 'vue-router';
// routes
import Home from './views/Home.vue';
import NotFound from './views/NotFound.vue';

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        { path: '/', component: Home },
        { path: '**', component: NotFound }
    ]
});
