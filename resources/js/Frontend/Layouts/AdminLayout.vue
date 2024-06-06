<template>
    <nav class="bg-gray-800 p-4">
      <div class="container mx-auto flex justify-between items-center">
        <div class="text-white text-lg font-bold">My Website</div>
        <div class="relative">
          <button @click="toggleMenu" class="text-white px-4 py-2 rounded-md bg-gray-700 hover:bg-gray-600 focus:outline-none">
            Menu
            <svg class="w-5 h-5 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div v-if="isOpen" @click.outside="isOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Home</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Services</a>
          </div>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: 'Navbar',
    data() {
      return {
        isOpen: false,
      }
    },
    methods: {
      toggleMenu() {
        this.isOpen = !this.isOpen;
      }
    }
  }
  </script>
  
  <style scoped>
  /* Optional: Add any scoped styles here */
  </style>
  