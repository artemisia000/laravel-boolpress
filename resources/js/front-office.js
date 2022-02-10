

//importa le discendenze

import Vue from 'vue';
import App from './views/App';

//App router, rotte per l app
import router from './routes';

//inizializzazione

const root = new Vue({
    el: '#root',
    router: router,
    render: h => h(App),
});

