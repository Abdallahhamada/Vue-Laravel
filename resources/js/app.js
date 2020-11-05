// window.Vue = require('vue');
import Vue from 'vue';

import axios from 'axios';
window.axios = axios;

import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;

import VueRouter from 'vue-router';
Vue.use( VueRouter ); 

import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('pagination', require('laravel-vue-pagination'));

import Dashboard from './components/Dashboard.vue';
import Profile from './components/Profile.vue';
import Users from './components/Users.vue';
import NotFound from './components/NotFound.vue';

let router = new VueRouter({
    mode: "history",
    routes: [
        // { path: "*" , redirect: "/" },
        { path: "/" , component: Dashboard , name: "dashboard" } ,
        { path: "/home" , component: Dashboard , name: "dashboard" } ,
        { path: "/profile" , component: Profile , name: "profile" },
        { path: "/users" , component: Users , name: "users" },
        { path: "*" , component: NotFound , name: "notfound" } ,
    ]
});

import moment from 'moment';
Vue.filter("myDate",function(created){
    return moment(created).format("MMMM Do YYYY");
});

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});
