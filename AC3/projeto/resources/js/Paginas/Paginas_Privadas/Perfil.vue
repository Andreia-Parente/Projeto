<template>
    <!--define o nome da pagina-->
    <Head title="Perfil"></Head>
    <!--mostra o menu criado na pagina Menu-->
    <AppLayout>
        <!--mostra a mensagem a dizer se o utilizador existe ou não-->
        <div class="alert alert-danger" role="alert" v-if="$page.props.flash.message">
            {{ $page.props.flash.message }}
        </div>

        <!--cria o titulo da pagina-->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Perfil
        </h2>
        
        <!--define o formulario do perfil-->
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <form @submit.prevent="atualizarData">
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nome de Utilizador:</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="form.name"
                        placeholder="Introduza o nome" autofocus/>
                </div>
                <!--cria o input para o ficheiro do avatar-->
                <div class="mb-4">
                    <input type="file" @change='atualizar_avatar' class="w-full px-4 py-2 mt-2 border rounded-md 
                        focus:outline-none focus:ring-1 focus:ring-blue-600">
                    <!--quando o ficheiro do avatar não é atualizado -->
                    <div v-show="!verImagem" style="margin-top:10px">
                        <img :src="getImagens() + form.urlImage" class="rounded-full h-20 w-20 object-cover" />
                    </div>
                    <!--quando o ficheiro do avatar é atualizado-->
                    <div v-show="verImagem" style="margin-top:10px">
                        <img :src="verImagem" class="rounded-full h-20 w-20 object-cover" />
                    </div>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" v-model="form.email"
                        placeholder="Introduza o email" />
                </div>
                <!--cria o botao-->
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Atualizar Perfil</button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
<script>
//importa os itens para o template
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Componentes/AppLayout.vue';
import { ref } from 'vue';
export default{
    //adiciona os componentes ao template
    components: {
        Head,
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
        //envia os valores atualizados do formulario para o route perfil.atualizar
        atualizarData(){
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


