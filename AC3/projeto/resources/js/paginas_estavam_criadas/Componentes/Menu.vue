<template>
  <!--cria o menu de utilizador e mostra o conteudo do Menu Utilizador-->
  <!--<Menu_Utilizador v-if="tipo_utilizador === 'a' && isLoggedIn">
    <slot />
  </Menu_Utilizador>-->
  
  <!--cria o menu de admin e mostra o conteudo do Menu Admin-->
  <!---<Menu_Admin v-else>
    <slot />
  </Menu_Admin>-->
    
  <!--mostra o conteudo da pagina-->
  <main class="conteudo">
    <slot />
  </main>
</template>
<script>
//serve para buscar os componentes dos menus
import Menu_Utilizador from './Menu_Utilizador.vue';
import Menu_Admin from './Menu_Admin.vue';
import {ref} from 'vue';
export default {
  //serve para definir o nome da pagina
  name: 'Menu',
  //serve para importar as componentes
  components:{
    Menu_Utilizador,
    Menu_Admin
  }
}
</script>

<style>
.conteudo {
    text-align: center;
    padding: 4.5rem;
}

/*estilos para o menu*/
/*define o estilo da navbar*/
nav.navbar.navbar-expand-lg.fixed-top{
  background: black;
}

/*serve para definir o estilo do logo*/
.navbar-brand{
  font-weight: bold;
  color:white;
}

/*serve para definir a cor das nav-links*/
.nav-link{
  color:white;
}

/*serve para definir a cor das nav-links selecionadas*/
a.nav-link:hover {
    color: aqua;
}

/*serve para definir a cor do dropdown*/
a.nav-link.dropdown-toggle {
    color: white;
}

/*muda a cor das bars*/
.bars{
  color:white;
}

/*estilo para o menu na versao pc*/
/*serve para dizer em que posicao o item da dropdown deve estar e a sua cor*/
.dropdown-menu{
  margin-left: -116px;
  background-color: aqua;
}

/*muda a cor do texto dentro da dropdown*/
.dropdown-item{
  color: black;
}

/*muda a cor do icone user*/
.dropdown-user{
  color:white;
}

/*estilos para o menu na versao mobile*/
@media (max-width: 991px) {
  /*serve para o menu ir da esquerda para direita e da direita para a esquerda*/
  .navbar-collapse {
    position: fixed;
    top: 54px;
    left: 0;
    padding-left: 15px;
    padding-right: 15px;
    padding-bottom: 15px;
    width: 100%;
    background: black;
    max-width: 320px;
    height: 100vh;
    overflow-y: auto;
  }

  .navbar-collapse.collapsing {
    height: 100%;
    -webkit-transition: left 0.3s ease;
    -o-transition: left 0.3s ease;
    -moz-transition: left 0.3s ease;
    transition: left 0.3s ease;
    left: -100%;
  }

  .navbar-collapse.show {
    left: 0;
    -webkit-transition: left 0.3s ease-in;
    -o-transition: left 0.3s ease-in;
    -moz-transition: left 0.3s ease-in;
    transition: left 0.3s ease-in;
  }

  /*serve para dizer em que posicao o item da dropdown deve estar*/
  .dropdown-menu{
    margin-left: -2px;
    background-color: aqua;
  }

  /*muda a cor do texto dentro da dropdown*/
  .dropdown-item{
    color: black;
  }
}
</style>
