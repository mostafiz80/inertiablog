<template>

    <Head title="Add Category" />
    <DefaultLayouts>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div v-if="flashMessage" class="alert alert-success">
                {{ flashMessage }}
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Category Image</th>
                        <th scope="col" class="px-6 py-3">Category Slug</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="category in categories" :key="category.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ category.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ category.description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ category.category_image }}
                        </td>
                        <td class="px-6 py-4">
                            {{ category.category_slug}}
                        </td>

                        <td class="px-6 py-4">
                            <Link :href="route('categories.edit', category.id)"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                            <Link :href="route('categories.destroy', category.id)" method="delete"
                                @click.prevent="confirmDeletion"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Delete
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Pagination Links -->
<!--             <div class="pagination p-4">
                <button class="bg-blue-900 hover:bg-blue-700 text-white py-1 px-2 inline-flex items-center mr-4"
                    :disabled="!listusers.prev_page_url" @click="getUsers(listusers.prev_page_url)">
                    Previous
                </button>
                <button class="bg-blue-900 hover:bg-blue-700 text-white py-1 px-2 inline-flex items-center"
                    :disabled="!listusers.next_page_url" @click="getUsers(listusers.next_page_url)">
                    Next
                </button>
            </div> -->
        </div>
    </DefaultLayouts>
</template>

<script setup>
    import DefaultLayouts from "../Layouts/DefaultLayouts.vue";
    import CategoryForm from "../Components/CategoryForm.vue";
    import { usePage, useForm, Link, Head } from "@inertiajs/vue3";
    import { computed } from "vue";

    const page = usePage();
    const categories = page.props.categories;
    const flashMessage = computed(() => page.props.flash.message);

</script>

<script>
    export default {
        methods: {
            confirmDeletion() {
                if (confirm('Are you sure you want to delete this user?')) {
                    this.$inertia.delete(this.route('categories.destroy', this.categories.id));
                }
            }
        }
    }
</script>
