<template>

    <Head title="Add Category" />
    <DefaultLayouts>
        <div class="flex flex-row">
            <div class="w-1/2 p-4">
                <h2 class="text-lg font-semibold mb-4">Add New Category</h2>
                <div v-if="flashMessage" class="text-red-900 p-4">
                    {{ flashMessage }}
                </div>
                <CategoryForm :submitLabel="'Add'" @submit="handleSubmit" />
            </div>

        </div>
    </DefaultLayouts>
</template>

<script setup>
    import DefaultLayouts from "../Layouts/DefaultLayouts.vue";
    import CategoryForm from "../Components/CategoryForm.vue";
    import {
        usePage,
        useForm,
        Link,
        Head
    } from "@inertiajs/vue3";
    import {
        computed
    } from "vue";

    const page = usePage();
    const categories = page.props.categories;
    const flashMessage = computed(() => page.props.flash.message);
    const handleSubmit = (form) => {
        form.post(route("categories.store"), {
            onSuccess: () => form.reset(),
        });
    };
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
