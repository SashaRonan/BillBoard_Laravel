<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from "@inertiajs/inertia-vue3";
import Product from '@/Components/Products/Product.vue';
import {ref} from 'vue';


const props = defineProps({
    productsData: Object,

});
const title = ref('Заголовок');
const clicked = function (event) {
    let parent = event.target.closest('.record');
    title.value = 'Новый заголовок: ' + parent.dataset.id;
};

// export default {
//     data() {
//         return {
//             productsData: Object,
//              title: ref('Заголовок')
//         }
//     },
//
//     methods: {
//         clicked () {
//             let parent = event.target.closest('.record');
//             this.title.value = 'Новый заголовок: ' + parent.dataset.id;
//         }
//     }
// }



</script>

<template>
    <Head title="Список товаров"/>

    <body>

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Список всех товаров
            </h2>
        </template>

        <template>
            {{ title }}
        </template>

        <template v-for="product in productsData" :key="product.id" :data-id="product.id" class="record">
            <Product :data="product" @click="clicked"></Product>
        </template>

    </BreezeAuthenticatedLayout>

    </body>
</template>

<style scoped>
.record {
    margin-top: -10px;
}
</style>
