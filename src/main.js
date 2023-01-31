import { createApp } from 'vue'
import App from './App.vue'


import router from './router'


import 'bootstrap/dist/css/bootstrap.min.css'
import 'jquery/src/jquery.js'
import 'bootstrap/dist/js/bootstrap.min.js'

import  '../public/scss/main.css';

import Vue from 'vue'





createApp(App).use(router).mount('#app')
