<script setup>

import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from "@inertiajs/inertia-vue3";
import Product from '@/Components/Products/Product.vue';
import {ref} from 'vue';


const props = defineProps({
    productsData: Object,

});
const title = ref('Выбран товар № ');
const clicked = function (event) {
    let parent = event.target.closest('.record');
    title.value = 'Выбран товар № ' + parent.dataset.id;
};
</script>

<template>

    <Head title="Мои товары"/>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Список всех товаров
            </h2>
        </template>
        <div>
            {{ title }}
        </div>



        <div v-for="product in productsData" :key="product.id" :data-id="product.id" class="record">
            <Product :data="product" @click="clicked"></Product>
        </div>

    </BreezeAuthenticatedLayout>

</template>

<style scoped>

</style>
