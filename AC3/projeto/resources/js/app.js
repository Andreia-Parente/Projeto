//importacao dos estilos
import './bootstrap';

//importacao para abrir as paginas
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

//importacao do progresso da app
import { InertiaProgress } from '@inertiajs/progress';


//inicia a InertiaProgress ao app
InertiaProgress.init()

//cria a app atraves do inertia
createInertiaApp({
    resolve: (name) => resolvePageComponent(`./Paginas/${name}.vue`, import.meta.glob('./Paginas/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
});
