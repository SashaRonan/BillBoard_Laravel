<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import route from "../../../vendor/tightenco/ziggy";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";


defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})
</script>

<template>
    <Head title="Вход в систему"/>

    <BreezeGuestLayout>
        <div v-if="canLogin">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="login_block">
                Вы уже вошли в систему
            </Link>

            <template v-else>

                <div class="login_block">

                    <div>
                        <Link href="/">
                            <BreezeApplicationLogo/>
                        </Link>
                    </div>

                    <div class="button_box">
                        <Link :href="route('login')" class="button">
                            Войти
                        </Link>

                        <Link v-if="canRegister" :href="route('register')" class="button">
                            Зарегистрироваться
                        </Link>
                    </div>
                </div>
            </template>
        </div>
    </BreezeGuestLayout>


</template>

<style scoped>

@media (prefers-color-scheme: dark) {
}

.button {
    width: 208px;
    height: 40px;
    background: #284459;
    border: 1px solid #284459;
    border-radius: 6px;
    color: #fff;
    font-size: 16px;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    margin-top: 21px;
    cursor: pointer;
    justify-content: center;
    display: flex;
    align-items: center;
}

.button:hover {
    background: #4c5b72;
    border: 1px solid #4c5b72;
}

.button:active {
    border: 1px solid #976e76;
    background-color: #976e76;
    transform: translateY(2px);
}

.button_box {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.login_block {
    width: 400px;
    align-items: center;
    display: flex;
    flex-direction: column;
    padding: 20px 30px;
    margin: 0 20px;
    background-color: rgba(0, 0, 0, 0.13);
    border-radius: 10px;
    backdrop-filter: blur(5px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
}
</style>
