
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import CostIndex from './components/costs/CostIndex.vue';
import CostCreate from './components/costs/CostCreate.vue';
import CostEdit from './components/costs/CostEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            costIndex: CostIndex
        }
    },
    {path: '/costs/create', component: CostCreate, name: 'costCreate'},
    {path: '/costs/edit/:id', component: CostEdit, name: 'costEdit'},
];

const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');
