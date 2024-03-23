<script setup>

defineProps({
    data: Object,
})

const show_hide_phone = function (numID) { // TODO: Реализовать скрытие телефона при повторном нажатии.
    const buttonID = '#buttonID_' + numID;
    const userPhoneID = '#userPhone_' + numID;
    let button = document.querySelector(buttonID);
    let phone = document.querySelector(userPhoneID);

    let phoneDisplay = phone.style.display;

    if (phoneDisplay === 'none') {
        button.style.display = 'none';
        phone.style.display = 'inline-flex'
    } else if (phoneDisplay === '') {
        button.style.display = 'none';
        phone.style.display = 'inline-flex'
    } else {
        button.style.display = 'block';
        phone.style.display = 'none';
    }
}


</script>

<template>

    <div class="content_product">
        <div class="product_block">
            <div class="product_img-box">
                <div class="product_img">
                    <img class="upload_img_file" :src="data.img">
                </div>
                <button :id="'buttonID_' + data.id" class="product_button" @click="show_hide_phone(data.id)">Показать телефон</button>
<!--               onclick="app.ProductList.show_hide_phone()-->
                <p :id="'userPhone_' + data.id" class="user_phone_class">{{ data.phone }}</p>
            </div>

            <div class="product_description-box">
                <div class="product_name-description-box">
                    <header :id="'product_name_' + data.id" class="product_name">{{ data.product_name }}</header>
                    <p :id="'description_' + data.id" class="product_description">{{ data.description }}</p>
                </div>
                <p :id="'userNameOf_' + data.id" class="user_name">Продавец: {{ data.name }}</p>
            </div>

            <div class="product_price">{{ data.price }} р.</div>
        </div>
    </div>



</template>

<style scoped>

.content_product {
    max-width: 800px;
    position: relative;
    top: 100px;
    text-align: center;
    flex-direction: column;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 0 auto;
    padding: 0 20px;
}

.product_block {
    display: flex;
    align-items: start;
    min-height: 200px;
    width: 95%;
    justify-content: space-between;
    padding: 20px 20px;
    margin: 10px 0;
    background-color: rgba(255, 255, 255, 0.13);
    border-radius: 10px;
    backdrop-filter: blur(3px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 25px rgba(8, 7, 16, 0.6);
}

.product_img-box {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding-top: 10px;
    flex-grow: 3;
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

.upload_img_file {
    width: 85%;
    height: 85%;
    background-color: #fff;
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

.user_phone_class {
    display: none;
    font-family: "Inter", sans-serif;
    font-size: 17px;
    font-weight: 400;
    justify-content: center;
    height: 30px;
    align-items: center;
    margin-top: 15px;
    cursor: pointer;
}

.product_description-box {
    width: 80%;
    margin-left: 25px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 200px;
    flex-grow: 7;
    padding-right: 10px;
}

.product_name-description-box {
    padding-top: 20px;
}

.product_name {
    font-family: "Inter", sans-serif;
    font-size: 20px;
    font-weight: 700;
    text-align: left;
    color: #274358;
}

.product_description {
    font-family: "Inter", sans-serif;
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    margin-top: 15px;
    align-self: start;
    color: #274358;
    text-align: justify;
}

.user_name {
    font-family: "Inter", sans-serif;
    font-size: 12px;
    font-weight: 400;
    text-align: left;
    color: #274358;
}

.product_price {
    margin-top: 16px;
    width: 18%;
    text-align: right;
    font-family: "Inter", sans-serif;
    font-size: 24px;
    font-weight: 500;
    align-self: start;
    color: #274358;
    flex-grow: 1;
    white-space: nowrap;
}

</style>


