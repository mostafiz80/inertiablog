<template>

    <Head title="Edit Category" />
    <DefaultLayouts>
        <div class="flex flex-row">
            <div class="w-1/2 p-4">
                <h2 class="text-lg font-semibold mb-4">Edit Category</h2>
                <div v-if="flashMessage" class="text-red-900 p-4">
                    {{ flashMessage }}
                </div>
                <CategoryForm :singlecategory="singlecategory" :submitLabel="'Update'" @submit="handleSubmit" />
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
        Head
    } from "@inertiajs/vue3";
    import {
        computed
    } from "vue";
    const page = usePage();
    const singlecategory = page.props.singlecategory;
    const categories = page.props.categories;
    const flashMessage = computed(() => page.props.flash.message);

    const handleSubmit = (form) => {
        form.patch(route("categories.update", singlecategory.id), {
            onSuccess: () => form.reset(),
        });
    };
</script>
