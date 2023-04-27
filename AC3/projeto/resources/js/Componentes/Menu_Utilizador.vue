<template>
    <!--mostra o conteudo da nav-bar-->
    <!--cria o menu do pc e do mobile-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!--serve para definir o logo-->
            <div >
            </div>
            <!--cria o icon das bars para quando o menu e responsivo -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <!--obtem o icon das bars-->
                <fa icon="bars" class="bars"></fa>
            </button>
            <!--serve para criar os itens do menu-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--serve para alinhar a direita os itens do menu-->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" >
                        <Link :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="#">Link</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="#">Contacto</Link>
                    </li>
                </ul>
                <!--serve para alinhar a esquerda os itens do menu-->
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!--obtem o icon do utilizador-->
                            <fa icon="user"></fa>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">{{ $page.props.auth.user.name }}</li>
                            <li><Link :href="route('perfil')" class="dropdown-item">Perfil</Link></li>
                            <li><Link @submit.prevent="sair" class="dropdown-item">Sair</Link></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
//importa os itens para o template
import { Link } from '@inertiajs/vue3';
export default{
    //adiciona os componentes ao template
    components:{
        Link
    },
    //cria os metodos 
    methods: {
        //acede ao ruta sair
        sair(){
            router.post(route('sair'));
        }
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
    color: white;
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
