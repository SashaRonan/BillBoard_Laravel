<script setup>

import {ref} from "vue";

defineProps({
    data: Object,
});

let editProductId = ref(null);

const changeEditProductId = (id) => {
    editProductId.value = id;
}

const isEdit = (id) => {
    return editProductId.value === id;
}


</script>

<template>
    <div :class="isEdit(data.id) ? 'hidden' : ''">
        <div class="content_product_add">
            <div class="product_block_add">
                <div class="product_img-box">
                    <div class="product_img">
                        <img :src="data.img" class="upload_img_file" alt="img">
                    </div>
                </div>
                <div class="product_right_block">
                    <div class="product_top_block">
                        <div class="product_description-box_add">
                            <div class="product_name-description-box">
                                <h1 class="product_name">
                                    {{ data.product_name }}
                                </h1>
                                <p class="product_description">
                                    {{ data.description }}
                                </p>
                            </div>
                        </div>
                        <div class="product_price">{{ data.price }} р.</div>
                    </div>
                    <div class="product_bottom_block">
                        <button class="product_button_my_ads"
                                @click.prevent="changeEditProductId(data.id)">Изменить
                        </button>
                        <button class="product_button_my_ads">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div :class="isEdit(data.id) ? '' : 'hidden'">
        <div class="content_product_add">
            <div class="product_block_add">
                <div class="product_img-box">
                    <div class="product_img">
                        <img class="upload_img_file" :src="data.img" alt="img">
                    </div>
                    <label class="change_img" :for="'product_change_'+ data.id">Загрузить<input
                        class="upload_button_input" type="file" :id="'product_change_'+ data.id"
                        accept="image/*"></label>
                </div>
                <div class="product_right_block">
                    <div class="product_top_block">
                        <div class="product_description-box_add">
                            <div class="edit_description_box">
                                <input class="edit_productName" type="text" :value="data.product_name">
                                <textarea class="edit_description" cols="50" rows="5"
                                          :value="data.description">

                            </textarea>
                            </div>
                        </div>
                        <input class="edit_price" type="text" :value=data.price></div>
                    <div class="edit_product_bottom_block">
                        <button class="edit_button" @click.prevent="changeEditProductId(null)">Сохранить</button>
                        <button class="edit_button">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
