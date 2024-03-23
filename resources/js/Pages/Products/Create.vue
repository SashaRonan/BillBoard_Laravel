<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from "@inertiajs/inertia-vue3";
import route from "../../../../vendor/tightenco/ziggy";

 const loadPreviewAdd = function (event) { // TODO: Исправить загрузку превьюшшки
    let output = document.getElementById('imgPreview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // очистка
    }
    return output.onload;
}

export default {


    components: {
        BreezeAuthenticatedLayout,
        Head
    },

    data() {
        return {
            product_name: '',
            description: '',
            price: '',
        }
    },
    methods: {
        route,
        submit() {
            this.$emit('submit', this.product_name)
            this.$emit('submit', this.description)
            this.$emit('submit', this.price)
        }

    }
}

</script>

<template>

    <Head title="Добавление товара"/>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Добавление товара
            </h2>
        </template>

        <form class="content_add-ads" method="get" action="{{route('product.store')}}">
<!--            @csrf-->
<!--            <input type="hidden" name="_token" :value="$store.state.csrfToken">-->
            <div class="login_block_add">
                <div class="input_ads_block">
                    <label for="product_name" class="input_ads_label">Название</label>
                    <input id="product_name" v-model="product_name" class="input_ads" type="text" name="product_name" placeholder="Введите название вашего товара">
                </div>

                <div class="input_ads_block">
                    <label for="product_description" class="input_ads_label">Описание</label>
                    <textarea id="product_description" v-model="description" class="input_ads_description" rows="10" cols="50" placeholder="Введите описание вашего товара"></textarea>
                </div>

                <div class="input_ads_block">
                    <label for="product_price" class="input_ads_label">Цена</label>
                    <input id="product_price" v-model="price" class="input_ads" type="number" placeholder="Введите цену вашего товара">
                </div>

                <div class="upload_img-box">
                    <div class="product-box_add">
                        <div class="product_img">
                            <img id="imgPreview" class="upload_img_file_add" src="img/logo/loadImg.png">
                        </div>
                    </div>

                    <label for="file_upload" class="upload_button">
                        <input id="file_upload" class="upload_button_input" type="file" @change="loadPreviewAdd()">
                        Загрузить
                    </label>
                </div>

                <button class="product_button upload_save_button" @click="submit" >Сохранить</button>
            </div>
        </form>

    </BreezeAuthenticatedLayout>





</template>

<style scoped>

.content_add-ads {
    padding: 0 20px;
    margin: 0 auto;
    max-width: 800px;
    flex-direction: column;
    display: flex;
    align-items: center;
    justify-content: flex-start;
}

.login_block_add {
    margin-top: 114px;
}

.input_ads_block {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.input_ads_label {
    color: #284459;
    font-family: "Inter", sans-serif;
    font-size: 16px;
    font-weight: 400;
    margin-top: 30px;
    margin-bottom: 5px;
}

.input_ads {
    width: 98%;
    height: 48px;
    outline: none;
    padding-left: 2%;
    border: 1px solid #c6d5db;
    border-radius: 10px;
    color: #284459;
    font-size: 17px;
}

.input_ads_description {
    width: 98%;
    height: 153px;
    border: 1px solid #c6d5db;
    border-radius: 10px;
    outline: none;
    padding-left: 2%;
    padding-top: 5px;
    color: #284459;
    font-size: 16px;
}

.upload_img-box {
    width: 100%;
    margin-top: 32px;
    display: flex;
    flex-direction: column;
}

.product-box_add {
    flex-direction: column;
    align-self: center;
}

.product_img {
    align-items: center;
    display: flex;
    justify-content: center;
    width: 150px;
    height: 150px;
    border-radius: 10px;
    background-color: #fff;
}

.upload_img_file_add {
    width: 100%;
    height: 100%;
}

.upload_button {
    margin-left: 0;
    margin-top: 15px;
}

.upload_button_input {
    display: none;
}

.product_button {
    font-family: "Inter", sans-serif;
    color: white;
    width: 150px;
    height: 30px;
    border: 1px solid #284459;
    background: #284459;
    margin-top: 15px;
    border-radius: 10px;
    cursor: pointer;
}

.upload_save_button {
    margin-top: 30px;
    align-self: center;
}

</style>
