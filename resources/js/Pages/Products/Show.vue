<script setup>

import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Link} from '@inertiajs/inertia-vue3';
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

       <div class="content_add_button">  <!-- TODO:: Вынести кнопку в отдельный компонент-->
            <div class="button_add-box">
                <Link class="product_button_add" :href="route('products.create')">
                    <div class="product_button_plus">
                        <svg width="800px" height="800px" viewBox="0 0 48 48" fill="none">
                            <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                            <path d="M30 4H18V18H4V30H18V44H30V30H44V18H30V4Z" fill="#284459" stroke="#FFFFFF" stroke-width="4" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <div class="product_button_text">Добавить</div>
                </Link>
            </div>
        </div>


        <div v-for="product in productsData" :key="product.id" :data-id="product.id" class="record">
            <Product :data="product" @click="clicked"></Product>
        </div>

    </BreezeAuthenticatedLayout>

</template>

