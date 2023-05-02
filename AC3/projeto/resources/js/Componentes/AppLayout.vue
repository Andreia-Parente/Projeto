<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('pagina_inicial_utilizador')">
                                    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="block h-9 w-auto">
                                        <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5" />
                                        <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5" />
                                    </svg>
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="sm:ml-10 inline-flex items-center">
                                <Link :href="route('pagina_inicial_utilizador')" :active="route().current('pagina_inicial_utilizador')">
                                    Página Inicial
                                </Link>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.auth.user.image" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" :src="getImagens() + $page.props.auth.user.image" :alt="$page.props.auth.user.name">
                                           </button>

                                        
                                           <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                        
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <DropdownLink :href="route('perfil')">
                                            Perfil
                                        </DropdownLink>


                                        <div>
                                        <DropdownLink href="#" class="font-medium text-base text-gray-800">
                                           <!-- {{ $page.props.auth.user.name }}-->
                                        </DropdownLink>
                                        <DropdownLink href="#" class="font-medium text-sm text-gray-500">
                                          <!--   {{ $page.props.auth.user.email }}-->
                                        </DropdownLink>
                                         </div>

                                        <div class="border-t border-gray-200" />

                                        <!-- Authentication -->
                                        <form @submit.prevent="sair">
                                            <DropdownLink as="button">
                                                Sair
                                            </DropdownLink>
                                        </form>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('pagina_inicial_utilizador')" :active="route().current('pagina_inicial_utilizador')">
                            Página Inicial
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div class="shrink-0 mr-3">
                                <!--<img class="h-10 w-10 rounded-full object-cover" :src="'/images/'$page.props.auth.user.image" :alt="$page.props.auth.user.name">
                                --></div>

                            <div>
                                
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('perfil')" :active="route().current('perfil')">
                                Perfil
                            </ResponsiveNavLink>


                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="sair">
                                <ResponsiveNavLink as="button">
                                    Sair
                                </ResponsiveNavLink>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
<script>
//importa os itens para o template
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import Dropdown from '@/Componentes/Dropdown.vue';
import DropdownLink from '@/Componentes/DropdownLink.vue';
import ResponsiveNavLink from '@/Componentes/ResponsiveNavLink.vue';
export default{
    //adiciona os componentes ao template
    components:{
        Link,
        Dropdown,
        DropdownLink,
        ResponsiveNavLink
    },
    //define os valores do formulario e do o valor do showNavigationDropdown
    setup(){
        const showingNavigationDropdown = ref(false);

        //retorna o formulario e do showingNavigationDropdown para que assim seja acedido no template
        return {  showingNavigationDropdown};
    },
    //cria os metodos 
    methods: {
        //acede ao ruta sair
        sair(){
            router.post(route('sair'));
        },
        //vai buscar a pasta que encontra as imagens
        getImagens(){
            return 'imagens_perfil/';
        } 
    }
}
</script>
