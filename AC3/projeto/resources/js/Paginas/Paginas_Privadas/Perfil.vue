<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                

                    <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Name</label
                                >
                                <input
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="name"
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-4">

                                <input type="file" @change='atualizar_avatar' class="w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600">


                                        <div v-show="!verImagem" style="margin-top:10px">
                            <img :src="getImagens() + form.urlImage" class="rounded-full h-20 w-20 object-cover" />
                        </div>

                        
                        <div v-show="verImagem" style="margin-top:10px">
                           <img :src="verImagem" class="rounded-full h-20 w-20 object-cover" />
                        </div>




                                
                                <div
                                    v-if="form.errors.image"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.image }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >email</label
                                >
                                <input
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    autocomplete="email"
                                    placeholder=""
                                >

                                <div
                                    v-if="form.errors.email"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.email }}
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Submit
                            </button>
                                    </form>
            </div>
        </div>
    </AppLayout>
</template>
<script>
//importa os itens para o template
import AppLayout from '@/Componentes/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
export default{
    //adiciona os componentes ao template
    components: {
        AppLayout
    },
    //define os props(ou seja define o tipo de valores que esta no template)
    props: {
        user: Object
    },
    //define os valores do formulario
    setup(props){
        const form = useForm({
            name: props.user.name,
            email: props.user.email,
            image: null,
            urlImage:props.user.image
        });

        //variavel para mostrar a imagem do utilizador
        const verImagem = ref();

        //retorna o formulario para que assim seja acedido no template
        return { form , verImagem};
    },
    //cria os metodos 
    methods: {
        //envia os valores do formulario para o route entrar
        submit(){
            this.form.post(route("perfil.atualizar"), {
                forceFormData: true,
            });
        },
        //serve para fazer atualizar o avatar
        atualizar_avatar(e){
            let file = e.target.files[0];
            //atribui a imagem ao form image
            this.form.image = e.target.files[0];
            //mostra no console a form image
            console.log(this.form.image);
            //le o ficheiro
            let reader = new FileReader();
            //carrega a imagem para o verImagem
            reader.onloadend = (file) => {
                this.verImagem = reader.result;
            }
            //le o url do ficheiro
            reader.readAsDataURL(file); 
        },
        //vai buscar a pasta que encontra as imagens
        getImagens(){
            return 'imagens_perfil/';
        } 
    }  
}
</script>


