<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
// import '../../../public/css/style.css';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head title="Вход в систему"/>

    <div
        class="">

Тут будет красивая надпись приветствия и ссылки на вход в систему и регистрацию.


        <div v-if="canLogin" class="">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="">
                    Войти
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="">
                    Зарегистрироваться
                </Link>
            </template>
        </div>


    </div>
</template>

<style scoped>


.container_login_header {
    width: 800px;
    padding-right: 16px;
    padding-left: 16px;
    margin: 0 auto;
    display: flex;
}


@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
    }

    .dark\:bg-gray-900 {
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
    }

    .dark\:border-gray-700 {
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--tw-border-opacity));
    }

    .dark\:text-white {
        color: #fff;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .dark\:text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
}
</style>
