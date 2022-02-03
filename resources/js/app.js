/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('App', require('./App.vue').default);

const Home = Vue.component('Home', require('./pages/HomeComponent.vue').default);

const Products = Vue.component('products', require('./pages/ProductComponent.vue').default);


const Posts = Vue.component('posts', require('./pages/ArticleComponent.vue').default);


const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },

    {
        path: '/products',
        name: 'products',
        component: Products,
    },

    {
        path: '/posts',
        name: 'posts',
        component: Posts,
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});


/* Setup Vue Router */

import VueRouter from 'vue-router';

Vue.use(VueRouter);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,

});

