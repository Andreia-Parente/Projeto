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

                                <input type="file" @change='upload_avatar' class="w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600">


                                        <div v-if="!photoPreview" style="margin-top:10px">
                           <img :src="form.urlImage" class="rounded-full h-20 w-20 object-cover" />
                        </div>

                        
                        <div v-if="photoPreview" style="margin-top:10px">
                           <img :src="form.urlImage" class="rounded-full h-20 w-20 object-cover" />
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
export default{
    //adiciona os componentes ao template
    components: {
        AppLayout
    },
    //define os props(ou seja define o tipo de valores que esta no template)
    props: {
        user: Object,
        photoPreview: Boolean,
        defualtSrc: String,
    },
    //define os valores do formulario
    setup(props){
        const form = useForm({
            name: props.user.name,
            email: props.user.email,
            image: null,
            urlImage:props.user.image
        });
        console.log(props.user.nome);

        //retorna o formulario para que assim seja acedido no template
        return { form };
    },
    //cria os metodos 
    methods: {
        //envia os valores do formulario para o route entrar
        submit(){
            this.form.post(route("profile.update"), {
                forceFormData: true,
            });
        },
        //serve para fazer upload da imagem
        upload_avatar(e){
           this.form.image = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.form.image);  
            reader.onload = (e) => {
                this.form.urlImage = e.target.result;
            }              
        }
    }  
}
</script>


