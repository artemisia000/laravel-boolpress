//dipendenze

import Vue from 'vue';
import VueRouter from 'vue-router';

//componenti per rotta
import Home from './pages/Home';
import About from './pages/About';
import Blog from './pages/Blog';



//attivazione router in vue

Vue.use(VueRouter);

//definizione delle rotte
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { 
            path: '/',
            name: 'home',
            component: Home,
        },
        { 
            path: '/about',
            name: 'about',
            component: About,
        },
        { 
            path: '/blog',
            name: 'blog',
            component: Blog,
        }
    ],
});

//export delle rotte per essere usato in altri file
export default router;


