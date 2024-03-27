<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <BreezeGuestLayout>
        <div class="login_block">
            <Head title="Forgot Password"/>

            <div class="mb-4 text-sm text-gray-600">
                Забыли свой пароль? Без проблем. Просто сообщите нам свой адрес электронной почты, и мы вышлем вам по
                электронной почте ссылку для сброса пароля, которая позволит вам выбрать новый.
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <BreezeValidationErrors class="mb-4"/>

            <form @submit.prevent="submit">
                <div>
                    <BreezeLabel for="email" value="Email"/>
                    <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                                 autofocus autocomplete="username"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Ссылка для сброса пароля по электронной почте
                    </BreezeButton>
                </div>
            </form>
        </div>
    </BreezeGuestLayout>
</template>
