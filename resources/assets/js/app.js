
// require('./bootstrap');

window.Vue = require('vue');

import VuexFlash from 'vuex-flash'

Vue.component('favorite', require('./components/FavoriteComponent'))
Vue.use(VuexFlash, { mixin: true })

const app = new Vue({
    el: '#app'
})
