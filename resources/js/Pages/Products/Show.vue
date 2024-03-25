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
                <Link class="product_button_add" :href="route('product.create')">
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

<style scoped>

.content_add_button {
    padding-bottom: 20px;
    max-width: 800px;
    padding-right: 16px;
    padding-left: 16px;
    margin: 0 auto;
    display: flex;
}

.button_add-box {
    width: 100%;
    display: flex;
    justify-content: flex-end;

}

.record {
    margin-top: -10px;
}

.product_button_add {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    width:35px;
    height: 35px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition-duration: .3s;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
    background-color: #284459;
}

.product_button_plus {
    width: 100%;
    transition-duration: .3s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product_button_plus svg {
    width: 17px;
}

.product_button_plus svg path {
    fill: white;
}

.product_button_text {
    font-family: "Inter", sans-serif;
    position: absolute;
    right: 0%;
    width: 0%;
    opacity: 0;
    color: white;
    font-size: 1.2em;
    font-weight: 400;
    transition-duration: .3s;
}
/* hover effect on button width */
.product_button_add:hover {
    width: 150px;
    border-radius: 10px;
    transition-duration: .3s;

}

.product_button_add:hover .product_button_plus {
    width: 30%;
    transition-duration: .3s;
    padding-left: 10px;


}
/* hover effect button's product_button_text */
.product_button_add:hover .product_button_text {
    opacity: 1;
    width: 70%;
    transition-duration: .3s;
    padding-right: 10px;
}

.product_button_add:active {
    /*transform: translate(2px ,2px);*/
    background-color: #976e76;
    /*border: 1px solid #976e76;*/
    transform: translateY(2px);
}
</style>
