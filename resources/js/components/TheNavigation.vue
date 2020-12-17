<template>
    <ul class="space-y-4 text-xl">
        <li>
            <router-link :to="{name: 'dashboard'}"><h2>- Players</h2></router-link>
        </li>
        <li>
            <router-link :to="{name: 'teams'}"><h2>- Teams</h2></router-link>
        </li>
    </ul>
</template>

<script>
    export default {
        name: "TheNavigation"
    }
</script>

<style scoped>

</style>
