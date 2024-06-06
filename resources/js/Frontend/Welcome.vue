<script setup>
import { Head, Link } from "@inertiajs/vue3";
import GuestLayout from "./Layouts/GuestLayout.vue";
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    Categories: {
        type: Object,
    },
    Randompost: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Mostafiz's Home" />

    <GuestLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mostafiz's Home
            </h2>
        </template>

        <section>
            <div
                class="mx-auto max-w-7xl px-1 flex gap-24 lg:flex-justify lg:flex flex-col lg:flex-row mb-4"
            >
                <div class="sm:text-center lg:text-left">
                    <h1
                        class="text-4xl tracking-tight font-extrabold text-gray-800 sm:text-5xl md:text-6xl"
                    >
                        <span class="block xl:inline">Hello World </span>
                        <span class="block text-blue-600 xl:inline"
                            >Explore my blog</span
                        >
                    </h1>
                    <p
                        class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0"
                    >
                        Greetings! I'm Mostafizur Rahman, a seasoned web
                        developer. I specialize in crafting flawless digital
                        solutions, excelling in PHP, HTML, CSS, WordPress,
                        Linux, Laravel, and Vue.js. As a seasoned error fixer, I
                        navigate the complexities of web development with
                        precision. Let me architect your online success!
                    </p>
                    <!-- Button Section -->
                    <div
                        class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start"
                    >
                        <div class="rounded-md shadow">
                            <a
                                href="#"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-800 hover:bg-gray-600 md:py-4 md:text-lg md:px-10"
                            >
                                Get started
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a
                                href="#"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-gray-800 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10"
                            >
                                Live demo
                            </a>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h1
                            class="text-2xl tracking-tight font-extrabold text-white sm:text-3xl md:text-3xl bg-blue-500 rounded-full p-2 text-center"
                        >
                            <span class="block xl:inline"
                                >I’m available for freelance work.</span
                            >
                        </h1>
                    </div>
                    <!-- End of Button Section -->
                </div>

                <!--   Image Section     -->
                <div
                    class="lg:inset-y-0 lg:right-0 lg:w-1/2 my-4 place-content-stretch"
                >
                    <img
                        class="rounded-full border-double border-1 border-blue-600 w-full object-cover sm:h-full sm:w-full md:h-full lg:w-full lg:h-full"
                        src="/images/profile-img.jpg"
                        alt=""
                    />
                </div>
                <!--   End of Image Section     -->
            </div>
            <div class="p-2">
                <p class="font-bold text-3xl mb-4">
                    <span
                        class="text-blue-500 mx-1 font-extrabold text-3xl relative inline-block stroke-current"
                    >
                        Codespace Category

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

                <div
                    class="grid gap-3 grid-cols-1 md:grid-cols-2 lg:grid-cols-3"
                    id="accordion-collapse-body-1 mt-4"
                >
                    <a
                        v-for="category in Categories"
                        href="#"
                        class="flex border items-center rounded-md cursor-pointer transition duration-500 shadow-sm hover:shadow-md hover:shadow-blue-400"
                    >
                        <div class="w-16 p-2 shrink-0">
                            <img
                                :src="
                                    '/images/category/' +
                                    category.category_image
                                "
                                alt=""
                                class="h-12 w-12"
                            />
                        </div>
                        <div class="p-2">
                            <p class="font-semibold text-lg">
                                {{ category.name }}
                            </p>
                            <span class="text-gray-600">{{
                                category.description
                            }}</span>
                        </div>
                    </a>
                </div>
            </div>
            <div
                class="h-screen bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white"
            >
                <div class="container mx-auto px-4 py-8">
                    <h2
                        class="text-3xl font-semibold text-center text-gray-800 dark:text-gray-200 mb-8"
                    >
                        Expert with
                    </h2>

                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"
                    >
                        <div
                            class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden"
                        >
                            <img
                                src="/images/sites/laravel-featured.avif"
                                alt="Headless UI"
                                class="w-full h-64 object-cover"
                            />
                            <div class="p-4 md:p-6">
                                <h3
                                    class="text-xl font-semibold text-indigo-500 dark:text-indigo-300 mb-2"
                                >
                                    Laravel Framework
                                </h3>
                                <p
                                    class="text-gray-700 dark:text-gray-300 mb-4 two-lines"
                                >
                                    Laravel is a free and open-source PHP-based
                                    web framework for building high-end web
                                    applications.
                                </p>
                                <a
                                    href="#"
                                    class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-full"
                                    >Learn More</a
                                >
                            </div>
                        </div>

                        <div
                            class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden"
                        >
                            <img
                                src="/images/sites/wordpress.png"
                                alt="Heroicons"
                                class="w-full h-64 object-cover"
                            />
                            <div class="p-4 md:p-6">
                                <h3
                                    class="text-xl font-semibold text-purple-500 dark:text-purple-300 mb-2"
                                >
                                    WordPress CMS
                                </h3>
                                <p
                                    class="text-gray-700 dark:text-gray-300 mb-4 two-lines"
                                >
                                    WordPress is a web content management
                                    system. It was created as a tool to publish
                                    blogs.
                                </p>
                                <a
                                    href="#"
                                    class="inline-block bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-full"
                                    >Learn More</a
                                >
                            </div>
                        </div>

                        <div
                            class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden"
                        >
                            <img
                                src="/images/sites/vue.jpg"
                                alt="Hero Patterns"
                                class="w-full h-64 object-cover"
                            />
                            <div class="p-4 md:p-6">
                                <h3
                                    class="text-xl font-semibold text-cyan-500 dark:text-cyan-300 mb-2"
                                >
                                    Frontend
                                </h3>
                                <p
                                    class="text-gray-700 dark:text-gray-300 mb-4 two-lines"
                                >
                                    Vue.js is an open-source
                                    model–view–viewmodel front end JavaScript
                                    library.
                                </p>
                                <a
                                    href="#"
                                    class="inline-block bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded-full"
                                    >Learn More</a
                                >
                            </div>
                        </div>

                        <!-- Add more items as needed, following the same structure -->
                    </div>
                </div>
            </div>
            <p class="font-bold text-3xl mb-4">
                <span
                    class="text-blue-500 mx-1 font-extrabold text-3xl relative inline-block stroke-current"
                >
                    From The Blog

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
            <div class="max-w-2xl mx-auto text-center"></div>
            <div
                class="grid max-w-2xl grid-cols-1 gap-8 mx-auto mt-8 auto-rows-fr lg:mx-0 lg:max-w-none lg:grid-cols-3"
            >
                <article
                    v-for="post in Randompost"
                    class="relative flex flex-col justify-end px-4 pt-40 pb-4 overflow-hidden bg-gray-900 md:pt-28 isolate rounded-xl dark:shadow dark:shadow-gray-400/50"
                >
                    <img
                        :src="post.post_thumbnail"
                        alt=""
                        class="absolute inset-0 object-cover w-full h-full -z-10"
                    />
                    <div
                        class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"
                    ></div>
                    <div
                        class="absolute inset-0 -z-10 rounded-xl ring-1 ring-inset ring-gray-900/10"
                    ></div>

                    <Link
                        class="text-lg font-semibold leading-6 text-white hover:text-teal-100"
                        :href="route('single', post.post_slug)"
                    >
                        {{ post.post_title }}
                    </Link>
                </article>
            </div>
        </section>

        <div class="max-w-screen-xl mx-auto py-8 px-4 lg:py-16 lg:px-6">
            <div class="text-center mb-10">
                <h2 class="text-4xl tracking-tight font-bold text-primary-800">
                    Highlighted Features
                </h2>
            </div>
            <p>
                PHP Laravel stands as a cornerstone in modern web development,
                offering a robust framework that streamlines the process of
                crafting powerful web applications. With its expressive syntax,
                intuitive design patterns, and rich ecosystem of packages,
                Laravel empowers developers to turn ideas into reality swiftly.
                In my articles, I'll delve into various aspects of Laravel
                development, covering topics such as:
            </p>
            <div class="flex flex-col md:flex-row">
                <!-- can help image -->
                <div class="mr-0 md:mr-8 mb-6 md:mb-0">
                    <img
                        class="w-1/2 md:w-full mx-auto"
                        src="/images/sites/laravel-min.png"
                        alt="can_help_banner"
                    />
                </div>
                <!-- end can help image -->

                <div
                    class="flex-1 flex flex-col sm:flex-row flex-wrap -mb-4 -mx-2"
                >
                    <div class="w-full sm:w-1/2 mb-4 px-2">
                        <div
                            class="h-full py-4 px-6 border border-blue-500 border-t-0 border-l-0 rounded-br-xl"
                        >
                            <h3 class="text-2xl font-bold text-md mb-6">
                                Routing and Middleware:
                            </h3>
                            <p class="text-sm">
                                Navigating through the intricacies of routing
                                and leveraging middleware for enhanced security
                                and performance.
                            </p>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2 mb-4 px-2">
                        <div
                            class="h-full py-4 px-6 border border-blue-500 border-t-0 border-l-0 rounded-br-xl"
                        >
                            <h3 class="text-2xl font-bold text-md mb-6">
                                Database Management with Eloquent:
                            </h3>
                            <p class="text-sm">
                                Harnessing the power of Eloquent ORM for
                                seamless database interaction, making data
                                manipulation a breeze.
                            </p>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 mb-4 px-2">
                        <div
                            class="h-full py-4 px-6 border border-blue-500 border-t-0 border-l-0 rounded-br-xl"
                        >
                            <h3 class="text-2xl font-bold text-md mb-6">
                                Authentication and Authorization:
                            </h3>
                            <p class="text-sm">
                                Implementing secure authentication mechanisms
                                and fine-grained authorization policies to
                                safeguard our applications.
                            </p>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 mb-4 px-2">
                        <div
                            class="h-full py-4 px-6 border border-blue-500 border-t-0 border-l-0 rounded-br-xl"
                        >
                            <h3 class="text-2xl font-bold text-md mb-6">
                                Testing and Debugging:
                            </h3>
                            <p class="text-sm">
                                Adopting a test-driven approach and mastering
                                debugging techniques to ensure the reliability
                                and stability of our codebase.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
