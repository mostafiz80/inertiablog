<script setup>
import { Head, Link } from "@inertiajs/vue3";
import GuestLayout from "./Layouts/GuestLayout.vue";
</script>

<template>
    <Head title="Portfolio Showcase" />

    <GuestLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Portfolio Showcase
            </h2>
        </template>

        <section id="portfolio" class="portfolio-section">
            <div class="container mx-auto">
                <div class="text-center mb-12">

                    <p class="text-lg text-indigo-500 font-semibold">
                        Discover our latest projects and success stories
                    </p>
                </div>
                <div class="flex flex-col md:flex-row items-center mb-8">
                    <button
                        v-for="category in categories"
                        :key="category"
                        @click="filterProjects(category)"
                        :class="{
                            'bg-indigo-500 hover:bg-pink-500':
                                selectedCategory === category,
                            'bg-gray-500 hover:bg-gray-700':
                                selectedCategory !== category,
                        }"
                        class="filter-button px-4 py-2 mr-2 mb-2 text-white rounded"
                    >
                        {{ category }}
                    </button>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10"
                >
                    <div
                        v-for="project in filteredProjects"
                        :key="project.id"
                        class="group portfolio-item relative hover:shadow-lg shadow-md rounded-lg overflow-hidden"
                    >
                        <a :href="project.link">
                            <img
                                class="w-full h-60 object-cover"
                                :src="project.image"
                                :alt="project.title"
                            />
                            <div
                                class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-r from-indigo-500 to-pink-500 opacity-0 transition duration-300 ease-in-out group-hover:opacity-70"
                            ></div>
                            <div
                                class="p-4 flex flex-col items-center justify-between relative z-10"
                            >
                                <h3
                                    class="text-lg font-medium text-txt group-hover:text-gray-dark"
                                >
                                    {{ project.title }}
                                </h3>
                                <span
                                    class="text-sm font-bold text-pink-500 group-hover:text-indigo-500"
                                    >{{ project.category }}</span
                                >
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<script>
export default {
    data() {
        return {
            projects: [
                {
                    id: 1,
                    title: "Awesome Project 1",
                    category: "App Development",
                    image: "https://spacema-dev.com/elevate/assets/images/portfolio-1.png",
                    link: "/project-1",
                },
                {
                    id: 2,
                    title: "Awesome Project 2",
                    category: "Branding",
                    image: "https://spacema-dev.com/elevate/assets/images/portfolio-2.png",
                    link: "/project-2",
                },
                // Add more projects here
            ],
            categories: ["All", "Web Design", "App Development", "Branding"],
            selectedCategory: "All",
        };
    },
    computed: {
        filteredProjects() {
            if (this.selectedCategory === "All") {
                return this.projects;
            } else {
                return this.projects.filter(
                    (project) => project.category === this.selectedCategory
                );
            }
        },
    },
    methods: {
        filterProjects(category) {
            this.selectedCategory = category;
        },
    },
};
</script>

<style scoped>
/* Add your custom styles here */
</style>
