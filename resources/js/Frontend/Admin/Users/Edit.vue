<script setup>
import DefaultLayouts from "../Layouts/DefaultLayouts.vue";
import InputError from "../Components/InputError.vue";
import TextInput from "../Components/TextInput.vue";
import { computed } from "vue";
import { Head, usePage, useForm } from "@inertiajs/vue3";

const props = defineProps({
    message: String,
    userdata: Object
});

const form = useForm({
    name: props.userdata.name,
    email: props.userdata.email,
    username: props.userdata.username,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.put(route("users.update", props.userdata.id), {
        onSuccess: (response) => {
            form.name = response.props.userdata.name;
            form.email = response.props.userdata.email;
            form.username = response.props.userdata.username;
            form.reset('password', 'password_confirmation');
        },
    });
};

const page = usePage();
const flashMessage = computed(() => page.props.flash.message);
</script>

<template>
    <Head title="Edit User" />
    <DefaultLayouts>
        <section class="bg-white dark:bg-gray-500">
            <div class="py-2 px-2 max-w-xl lg:py-4">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                    Edit User
                </h2>
                <div v-if="flashMessage" class="text-red-900 p-4">
                    {{ flashMessage }}
                </div>
                <form @submit.prevent="submit">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Full Name
                            </label>
                            <TextInput
                                id="name"
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                v-model="form.name"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div class="w-full">
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Username
                            </label>
                            <TextInput
                                type="text"
                                id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                v-model="form.username"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.username" />
                        </div>
                        <div class="w-full">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Email
                            </label>
                            <TextInput
                                type="email"
                                id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                v-model="form.email"
                                required
                                autocomplete="username"
                            />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                        <div class="w-full">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Password
                            </label>
                            <TextInput
                                type="password"
                                id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                v-model="form.password"
                                autocomplete="new-password"
                            />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
                        <div class="w-full">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Confirm Password
                            </label>
                            <TextInput
                                type="password"
                                id="password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                v-model="form.password_confirmation"
                                autocomplete="new-password"
                            />
                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>
                    </div>
                    <button
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Update
                    </button>
                </form>
            </div>
        </section>
    </DefaultLayouts>
</template>

