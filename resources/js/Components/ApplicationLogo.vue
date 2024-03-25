<template>

    <div class="header_logo">
        <img id="header_logo_img" class="header_logo_img" src="../../../public/images/logo.svg">
        <p class="header_link" id="header_link">Billboard</p>
    </div>

</template>

<style scoped>

.header_logo {
    width: 100%;
    align-items: center;
    justify-content: center;
    display: flex;
    cursor: pointer;
}

.header_logo_img {
    width: 55px;
}

.header_link {
    font-family: "Anebock", sans-serif;
    font-size: 30px;
    color: #274358;
    margin-left: 5px;
}

@font-face {
    font-family: "Anebock";
    src: url("../../../public/fonts/anebock.ttf");
}

</style>

