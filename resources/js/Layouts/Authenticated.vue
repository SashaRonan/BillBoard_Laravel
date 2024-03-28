<script setup>
import {onMounted, ref} from 'vue';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/inertia-vue3';

const showingNavigationDropdown = ref(false);

// export default {
//     data() {
//         return {
//             userID: null
//         }
//
//     },
//
//
//     mounted() {
//         this.getAuthUserID();
//     },
//
//
//
//     methods: {
//         getAuthUserID() {
//
//             axios.get('/user')
//                 .then(response => {
//                     // this.userID = response.data;
//                     console.log(response.data)
//                 })
//                 .catch(error => {
//                     console.error(error);
//                 });
//         }
//     }
// }

const userID = ref(null);

onMounted(() => {
    getAuthUserID();
});

const getAuthUserID = () => {

    // console.log('пыщ пыщ')

    // axios.get('/user-id')
    //     .then(response => {
    //         // this.userID = response.data;
    //         console.log(response.data)
    //     })
    //     .catch(error => {
    //         console.error(error);
    //     });
};

</script>

<template>

    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100 header">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 container_login_header ">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <BreezeApplicationLogo class="block h-9 w-auto"/>
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex header_a">
                                <BreezeNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    На главную
                                </BreezeNavLink>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex header_a">
                                <BreezeNavLink :href="route('products.index')"
                                               :active="route().current('products.index')">
                                    Все товары
                                </BreezeNavLink>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex header_a">
                                <BreezeNavLink :href="route('products.show', 5)">
                                    <!--  TODO: Необходимо получать ID авторизованного пользователя и передавать в products.show -->
                                    Мои товары
                                </BreezeNavLink>
                            </div>


                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <!-- Settings Dropdown -->
                                <div class="ml-3 relative ">
                                    <BreezeDropdown align="right" width="48">
                                        <template #trigger>
                                                                <span class="inline-flex rounded-md">
                                                                    <button type="button"
                                                                            class="header_a focus:outline-none transition ease-in-out duration-150">
                                                                        {{ $page.props.auth.user.name }}

                                                                        <svg class="ml-2 -mr-0.5 h-4 w-4"
                                                                             xmlns="http://www.w3.org/2000/svg"
                                                                             viewBox="0 0 20 20" fill="currentColor">
                                                                            <path fill-rule="evenodd"
                                                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                                  clip-rule="evenodd"/>
                                                                        </svg>
                                                                    </button>
                                                                </span>
                                        </template>

                                        <template #content>
                                            <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                                Выйти
                                            </BreezeDropdownLink>
                                        </template>
                                    </BreezeDropdown>
                                </div>
                            </div>

                            <!-- Hamburger -->
                            <div class="-mr-2 flex items-center sm:hidden">
                                <button @click="showingNavigationDropdown = ! showingNavigationDropdown"
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path
                                            :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"/>
                                        <path
                                            :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>

                        </div>


                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}"
                     class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <BreezeResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </BreezeResponsiveNavLink>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <BreezeResponsiveNavLink :href="route('products.index')"
                                                 :active="route().current('products.index')">
                            Все товары
                        </BreezeResponsiveNavLink>
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        <BreezeResponsiveNavLink :href="route('products.show', 5)"> <!-- TODO: Необходимо получать ID авторизованного пользователя
                            авторизованного пользователя и передавать в products.show -->
                            <!--                                               :active="route().current('products.show', 6)"> -->
                            Мои товары
                        </BreezeResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Выйти
                            </BreezeResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"/>
                </div>
            </header>
            <body>
            <!-- Page Content -->
            <main>

                <slot/>

            </main>
            </body>
        </div>
    </div>

</template>
