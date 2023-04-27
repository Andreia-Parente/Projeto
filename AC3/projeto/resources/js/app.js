//importacao dos estilos
import './bootstrap';
import '../css/app.css';
import * as bootstrap from 'bootstrap';

//importacao para abrir as paginas
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

//importacao do progresso da app
import { InertiaProgress } from '@inertiajs/progress';

//importacao para abrir o route atraves do ziggy
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

//importacao do fonte awesome
import {library} from '@fortawesome/fontawesome-svg-core';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';
import icons from './icons';

//inicia a InertiaProgress ao app
InertiaProgress.init()

//adiciona os icons do ficheiro icons
library.add({...icons});

//cria a app atraves do inertia
createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Paginas/${name}.vue`, import.meta.glob('./Paginas/**/*.vue')),
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(plugin)
      //usa o route para ir de uma pagina para outra
      .mixin({methods: {route}})
      .use(ZiggyVue, Ziggy)
      //adiciona o fonteawesome globalmente a app
      .component('fa', FontAwesomeIcon)
      .mount(el)
  },
});