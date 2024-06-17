<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import GuestLayout from "./Layouts/GuestLayout.vue";

// Correct type definitions for the props
const props = defineProps({
    categories: {
        type: Array,
        required: true
    },
    projects: {
        type: Array,
        required: true
    }
});

// Local state
const selectedCategory = ref(null);

// Computed property for filtered projects
const filteredProjects = computed(() => {
    if (!selectedCategory.value || selectedCategory.value === "All") {
        return props.projects;
    } else {
        return props.projects.filter(
            (project) => project.portfoliocategory_id === selectedCategory.value.id
        );
    }
});

// Method to filter projects based on category
const filterProjects = (category) => {
    selectedCategory.value = category;
};
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
                        v-for="category in props.categories"
                        :key="category.id"
                        @click="filterProjects(category)"
                        :class="{
                            'bg-indigo-500 hover:bg-pink-500': selectedCategory && selectedCategory.id === category.id,
                            'bg-gray-500 hover:bg-gray-700': !selectedCategory || selectedCategory.id !== category.id,
                        }"
                        class="filter-button px-4 py-2 mr-2 mb-2 text-white rounded"
                    >
                        {{ category.name }}
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
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
                            <div class="p-4 flex flex-col items-center justify-between relative z-10">
                                <h3 class="text-lg font-medium text-txt group-hover:text-gray-dark">
                                    {{ project.title }}
                                </h3>
                                <span class="text-sm font-bold text-pink-500 group-hover:text-indigo-500">
                                    {{ project.category }}
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped>
/* Add your custom styles here */
</style>
