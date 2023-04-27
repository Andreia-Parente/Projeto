<template>
    <div>
        <button v-if="as == 'button'" type="submit" class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
            <slot />
        </button>

        <a v-else-if="as =='a'" :href="href" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
            <slot />
        </a>

        <Link v-else :href="href" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
            <slot />
        </Link>
    </div>
</template>
<script>
//importa os itens para o template
import { Link } from '@inertiajs/vue3';
export default{
    //adiciona os componentes ao template
    components:{
        Link,
    },
    //define os props(ou seja define o tipo de valores que esta no template)
    props: {
        href: String,
        as: String,
    }
}
</script>