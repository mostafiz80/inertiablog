<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="py-2">
                <div
                    class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-7xl"
                >
                    <div
                        class="hidden lg:block lg:w-1/2 bg-cover"
                        style="
                            background-image: url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80');
                        "
                    ></div>
                    <div class="w-full p-8 lg:w-1/2">
                        <p class="font-bold text-3xl text-center">
                            <span
                                class="text-blue-500 mx-1 font-extrabold text-4xl relative inline-block stroke-current"
                            >
                                Login my CodeSpace

                                <svg
                                    class="absolute -bottom-0.5 w-full max-h-1.5"
                                    viewBox="0 0 55 5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    preserveAspectRatio="none"
                                >
                                    <path
                                        d="M0.652466 4.00002C15.8925 2.66668 48.0351 0.400018 54.6853 2.00002"
                                        stroke-width="2"
                                    ></path>
                                </svg>
                            </span>
                        </p>

                        <a
                            href="#"
                            class="flex items-center justify-center mt-4 text-white rounded-lg shadow-md hover:bg-gray-100"
                        >
                            <div class="px-4 py-3">
                                <svg class="h-6 w-6" viewBox="0 0 40 40">
                                    <path
                                        d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                        fill="#FFC107"
                                    />
                                    <path
                                        d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z"
                                        fill="#FF3D00"
                                    />
                                    <path
                                        d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z"
                                        fill="#4CAF50"
                                    />
                                    <path
                                        d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                        fill="#1976D2"
                                    />
                                </svg>
                            </div>
                            <h1
                                class="px-4 py-3 w-5/6 text-center text-gray-600 font-bold"
                            >
                                Sign in with Google
                            </h1>
                        </a>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="border-b w-1/5 lg:w-1/4"></span>
                            <a
                                href="#"
                                class="text-xs text-center text-gray-500 uppercase"
                                >or login with email</a
                            >
                            <span class="border-b w-1/5 lg:w-1/4"></span>
                        </div>
                        <div class="mt-4">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                >Email Address</label
                            >

                            <TextInput
                                id="email"
                                type="email"
                                class="bg-gray-200 text-blue-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="username"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>
                        <div class="mt-4">
                            <div class="flex justify-between">
                                <label
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    >Password</label
                                >

                                <Link
                                    v-if="canResetPassword"
                                    :href="route('password.request')"
                                    class="text-xs text-gray-500"
                                >
                                    Forgot your password?
                                </Link>
                            </div>

                            <TextInput
                                id="password"
                                type="password"
                                class="bg-gray-200 text-blue-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                v-model="form.password"
                                required
                                autocomplete="current-password"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.password"
                            />
                        </div>
                        <label class="flex items-center">
                            <Checkbox
                                name="remember"
                                v-model:checked="form.remember"
                            />
                            <span class="ms-2 text-sm text-gray-600"
                                >Remember me</span
                            >
                        </label>
                        <div class="mt-8">
                            <button
                                class="bg-blue-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-blue-600"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Log in
                            </button>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="border-b w-1/5 md:w-1/4"></span>
                            <a href="#" class="text-xs text-gray-500 uppercase"
                                >or sign up</a
                            >

                            <span class="border-b w-1/5 md:w-1/4"></span>
                        </div>
                        <div class="mt-8">
                            <a
                                href="/register"
                                class="bg-blue-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-blue-600"
                                >Register</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>
