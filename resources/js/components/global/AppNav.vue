<template>
    <div class="flex justify-between mb-10">
        <ul class="flex items-center">
            <li class="mr-4" v-if="this.$store.state.authenticated">
                <router-link :to="{ name: 'dashboard' }" class="text-gray-800 font-medium">
                    Home
                </router-link>
            </li>
        </ul>
        <ul class="flex items-center">
            <template v-if="this.$store.state.authenticated">
                <li class="mr-4">
                    <router-link :to="{ name: 'account' }" class="text-gray-800 font-medium">
                        {{ this.$store.state.user.name }}
                    </router-link>
                </li>
                <li>
                    <a @click.prevent="signOut" href="#" class="text-gray-800 font-medium">
                        Sign out
                    </a>
                </li>
            </template>
            <template v-else>
                <li class="mr-4">
                    <router-link :to="{ name: 'index' }" class="text-gray-800 font-medium">
                        Sign in
                    </router-link>
                </li>
            </template>
        </ul>
    </div>
</template>

<script>


    export default {
        methods: {


            async signOut () {
                await await this.$store.dispatch('signOut');

                this.$router.replace({ name: 'index' })
            }
        }
    }
</script>
