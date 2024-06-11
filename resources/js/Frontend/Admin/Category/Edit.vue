<script setup>
import DefaultLayouts from "../Layouts/DefaultLayouts.vue";
import InputError from "../Components/InputError.vue";
import TextInput from "../Components/TextInput.vue";
import { computed } from "vue";
import { Head, usePage, useForm, Link } from "@inertiajs/vue3";
const props =  defineProps({
    categories: {
        type: Object,
    },
    scategory: {
        type: Object,
    },
});
const form = useForm({
    name: props.scategory.name,
    description: props.scategory.description,
    category_image: props.scategory.description,
    category_slug: props.scategory.category_slug,
});

const submit = () => {
    form.put(route("categories.update", props.scategory.id), {
        onSuccess: () => form.reset(),
    });
};

const page = usePage();
const flashMessage = computed(() => page.props.flash.message);
</script>

<template>
    <Head title="Manage catw" />
    <DefaultLayouts>
        <div class="flex flex-row">
            <!-- First Column: Form -->
            <div class="w-1/2 p-4">
                <h2 class="text-lg font-semibold mb-4">Add New Category</h2>
                <form @submit.prevent="submit">
                    <div>
                        <label for="name" class="block font-medium"
                            >Category Name</label
                        >
                        <TextInput
                            type="text"
                            id="name"
                            v-model="form.name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div>
                        <label for="description" class="block font-medium"
                            >Description</label
                        >
                        <textarea
                            id="description"
                            name="description"
                            v-model="form.description"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        ></textarea>
                        <InputError
                            class="mt-2"
                            :message="form.errors.description"
                        />
                    </div>
                    <div>
                        <label for="categoryImage" class="block font-medium"
                            >Category Image</label
                        >
                        <TextInput
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            type="file"
                            @input="
                                form.category_image = $event.target.files[0]
                            "
                        />
                        <progress
                            v-if="form.progress"
                            :value="form.progress.percentage"
                            max="100"
                        >
                            {{ form.progress.percentage }}%
                        </progress>
                        <InputError
                            class="mt-2"
                            :message="form.errors.category_image"
                        />
                    </div>
                    <div>
                        <label for="category_slug" class="block font-medium"
                            >Category Slug</label
                        >
                        <TextInput
                            type="text"
                            id="category_slug"
                            v-model="form.category_slug"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.category_slug"
                        />
                    </div>
                    <div>
                        <button
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Add
                        </button>
                    </div>
                </form>
            </div>

            <!-- Second Column: List of Categories -->
            <div class="w-1/2 p-4">
                <h2 class="text-lg font-semibold mb-4">Categories</h2>
                <ul class="divide-y divide-gray-200">
                    <li v-for="category in categories" class="py-2">
                        {{ category.name }} <Link class="float-right" :href="route('categories.edit', category.id)">Edit  </Link>  <a class="float-right" href="">Delete </a>
                    </li>
                </ul>
            </div>
        </div>
    </DefaultLayouts>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                name: this.scategory.name || '',
                description: this.scategory.description || '',
                category_image: null,
                category_slug: this.scategory.category_slug || '',
            })
        };
    },
    watch: {
        name: function (newVal) {
            // Generate category slug from category name (remove whitespace and convert to lowercase)
            this.category_slug = newVal.replace(/\s+/g, "-").toLowerCase();
        },
    },
};
</script>
