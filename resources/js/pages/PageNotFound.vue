<template>
    <div>
        <div class="h-full w-full bg-blue-600 flex justify-center content-center flex-wrap mt-20">
            <p class="font-sans text-white error-text">404</p>
        </div>

        <div class=" w-full bottom-0 mb-6 text-white text-center font-sans text-xl mt-20 text-gray-900">
            <span class="opacity-80">Take me back to</span>
            <router-link :to="{name: 'index'}" class="border-b border-blue-600 text-blue-600" href="https://tailwindcomponents.com">Main Page</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PageNotFound"
    }
</script>

<style scoped>

</style>
