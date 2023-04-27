<template>

    <!--define o nome da pagina-->
    <Head title="Registrar"></Head>
    <!--mostra o menu criado na pagina Menu-->

    <!--cria o template do card-->
    <AuthenticationCard>

        <!--cria o logo-->
        <div class="logo">
            <svg class="w-16 h-16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5" />
                <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5" />
            </svg>
        </div>

        <!--cria o formulario para registrar o utilizador-->
        <form @submit.prevent="registrarData">
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">Nome:</label>
                <input id="name" type="text" class="block mt-1 w-full" v-model="form.name" required
                    autofocus placeholder="Introduza o nome">
            </div>

            <div class="mt-4">
                <label for="email" class="block font-medium text-sm text-gray-700">Email:</label>
                <input id="email" type="email" class="block mt-1 w-full" v-model="form.email" required
                    autofocus autocomplete="email" placeholder="Introduza o email">
            </div>

            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">Password:</label>
                <input id="password" type="password" class="block mt-1 w-full" v-model="form.password" required
                    autofocus autocomplete="password" placeholder="Introduza a palavra-passe">
            </div>

            <div class="flex items-center">
                <!--cria o botao-->
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Registar
                </button>
            </div>

            <!--se ja tem conta envia o utilizador na pagina entrar-->
            <div class="flex items-center">
                Já tem conta?
                <Link :href="route('entrar')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Entrar
                </Link>
            </div>
        </form>
    </AuthenticationCard>
</template>
<script>
//importa os itens para o template
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Componentes/AuthenticationCard.vue';
export default{
    //adiciona os componentes ao template
    components:{
        Head,
        Link,
        AuthenticationCard
    },
    //define os valores do formulario
    setup(){
        const form = useForm({
            name: '',
            email: '',
            password: ''
        });

        //retorna o formulario para que assim seja acedido no template
        return { form };
    },
    //cria os metodos 
    methods: {
        //envia os valores do formulario para o route registrar
        registrarData(){
            this.form.post(route('registrar'));
        }
    }  
}
</script>
<style>
/*serve para definir os estilos do logo */
.logo{
    display: flex;
    justify-content: center;
    padding-bottom: 20px;
}
</style>