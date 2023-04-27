<template>

    <!--mostra o menu criado na pagina Menu-->
    <Menu>
        <!--define o nome da pagina-->
        <Head title="Contacto"></Head>
        <!--cria o conteudo da pagina-->
        Contacto

        <div class="formulario">
            <div class="form-group">
                            <label>Select Country:</label>
                            <select class='form-control' v-model='country' @change='getCountries()'>
                                <option value='0' >Select Country</option>
                                <option v-for='data in countries' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>


                        <tr v-if="country">
                            {{getPostGoal(country)}}
                        </tr>

        </div>
    </Menu> 



</template>
<script>
//serve para buscar os componentes do menu e os seus estilos
import Menu from '@/Componentes/Menu.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
    export default {
         //serve para definir o nome da pagina
        name: 'Contacto',
        //serve para importar as componentes
        components: {
            Menu,
            Head
        },
        data(){
            return {
                countries: [],

                country: 0,
                //route: useRouter(),
                id: this.country_id,
            }
        },
        methods: {
             getCountries () {
                axios.get('/get_countries')
                .then((response) => {
                    this.countries = response.data;
                    console.log(response.data);
                });
            },

                getPostGoal:function(id=null){
      if(id){
        var index = this.countries.map(e=>e.id).indexOf(id);
        return this.countries[index].name;
      }
    }

        },
        created(){
            this.getCountries();
        }
    }
</script>
<style>
.formulario {
    padding: 2.5rem;
}
</style>