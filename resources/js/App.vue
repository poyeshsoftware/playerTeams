<template>
    <main>
        <app-nav />
        <router-view></router-view>
    </main>
</template>


<script>
    import AppNav from "./components/global/AppNav";

    export default {
        name: "App",
        components: {
            AppNav
        }
    }
</script>

