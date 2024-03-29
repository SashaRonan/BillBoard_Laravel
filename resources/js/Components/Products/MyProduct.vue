<script>

import {ref} from "vue";

// defineProps({
//     data: Object,
// });
//
// let editProductId = ref(null);
//
// const changeEditProductId = (id) => {
//     editProductId.value = id;
// }
//
// const isEdit = (id) => {
//     return editProductId.value === id;
// }


export default {

    name: 'MyProduct',

    props: {
        data: Object
    },

    data() {
        return {
            editProductId: null,
            product_name: '',
            description: '',
            price: null
        }

    },

    methods: {
        changeEditProductId(id, product_name, description, price) {
            this.editProductId = id;
            this.product_name = product_name;
            this.description = description;
            this.price = price;
        },

        isEdit(id) {
            return this.editProductId === id;
        },

        updateProduct(id) {
            this.editProductId = null
            // console.log(this.product_name, this.description, this.price)

            axios.patch(`/products/${id}`, {
                product_name: this.product_name,
                description: this.description,
                price: this.price
            })
                .then(response => {
                    console.log(response.data);
                    this.product_name = response.data.product_name;
                    this.description = response.data.description;
                    this.price = response.data.price;
                    this.$inertia.reload();
                })

        }
    }
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
                                @click.prevent="changeEditProductId(data.id, data.product_name, data.description, data.price)">
                            Изменить
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
                        class="upload_button_input" type="file"
                        accept="image/*"></label>
                </div>
                <div class="product_right_block">
                    <div class="product_top_block">
                        <div class="product_description-box_add">
                            <div class="edit_description_box">
                                <input v-model="product_name" class="edit_productName" type="text">
                                <textarea v-model="description" class="edit_description" cols="50" rows="5">

                            </textarea>
                            </div>
                        </div>
                        <input v-model="price" class="edit_price" type="text"></div>
                    <div class="edit_product_bottom_block">
                        <button class="edit_button" @click.prevent="updateProduct(data.id)">Сохранить</button>
                        <button class="edit_button">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
