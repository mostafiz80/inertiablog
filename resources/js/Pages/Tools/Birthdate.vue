<script setup>
import { Head, Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
defineProps({});
</script>

<template>
    <Head title="Birthday Calculator" />

    <GuestLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Birthday Calculator
            </h2>
        </template>
        <section class="mt-4 mb-4 bg-white shadow p-6">
            <form v-on:submit.prevent="calculateAge">
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label
                                for="birthdate"
                                class="mb-3 block text-base font-medium text-[#07074D]"
                            >
                                Your Birthday
                            </label>
                            <input
                                type="date"
                                v-model="birthdate"
                                id="birthdate"
                                placeholder="dd-mm-yyyy"
                                min="1950-01-01"
                                max="2030-12-31"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            />
                        </div>
                        <div class="mb-5">
                            <label
                                for="selecteddate"
                                class="mb-3 block text-base font-medium text-[#07074D]"
                            >
                                Age at the Date of
                            </label>
                            <input
                                type="date"
                                v-model="selecteddate"
                                id="selecteddate"
                                placeholder="dd-mm-yyyy"
                                min="1950-01-01"
                                max="2030-12-31"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            />
                        </div>
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                    >
                        Submit
                    </button>
                </div>

                <div class="w-full sm:w-1/2">
                    <div class="mb-5">
                        <div
                            class="bg-white rounded-xl mx-4 md:mx-auto max-w-screen-md border-2 border-blue-800 mt-16"
                        >
                            <div class="px-8 py-6 md:p-10">

                                <p v-if="age">
                                    <h1
                                    class="text-4xl md:text-5xl font-medium leading-tight text-gray-800 mb-6"
                                >Result</h1>
                                    Your age is {{ age.years }} years,
                                    {{ age.months }} months,
                                    {{ age.days }} days, {{ age.hours }} hours,
                                    {{ age.minutes }} minutes, and
                                    {{ age.seconds }} seconds old.
                                    
                                </p>
                                <p
                                    class="text-base md:text-lg font-normal leading-normal text-gray-800 mb-6"
                                ></p>

                                <p
                                    class="text-base md:text-lg font-normal leading-normal text-gray-800 mt-6"
                                >
                                    Hi {{type}},
                                </p>
                                <p
                                    class="text-sm md:text-base font-normal leading-normal text-gray-800 mt-2"
                                ></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </GuestLayout>
</template>
<script>
import moment from "moment";
export default {
    data() {
        return {
            birthdate: "",
            selecteddate: "",
            age: null,
            type: null,
        };
    },
    methods: {
        calculateAge() {
            const today = moment();
                const birthdate = moment(this.birthdate);
                const diff = moment.duration(today.diff(birthdate));
            if (this.birthdate) {


                this.age = {
                    years: diff.years(),
                    months: diff.months(),
                    days: diff.days(),
                    hours: diff.hours(),
                    minutes: diff.minutes(),
                    seconds: diff.seconds(),
                };
            } else {
                this.age = null;
            }

            if (Number(diff.years()) < 12) {
                this.type = "Child";
            } else if(Number(diff.years()) < 19){
                this.type = "Teenager";
            }else if(Number(diff.years()) < 40){
                this.type = "Young Adult";
            }else if(Number(diff.years()) < 65){
                this.type = "Adult";
            }else {
                this.type = "Senior";
            }
        },
    },
};
</script>
