<script setup>
    import {
        ref
    } from "vue";
    import ApplicationLogo from "../Components/ApplicationLogo.vue";
    import Dropdown from "../Components/Dropdown.vue";
    import DropdownLink from "../Components/DropdownLink.vue";
    import NavLink from "../Components/NavLink.vue";
    import ResponsiveNavLink from "../Components/ResponsiveNavLink.vue";
    import {
        Link
    } from "@inertiajs/vue3";

    const showingNavigationDropdown = ref(false);
</script>

<template>
    <nav id="header" class="fixed w-full z-10 top-0">
        <div
            :class="{
                'bg-blue-50 shadow mt-0': isScrollposGreaterThan10,
                '': isScrollposGreaterThan0,
            }">
            <div class="w-full md:max-w-7xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
                <div class="pl-4">
                    <Link class="text-gray-900 text-base no-underline hover:no-underline font-extrabold text-xl"
                        :href="route('home')">
                    <img src="/images/logo.png" class="w-24 h-30" alt="" srcset="" />
                    </Link>
                </div>

                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle"
                        class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-green-500 appearance-none focus:outline-none">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>

                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-100 md:bg-transparent z-20"
                    id="nav-content">
                    <ul class="list-reset lg:flex justify-end flex-1 items-center">
                        <li class="mr-3">
                            <Link :href="route('home')" :active="route().current('home')">
                            Home
                            </Link>
                        </li>

                        <li class="mr-3">
                            <Link :href="route('codespace')" :active="route().current('codespace')">
                            &lt;/CodeSpace&gt;
                            </Link>
                        </li>
                        <li class="mr-3">
                            <Link :href="route('portfolio')" :active="route().current('portfolio')">
                            Portfolio
                            </Link>
                        </li>

                        <li class="mr-3">
                            <Link :href="route('about')" :active="route().current('about')">
                            About
                            </Link>
                        </li>
                        <li class="mr-3">
                            <Link :href="route('contact')" :active="route().current('contact')">
                            Contact
                            </Link>
                        </li>

                        <div v-if="$page.props.auth.user" class="mr-1">
                            <Link v-if="$page.props.auth.user.role == 1" :href="route('admin.dashboard')"
                                class="bg-blue-900 hover:bg-blue-700 text-white py-1 px-2 inline-flex items-center">
                            Admin
                            </Link>

                            <Link :href="route('dashboard')"
                                class="bg-blue-900 hover:bg-blue-700 text-white py-1 px-2 inline-flex items-center">
                            Dashboard
                            </Link>

                            <Link :href="route('logout')" method="post" as="button"
                                class="bg-red-500 hover:bg-red-400 text-white py-1 px-2 inline-flex items-center">
                            Logout
                            </Link>
                        </div>

                        <div v-else>
                            <Link :href="route('login')" :active="route().current('login')"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-1 px-2 inline-flex items-center">
                            Login
                            </Link>

                            <Link :href="route('register')" :active="route().current('register')"
                                class="bg-blue-900 hover:bg-blue-700 text-white py-1 px-2 inline-flex items-center">
                            Register
                            </Link>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative -z-50">
        <img src="/images/left-bg.svg" class="absolute top-0 left-0" alt="" srcset="" />
        <img src="/images/border-right.svg" class="absolute top-0 right-0 w-1/3" alt="" srcset="" />
    </div>

    <!--Container-->
    <div class="container w-full mx-auto pt-20">
        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal">
            <p class="font-bold text-3xl" v-if="$slots.header">
                <span class="text-blue-500 mx-1 font-extrabold text-4xl relative inline-block stroke-current">
                    <slot name="header" />

                    <svg class="absolute -bottom-0.5 w-full max-h-1.5" viewBox="0 0 55 5"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M0.652466 4.00002C15.8925 2.66668 48.0351 0.400018 54.6853 2.00002" stroke-width="2">
                        </path>
                    </svg>
                </span>
            </p>

            <slot />
        </div>
    </div>
    <!--/container-->
    <footer class="w-full bg-blue-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!--Grid-->
            <div
                class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-3 md:gap-8 py-10 max-sm:max-w-sm max-sm:mx-auto gap-y-8">
                <div class="col-span-full mb-10 lg:col-span-2 lg:mb-0">
                    <div class="block xl:max-w-lg">
                        <a href="https://pagedone.io/" class="flex justify-center min-[1124px]:justify-start mb-1">
                            <img src="/images/logo.png" class="w-1/5" alt="" srcset="" />
                        </a>
                        <p class="text-lg text-gray-500 mb-4 text-center min-[1124px]:text-left">
                            Subscribe our newsletter to get everyday post update
                        </p>
                        <div
                            class="relative lg:flex-row gap-3 flex-col flex items-center justify-between max-[1124px]:max-w-2xl max-[1124px]:mx-auto">
                            <span class="absolute left-5 top-4 lg:top-5"><svg width="22" height="18"
                                    viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.25201 4L7.15881 7.89529C9.26862 9.16117 10.3235 9.79412 11.4825 9.76654C12.6416 9.73896 13.6652 9.05656 15.7124 7.69175L20.748 4M9 17H13C16.7712 17 18.6569 17 19.8284 15.8284C21 14.6569 21 12.7712 21 9C21 5.22876 21 3.34315 19.8284 2.17157C18.6569 1 16.7712 1 13 1H9C5.22876 1 3.34315 1 2.17157 2.17157C1 3.34315 1 5.22876 1 9C1 12.7712 1 14.6569 2.17157 15.8284C3.34315 17 5.22876 17 9 17Z"
                                        stroke="#4F46E5" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </span>
                            <input type="text" name="email"
                                class="py-3 px-5 h-14 pl-14 border border-gray-300 rounded-full text-lg text-gray-900 placeholder:text-gray-400 focus:outline-none flex-1 w-full"
                                placeholder="Contact" />
                            <button type="submit"
                                class="h-14 py-3.5 px-7 bg-blue-600 transition-all duration-500 shadow-md rounded-full text-white font-semibold hover:bg-blue-700">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-left">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">
                        mostafiz.xyz
                    </h4>
                    <ul class="text-sm transition-all duration-500">
                        <li class="mb-6">
                            <Link :href="route('home')" class="text-gray-600 hover:text-gray-900">Home</Link>
                        </li>
                        <li class="mb-6">
                            <Link :href="route('about')" class="text-gray-600 hover:text-gray-900">About</Link>
                        </li>
                        <li class="mb-6">
                            <Link :href="route('codespace')" class="text-gray-600 hover:text-gray-900">Codespace</Link>
                        </li>
                        <li>
                            <Link :href="route('contact')" class="text-gray-600 hover:text-gray-900">Contact</Link>
                        </li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-left">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">
                        Products
                    </h4>
                    <ul class="text-sm transition-all duration-500">
                        <li class="mb-6">
                            <Link :href="route('birthday-tool')" class="text-gray-600 hover:text-gray-900">Birthday
                            Calculator</Link>
                        </li>
                        <li class="mb-6">
                            <Link :href="route('periodic-table')" class="text-gray-600 hover:text-gray-900">Periodic
                            Table</Link>
                        </li>
                        <li class="mb-6">
                            <a href="/" class="text-gray-600 hover:text-gray-900">Responsive Blocks</a>
                        </li>
                        <li>
                            <a href="/" class="text-gray-600 hover:text-gray-900">Components Library</a>
                        </li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-left">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">
                        Resources
                    </h4>
                    <ul class="text-sm transition-all duration-500">
                        <li class="mb-6">
                            <a href="/" class="text-gray-600 hover:text-gray-900">FAQs</a>
                        </li>
                        <li class="mb-6">
                            <a href="/" class="text-gray-600 hover:text-gray-900">Quick Start</a>
                        </li>
                        <li class="mb-6">
                            <a href="/" class="text-gray-600 hover:text-gray-900">Documentation</a>
                        </li>
                        <li>
                            <a href="/" class="text-gray-600 hover:text-gray-900">User Guide</a>
                        </li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-left">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">
                        Blogs
                    </h4>
                    <ul class="text-sm transition-all duration-500">
                        <li class="mb-6">
                            <a href="/" class="text-gray-600 hover:text-gray-900">News</a>
                        </li>
                        <li class="mb-6">
                            <a href="/" class="text-gray-600 hover:text-gray-900">Tips & Tricks</a>
                        </li>
                        <li class="mb-6">
                            <a href="/" class="text-gray-600 hover:text-gray-900">New Updates</a>
                        </li>
                        <li>
                            <a href="/" class="text-gray-600 hover:text-gray-900">Events</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Grid-->
            <div class="py-7 border-t border-gray-200">
                <div class="flex items-center justify-center flex-col lg:justify-between lg:flex-row">
                    <span class="text-sm text-gray-500">©<a href="https://pagedone.io/">mostafiz.xyz</a> 2024,
                        All rights reserved.</span>
                    <div class="flex mt-4 space-x-4 sm:justify-center lg:mt-0">
                        <a href="/"
                            class="w-9 h-9 rounded-full bg-gray-700 flex justify-center items-center hover:bg-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 20 20" fill="none">
                                <g id="Social Media">
                                    <path id="Vector"
                                        d="M11.3214 8.93666L16.4919 3.05566H15.2667L10.7772 8.16205L7.1914 3.05566H3.05566L8.47803 10.7774L3.05566 16.9446H4.28097L9.022 11.552L12.8088 16.9446H16.9446L11.3211 8.93666H11.3214ZM9.64322 10.8455L9.09382 10.0765L4.72246 3.95821H6.60445L10.1322 8.8959L10.6816 9.66481L15.2672 16.083H13.3852L9.64322 10.8458V10.8455Z"
                                        fill="white" />
                                </g>
                            </svg>
                        </a>
                        <a href="/"
                            class="w-9 h-9 rounded-full bg-gray-700 flex justify-center items-center hover:bg-indigo-600">
                            <svg class="w-[1.25rem] h-[1.125rem] text-white" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.70975 7.93663C4.70975 6.65824 5.76102 5.62163 7.0582 5.62163C8.35537 5.62163 9.40721 6.65824 9.40721 7.93663C9.40721 9.21502 8.35537 10.2516 7.0582 10.2516C5.76102 10.2516 4.70975 9.21502 4.70975 7.93663ZM3.43991 7.93663C3.43991 9.90608 5.05982 11.5025 7.0582 11.5025C9.05658 11.5025 10.6765 9.90608 10.6765 7.93663C10.6765 5.96719 9.05658 4.37074 7.0582 4.37074C5.05982 4.37074 3.43991 5.96719 3.43991 7.93663ZM9.97414 4.22935C9.97408 4.39417 10.0236 4.55531 10.1165 4.69239C10.2093 4.82946 10.3413 4.93633 10.4958 4.99946C10.6503 5.06259 10.8203 5.07916 10.9844 5.04707C11.1484 5.01498 11.2991 4.93568 11.4174 4.81918C11.5357 4.70268 11.6163 4.55423 11.649 4.39259C11.6817 4.23095 11.665 4.06339 11.6011 3.91109C11.5371 3.7588 11.4288 3.6286 11.2898 3.53698C11.1508 3.44536 10.9873 3.39642 10.8201 3.39635H10.8197C10.5955 3.39646 10.3806 3.48424 10.222 3.64043C10.0635 3.79661 9.97434 4.00843 9.97414 4.22935ZM4.21142 13.5892C3.52442 13.5584 3.15101 13.4456 2.90286 13.3504C2.57387 13.2241 2.33914 13.0738 2.09235 12.8309C1.84555 12.588 1.69278 12.3569 1.56527 12.0327C1.46854 11.7882 1.3541 11.4201 1.32287 10.7431C1.28871 10.0111 1.28189 9.79119 1.28189 7.93669C1.28189 6.08219 1.28927 5.86291 1.32287 5.1303C1.35416 4.45324 1.46944 4.08585 1.56527 3.84069C1.69335 3.51647 1.84589 3.28513 2.09235 3.04191C2.3388 2.79869 2.57331 2.64813 2.90286 2.52247C3.1509 2.42713 3.52442 2.31435 4.21142 2.28358C4.95417 2.24991 5.17729 2.24319 7.0582 2.24319C8.9391 2.24319 9.16244 2.25047 9.90582 2.28358C10.5928 2.31441 10.9656 2.42802 11.2144 2.52247C11.5434 2.64813 11.7781 2.79902 12.0249 3.04191C12.2717 3.2848 12.4239 3.51647 12.552 3.84069C12.6487 4.08513 12.7631 4.45324 12.7944 5.1303C12.8285 5.86291 12.8354 6.08219 12.8354 7.93669C12.8354 9.79119 12.8285 10.0105 12.7944 10.7431C12.7631 11.4201 12.6481 11.7881 12.552 12.0327C12.4239 12.3569 12.2714 12.5882 12.0249 12.8309C11.7784 13.0736 11.5434 13.2241 11.2144 13.3504C10.9663 13.4457 10.5928 13.5585 9.90582 13.5892C9.16306 13.6229 8.93994 13.6296 7.0582 13.6296C5.17645 13.6296 4.95395 13.6229 4.21142 13.5892ZM4.15307 1.03424C3.40294 1.06791 2.89035 1.18513 2.4427 1.3568C1.9791 1.53408 1.58663 1.77191 1.19446 2.1578C0.802277 2.54369 0.56157 2.93108 0.381687 3.38797C0.207498 3.82941 0.0885535 4.3343 0.0543922 5.07358C0.0196672 5.81402 0.0117188 6.05074 0.0117188 7.93663C0.0117188 9.82252 0.0196672 10.0592 0.0543922 10.7997C0.0885535 11.539 0.207498 12.0439 0.381687 12.4853C0.56157 12.9419 0.802334 13.3297 1.19446 13.7155C1.58658 14.1012 1.9791 14.3387 2.4427 14.5165C2.89119 14.6881 3.40294 14.8054 4.15307 14.839C4.90479 14.8727 5.1446 14.8811 7.0582 14.8811C8.9718 14.8811 9.212 14.8732 9.96332 14.839C10.7135 14.8054 11.2258 14.6881 11.6737 14.5165C12.137 14.3387 12.5298 14.1014 12.9219 13.7155C13.3141 13.3296 13.5543 12.9419 13.7347 12.4853C13.9089 12.0439 14.0284 11.539 14.062 10.7997C14.0962 10.0587 14.1041 9.82252 14.1041 7.93663C14.1041 6.05074 14.0962 5.81402 14.062 5.07358C14.0278 4.33424 13.9089 3.82913 13.7347 3.38797C13.5543 2.93135 13.3135 2.5443 12.9219 2.1578C12.5304 1.7713 12.137 1.53408 11.6743 1.3568C11.2258 1.18513 10.7135 1.06735 9.96388 1.03424C9.21256 1.00058 8.97236 0.992188 7.05876 0.992188C5.14516 0.992188 4.90479 1.00002 4.15307 1.03424Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                        <a href="/"
                            class="w-9 h-9 rounded-full bg-gray-700 flex justify-center items-center hover:bg-indigo-600">
                            <svg class="w-[1rem] h-[1rem] text-white" viewBox="0 0 13 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.8794 11.5527V3.86835H0.318893V11.5527H2.87967H2.8794ZM1.59968 2.81936C2.4924 2.81936 3.04817 2.2293 3.04817 1.49188C3.03146 0.737661 2.4924 0.164062 1.61666 0.164062C0.74032 0.164062 0.167969 0.737661 0.167969 1.49181C0.167969 2.22923 0.723543 2.8193 1.5829 2.8193H1.59948L1.59968 2.81936ZM4.29668 11.5527H6.85698V7.26187C6.85698 7.03251 6.87369 6.80255 6.94134 6.63873C7.12635 6.17968 7.54764 5.70449 8.25514 5.70449C9.18141 5.70449 9.55217 6.4091 9.55217 7.44222V11.5527H12.1124V7.14672C12.1124 4.78652 10.8494 3.68819 9.16483 3.68819C7.78372 3.68819 7.17715 4.45822 6.84014 4.98267H6.85718V3.86862H4.29681C4.33023 4.5895 4.29661 11.553 4.29661 11.553L4.29668 11.5527Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                        <a href="/"
                            class="w-9 h-9 rounded-full bg-gray-700 flex justify-center items-center hover:bg-indigo-600">
                            <svg class="w-[1.25rem] h-[0.875rem] text-white" viewBox="0 0 16 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.9346 1.13529C14.5684 1.30645 15.0665 1.80588 15.2349 2.43896C15.5413 3.58788 15.5413 5.98654 15.5413 5.98654C15.5413 5.98654 15.5413 8.3852 15.2349 9.53412C15.0642 10.1695 14.5661 10.669 13.9346 10.8378C12.7886 11.1449 8.19058 11.1449 8.19058 11.1449C8.19058 11.1449 3.59491 11.1449 2.44657 10.8378C1.81277 10.6666 1.31461 10.1672 1.14622 9.53412C0.839844 8.3852 0.839844 5.98654 0.839844 5.98654C0.839844 5.98654 0.839844 3.58788 1.14622 2.43896C1.31695 1.80353 1.81511 1.30411 2.44657 1.13529C3.59491 0.828125 8.19058 0.828125 8.19058 0.828125C8.19058 0.828125 12.7886 0.828125 13.9346 1.13529ZM10.541 5.98654L6.72178 8.19762V3.77545L10.541 5.98654Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
    export default {
        data() {
            return {
                scrollpos: 0, // Initialize with whatever default value you want
                dropdownHidden: true,
            };
        },
        computed: {
            isScrollposGreaterThan10() {
                return this.scrollpos > 10;
            },
            isScrollposGreaterThan0() {
                return this.scrollpos > 0;
            },
        },
        mounted() {
            document.getElementById("nav-toggle").onclick = function() {
                document.getElementById("nav-content").classList.toggle("hidden");
            };
            window.addEventListener("scroll", this.handleScroll);
        },
        beforeDestroy() {
            window.removeEventListener("scroll", this.handleScroll);
        },
        methods: {
            handleScroll() {
                this.scrollpos = window.scrollY;
            },
        },
    };
</script>
