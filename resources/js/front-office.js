

//importa le discendenze

import Vue from 'vue';
import App from './views/App';

//inizializzazione

const root = new Vue({
    el: '#root',
    render: h => h(App),
});

