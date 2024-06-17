<script setup>
import { ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import TextInput from "../Components/TextInput.vue";
import InputError from "../Components/InputError.vue";
import { defineProps, defineEmits } from "vue";

const props = defineProps({
    categories: {
        type: Object,
        default: () => ({}),
    },
    singlecategory: {
        type: Object,
        default: () => ({}),
    },
    submitLabel: {
        type: String,
        default: "Submit",
    },
});

const emits = defineEmits(["submit"]);

const form = useForm({
    name: props.singlecategory.name || "",
    description: props.singlecategory.description || "",
    category_image: null,
    category_slug: props.singlecategory.category_slug || "",
});

const handleSubmit = () => {
    emits("submit", form);
};

watch(
    () => form.name,
    (newVal) => {
        form.category_slug = newVal.replace(/\s+/g, "-").toLowerCase();
    }
);
</script>

<template>
    <form @submit.prevent="handleSubmit">
        <div>
            <label for="name" class="block font-medium">Category Name</label>
            <TextInput
                type="text"
                id="name"
                v-model="form.name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required
            />
            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div>
            <label for="description" class="block font-medium">Description</label>
            <textarea
                id="description"
                name="description"
                v-model="form.description"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            ></textarea>
            <InputError class="mt-2" :message="form.errors.description" />
        </div>
        <div>
            <label for="categoryImage" class="block font-medium">Category Image</label>
            <TextInput
                 id="category_image"
                name="category_image"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                type="file"
                @change="event => form.category_image = event.target.files[0]"
            />
            <progress
                v-if="form.progress"
                :value="form.progress.percentage"
                max="100"
            >
                {{ form.progress.percentage }}%
            </progress>
            <InputError class="mt-2" :message="form.errors.category_image" />
        </div>
        <div>
            <label for="category_slug" class="block font-medium">Category Slug</label>
            <TextInput
                type="text"
                id="category_slug"
                v-model="form.category_slug"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required
            />
            <InputError class="mt-2" :message="form.errors.category_slug" />
        </div>
        <div>
            <button
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                {{ submitLabel }}
            </button>
        </div>
    </form>
</template>
