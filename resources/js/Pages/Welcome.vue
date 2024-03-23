<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import route from "../../../vendor/tightenco/ziggy";


defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head title="Вход в систему"/>

    <div>

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


@media (prefers-color-scheme: dark) {
}
</style>
