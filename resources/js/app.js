/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/css/bootstrap.css'
import VueNoty from 'vuejs-noty'
import 'vuejs-noty/dist/vuejs-noty.css'
 
Vue.use(VueNoty)
Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('signup-component', require('./pages/auth/Signup.vue').default);
Vue.component('login-component', require('./pages/auth/Login.vue').default);
Vue.component('my-article-component', require('./pages/MyArticle.vue').default);
Vue.component('articles-component', require('./pages/Articles.vue').default);
Vue.component('category-component', require('./pages/Category.vue').default);
Vue.component('write-article-component', require('./pages/WriteArticle.vue').default);
Vue.component('read-article-component', require('./pages/ReadArticle.vue').default);
Vue.component('edit-article-component', require('./pages/EditArticle.vue').default);


// Route Config

const Home = require('./pages/Home.vue').default
const MyArticle = require('./pages/MyArticle.vue').default
const Articles = require('./pages/Articles.vue').default
const Category = require('./pages/Category.vue').default
const WriteArticle = require('./pages/WriteArticle.vue').default
const ReadArticle = require('./pages/ReadArticle.vue').default
const EditArticle = require('./pages/EditArticle.vue').default
const Register = require('./pages/auth/Signup.vue').default
const Login = require('./pages/auth/Login.vue').default
// const NotFound = require('./pages/NotFound.vue').default

const routes = [
    {
        path: '/',
        component: Home,
        name: 'Home'
    },
    {
        path: '/my-article',
        component: MyArticle,
        name: 'MyArticle',
        meta: { requiresAuth: true }
    },
    {
        path: '/articles',
        component: Articles,
        name: 'Articles'
    },
    {
        path: '/category',
        component: Category,
        name: 'Category'
    },
    {
        path: '/write-article',
        component: WriteArticle,
        name: 'WriteArticle',
        meta: { requiresAuth: true }
    },
    {
        path: '/read-article/:id',
        component: ReadArticle,
        name: 'ReadArticle'
    },
    {
        path: '/edit-article/:id',
        component: EditArticle,
        name: 'EditArticle'
  },
    {
        path: '/register',
        component: Register,
        name: 'Register',
        meta: { guest: true } 
    },
    {
        path: '/login',
        component: Login,
        name: 'Login',
        meta: { guest: true } 
    },
    // {
    //     path: '*',
    //     component: NotFound
    // }
]
  
const router = new VueRouter({
    mode: 'history',
    routes
})
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 router.beforeEach((to, from, next) => {  
    const token = localStorage.getItem('jwt') == null;  
    if (to.matched.some(record => record.meta.guest)) {
      if (!token) next({ name: 'Home' })
      else next()
    } 
    if (to.matched.some(record => record.meta.requiresAuth)) { 
      if (token) {
        next({
          path: '/login',
          query: { redirect: to.fullPath }
        })
      } else {
        next()
      } 
   }else{
    next()  
  }
  })

const app = new Vue({
    el: '#app',
    router
});
