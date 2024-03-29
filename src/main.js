import { createApp } from 'vue'
import App from './App.vue'

import router from './router'
import store from './store'

import 'bootstrap/dist/css/bootstrap.min.css'
import 'jquery/src/jquery.js'
import 'bootstrap/dist/js/bootstrap.min.js'
import 'bootstrap-icons/font/bootstrap-icons.css'

import  '../public/scss/main.css';

import Vue from 'vue'





createApp(App).use(router).use(store).mount('#app')
