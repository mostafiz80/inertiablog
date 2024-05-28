<script setup>
import { Head, Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    post: {
        type: Object,
    },
    comments: {
        type: Object,
    },
    count: {
        type: String,
    },
});
</script>

<template>
    <Head title="Codespaces" />

    <GuestLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Codespaces > {{ post.post_title }}
            </h2>
        </template>
        <section>
            <div class="w-full mx-auto py-10 dark:bg-gray-800">
                <!--  -->
                <div
                    class="w-[94%] mx-auto flex gap-1 items-center text-gray-500 sm:text-[12px] xs:text-[10px] font-semibold dark:text-gray-400"
                >
                    <div>Codespace</div>
                    <div class="font-semibold text-md">></div>
                    <div>{{ post.category.name }}</div>
                    <div class="font-semibold text-md">></div>
                    <div>{{ post.post_title }}</div>
                </div>

                <!--  -->
                <h1
                    class="w-[92%] mx-auto lg:text-4xl md:text-3xl xs:text-2xl text-center font-serif font-semibold pb-4 pt-8 dark:text-white"
                >
                    {{ post.post_title }}
                </h1>

                <!-- Blog Cover -->
                <img
                    src="https://miro.medium.com/v2/resize:fit:700/1*Q0uAcG_S2J2gkcUaF5PyxA.png"
                    alt="Blog Cover"
                    class="xl:w-[80%] xs:w-[96%] mx-auto lg:h-[560px] md:h-[480px] rounded-lg"
                />

                <!-- Blog Info -->
                <div
                    class="w-[90%] mx-auto flex md:gap-4 xs:gap-2 justify-center items-center pt-4"
                >
                    <div class="flex gap-2 items-center">
                        <img
                            src="https://lh3.googleusercontent.com/a/ACg8ocIexhmmTS8LcwWo1fPGY5Fl3KXpd-JuBE_Gj56P3rUR2g=s96-c"
                            alt="Bloger Profile"
                            class="md:w-[2.2rem] md:h-[2.2rem] xs:w-[2rem] xs:h-[2rem] rounded-full"
                        />
                        <h2 class="text-sm font-semibold dark:text-white">
                            {{ post.user.username }}
                        </h2>
                    </div>
                    <div class="dark:text-gray-500">|</div>

                    <h3
                        class="text-sm font-semibold text-gray-600 dark:text-gray-400"
                    >
                        {{ timeDifference(post.created_at) }}
                    </h3>

                    <div class="dark:text-gray-500">|</div>
                    <h4
                        class="text-sm font-semibold text-gray-600 dark:text-gray-400"
                    >
                        5 MIN READ {{ count }}
                    </h4>
                </div>

                <!-- Blog -->
                <div class="py-6 dark:bg-gray-800">
                    <div class="md:w-[80%] xs:w-[90%] mx-auto pt-4">
                        <p class="mx-auto text-md dark:text-gray-300">
                            {{ post.post_content }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 p-6">
                <h2 class="text-lg font-bold mb-4">Comments</h2>
                <div class="flex flex-col space-y-4">
                    <div
                        v-for="comment in comments"
                        class="bg-white p-4 rounded-lg shadow-md"
                    >
                        <h3 class="text-lg font-bold">
                            {{ comment.user.username }}
                        </h3>
                        <p class="text-gray-700 text-sm mb-2">
                            Posted on April 17, 2023
                        </p>
                        <p class="text-gray-700">{{ comment.body }}</p>
                    </div>

                    <form class="bg-white p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-bold mb-2">Add a comment</h3>
                        <div class="mb-4">
                            <label
                                class="block text-gray-700 font-bold mb-2"
                                for="name"
                            >
                                Name
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="name"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="mb-4">
                            <label
                                class="block text-gray-700 font-bold mb-2"
                                for="comment"
                            >
                                Comment
                            </label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="comment"
                                rows="3"
                                placeholder="Enter your comment"
                            ></textarea>
                        </div>
                        <button
                            class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit"
                        >
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
<script>
import moment from "moment";

export default {
    data() {
        return {
            currentTime: new Date(),
        };
    },
    methods: {
        timeDifference(pastTime) {
            return moment(pastTime).from(this.currentTime);
        },
    },
};
</script>
