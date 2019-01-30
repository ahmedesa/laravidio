
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router' ;
import YoutubeDash from './youtube/YoutubeDash.vue' ;
import VideoDetails from './youtube/VideoDetails.vue' ;

Vue.use(VueRouter);

window.eventBus = new Vue({});
const routes = [
{path: '/'      ,component:YoutubeDash  , 'name' :'youtube-dash' },
{path: '/video/:id' ,component:VideoDetails , 'name' :'youtube-video' }

];
const router = new VueRouter({
    routes
});

const app = new Vue({
    router
}).$mount('#app');
