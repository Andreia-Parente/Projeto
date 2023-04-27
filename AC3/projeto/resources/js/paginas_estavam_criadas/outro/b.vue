<template>
    
        <Head title="Registrar" />

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

            <div class="flex items-center justify-end mt-4">
                    <!--cria o botao-->
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
        </form>

</template>
<script setup>
import { Head, useForm } from '@inertiajs/vue3';

//define os valores do formulario
const form = useForm({
    name: '',
    email: '',
    password: '',
    //password_confirmation: '',
    //terms: false,
});

//envia os valores do formulario para o route login
const registrarData = () => {
    form.post(route('register'))
};
</script>
